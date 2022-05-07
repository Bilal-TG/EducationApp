<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class LessonController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * @OA\Get(
     *      path="/api/lessons/{id}",
     *      operationId="lessons",
     *      tags={"Courses"},
     *      summary="Get All Lesson of Courses",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Chapter Id to get Chapter Lessons",
     *         required=true,
     *      ),
     *      description="Returns All Register Course Content",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function ChapterLessons($id){
        $chapter = Chapter::find($id);
        if($chapter){
            $lessons = Chapter::find($id)->Lessons;
            if($lessons->count() != 0){
                $lessons->makeHidden(['chapter_id','created_at','updated_at']);
                return response()->json([
                    'success' => true,
                    'data' => $lessons,
                ], 200);           
            }
                return response()->json([
                    'error' => 'Data not found!',
                ], 500);
        }else{
             return response()->json([
                    'error' => 'Chapter not found!',
                ], 500);
        }
    }
}
