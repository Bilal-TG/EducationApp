<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * @OA\Get(
     *      path="/api/allSubjects",
     *      operationId="subjects",
     *      tags={"Courses"},
     *      summary="Get All Subjects",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      description="Returns All Register Subjects",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function allSubjects(){
            $allSubject = Subject::paginate(3);
            $allSubject->setCollection($allSubject->getCollection()->makeHidden(['created_at','updated_at','id','class_id']));
            if($allSubject->count() == 0){
                 return response()->json([
                'error' => 'Data not found!',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $allSubject,
            ], 200);
    }
    
    /**
     * @OA\Get(
     *      path="/api/subjectCourses/{subject}",
     *      operationId="subjectCourses",
     *      tags={"Courses"},
     *      summary="Get All Courses of Subject",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      @OA\Parameter(
     *         name="subject",
     *         in="path",
     *         description="Get Courses By Subject",
     *         required=true,
     *      ),
     *      description="Returns All Register Subjects",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
    */
     
    public function subjectCourses($subject){
        $course = Subject::whereTitle($subject)->first();
        $course = Subject::find($course->id)->getCourses;
        if($course->count() != 0){
            return response()->json([
                'success' => true,
                'data' => $course,
            ], 200);
        }else{
            return response()->json([
                'error' => 'Data not found!',
            ], 404);
        }
    }
}
