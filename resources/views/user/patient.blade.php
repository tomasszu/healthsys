@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>Pacienta profils</title>
    <meta charset="UTF-8">
</head>
<body>
   <h1>Sveicināti, {{Auth::user()->name}} </h1>
   <h3>Pacienta profils</h3>
   <p>Izvēlieties vēlamo darbību!</p>
   <a href="/logout">Izrakstīties</a>   
    
</body>
</html>