<!DOCTYPE html>
<html>
<head>
	<title>Medicīniskā vēsture</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
    </head>
  <body>
  @include('layouts.navbar')
  <h2>Jauns ieraksts:</h2>

<form method="POST" action="/arsts/pacienta_vesture/{{$patient_id}}/pievienot">
    {{ csrf_field() }}
    <label for="diagnosis">Diagnoze:</label>
    <input type="text" name="diagnosis" class="select"><br>
    <label for="description">Apraksts:</label>
    <textarea name="description" id="description" class=" textarea select"></textarea>
    <button class="goButton" type="submit">Saglabāt</button>

    @include('layouts.errors')
</form>
<hr>
<h1>Pacienta medicīniskā vēsture</h1>
        <table>
          <tr>
            <th class="topRow">Datums</th>
            <th class="topRow">Diagnoze</th>
            <th class="topRow">Apraksts</th>
          </tr>
           @foreach ($history as $medRecord)
          <tr>
            <th class="thSmaller">{{ $medRecord->created_at }}</th>
            <th class="thBigger">{{ $medRecord->diagnosis }}</th>
            <th class="thLong">{{ $medRecord->description }}</th>
          </tr>    
           @endforeach
        </table>
    <div class="formButtons">
   <a href="/arsts/skatit_pacientu/{{$patient_id}}" class="cancelButton">Atpakaļ</a>   </div>


</body>
</html>