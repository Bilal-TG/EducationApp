<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @OA\Get(
     *      path="/api/allClasses",
     *      operationId=" ",
     *      tags={"Courses"},
     *      summary="Get All Classes",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      description="Returns All Register Classes",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function allClasses(){
        $allClasses = Classes::select('id','class_name')->orderBy('id', 'asc')->get();
            return response()->json([
                'success' => true,
                'data' => $allClasses,
            ], 200);
    }   
    
}
