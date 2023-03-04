<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //direct contact home page
    public function homePage(){
        $cart = Register::where('user_id',Auth::user()->id)->get();
        return view('user.contact.home',compact('cart'));
    }

    //user contact
    public function contact(Request $request) {
        $this->contactValidationCheck($request);
        $data = $this->requestContactData($request);
        Contact::create($data);
        return back()->with(["sendSuccess" => "We send your message successfully..."]);
    }

    //admin contact list page
    public function listPage(){
        $data = Contact::when(request('key'), function ($query) {
            $query->orWhere('name', 'like', '%' . request('key') . '%')
                  ->orWhere('email','like','%'.request('key') .'%')
                  ->orWhere('phone','like','%'.request('key').'%')
                  ->orWhere('content','like','%'.request('key').'%');
        })->paginate(5);
        $data->appends(request()->all());
        return view('admin.contact.contact',compact('data'));
    }

    //admin contact delete
    public function delete($id){
        Contact::where('id',$id)->delete();
        toastr()->success("Contact Deleted Successfully!");
        return back();
    }


    //request Contact Data

    private function requestContactData($request) {
        return [
            'name' => $request->contactName,
            'email' => $request->contactEmail,
            'phone' => $request->contactNumber,
            'address' => $request->contactAddress,
            'content' => $request->contactMessage,
        ];
    }

    //contact validation

    private function contactValidationCheck($request) {
        Validator::make($request->all(),[
            'contactName' => 'required',
            'contactEmail' => 'required',
            'contactNumber' => 'required',
            'contactAddress' => 'required',
            'contactMessage' => 'required',
        ])->validate();
    }
}
