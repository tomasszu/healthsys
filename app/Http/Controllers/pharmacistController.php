<?php

namespace App\Http\Controllers;

use App\Models\pharmacist;
use App\Models\drug;
use Illuminate\Http\Request;

class pharmacistController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except([]);
       $this->middleware('pharmacist');
    }


    public function index()
    {
        $drugs = drug::latest()->get();
        $available_inventory = auth()->user()->role->inventory()->get();
        //dd($available_inventory->drug()->get());
        return view('user.pharmacist',compact('drugs','available_inventory'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function show(pharmacist $pharmacist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function edit(pharmacist $pharmacist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pharmacist $pharmacist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function destroy(pharmacist $pharmacist)
    {
        //
    }
}
