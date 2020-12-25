@extends('layouts.pinkForm')
@section('content')
	<h3 class="formHeader">Pieraksties</h3>
	<form method="POST" action="/login">
			{{ csrf_field() }}
			  
		<label class="first" for="pers_id">Personas kods:</label>
		<input class="second" type="text" id="pers_id" name="pers_id"><br>

		<label class="first" for="password">Parole:</label>
		<input class="second" type="password"  id="password" name="password"><br>

        <div class="formButtons">
            <a href="/" class="cancelButton">Atpakaļ</a>
            <input type="submit" value="Pieslēgties" class="regButton">
        </div>
			  
	@include('layouts.errors')
	</form>
@stop

