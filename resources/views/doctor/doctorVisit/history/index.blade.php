@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>Medicīniskā vēsture</title>
  <meta charset="UTF-8">
</head>
<body>
  <h2>Jauns ieraksts:</h2>

<form method="POST" action="/arsts/pacienta_vesture/{{$patient_id}}/pievienot">
    {{ csrf_field() }}
    <label for="diagnosis">Diagnoze:</label>
    <input type="text" name="diagnosis"><br>
    <label for="description">Apraksts:</label>
    <textarea name="description" id="description"></textarea>
    <button class="button" type="submit">Saglabāt</button>

    @include('layouts.errors')
</form>
<hr>
<h1>Pacienta medicīniskā vēsture</h1>
    <ul>
       @foreach ($history as $medRecord)
        	 <li>{{ $medRecord->created_at }}</li>
           <li>Diagnoze: {{ $medRecord->diagnosis }}</li>
           <li>Apraksts: {{ $medRecord->description }}</li>
           <hr>
       @endforeach
    </ul>
<hr>
   <a href="/arsts/skatit_pacientu/{{$patient_id}}">Atpakaļ</a>   


</body>
</html>