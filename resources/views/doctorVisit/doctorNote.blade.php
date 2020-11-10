@extends('layouts.app')
@section('content')

<h1>Izrakstīt pacientam zīmi / norīkojumu</h1>

<hr>

<form method="POST" action="/register">
	{{ csrf_field() }}
  <label for="name">Kam paredzēts izraksts:</label>
  <input type="text" name="name"><br> 

  <label for="diagnosis">Pamatslimība:</label>
  <input type="text" name="diagnosis"><br>

  <label for="complications">Sarežģījumi (blakusslimības):</label>
  <input type="text" name="diagnosis"><br>

  <label for="complications">Rekomendācijas, ārsta slēdziens, izmeklējumu un rehabilitācijas nepieciešamība:</label><br>

  <textarea name="recomendations" id="recomendations"></textarea><br>

  <label for="regime">Režīma norādījumi:</label>
  <input type="radio" id="stacionars" name="regime" value="Arstesana stacionara">
  <label for="male">Ārstēšana stacionārā </label>
  <input type="radio" id="majas" name="regime" value="Majas rezims">
  <label for="female">Mājas režīms </label>
  <input type="radio" id="brivais" name="regime" value="Brivais rezims">
  <label for="other">Brīvais režīms </label><br>
  <input type="submit" value="Izrakstīt">

  @include('layouts.errors')
</form>
<hr>

@endsection