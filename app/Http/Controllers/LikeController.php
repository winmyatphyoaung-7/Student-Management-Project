<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //course like&dislike
    public function like(Request $request){
        if($request->status == '1'){
            Like::create([
                'status' => $request->status,
                'user_id' => Auth::user()->id,
                'course_id' => $request->courseId,
            
            ]);
            Like::where('course_id',$request->courseId)->where('user_Id',Auth::user()->id)->where('status','0')->delete();

            $like =Like::where('course_id', $request->courseId)->count();
            $insertData = [
                'like' => $like
            ];
            Course::where('id',$request->courseId)->update($insertData);
        }else{
            Like::where('course_id',$request->courseId)->where('user_Id',Auth::user()->id)->delete();
            Like::create([
                'status' => $request->status,
                'user_id' => Auth::user()->id,
                'course_id' => $request->courseId,
            ]);
        }

        return response()->json([
            'status' => 'true'
        ]);
    }
}
