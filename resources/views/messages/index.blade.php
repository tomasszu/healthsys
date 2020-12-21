@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
	<title>Ziņojumi</title>
  <meta charset="UTF-8">
</head>
<body>
  <h1>Ziņojumu sadaļa</h1>
  <h2>Sastādīt ziņojumu:</h2>
  @if($flag!=3)
    <a href="/zinojumi/1">Ģimenes ārstam</a>
    <a href="/pacients/meklet_arstu">Meklēt speciālistu</a>
  @endif
  @if($flag!=0)
    <form method="POST" action="/zinojumi/sutit">
        {{ csrf_field() }}
        @if($flag!=3)
          <h5>Saņēmējs: {{$recepient->user->name}} ({{$recepient->speciality->name}})</h5><br>
          <input type="hidden" id="receiver" name="receiver" value="{{$recepient->user->id}}">
        @else
          <label for="pers_id">Personas kods:</label>
          <input type="number" name="pers_id" required><br>
        @endif
          <label for="text">Ziņojums:</label>
          <textarea name="text" id="text" required></textarea><br>
          <input type="submit" value="Sūtīt">
        @include('layouts.errors')
    </form>
  @endif
  <h2>Saņemtie ziņojumi:</h2>

      <ul>
         @foreach ($messages as $message)

          <li class="mssg">
          	<a class="mssg" href="/zinojumi/{{$message->id}}/skatit">
             @if($flag!=3)
            	 No {{ $message->sender->name }} ({{ $message->sender->role->speciality->name }}), saņemts {{ $message->created_at->diffForHumans() }}
             @else
               No {{ $message->sender->name }}, saņemts {{ $message->created_at->diffForHumans() }}
             @endif
          	</a>
   
          </li>

         @endforeach
     </ul>
    <hr>
    @if($flag!=3)
      <a href="/pacients">Atpakaļ</a> 
    @else
      <a href="/arsts">Atpakaļ</a> 
    @endif
</body>
</html>