@include('layouts.navbar')
<!DOCTYPE html>
<html>
<head>
    <title>Meklēt ārstu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">   
</head>
<body>
   <h1>Meklēt ārstu pēc specializācijas</h1>
      <form method="GET" action="/pacients/meklet_specialistus">
        {{ csrf_field() }}
          <select name="class" class="select" required>
            <option selected="selected" value="">
            <?php 
                foreach ($classes as $class) {
                echo '<option value="'.$class->id.'">' . $class->name .'</option>'."\r\n";
                 }
            ?>
          </select>
        <button class="goButton" type="submit">Skatīt speciālistus</button>
        <a href="/pacients" class="cancelButton">Atpakaļ</a> 
        @include('layouts.errors')
      </form>
    <hr>
    @if($find == 1)
    <h3>Speciālisti kategorijā <i>{{$specialist->name}}</i>:</h3>
       @foreach ($doctors as $doctor)
       <div class="oneResult">
           <h2>{{ $doctor->practice_name }}</h2>
           <p>{{ $doctor->info }}</p>
           <form method="GET" class="button_form" action="/zinojumi/2">
              <input type="hidden" id="recepient" name="recepient" value="{{$doctor->id}}">
              <button class="goButton" type="submit">Sazināties</button>
           </form>
       </div>
       @endforeach
    @endif
</body>
</html>