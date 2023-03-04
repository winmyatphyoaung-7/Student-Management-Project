<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Mail\BetMail;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {

        Validator::make($input, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'max:15'],
            'address' => ['required', 'string'],
            'gender' => ['required'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'same:password'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['username'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'password' => Hash::make($input['password']),
        ]);

        

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new BetMail($user));
        return redirect()->route('admin#loginPage')->with(['clickEmail' => 'Please click on the link sent to your email']);
    }
}
