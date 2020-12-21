@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Pacienta dati</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>{{$patient->name}}</h1>
   <h5>Pers. kods: {{$patient->pers_id}}</h2>
  <form method="POST" action="/pacients/{{$patient->id}}/labot_datus">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label for="age">Vecums:</label><br>
    <input type="number" name="age" value="{{$patient->age}}" min="0" required><br>

    <label for="contacts">Kontaktinformācija:</label><br>
    <textarea name="contacts" rows="3">{{$patient->contacts}}</textarea><br>

    <label for="address">Adrese:</label><br>
    <input type="text" name="address" value="{{$patient->address}}"><br>

    <h5>Mainīt paroli:</h5>

    <label for="password">Parole:</label><br>
    <input type="password" name="password"><br>

    <label for="password_confirmation">Parole vēlreiz:</label><br>
    <input type="password" name="password_confirmation"><br>

    <input type="submit" value="Labot datus">
    <input type="reset" value="Notīrīt">

    @include('layouts.errors')
  </form>
<hr>

<a href="/pacients">Atpakaļ</a> 
</body>
</html>