@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>{{$patient->name}}</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>{{$patient->name}}</h1>
   <h3> Pacienta pārskats</h3>
   <h4>Vārds, Uzvārds :{{$patient->name}}</h4>
   <h4>Pers. kods :{{$patient->pers_id}}</h4>
   <h4>Vecums :{{$patient->age}}</h4>
   <h4>Kontakti :{{$patient->contacts}}</h4>
   <hr>
   <a href="/arsts/pacienta_vesture/{{$patient->id}}">Atvērt ārstniecības vēsturi</a>
   <hr>   
   <a href="/arsts/norikojums_pacientam/{{$patient->id}}">Izrakstīt norīkojumu / zīmi</a>
   <hr>   
   <a href="/arsts">Atpakaļ</a>   
    
</body>
</html>