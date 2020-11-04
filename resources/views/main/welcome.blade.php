<!DOCTYPE html>
<html>
<head>
    <title>Veselības sistēma</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Laipni lūgti Veselības aprūpes sistēmā</h1>
   <h3>Viss ārstniecības sektors dažu klikšķu attālumā</h3>
   <a href="/par">Par sistēmu</a>
   @if(!Auth::check())
    <a href="/register"> Reģistrēties </a>
    <a href="/login"> Pierakstīties </a>
    @endif
    @if(Auth::check())
    <a href="/logout"> Izrakstīties </a>
    @endif 
   
    
</body>
</html>