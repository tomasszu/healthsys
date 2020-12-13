@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Farmaceita profils</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Sveicināti, {{Auth::user()->name}} </h1>
   <h2>Farmācijas profils</h2>
   <h3>{{Auth::user()->role->name}}</h3>
   <h3>{{Auth::user()->role->info}}</h3>
   <hr>
   <h5>Apskatīt valstī reģistrētos medikamentus</h5>
   <form method="GET" action="/farmaceits/skatit_medikamentu">
      {{ csrf_field() }}
      <select name="drug" required>
        <option selected="selected" value="">
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>
    <button class="button" type="submit">Apskatīt medikamentu</button>
   </form>
   <hr>
   <h5>Pievienot medikamentus aptiekas inventāram</h5>
  <form method="POST" action="/farmaceits/pievienot_medikamentu">
    {{ csrf_field() }}

      <select name="drug" required>
        <option selected="selected" value="">
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>

    <label for="count">Skaits:</label>
    <input type="number" name="count" min="1" required><br>

    <input type="submit" value="Pievienot">

    @include('layouts.errors')
  </form>
  <hr>
   <h5>Noņemt medikamentus no inventāra</h5>
   <form method="POST" action="/farmaceits/dzest_medikamentu">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <select name="drug" required>
        <option selected="selected" value="">
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>
    <label for="count">Skaits:</label>
    <input type="number" name="count" min="1" required><br>

    <input type="submit" value="Noņemt">

    @include('layouts.errors')
   </form>
   <hr>
   <h5>Skatīt klienta receptes medikamentus</h5>
   <p>Ievadiet klienta personas kodu:</p>
      <form method="GET" action="/farmaceits/klienta_receptes">
        {{ csrf_field() }}
        <label for="pers_id">Personas kods:</label>
          <input type="number" name="pers_id" required>
          <input class="button" type="submit" value="Skatīt">
          @include('layouts.errors')
      </form>
    <hr>

   <a href="/logout">Izrakstīties</a>   
    
</body>
</html>