@include('layouts.navbar')
<!DOCTYPE html>
<html>
<head>
	<title>Ziņojums</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">   
</head>
<body>
  @if(Auth::user()->user_class==1)
    <h1>Ziņojums no {{$message->sender->name}} ({{$message->sender->role->speciality->name}})</h1>
  @else
    <h1>Ziņojums no {{$message->sender->name}} (Pers.k. {{$message->sender->role->pers_id}})</h1>
  @endif
    <h2>{{ $message->created_at }}</h2>
    <div class="oneResult">
    <p>{{$message->message}}</p>
    </div>
    <div class="formButtons">
  @if(Auth::user()->user_class==1)
    <a href="/zinojumi/0" class="cancelButton">Atpakaļ</a> 
  @else
    <a href="/zinojumi/3" class="cancelButton">Atpakaļ</a> 
  @endif
    </div>
</body>
</html>