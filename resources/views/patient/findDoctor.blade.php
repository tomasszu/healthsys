@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Meklēt ārstu</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Meklēt ārstu pēc specializācijas</h1>
      <form method="GET" action="/pacients/meklet_specialistus">
        {{ csrf_field() }}
          <select name="class" required>
            <option selected="selected" value="">
            <?php 
                foreach ($classes as $class) {
                echo '<option value="'.$class->id.'">' . $class->name .'</option>'."\r\n";
                 }
            ?>
          </select>
        <button class="button" type="submit">Skatīt speciālistus</button>
        @include('layouts.errors')
      </form>
    <hr>
    @if($find == 1)
    <h4>Speciālisti kategorijā <i>{{$specialist->name}}</i>:</h4>
    <ul>
       @foreach ($doctors as $doctor)
           <li>{{ $doctor->name }}</li>
           <p>{{ $doctor->info }}</p>
           <hr>
       @endforeach
    </ul>
    @endif


<a href="/pacients">Atpakaļ</a> 
</body>
</html>