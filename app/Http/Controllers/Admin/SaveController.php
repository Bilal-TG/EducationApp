<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class SaveController extends Controller
{
    public function saveVideo(Request $request){
        $video_file = $request->file('intro_video');            
        if ($video_file) {
            $video_ext = $video_file->extension();
            $video_filename = Carbon::now() . '.' . $video_ext;

            $video_path = $video_file->storeAs('public/video', str_replace(' ', '_', $video_filename));
            if ($video_path) {
                $video_path = asset(Storage::url($video_path));
            }
            
            return response()->json([
            'message'   => 'Image Upload Successfully',
            'video_path' => $video_path,
            ]);
        }else{
            return response()->json([
            'message'   => 'Image Upload Failed',
            ]);
        }
        
    }
}