<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\FailMail;
use App\Models\Course;
use App\Models\Student;
use App\Mail\StatusMail;
use App\Models\Register;
use App\Models\RegisterCopy;
use Illuminate\Http\Request;
use App\Models\RegisterHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    //request list page
    public function listPage(){
        $data = Register::select('registers.*','courses.name as courseName','users.name as userName','users.email as userEmail','users.phone as userPhone')
        ->leftJoin('courses','registers.course_id','courses.id')
        ->leftJoin('users','registers.user_id','users.id')
        ->where('yn' , 0 )
        ->where(function($query) {
            $query->where('users.phone', 'like', '%' . request('key') . '%')
                  ->orWhere('users.name', 'like', '%' . request('key') . '%')
                  ->orWhere('users.email', 'like', '%' . request('key') . '%')
                  ->orWhere('courses.name', 'like', '%' . request('key') . '%');
        })
        ->paginate(5);

        $data->appends(request()->all());
        return view('admin.requests.list',compact('data'));
    }

    //request accept
    public function accept($id,$userId){
        $user = User::where('id',$userId)->first();
        $data = Register::select('registers.*','courses.name as courseName','courses.image as courseImage','users.name as userName')
        ->leftJoin('courses','registers.course_id','courses.id')
        ->leftJoin('users','registers.user_id','users.id')
        ->where('registers.id',$id)->first();
        $getDataForStudentTable = Register::where('id',$id)->first();
        $insertData = [
            'status' => '1',
            'yn' => '1'
        ];
        $insertDataForHistory = [
            'course_id' => $getDataForStudentTable->course_id,
            'user_id' => $getDataForStudentTable->user_id,
            'status' => 1
        ];
        $insertForStudentTable = [
            'user_id' => $getDataForStudentTable->user_id,
            'course_id' => $getDataForStudentTable->course_id
        ];

        Student::create($insertForStudentTable);
        $student = Student::where('course_id',$getDataForStudentTable->course_id)->count();
        $insertDataCourse = [
            'student' => $student
        ];
        
        $dataForStatusMail = Course::where('id',$getDataForStudentTable->course_id)->update($insertDataCourse);
        RegisterHistory::create($insertDataForHistory);
        Course::where('id',$getDataForStudentTable->course_id)->update($insertDataCourse);
        Register::where('id',$id)->update($insertData);
        RegisterCopy::where('id',$id)->update($insertData);
        Mail::to($user)->send(new StatusMail($data));
        toastr()->success('You accepted request!');
        return back();
    }

    //request reject
    public function reject($id,$userId){
        $user = User::where('id',$userId)->first();
        $data = Register::select('registers.*','courses.name as courseName','courses.image as courseImage','users.name as userName')
        ->leftJoin('courses','registers.course_id','courses.id')
        ->leftJoin('users','registers.user_id','users.id')
        ->where('registers.id',$id)->first();
        $getDataForStudentTable = Register::where('id',$id)->first();
        $insertData=[
            'status' => '2',
            'yn' => '1'
        ];

        $insertDataForHistory = [
            'course_id' => $getDataForStudentTable->course_id,
            'user_id' => $getDataForStudentTable->user_id,
            'status' => 0
        ];

        RegisterHistory::create($insertDataForHistory);
        Register::where('id',$id)->update($insertData);
        RegisterCopy::where('id',$id)->update($insertData);
        Mail::to($user)->send(new FailMail($data));
        toastr()->success('You rejected request!');
        return back();
    }
}
