<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }
            /**
          * @OA\Post(
          * path="/api/changePassword",
          * operationId="changePassword",
          * tags={"Account"},
          * summary="Change Password",
          * security={
          * {
          * "passport": {}},
          * },  
          * description="Change Password",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"email","oldPassword","password","password_confirmation"},
          *               @OA\Property(property="email", type="email"),
          *               @OA\Property(property="oldPassword", type="password"),
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
        public function changePassword(Request $request)
        {
            $validator = $request->validate([
                'email' => 'email|required',
                'oldPassword' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
            $user = User::whereEmail($request->email)->first();
            if($user){
                if(Hash::check($request->oldPassword, $user->password)){
                    $user->password = Hash::make($request->password);
                    $update = $user->save();
                    if($update){
                        return response()->json([
                            'message' => 'Password Successfully Updated',
                        ], 200);
                    }else{
                        return response()->json([
                            'message' => 'Old Password Does Not Matched',
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'Error' => 'Password Does Not Matched',
                    ], 400);
                }
            }else{
                return response()->json([
                    'Error' => 'Email Does Not Matched',
                ], 400);
            }
         }

        /**
          * @OA\Post(
          * path="/api/logout",
          * operationId="authLogout",
          * tags={"Account"},
          * summary="User Logout",
          * security={
          * {
          * "passport": {}},
          * },
          * description="Logout User",
          *     @OA\RequestBody(
          *         @OA\JsonContent(),
          *         @OA\MediaType(
          *            mediaType="multipart/form-data",
          *            @OA\Schema(
          *               type="object",
          *               required={"token"},
          *               @OA\Property(property="token", type="token"),
          *            ),
          *        ),
          *    ),
          *      @OA\Response(response=404, description="Resource Not Found"),
          * )
          */

        public function logout () {
            $token = $request->user()->token();
            $token->revoke();
            $response = ['message' => 'You have been successfully logged out!'];
            return response($response, 200);
        }
}
