<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //redirect home page

    public function homePage()
    {   
        $data = Course::leftJoin('categories','courses.category_id','categories.id')
        ->select('courses.*','categories.name as categoryName')->get();
        return view('admin.homePage',compact('data'));
    }
    //direct profile page

    public function profilePage()
    {
        $dataProfile = User::where('id', Auth::user()->id)->get();
        return view('admin.account.profile', compact('dataProfile'));
    }

    //change password page to edit profile

    public function confirmPasswordPage()
    {
        return view('admin.account.confirmPassword');
    }

    //direct edit Page from password confirm page

    public function confirmPassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        // dd(Hash::check($request->password,$dbPassword));
        if (Hash::check($request->password, $dbPassword)) {
            return view('admin.account.SuccessConfirmation');
        } else {
            return back()->with(['notMatch' => 'The Old Password Not Match. Try Again!']);
        }
    }

    public function updateProfilePage(){
        $data = User::where('id', Auth::user()->id)->get();
        return view('admin.account.profileEdit',compact('data'));
    }

    //profile update

    public function updateProfile(Request $request) {
        $this->profileUpdateValidation($request);
        $data = $this->getUserData($request);

        //for image

        if($request->hasFile('profileImage')){
            $dbImage =User::select('image')->where('id',Auth::user()->id)->first();

            if($dbImage != null) {
                Storage::delete('public/'.$dbImage);
            }


            $fileName = uniqid() . $request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->storeAs('public',$fileName);
            $data['image'] = $fileName;

        }
        User::where('id',Auth::user()->id)->update($data);
        return redirect()->route('admin#profilePage');
    }

    //change password page

    public function changePasswordPage(){
        return view('admin.account.changePassword');
    }

    //change password

    public function changePassword(Request $request){
        $this->ValidationCheckForChangePass($request);
        $currentUserId = Auth::user()->id;
        $dbPass = User::select('password')->where('id',$currentUserId)->first();
        $dbPass = $dbPass->password;

        if(Hash::check($request->oldPassword,$dbPass)) {
            $data = [
                'password' => Hash::make($request->password)
            ];
            User::where('id',$currentUserId)->update($data);
        }else{
            toastr()->error('Your Password is not invalid!');
            return back();
        }
        toastr()->success('Your Password is changed!');
        return redirect()->route('admin#homePage');
    }

    //admin list page
    public function adminListPage(){
        $data = User::when(request('key'),function($query){
            $query->where('name','like','%'. request('key') .'%');
            $query->where('email','like','%'.request('key').'%');
        })->where('role','admin')->get();
        return view('admin.list.adminList',compact('data'));
    }

    //user list page
    public function userListPage(){
        $data = User::when(request('key'),function($query){
            $query->where('name','like','%'. request('key') .'%');
        })->where('role','user')->get();
        return view('admin.list.userList',compact('data'));
    }

    //user change role
    public function userChangeRole(Request $request) {
        $insertUpdateData = [
            'role' => $request->role
        ];
        User::where('id',$request->userId)->update($insertUpdateData); 
    }

    //student list page
    public function studentListPage(){
        $data = Student::select('students.*','users.name as userName','users.image as userImage','users.email as userEmail','users.phone as userPhone','users.address as userAddress','courses.name as courseName')
        ->leftJoin('users','students.user_id','users.id')
        ->leftJoin('courses','students.course_id','courses.id')
        ->paginate(5);
        return view('admin.list.studentList',compact('data'));
    }




    //password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ])->validate();
    }

    //profile update validation
    private function profileUpdateValidation($request) {
        Validator::make($request->all(),[
            'profileName' => 'required',
            'profileEmail' => 'required',
            'profilePhone' => 'required',
            'profileGender' => 'required',
            'profileImage' => 'mimes:png,jpg,jpeg|file',
            'profileAddress' => 'required',

        ])->validate();
    }

    // request user data

    private function getUserData($request) {
        return[
            'name' => $request->profileName,
            'email' => $request->profileEmail,
            'gender' => $request->profileGender,
            'phone' => $request->profilePhone,
            'address' => $request->profileAddress,
            'updated_at' => Carbon::now()
        ];
    }

    //validation check for change password
    private function ValidationCheckForChangePass($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required',
            'password' => 'required|min:8|max:20',
            'confirmPassword' => 'required|same:password'
        ])->validate();
    }


}
