@extends('layouts.app')
@section('content')

<h1>Izrakstīt pacientam {{$patient->name}} recepti medikamentam</h1>

<hr>

<form method="POST" action="/arsts/recepte_pacientam/{{$patient->id}}/izrakstit">
	{{ csrf_field() }}

  <label for="drug">Medikaments:</label>
  <select name="drug">
      <option selected="selected" value="">
        <?php 
            foreach ($drugs as $drug) {
            echo '<option value="'.$drug->id.'">' . $drug->name .' | ' . $drug->producer .'</option>'."\r\n";
             }
        ?>
  </select><br>

  <input type="submit" value="Izrakstīt">

  @include('layouts.errors')
</form>

<hr>
   <a href="/arsts/skatit_pacientu/{{$patient->id}}">Atpakaļ</a>   

@endsection