<!DOCTYPE html>
<html>
<head>
    <title>Farmaceita profils</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
</head>
<body class="profile">
  @include('layouts.navbar')
  @include('layouts.errors')
  @extends('layouts.sidebar')
  <div class="profile">
   @section('sidebarOptions')
   <a href="/logout" class="sidebarA">Izrakstīties</a>   
   @stop
    <div class="mainbar">
      <button class="collapsible">Farmācijas informācija</button>
      <div class="expandContent">
   <h3>{{Auth::user()->role->name}}</h3>
   <h3>{{Auth::user()->role->info}}</h3>
 </div>
      <button class="collapsible">Apskatīt valstī reģistrētos medikamentus</button>
      <div class="expandContent">
        <div class="padder">
   <form method="GET" action="/farmaceits/skatit_medikamentu">
      {{ csrf_field() }}
      <select name="drug" required class="select">
        <option selected="selected" value=""></option>

        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>
    <button class="goButton" type="submit">Apskatīt medikamentu</button>
   </form>
 </div>
 </div>
      <button class="collapsible">Pievienot medikamentus aptiekas inventāram</button>
      <div class="expandContent">
        <div class="padder">
  <form method="POST" action="/farmaceits/pievienot_medikamentu">
    {{ csrf_field() }}

      <select name="drug" required class="select">
        <option selected="selected" value=""></option>
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>

    <label for="count">Skaits:</label>
    <input type="number" name="count" min="1" required><br>
        <div class="padder">
    <input type="submit" value="Pievienot" class="goButton">
</div>
    @include('layouts.errors')
  </form>
</div>
</div>
      <button class="collapsible">Noņemt medikamentus no inventāra</button>
      <div class="expandContent">
        <div class="padder">
   <form method="POST" action="/farmaceits/dzest_medikamentu">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <select name="drug" required class="select">
        <option selected="selected" value=""></option>
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
      </select>
    <label for="count">Skaits:</label>
    <input type="number" name="count" min="1" required><br>
        <div class="padder">
    <input type="submit" value="Noņemt" class="goButton">
</div>
    @include('layouts.errors')
   </form>
 </div>
 </div>
      <button class="collapsible">Skatīt klienta receptes medikamentus</button>
      <div class="expandContent">
        <div class="padder">
   <p>Ievadiet klienta personas kodu:</p>
      <form method="GET" action="/farmaceits/klienta_receptes">
        {{ csrf_field() }}
        <label for="pers_id">Personas kods:</label>
          <input type="number" name="pers_id" required>
          <input class="goButton" type="submit" value="Skatīt">
      </form>
    </div>
</div>
  </div>
    </div>
   <script src="{{ asset('js/collapseButton.js')}}"></script> 
</body>
</html>