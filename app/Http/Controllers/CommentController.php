<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    //comment create
    public function create(Request $request){
        $data = $this->saveDataToDB($request);
        Comment::create($data);

        $comment = Comment::where('course_id',$request->courseId)->count();
        $insertData = [
            'comment' => $comment
        ];

        Course::where('id',$request->courseId)->update($insertData);
        
        return back();
    }

    //comment delete
    public function delete($id){
        Comment::where('id',$id)->delete();
        toastr()->warning('Comment Deleted ');
        return back();
    }

    //save user comment data to database
    private function saveDataToDB($request){
        return [
            'content' => $request->comment,
            'user_id' => Auth::user()->id,
            'course_id' => $request->courseId
        ];
    }
}
