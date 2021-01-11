<?php

namespace App\Http\Controllers;

use App\Models\drug;
use App\Models\drug_inventory;
use App\Models\patient_drug;
use App\Models\patient;
use App\Models\doctor;
use App\Models\User;
use Illuminate\Http\Request;

class drugController extends Controller
{

    //Izmantojot starpprogrammatūru noskaidro vai kontrolieri mēģina izmantot autentificējies un farmaceita lomas lietotajs , iznemot prescribe funkcijaa, kur lietotājam jābūt ārstam
    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist')->except(['prescribe']);
       $this->middleware('doctor')->only(['prescribe']);

    }

    //atgriezt pacientam izrakstīto recepšu skatu
    public function index()
    {
         // mēģina atrast šo lietotāju un vai lietotajs ir pacients
        try{
            $user=User::where('pers_id',request('pers_id'))->first();
            $patient=patient::where('user_id', $user->id)->first();
        }
        catch(\Exception $e) {
        return back()->withErrors([
            'message' => 'Pacients ar šādu pers. kodu neeksistē'
            ]);
        }
        $prescriptions=$patient->prescriptions()->latest()->get();
        return view('drugs.patient_index',compact('prescriptions','patient'));
    }
    //saglabaat pacientam sastādīto medikamenta recepti
    public function prescribe($id)
    {
        if(request('drug') != NULL)
        {
        $prescription=new patient_drug;
        $prescription->patient_id = $id;
        $prescription->drug_id = request('drug');
        $prescription->doctor_id = auth()->user()->role->id;
        $prescription->save();

        return redirect('/arsts/skatit_pacientu/'.$id);
        }
        else
        {
            return back()->withErrors([
            'message' => 'Izvēlieties medikamentu'
            ]);
        }
    }

    //pievienot medikamentus aptiekas inventāram
    public function store()
    {
            $available_inventory = auth()->user()->role->inventory()->get(); // si briza inventars
            // ja sobrid inventaraa pievienojamaa medikamenta nav
            if($available_inventory->where('drug_id',request('drug'))->isEmpty())
            {
                // veidojam jaunu inventāra tabulas ierakstu
                $inventory= new drug_inventory;
                $inventory->pharmacist_id = auth()->user()->role->id;
                $inventory->drug_id = request('drug');
                $inventory->count = request('count');
                $inventory->save();
                return redirect('/farmaceits');

            }
            else //ja ir jau šie medikamenti inventārā
            {
                $count = $available_inventory->where('drug_id',request('drug'))->first()->count; // atrodam cik
                $added = request('count');
                $count = $count + $added; // un pieskaitam klāt
                drug_inventory::where('drug_id',request('drug'))->where('pharmacist_id',auth()->user()->role->id)->update(['count'=> $count]);
                return redirect('/farmaceits');
            }
    }
    //medikamenta detalizēts skats
    public function show()
    {
        $drug=drug::where('id',request('drug'))->first();
        return view('drugs.show',compact('drug'));
    }

    //izņemt pacienta recepti, kad izsniedz medikamentu
    public function destroy_prescription ($patient,$pr_id)
    {
        $prescription=patient_drug::where('id',$pr_id)->first();
        //ja receptē iekļautais medikaments atrodas inventārā
        if($prescription->drug->count() != NULL)
        {
            $count = $prescription->drug->count();
            $count = $count -1; // nonem 1 šo medikamentu no inventara
            // padara recepti kaa neaktīvu (izlietotu)
            patient_drug::where('id',$pr_id)->update(['active' => 0]);
            //saglabā samazināto inventāra medikamentu skaitu
            drug_inventory::where('drug_id',$prescription->drug->id)->where('pharmacist_id',auth()->user()->role->id)->update(['count' => $count]);
            // ja tagad šī medikamenta skaits inventārā ir 0, izdzēšam ierakstu tabulā
            drug_inventory::where('count',0)->delete();

        }
        else
        {
            return back()->withErrors([
            'message' => 'Medikamenta nav inventārā'
            ]);
        }
        return redirect('/farmaceits');
    }

    // noņemt medikamentus no aptiekas inventāra
    public function destroy()
    {
        // ja korekti aizpildīta ievadforma
        if((request('drug')!= NULL) && (request('count') != 0))
        {
            $available_inventory = auth()->user()->role->inventory()->get();
            // ja šie medikamenti inventārā nemaz vairs nav
            if($available_inventory->where('drug_id',request('drug'))->isEmpty())
            {
                return back()->withErrors([
                'message' => 'Medikamentu inventārā jau šobrīd nav'
            ]);            }
            else
            {
                //saskaita cik ir šobriid inventaraa
                $count = $available_inventory->where('drug_id',request('drug'))->first()->count;
                //cik nepieciešams noņemt
                $removed = request('count');
                if($count-$removed < 0)
                {
                    return back()->withErrors([
                    'message' => 'Tik daudz medikamentu inventārā nav'
                    ]);
                }
                else // ja iespējams tik noņemt
                {
                    $count = $count - $removed; // noņem
                    // saglabā izmainīto daudzumu tabulā
                    drug_inventory::where('drug_id',request('drug'))->where('pharmacist_id',auth()->user()->role->id)->update(['count'=> $count]);
                    //ja tagad šī medikamenta skaits inventārā ir 0, izdzēšam ierakstu tabulā
                    drug_inventory::where('count',0)->delete();
                }
                return redirect('/farmaceits');
            }
        }
       return redirect('/farmaceits');

    }
}
