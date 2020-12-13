@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>{{ $patient->name }} receptes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
</head>
<body>
	<h1>Pieejamās medikamentu receptes klientam {{ $patient->name }}:</h1>
    <ul>
       @foreach ($prescriptions as $prescription)
           <li>{{ $prescription->drug->name }}</li>
           <h5>Ražotājs: {{ $prescription->drug->producer }}</h5>
           <h5>Izrakstošais ārsts: {{ $prescription->doctor->name }}</h5>
           <h5>Apraksts:</h5>
           <p>{{ $prescription->drug->description }}</p>
           @if($prescription->active == 1)
      		   <form method="POST" action="/farmaceits/pacients/{{$patient->id}}/iznemt_recepti/{{ $prescription->id }}">
      			     {{ csrf_field() }}
      		         {{ method_field('DELETE') }}
      		         <button type="delete">Izņemt recepti</button>
      		   </form>
           @else
            <h5><b>Šī recepte jau izņemta</b></h5>
           @endif
       @endforeach
    </ul>
    @include('layouts.errors')
    <a href="/farmaceits">Atpakaļ</a>   

</body>
</html>