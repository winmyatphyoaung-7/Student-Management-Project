<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\RegisterCopy;
use Illuminate\Http\Request;
use App\Models\RegisterHistory;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //course register
    public function register(Request $request)
    {
        $register = Register::where("course_id", $request->courseId)->where("user_id", $request->userId)->first();
        if ($register) {
            if ($register->course_id == $request->courseId && $register->user_id != $request->userId) {
                $insertData = [
                    'user_id' => $request->userId,
                    'course_id' => $request->courseId,
                ];
                Register::create($insertData);
                RegisterCopy::create($insertData);
                toastr()->success("Course Registeration Completed");
                return response()->json([
                    'status' => true,
                ]);
            } else {
                toastr()->error("You've already registered this course");
                return response()->json([
                    'status' => true,
                ]);
            }
        } else {
            $insertData = [
                'user_id' => $request->userId,
                'course_id' => $request->courseId,
            ];
            Register::create($insertData);
            RegisterCopy::create($insertData);
            toastr()->success("Course Registeration Completed");
            return response()->json([
                'status' => true,
            ]);
        }
    }

    //cart list page
    public function cartListPage()
    {
        $register = RegisterCopy::select('register_copies.*', 'courses.*')
            ->leftJoin('courses', 'register_copies.course_id', 'courses.id')
            ->where('register_copies.user_id', Auth::user()->id)
            ->paginate(10);
        $register->appends(request()->all());
        return view('user.cart.list', compact('register'));
    }

    //cart delete
    public function cartDelete($id)
    {
        RegisterCopy::where('course_id',$id)->delete();
        toastr()->success('You removed successfully!');
        return back();
    }

    // direct register history page
    public function historyPage(){
        $data = RegisterHistory::select('register_histories.*','courses.name as courseName')
        ->leftJoin('courses','register_histories.course_id','courses.id')
        ->where('user_id',Auth::user()->id)->paginate(7);
        $data->appends(request()->all());
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.history.history',compact('data','cart'));
    }
}
