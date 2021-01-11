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

    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un ne-farmaceita lomas lietotajs 
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist')->only(['']);

    }

    //atgriež ziņojumu skatu
    //izmanto karogu sistēmu, kas ļauj noteikt kādam ir jāizskatās skatam konkrētos brīžos un kādu informāciju tam jāpadod
    public function index($flag)
    {
        // sameklē esošās ziņas, ko lietotājs saņēmis
        $messages = message::where('for_user', auth()->id())->latest()->get();
        // pacients ir atlasījis ģimenes ārstu kā savas ziņās saņēmēju
        if($flag==1) 
        {
           $recepient=auth()->user()->role->family_doc;
            return view('messages.index',compact('messages','recepient','flag'));
        }
        // pacients ir sameklējis ārstu-speciālistu, kam nosūtīt ziņojumu
        if($flag==2)
        {
            $recepient=Doctor::where('id',request('recepient'))->first();
            return view('messages.index',compact('messages','recepient','flag'));
        }
        // neviens adresāts vēl nav atlasīs
        else return view('messages.index',compact('messages','flag'));        
    }

    // sūtīt ziņojumu
    public function store(Request $request)
    {
        $message = new message;
        $message->from_user = auth()->id();
        $message->message = request('text');
        if(request('receiver') != NULL) // ja izvēlēts saņēmējs
        {
            $message->for_user = request('receiver');
            $message->save();
            //nosūtīt e-pastu saņēmējam, par šo ziņojumu sistēmā
            $this->email(request('text'),request('receiver'));
            return redirect('/zinojumi/0');
        }
        else // ja saņēmējs ierakstīts manuāli ar personas kodu
        {
            // mēģina sameklēt šādu lietotaju ar pacienta lomu
            try{
                $user=User::where('pers_id',request('pers_id'))->first();
                $patient=patient::where('user_id', $user->id)->first();
            }
            catch(\Exception $e) {
                return back()->withErrors([
                    'message' => 'Pacients ar šādu pers. kodu neeksistē'
                    ]);
            }
            $message->for_user = $user->id;
            $message->save();
            $this->email(request('text'),$user->id);
            return redirect('/zinojumi/3');
        }

    }

    //Nosūta e-pastu adresātam ar paziņojumu par ziņu sistēmā
    public function email($text,$receiver)
    {
            Mail::raw($text, function ($mail) use ($receiver) {
                $email = User::where('id',$receiver)->first()->email;
                $name = User::where('id',$receiver)->first()->name;
                $mail->to($email, $name);
                $mail->subject('Zinojums no '. auth()->user()->name);
            });
    }

    //atgriež ziņojuma detalizētu skatu
   public function show(message $message)
    {
        return view('messages.show',compact('message'));
    }

}
