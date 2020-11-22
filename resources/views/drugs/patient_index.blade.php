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
           <li>{{ $prescription->name }}</li>
           <h5>Ražotājs: {{ $prescription->producer }}</h5>
           <h5>Apraksts:</h5>
           <p>{{ $prescription->description }}</p>
		   <form method="POST" action="/farmaceits/pacients/{{$patient->id}}/iznemt_recepti/{{ $prescription->id }}">
			     {{ csrf_field() }}
		         {{ method_field('DELETE') }}
		         <button type="delete">Izņemt recepti</button>
		   </form>
       @endforeach
    </ul>
    <a href="/farmaceits">Atpakaļ</a>   

</body>
</html>