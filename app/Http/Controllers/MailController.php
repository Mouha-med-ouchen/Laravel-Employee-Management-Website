<?php

namespace App\Http\Controllers;
use App\Mail\sendMailtoMyTeam;
use App\Models\Employee;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function write_to_one($id){
        $employee = Employee::find($id);

        return view('form_Write_Mail_to_one', compact('employee'));
    }

    public function send_mail_to_one(Request $request){
        $request->validate([
        'subject' => 'required|string|max:800',
        'mes' => 'required',
    ], 
    [
        'subjet.required' => 'You must type subject please!',
        'message.required' => 'You must type message please!',
    ]
);

   $email = $request->email;
   $subject = $request->subject;
   $mes = $request->mes;
      Mail::to($email)->send(new sendMailtoMyTeam($subject , $mes));

    return view('form_employee')->with('send','This message is sent successfully');

    }
}
