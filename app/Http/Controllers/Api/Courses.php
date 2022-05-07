<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class Courses extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * @OA\Get(
     *      path="/api/allCourses",
     *      operationId="course",
     *      tags={"Courses"},
     *      summary="Get All Courses",
     *      security={
     *      {
     *      "passport": {}},
     *      },
     *      description="Returns All Register Courses",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function allCourses($id=null){
            $allCourses = Course::all();
            foreach($allCourses as $course){
               $allLessons = Course::find($course->id)->getLessons;
               if($allLessons->count() != 0){
                    $lessonCount = $allLessons->count();
                    $course->total_lessons = $lessonCount;
                    $course->save();
                }else{
                    $course->total_lessons = 0;
                }
            }
        if($allCourses != null && $allCourses->count() !=0){
            $allCourses->makeHidden(['created_at','updated_at','featured','popular','keywords','status']);
            return response()->json([
                'success' => true,
                'data' => $allCourses,
            ], 200);
        }else{
            return response()->json([
                'error' => 'No Data Found!',
            ], 400);
        }
    }
    
     /**
     * @OA\Get(
     *      path="/api/single_course/{id}",
     *      operationId="course",
     *      tags={"Courses"},
     *      summary="Get Single Course",
     *      security={
     *      {
     *      "passport": {}},
     *      },
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Course Id to get Single Course",
     *         required=true,
     *      ),
     *      description="Returns All Register Courses",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function single_course($id){
        if($id != null){
            $allCourses  = Course::find($id)->first();
        }
        if($allCourses != null && $allCourses->count() !=0){
            $allCourses->makeHidden(['created_at','updated_at','featured','popular','keywords','status']);
            return response()->json([
                'success' => true,
                'data' => $allCourses,
            ], 200);
        }else{
            return response()->json([
                'error' => 'No Data Found!',
            ], 400);
        }
    }
    
    /**
     * @OA\Get(
     *      path="/api/SliderCourses",
     *      operationId="sliderCourses",
     *      tags={"Courses"},
     *      summary="Get All Courses For Slider",
     *      security={
     *      {
     *      "passport": {}},
     *      },
     *      description="Returns All Courses For Slider",
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function SliderCourses(){
        $sliderCourses = Course::whereFeatured(1)->get();
        
        if($sliderCourses->count() != 0){
            $sliderCourses->makeHidden(['created_at','updated_at','featured','popular','keywords','status']);
            return response()->json([
                'success' => true,
                'data' => $sliderCourses,
            ], 200);
        }else{
            return response()->json([
                'error' => 'No Data Found!',
            ], 400);
        }
    }
    
    /**
     * @OA\Get(
     *      path="/api/PopularCourses",
     *      operationId="PopularCourses",
     *      tags={"Courses"},
     *      summary="Get All Popular Courses",
     *      security={
     *      {
     *      "passport": {}},
     *      },
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function PopularCourses(){
        $popularCourses = Course::wherePopular(1)->get();
        
        if($popularCourses->count() != 0){
            $popularCourses->makeHidden(['created_at','updated_at','featured','popular','keywords','status']);
            return response()->json([
                'success' => true,
                'data' => $popularCourses,
            ], 200);
        }else{
            return response()->json([
                'error' => 'No Data Found!',
            ], 400);
        }
    }
    
    /**
     * @OA\Get(
     *      path="/api/searchCourses/{keyword}",
     *      operationId="searchCourses",
     *      tags={"Courses"},
     *      summary="Search in All Courses against Keyword",
     *      security={
     *      {
     *          "passport": {}},
     *      },
     *      @OA\Parameter(
     *         name="keyword",
     *         in="path",
     *         description="Get Courses By keyword",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
    */
    public function searchCourses($search){
       $courses = Course::where('keywords','like','%'.$search.'%')->orWhere('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
       if($courses->count() != 0){
            $courses->makeHidden(['created_at','updated_at','class_id']);
            return response()->json([
                'success' => true,
                'courses' => $courses,
            ], 200);
        }else{
            return response()->json([
                'error' => 'Data not found!',
            ], 404);
        }
    }
}
