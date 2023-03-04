<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Save;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Register;
use App\Models\RegisterCopy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //redirect home page

    public function homePage()
    {
        $data = Category::get();
        $course = Course::orderBy('created_at','desc')->get();
        $save = Save::orderBy('created_at','desc')->get();
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.homePage', compact('data', 'course','cart','save'));
    }

    //direct home section menu  page
    public function homeSection(){
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.home.home',compact('cart'));
    }

    //redirect profile page

    public function profilePage()
    {
        $dataProfile = User::where('id', Auth::user()->id)->get();
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.account.profile', compact('dataProfile','cart'));
    }

    public function confirmPasswordPage()
    {
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.account.confirmPassword',compact('cart'));
    }

    //direct edit Page from password confirm page

    public function confirmPassword(Request $request)
    { 
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        if (Hash::check($request->password, $dbPassword)) {
            return view('user.account.SuccessConfirmation',compact('cart'));
        } else {
            return back()->with(['notMatch' => 'The Old Password Not Match. Try Again!']);
        }
    }

    public function updateProfilePage()
    {
        $data = User::where('id', Auth::user()->id)->get();
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.account.profileEdit', compact('data','cart'));
    }

    //profile update

    public function updateProfile(Request $request)
    {
        $this->profileUpdateValidation($request);
        $data = $this->getUserData($request);

        //for image

        if ($request->hasFile('profileImage')) {
            $dbImage = User::select('image')->where('id', Auth::user()->id)->first();

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        }
        User::where('id', Auth::user()->id)->update($data);
        return redirect()->route('user#profilePage');
    }

    //change password page
    public function changePasswordPage(){
        $cart = RegisterCopy::where('user_id',Auth::user()->id)->get();
        return view('user.account.changePassword',compact('cart'));
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
        return redirect()->route('user#homePage');
    }

    //redirect back
    public function redirectBack(){
        $previousUrl = URL::previous();
        return redirect($previousUrl);
    }

    //profile update validation
    private function profileUpdateValidation($request)
    {
        Validator::make($request->all(), [
            'profileName' => 'required',
            'profileEmail' => 'required',
            'profilePhone' => 'required',
            'profileGender' => 'required',
            'profileImage' => 'mimes:png,jpg,jpeg|file',
            'profileAddress' => 'required',

        ])->validate();
    }

    //password validation check for profile edit
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ])->validate();
    }

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
