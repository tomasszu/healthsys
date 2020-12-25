<!DOCTYPE html>
<html>
<head>
    <title>Veselības sistēma</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/mainChoice.css') }}">
</head>
<body>
    <img src="{{ asset('leaf.png') }}" alt="icon"> 
   <h1>Laipni lūgti Veselības aprūpes sistēmā!</h1>
   <h3>Viss ārstniecības sektors dažu klikšķu attālumā</h3>
    <div class="izveles">
      <div class="izvele">
        <a href="/par">Par sistēmu</a>
      </div>
     @if(!Auth::check())
      <div class="izvele">
        <a href="/register"> Reģistrēties </a>
      </div>
      <div class="izvele">
        <a href="/login"> Pierakstīties </a>
      </div>
      @endif
      @if(Auth::check())
      <div class="izvele">
        <a href="/logout"> Izrakstīties </a>
      </div>
    </div>
    @endif 
   
    
</body>
</html>