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
   <h3>{{$doctor->name}}</h3>
   <h3>{{$doctor->info}}</h3>
   <p>Apskatīt prakses pacientus!</p>
   	<select name="patients">
	  <option selected="selected" value="">
	  <?php 
        foreach ($assigned_patients as $patient) {
        echo '<option value="'.$patient->id.'">' . $patient->name . '</option>'."\r\n";
         }
      ?>
	  </select>

   <a href="/logout">Izrakstīties</a>   
    
</body>
</html>