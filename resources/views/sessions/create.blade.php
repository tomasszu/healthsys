@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>Pierakstīties</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
</head>
<body>
<h1>Pieraksties</h1>

	<form method="POST" action="/login">
			{{ csrf_field() }}
		  
		  <label for="pers_id">Personas kods:</label>
		  <input type="text" id="pers_id" name="pers_id"><br>

		  <label for="password">Parole:</label>
		  <input type="password"  id="password" name="password"><br>

		  <input type="submit" value="Login">
		  
	  @include('layouts.errors')
	</form>

</body>
</html>