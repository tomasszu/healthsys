@include('layouts.navbar')
<!DOCTYPE html>
<html>
<head>
	<title>Ziņojumi</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">   
</head>
<body>
        @include('layouts.errors')
  <h1>Ziņojumu sadaļa</h1>
  <h2>Sastādīt ziņojumu:</h2>
  @if($flag!=3)
    <a href="/zinojumi/1" class="goButton">Ģimenes ārstam</a>
    <a href="/pacients/meklet_arstu" class="goButton">Meklēt speciālistu</a>
  @endif
  @if($flag!=0)
  <div class="goButton">
    <form method="POST" action="/zinojumi/sutit">
        {{ csrf_field() }}
        @if($flag!=3)
          <h3>Saņēmējs: {{$recepient->user->name}} ({{$recepient->speciality->name}})</h3><br>
          <input type="hidden" id="receiver" name="receiver" value="{{$recepient->user->id}}">
        @else
          <label for="pers_id">Personas kods:</label>
          <input type="number" name="pers_id" required><br>
        @endif
          <label for="text">Ziņojums:</label>
          <textarea class="textarea" name="text" id="text" required></textarea><br>
          <input type="submit" value="Sūtīt" class="cancelButton">
    </form>
  </div>
  @endif
  <h2>Saņemtie ziņojumi:</h2>

         @foreach ($messages as $message)
       <div class="oneResult">
          	<a class="mssg" href="/zinojumi/{{$message->id}}/skatit">
             @if($flag!=3)
            	 No {{ $message->sender->name }} ({{ $message->sender->role->speciality->name }}), saņemts {{ $message->created_at->diffForHumans() }}
             @else
               No {{ $message->sender->name }}, saņemts {{ $message->created_at->diffForHumans() }}
             @endif
          	</a>
   
          </div>
         @endforeach
    <div class="formButtons">
    @if($flag!=3)
      <a href="/pacients" class="cancelButton">Atpakaļ</a> 
    @else
      <a href="/arsts" class="cancelButton">Atpakaļ</a> 
    @endif
    </div>
</body>
</html>