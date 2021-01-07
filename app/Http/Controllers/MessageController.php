<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\Doctor;
use App\Models\patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class MessageController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist')->only(['']);

    }

    public function index($flag)
    {
        $messages = message::where('for_user', auth()->id())->latest()->get();
        if($flag==1)
        {
           $recepient=auth()->user()->role->family_doc;
            return view('messages.index',compact('messages','recepient','flag'));
        }
        if($flag==2)
        {
            $recepient=Doctor::where('id',request('recepient'))->first();
            return view('messages.index',compact('messages','recepient','flag'));
        }
        else return view('messages.index',compact('messages','flag'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new message;
        $message->from_user = auth()->id();
        $message->message = request('text');
        if(request('receiver') != NULL)
        {
            $message->for_user = request('receiver');
            $message->save();
            //dd($email);
            $this->email(request('text'),request('receiver'));
            return redirect('/zinojumi/0');
        }
        else
        {
            $this->validate(request(), [
               'pers_id' => 'exists:patients',
              ]);
            $pers_id = request('pers_id');
            $patient = patient::where('pers_id',$pers_id)->first();
            $message->for_user = $patient->user_id;
            $message->save();
            $this->email(request('text'),$patient->user_id);
            return redirect('/zinojumi/3');
        }

    }

    public function email($text,$receiver)
    {
            Mail::raw($text, function ($mail) use ($receiver) {
                $email = User::where('id',$receiver)->first()->email;
                $name = User::where('id',$receiver)->first()->name;
                $mail->to($email, $name);
                $mail->subject('Zinojums no '. auth()->user()->name);
            });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(message $message)
    {
        //
    }
}
