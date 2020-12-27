<!DOCTYPE html>
<html>
<head>
    <title>Ārsta profils</title>
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
   <a class="sidebarA" href="/zinojumi/3">Ziņojumi</a>
   <a class="sidebarA" href="/logout">Izrakstīties</a>
   @stop
    <div class="mainbar">
      <button class="collapsible">Prakses informācija</button>
      <div class="expandContent">
       <h3>{{Auth::user()->role->name}}</h3>
       <h3>{{Auth::user()->role->info}}</h3>
      </div>
     @if(Auth::user()->role->doctor_class == 1)
      <button class="collapsible">Apskatīt prakses pacientus</button>
      <div class="expandContent">
        <div class="padder">
       <form method="GET" action="/arsts/skatit_pacientu">
          {{ csrf_field() }}
         	<select name="patient" class="select">
        	  <option selected="selected" value=""></option>
        	  <?php 
                foreach ($assigned_patients as $patient) {
                echo '<option value="'.$patient->id.'">' . $patient->name . ' ' . $patient->pers_id . '</option>'."\r\n";
                 }
              ?>
      	  </select>
        <button class="goButton" type="submit">Apskatīt pacientu</button>
       </form>
        </div>
      </div>
      <button class="collapsible">Pieņemt pacientu praksē</button>
      <div class="expandContent">
        <div class="padder">
          <form method="POST" action="/arsts/pienemt_prakse">
            {{ csrf_field() }}
            <label for="pers_id">Personas kods:</label>
              <input type="number" name="pers_id" class="select">
              <input class="goButton" type="submit" value="Pieņemt">
          </form>
        </div>
        </div>
      <button class="collapsible">Atteikties no pacienta</button>
      <div class="expandContent">
        <div class="padder">
         <form method="GET" action="/arsts/nonemt_pacientu">
            {{ csrf_field() }}
            <select name="patient" class="select">
              <option selected="selected" value=""></option>
              <?php 
                  foreach ($assigned_patients as $patient) {
                  echo '<option value="'.$patient->id.'">' . $patient->name . ' ' . $patient->pers_id . '</option>'."\r\n";
                   }
                ?>
            </select>
          <button class="goButton" type="submit">Atteikties</button>
         </form>
       </div>
       </div>
        @else
        <button class="collapsible">Pieņemt pacientu</button>
        <div class="expandContent">
        <div class="padder">
            <form method="GET" action="/arsts/specialists/skatit_pacientu">
              {{ csrf_field() }}
              <label for="pers_id">Personas kods:</label>
                <input type="number" name="pers_id" required min="0">
                <input class="goButton" type="submit" value="Pieņemt">
            </form>
          </div>
        </div>
        @endif
    </div>
   </div>  
   <script src="{{ asset('js/collapseButton.js')}}"></script> 
</body>
</html>