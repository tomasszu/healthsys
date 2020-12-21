@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
	<title>Ziņojums</title>
  <meta charset="UTF-8">
</head>
<body>
  @if(Auth::user()->user_class==1)
    <h1>Ziņojums no {{$message->sender->name}} ({{$message->sender->role->speciality->name}})</h1>
  @else
    <h1>Ziņojums no {{$message->sender->name}} (Pers.k. {{$message->sender->role->pers_id}})</h1>
  @endif
    <h2>{{ $message->created_at }}</h2>
    <p>{{$message->message}}</p>
    <hr>
  @if(Auth::user()->user_class==1)
    <a href="/zinojumi/0">Atpakaļ</a> 
  @else
    <a href="/zinojumi/3">Atpakaļ</a> 
  @endif
</body>
</html>