@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Pacienta profils</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Sveicināti, {{Auth::user()->name}} </h1>
   <h2>Pacienta profils</h2>
   <hr>
   <h4> Pacients pierakstīts ģimenes ārsta praksē : </h4>
   @if($family_doctor != NULL)
   <h5> {{$family_doctor->name}} </h5>
   <p> {{$family_doctor->info}} </p>
   @else
   <p> pacientam nepieciešams pierakstīties kādā ģimenes ārsta praksē </p>
   @endif
   <hr>
   <p>Izvēlieties vēlamo darbību!</p>
   <h5>Mana ārstniecības vēsture:</h5>
    <ul>
       @foreach ($history as $medRecord)
           <li>{{ $medRecord->created_at }}</li>
           <h5>Diagnoze: {{ $medRecord->diagnosis }}</h5>
           <p>Apraksts: {{ $medRecord->description }}</p>
           <hr>
       @endforeach
    </ul>
   <hr>   
   <h5>Mani norīkojumi / zīmes:</h5>
    <ul>
       @foreach ($notes as $note)
           <li>Datums :{{ $note->created_at }}</li>
           <h5>Izrakstošais ārsts :</h5>
           <p> {{ $note->reporting_doctor->name }}</p>
           @if($note->recepient_doctor != NULL)
	           <h5>Kam paredzēts izraksts:</h5>
	           <p> {{ $note->recepient_doctor->name }}</p>
           @endif
           <h5>Pamatslimība:</h5>
           <p>{{ $note->diagnosis }}</p>
           @if($note->complications != NULL)
	           <h5>Sarežģījumi (blakusslimības):</h5>
	           <p>{{ $note->complications }}</p>
           @endif
           <h5>Rekomendācijas, ārsta slēdziens, izmeklējumu un rehabilitācijas nepieciešamība:</h5>
           <p>{{ $note->recomendations }}</p>
           @if($note->regime != NULL)
	           <h5>Režīma norādījumi:</h5>
	           <p>{{ $note->regime }}</p>
           @endif
           <hr>
       @endforeach
    </ul>
   <hr>   
   <h5>Man izrakstītās receptes:</h5>
    <ul>
       @foreach ($prescriptions as $prescription)
          @if($prescription->active == 1)
            <li>{{ $prescription->drug->name }}</li>
            <h5>Ražotājs: {{ $prescription->drug->producer }}</h5>
            <h5>Izrakstošais ārsts: {{ $prescription->doctor->name }}</h5>
            <h5>Apraksts:</h5>
            <p>{{ $prescription->drug->description }}</p>
          @else
            <h5><b>Izņemta recepte</b></h5>
            <i>
            <li>{{ $prescription->drug->name }}</li>
            <h5>Ražotājs: {{ $prescription->drug->producer }}</h5>
            <h5>Izrakstošais ārsts: {{ $prescription->doctor->name }}</h5>
            </i>
          @endif
       @endforeach
    </ul>
   <hr>   
   <a href="/logout">Izrakstīties</a> 
   <a href="/pacients/{{Auth::user()->role->id}}/dati">Personas dati</a> 
   <a href="/pacients/meklet_arstu">Meklēt ārstu</a> 
   <a href="/logout">Ziņojumi</a> 
</body>
</html>