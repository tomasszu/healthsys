@extends('layouts.pinkForm')
@section('content')

	<h3 class="formHeader">Pieraksties</h3>
	<form method="POST" action="/login">
			{{ csrf_field() }}
			  
		<label class="first" for="pers_id">Personas kods:</label>
		<input class="second" type="text" id="pers_id" pattern="[0-9]{6}-[0-9]{5}" name="pers_id" title="Formāts: xxxxxx-xxxxx" required><br>

		<label class="first" for="password">Parole:</label>
		<input class="second" type="password"  id="password" name="password" required><br>
		@include('layouts.errors')

        <div class="formButtons">
            <a href="/" class="cancelButton">Atpakaļ</a>
            <input type="submit" value="Pieslēgties" class="regButton">
        </div>
			  
	</form>
@stop

