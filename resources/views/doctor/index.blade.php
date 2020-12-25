@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Ārsta profils</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Sveicināti, {{Auth::user()->name}} </h1>
   <h2>Ārsta profils</h2>
   <h3>{{Auth::user()->role->name}}</h3>
   <h3>{{Auth::user()->role->info}}</h3>
   <a href="/zinojumi/3">Ziņojumi</a>
     @if(Auth::user()->role->doctor_class == 1) 
       <p>Apskatīt prakses pacientus</p>
       <form method="GET" action="/arsts/skatit_pacientu">
          {{ csrf_field() }}
         	<select name="patient">
        	  <option selected="selected" value="">
        	  <?php 
                foreach ($assigned_patients as $patient) {
                echo '<option value="'.$patient->id.'">' . $patient->name . ' ' . $patient->pers_id . '</option>'."\r\n";
                 }
              ?>
      	  </select>
        <button class="button" type="submit">Apskatīt pacientu</button>
       </form>
       <hr>
       <p>Pieņemt pacientu praksē</p>
          <form method="POST" action="/arsts/pienemt_prakse">
            {{ csrf_field() }}
            <label for="pers_id">Personas kods:</label>
              <input type="number" name="pers_id">
              <input class="button" type="submit" value="Pieņemt">
          </form>
        <hr>
        <p>Atteikties no pacienta</p>
         <form method="GET" action="/arsts/nonemt_pacientu">
            {{ csrf_field() }}
            <select name="patient">
              <option selected="selected" value="">
              <?php 
                  foreach ($assigned_patients as $patient) {
                  echo '<option value="'.$patient->id.'">' . $patient->name . ' ' . $patient->pers_id . '</option>'."\r\n";
                   }
                ?>
            </select>
          <button class="button" type="submit">Atteikties</button>
         </form>
        @else
         <h3>Pieņemt pacientu</h3>
            <form method="GET" action="/arsts/specialists/skatit_pacientu">
              {{ csrf_field() }}
              <label for="pers_id">Personas kods:</label>
                <input type="number" name="pers_id" required min="0">
                <input class="button" type="submit" value="Pieņemt">
            </form>
        @endif
      @include('layouts.errors')
      <hr>

   <a href="/logout">Izrakstīties</a>   
    
</body>
</html>