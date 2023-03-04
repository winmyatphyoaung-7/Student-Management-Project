<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\BetMail;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //direct login page

    public function login(){
        return view('login');
    }

    public function validateLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if(Auth::user()->email_verified_at == null){
                Auth::logout();
                return redirect()->route('admin#loginPage')->with(['verifyYourEmail' => 'Please verify your email to continue']);
            }
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with(['error' => 'Incorrect Email or Password!']);
        }
    }


    //direct register page

    public function register() {
        return view("register");
    }

    public function store(Request $request)
    {
        $this->validateRegisterData($request);
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new BetMail($user));
        return redirect()->route('admin#loginPage')->with(['clickEmail' => 'Please click on the link sent to your email']);
    }

    public function verifyEmail($token){
        $verifiedUser = VerifyUser::where('token',$token)->first();
        if(isset($verifiedUser)){
            $user = $verifiedUser->user;

            if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('admin#loginPage')->with(['success' => 'Your email has been verified']);
            }else{
                return redirect()->back()->with(['info' => 'Your email has already been verified']);
            }
        }else{
            return redirect()->route('admin#loginPage')->with(['error' => 'Something went wrong']);
        }
    }

    //forget password form

    public function showForgetForm() {
        return view('forgot');
    }

    //send forget password link
    public function sendResetLink(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $token =  Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' =>  Carbon::now(),
        ]);

        $action_link = route('reset#passwordForm',['token' => $token, 'email' => $request->email]);
        $body =  "We are received a request to reset the password for <b> Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";

        Mail::send('admin.mail.email-forget',['action_link' => $action_link, 'body' => $body],function($message) use ($request){
            $message->from('winmyatphyoaung92@gmail.com' , 'Student Management System');
            $message->to($request->email,"Ko Phyo")->subject('Reset Password');
        });

        return back()->with('success','We have sent your password reset link!');
    }

    //show reset form
    public function showResetForm(Request $request, $token=null) {
        return view('reset')->with(['token' => $token,'email' => $request->email]);
    }

    //password reset
    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$check_token) {
            return back()->withInput()->with('fail','Invalid token');
        }else{
            User::where('email',$request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('admin#loginPage')->with('info','Your password has been changed! You can log in with new password')->with('verifiedEmail',$request->email);
        }
    }

    public function dashboard() {
        if(Auth::user()->role == 'admin') {
            return redirect()->route('admin#homePage');
        }else{
            return redirect()->route('user#homePage');
        }
    }

    private function validateRegisterData($request){
        Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:15'],
            'address' => ['required', 'string'],
            'gender' => ['required'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'same:password'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
    }
}