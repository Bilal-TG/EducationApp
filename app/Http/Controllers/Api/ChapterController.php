<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * @OA\Get(
     *      path="/api/courseChapters/{id}",
     *      operationId="courseChapters",
     *      tags={"Courses"},
     *      summary="Get All Chapters of Courses",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Course Id to get Course Chapters",
     *         required=true,
     *      ),
     *      description="Returns All Courses Chapters",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function courseChapters($id){
        $course = Course::find($id);
            if($course){
                $chapters = Course::find($id)->chapters;
                if($chapters->count() != 0){
                    $chapters->makeHidden(['course_id','created_at','updated_at','quiz_id']);
                    return response()->json([
                        'success' => true,
                        'data' => $chapters,
                    ], 200);           
                }else{
                        return response()->json(['error' => 'Chapters not found!'], 404);
                    }
            }
        return response()->json([
            'error' => 'Data not found!',
        ], 404);
    }
}
