<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * @OA\Get(
     *      path="/api/faqs",
     *      operationId="faqs",
     *      tags={"FAQs"},
     *      summary="Get All FAQs",
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

    public function allFaqs(){
        $allFaq = FAQ::select('question','answer')->get();
        if($allFaq->count() != 0){
            return response()->json([
                'success' => true,
                'data' => $allFaq,
            ], 200);
        }else{
            return response()->json([
                'error' => 'Data not found!',
            ], 204);
        }
    }
}
