@extends('layouts.pinkForm')
@section('content')
   <h3 class="formHeader">{{$patient->user->name}}</h3>
   <h4>Pers. kods: {{$patient->user->pers_id}}</h4>
  <form method="POST" action="/pacients/{{$patient->id}}/labot_datus">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label class="first" for="age">Vecums:</label><br>
    <input class="second" type="number" style="margin-top: -15px" name="age" value="{{$patient->age}}" min="14" required><br>

    <label class="first" style="height: 65px"for="contacts">Kontaktinformācija:</label><br>
    <textarea class="second" name="contacts" style="margin-top: -5px" minlength="8" rows="3" required>{{$patient->contacts}}</textarea><br>

    <label class="first" for="address">Adrese:</label><br>
    <input class="second" type="text" name="address" value="{{$patient->address}}"><br>
    <h5>Mainīt paroli:</h5>

    <label class="first" for="password">Parole:</label><br>
    <input class="second" type="password" style="margin-top: -15px" minlength="6" name="password"><br>

    <label class="first" for="password_confirmation">Parole vēlreiz:</label><br>
    <input class="second" type="password" style="margin-top: -15px" name="password_confirmation"><br>
    @include('layouts.errors')
    <div class="formButtons">
        <a href="/pacients" class="cancelButton">Atpakaļ</a>
        <input class="cancelButton" type="reset" value="Notīrīt">
        <input class="regButton" type="submit" value="Labot datus">
    </div>

  </form>
@stop