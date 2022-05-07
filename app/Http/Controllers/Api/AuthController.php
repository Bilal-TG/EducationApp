<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\user_profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;
use App\Mail\WelcomeMail;
use App\Models\Password_reset;
use App\Mail\PasswordMail;


class AuthController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['reg1','login', 'forgotPassword', 'passwordReset', 'updatePassword'] ] );
    }

    /**
        * @OA\Post(
        * path="/api/reg1",
        * operationId="Register",
        * tags={"Account"},
        * summary="User Register",
        * security={
        * {
        * "passport": {}},
        * },
        * description="User Register here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"FirstName","LastName","email", "password", "mobile_number",},
        *               @OA\Property(property="FirstName", type="string"),
        *               @OA\Property(property="LastName", type="string"),
        *               @OA\Property(property="email", type="email"),
        *               @OA\Property(property="password", type="password"),
        *               @OA\Property(property="mobile_number", type="number"),
        *            ),
        *        ),
        *    ),
        *      @OA\Response(response=400, description="Bad request"),
        * )
        */
        public function reg1(Request $request)
        {
            $validated = $request->validate([
                'FirstName' => 'required|min:3',
                'LastName' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'mobile_number' => 'required',
            ]);
            $user = User::whereEmail($request->email)->first();
            if($user)
            {
                return response()->json(['error' => 'Email is already Registered' ]);
            }else{
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);
                $user = User::create($data);
                if($user){
                    $data['user_id'] = $user->id;
                    $data['FirstName'] = $request->FirstName;
                    $data['LastName'] = $request->LastName;
                    $data['email'] = $request->email;
                    $data['number'] = $request->mobile_number;
                    $save = User_profile::create($data);
                }
                $mail = Mail::to($request->email)->send(new WelcomeMail($request->FirstName));
                $success['token'] =  'Bearer ' . $user->createToken('authToken')->accessToken;
                $success['user'] =  $user;
                return response()->json(['success' => 'success', 'data' => $success ]);
            }
        }
  
        /**
          * @OA\Post(
          * path="/api/login",
          * operationId="authLogin",
          * tags={"Account"},
          * summary="User Login",
          * security={
          * {
          * "passport": {}},
          * },
          * description="Login User Here",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"email", "password"},
          *               @OA\Property(property="email", type="email"),
          *               @OA\Property(property="password", type="password")
          *            ),
          *        ),
          *    ),
          *      @OA\Response(response=400, description="Bad request"),
          * )
          */
        public function login(Request $request)
        {
            $validator = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            $user = User::whereEmail($request->email)->first();
            if($user)
            {
                if(!Hash::check($request->password, $user->password))
                {
                    return response()->json(['error' => 'Password Does Not Matched'], 401);
                }elseif (!auth()->attempt($validator)) {
                    return response()->json(['error' => 'Unauthorised'], 401);
                } else {
                    $success['token'] = 'Bearer ' . auth()->user()->createToken('authToken')->accessToken;
                    $success['user'] = auth()->user();
                    return response()->json(['status' => 'success', 'data' => $success])->setStatusCode(200);
                }
            }else{
                return response()->json([
                    'Error' => 'Email Does Not Matched',
                ], 400);
            }
        }

        /**
          * @OA\Post(
          * path="/api/password/forgot-password",
          * operationId="Forgot Password",
          * tags={"Account"},
          * summary="User Forgot Password Link Send",
          * security={
          * {
          * "passport": {}},
          * },
          * description="Forgot Password Link Send User Here",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"email"},
          *               @OA\Property(property="email", type="email"),
          *            ),
          *        ),
          *    ),
          *      @OA\Response(response=404, description="Resource Not Found"),
          * )
          */
          
        public function forgotPassword(Request $request)
        {
            $validator = $request->validate([
                'email' => 'email|required',    
            ]);
            
            $user = User::whereEmail($request->email)->first();
            if(!$user){
                return response()->json([
                    'Error' => 'Email Does Not Matched',
                ], 400);
            }else{
            $token = random_int(1000, 9999);
            $data['email'] = $request->email;
            $data['token'] = $token;
            $p_r = Password_reset::whereEmail($user->email)->first();
            if($p_r){
                $p_r['token'] = $token;
                $p_r->save();
                Mail::to($request->email)->send(new PasswordMail($token));
                return response()->json(['response' => 'Mail Send Successfully!', 'token'=> $token])->setStatusCode(200);
            }else{
                    $save = Password_reset::create($data);
                if($save){
                    Mail::to($request->email)->send(new PasswordMail($token));
                    return response()->json(['response' => 'Mail Send Successfully!', 'token'=> $token])->setStatusCode(200);
                }else{
                    return response()->json([
                        'Error' => 'unknown error occurred',
                    ], 400);
                    }
                }
            }
        }

        /**
          * @OA\Post(
          * path="/api/password/reset",
          * operationId="Reset Password",
          * tags={"Account"},
          * summary="User Forgot Password Link Send",
          * security={
          * {
          * "passport": {}},
          * },
          * description="Forgot Password Link Send User Here",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"email", "token"},
          *               @OA\Property(property="email", type="email"),
          *               @OA\Property(property="token", type="int"),
          *            ),
          *        ),
          *    ),
          *      @OA\Response(response=404, description="Resource Not Found"),
          * )
          */
          public function passwordReset(Request $request){
              $validator = $request->validate([
                'email' => 'email|required',  
                'token' => 'min:4 | required | max:4'  
            ]);
            $user = Password_reset::whereEmail($request->email)->whereToken($request->token)->first();
            if($user){
                return response()->json(['response' => 'true'])->setStatusCode(200);
            }else{
                return response()->json([
                    'Error' => 'Token is invalid',
                ], 400);
            }
        }

        /**
          * @OA\Post(
          * path="/api/updatePassword",
          * operationId="updatePassword",
          * tags={"Account"},
          * summary="Update Password",
          * security={
          * {
          * "passport": {}},
          * },  
          * description="Update Password",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"password","email","password_confirmation"},
          *               @OA\Property(property="email", type="email"),
          *               @OA\Property(property="password", type="password"),
          *               @OA\Property(property="password_confirmation", type="password"),
          *            ),
          *        ),
          *    ),
          *      @OA\Response(
          *          response=201,
          *          description="Change Password Successfully",
          *          @OA\JsonContent()
          *       ),
          *      @OA\Response(
          *          response=200,
          *          description="Change Password Successfully",
          *          @OA\JsonContent()
          *       ),
          *      @OA\Response(
          *          response=422,
          *          description="Unprocessable Entity",
          *          @OA\JsonContent()
          *       ),
          *      @OA\Response(response=400, description="Bad request"),
          *      @OA\Response(response=404, description="Resource Not Found"),
          * )
        */
        public function updatePassword(Request $request)
        {
            $validator = $request->validate([
                'email' => 'email|required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
            $user = User::whereEmail($request->email)->first();
            if($user){
                    $user->password = Hash::make($request->password);
                    $update = $user->save();
                    if($update){
                        return response()->json([
                            'message' => 'Password Successfully Updated',
                        ], 200);
                    }else{
                        return response()->json([
                            'message' => 'there is some problem updating your password',
                        ], 400);
                    }
            }else{
                return response()->json([
                    'Error' => 'Email Does Not Matched',
                ], 400);
            }
        }

          

        // /**
        //  * @OA\Get(
        //  * path="/api/users/{userId}",
        //  * summary="Get User Details",
        //  * description="Get User Details",
        //  * operationId="GetUserDetails",
        //  * tags={"AllUsers"},
        //  * security={{"passport": {}}},
        //  * @OA\Parameter(
        //  *    description="ID of User",
        //  *    in="path",
        //  *    name="userId",
        //  *    required=true,
        //  *    example="1",
        //  *    @OA\Schema(
        //  *       type="integer",
        //  *       format="int64"
        //  *    )
        //  * )
        //  * )
        //  */
        // public function allUsers()
        // {
        //     $users = User::all();
        //     return response()->json([
        //         'status' => 'success',
        //         'status_code' => Response::HTTP_OK,
        //         'data' => [
        //             'users' => UserResource::collection($users)
        //         ],

        //         'message' => 'All users pulled out successfully'

        //     ]);
        // }
}