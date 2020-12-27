@extends('layouts.pinkForm')
@section('content')
   <h3 class="formHeader">{{$patient->name}}</h3>
   <h4>Pers. kods: {{$patient->pers_id}}</h4>
  <form method="POST" action="/pacients/{{$patient->id}}/labot_datus">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label class="first" for="age">Vecums:</label><br>
    <input class="second" type="number" style="margin-top: -15px" name="age" value="{{$patient->age}}" min="0" required><br>

    <label class="first" style="height: 65px"for="contacts">Kontaktinformācija:</label><br>
    <textarea class="second" name="contacts" style="margin-top: -5px" rows="3">{{$patient->contacts}}</textarea><br>

    <label class="first" for="address">Adrese:</label><br>
    <input class="second" type="text" name="address" value="{{$patient->address}}"><br>
    <h5>Mainīt paroli:</h5>

    <label class="first" for="password">Parole:</label><br>
    <input class="second" type="password" style="margin-top: -15px" name="password"><br>

    <label class="first" for="password_confirmation">Parole vēlreiz:</label><br>
    <input class="second" type="password" style="margin-top: -15px" name="password_confirmation"><br>

    <div class="formButtons">
        <a href="/pacients" class="cancelButton">Atpakaļ</a>
        <input class="cancelButton" type="reset" value="Notīrīt">
        <input class="regButton" type="submit" value="Labot datus">
    </div>

    @include('layouts.errors')
  </form>
@stop