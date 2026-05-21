<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function showMailForm(): View{
        return view('Contact');
    }
    public function Send (Request $request){
        $details=$request->validate([
'name'=>'required|string|max:255',
'email'=>'required|email',
'message'=>'required|string',
        ]);
       Mail::to("ngendakuriyoleonce75@gmail.com")->send(New ContactMail($details));
       return back()->with('success',"Your Mail sent successful");
    }
}
