<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
Use App\Models\user_profile;

class UserProfileController extends Controller
{
    //
        public function __construct()
    {
        $this->middleware('auth:api');
    }
        /**
     * @OA\Get(
     *      path="/api/currentUser",
     *      operationId=" ",
     *      tags={"User Profile"},
     *      summary="Get Current User",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      description="Returns Current User Data",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $user = Auth()->user()->makeHidden(['FirstName', 'LastName','email_verified_at','password','mobile_number','created_at']);
        $cu = User_profile::whereUser_id($user->id)->get(['FirstName','LastName','institute','gender','city','pp_path','number','verified']);
        if($cu){
            $user['profile'] = $cu;
        }
        return response()->json([
                "success" => true,
                "data" => $user,
            ])->setStatusCode(200);
    }       
    
    /**
        * @OA\Post(
        * path="/api/UserProfileSave",
        * operationId="User Profile Save",
        * tags={"User Profile"},
        * summary="User Profile Save",
        * security={
        * {
        * "passport": {}},
        * },
        * description="User Profile Save",
        *     @OA\RequestBody(
        *         @OA\JsonContent(),
        *         @OA\MediaType(
        *            mediaType="multipart/form-data",
        *            @OA\Schema(
        *               type="object",
        *               required={"FirstName","LastName","gender", "pp_path", "city"},
        *               @OA\Property(property="FirstName", type="string"),
        *               @OA\Property(property="LastName", type="string"),
        *               @OA\Property(property="gender", type="string"),
        *               @OA\Property(property="InstituteName", type="string"),
        *               @OA\Property(property="number", type="int"),
        *               @OA\Property(property="pp_path", type="file"),
        *               @OA\Property(property="city", type="string"),
        *            ),
        *        ),
        *    ),
        *      @OA\Response(response=400, description="Bad request"),
        * )
        */
    public function saveProfile(Request $request)
    {
        $user = Auth()->user();
        $validator = $request->validate([
            'gender' => 'required',
            'pp_path' => 'required|image:jpg,png,gif|max:2048',
            'city' => 'required',
        ]);
        $file = $request->file('pp_path');
        if ($file) {
            $extension = $file->extension();
            $filename = $user->name.'_profileImage_'.$user->id.'.'.$extension;
            $path = $file->storeAs('public/p_images', $filename);
                if($path){
                    $path = asset(Storage::url($path));
                }
                $cu = User_profile::whereUser_id($user->id)->first();
                if(!$cu){
                    $data = $request->all();
                    $data['pp_path'] = $path;
                    $data['user_id'] = $user->id;
                    $data['email'] = $user->email;
                    $data['institute'] = $request->InstituteName;
                    $save = User_profile::create($data);
                    if($save){
                    return response()->json([
                        'status' => '200',
                        "message" => "Profile Created Successfully",
                    ], 200);
                    }
                }else{
            $save = $cu;
            $save->pp_path= $path;
            $save->user_id = $user->id;
            $save->FirstName = $request->FirstName;
            $save->LastName = $request->LastName;
            $save->institute = $request->InstituteName;
            $save->gender = $request->gender;
            $save->city = $request->city;
            $save->email = $user->email;
            $save->number = $request->number;
            $save->save();  
            return response()->json([
                "success" => true,
                "message" => "Profile Updated Successfully",
            ])->setStatusCode(200);
                }
        }
    }
}
