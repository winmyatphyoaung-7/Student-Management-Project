<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Save;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Register;
use App\Models\RegisterCopy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    //direct course detail page
    public function detailPage($id){
        $course = Course::get();
        $data = Course::where('id',$id)->first();
        $comment = Comment::select('comments.*','users.name as userName','users.image as userImage')
        ->leftJoin('users','comments.user_id','users.id')
        ->where('comments.course_id',$id)
        ->orderBy('created_at','desc')
        ->paginate(5);
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        $like = Like::where('likes.course_id',$id)->where('status','1')->get();
        return view('user.course.detail',compact('data','comment','like','course','cart'));
    }

    //course save
    public function saved($id){
        $data =[
            'course_id' => $id,
            'user_id' => Auth::user()->id
        ];

        Save::create($data);
        toastr()->info('Course Saved Success!');
        return back();
    }

    //course unsaved
    public function unsaved($id){
        Save::where('user_id',Auth::user()->id)->where('course_id',$id)->first()->delete();
        toastr()->warning('Course Unsaved Success');
        return back();
    }

    //course filter saved
    public function savedPage(){
        $data = Category::get();
        $course = Save::select('saves.*','courses.*')
        ->leftJoin('courses','saves.course_id','courses.id')
        ->where('user_id',Auth::user()->id)
        ->get();
        $cart = Register::where('user_id',Auth::user()->id)->get();
        return view('user.HomePage',compact('course','data','cart'));
    }

    //course filter with category
    public function filter($id){
        $data = Category::get();
        $course = Course::where('category_id',$id)->get();
        $cart = Register::where('user_id',Auth::user()->id)->get();
        return view('user.HomePage',compact('course','data','cart'));
    }
}
