@extends('layouts.app')



@section('content')

<h1>Reģistrējies</h1>

<hr>

<form method="POST" action="/register">
	{{ csrf_field() }}
  <label for="name">Vārds:</label>
  <input type="text" name="name"><br> 

  <label for="pers_id">Personas kods:</label>
  <input type="number" name="pers_id"><br>

  <label for="contacts">Kontaktinformācija:</label>
  <input type="text" name="contacts"><br>

  <label for="password">Parole:</label>
  <input type="password" name="password"><br>

  <label for="password_confirmation">Parole vēlreiz:</label>
  <input type="password" name="password_confirmation"><br>

  <input type="submit" value="Reģistrēties">

  @include('layouts.errors')
</form>
<hr>

@endsection