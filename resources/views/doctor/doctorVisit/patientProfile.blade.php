<!DOCTYPE html>
<html>
<head>
    <title>{{$patient->name}}</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
</head>
<body>
  @include('layouts.navbar')
   <h1>{{$patient->name}}</h1>
   <h3> Pacienta pārskats</h3>
   <div class="oneResult">
   <h4>Vārds, Uzvārds :{{$patient->name}}</h4>
   <h4>Pers. kods :{{$patient->pers_id}}</h4>
   <h4>Vecums :{{$patient->age}}</h4>
   <h4>Kontakti :{{$patient->contacts}}</h4>
   <a href="/arsts/pacienta_vesture/{{$patient->id}}" class="strongButton">Atvērt ārstniecības vēsturi</a>
   @if(Auth::user()->role->doctor_class == 1)   
     <a href="/arsts/norikojums_pacientam/{{$patient->id}}" class="strongButton">Izrakstīt norīkojumu / zīmi</a>
   @else
     <a href="/arsts/norikojums_pacientam/{{$patient->id}}" class="strongButton">Skatīt / izrakstīt norīkojumus un zīmes</a>
   @endif
   <a href="/arsts/izrakstit_recepti/{{$patient->id}}" class="strongButton">Izrakstīt recepti</a>
   <a href="/arsts" class="strongButton">Atpakaļ</a> 
   </div>  
    
</body>
</html>