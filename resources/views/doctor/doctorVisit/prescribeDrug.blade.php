@extends('layouts.pinkForm')
@section('content')

<h3 class="formHeader">Izrakstīt pacientam {{$patient->name}} recepti medikamentam</h3>

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
  @include('layouts.errors')
  <div class="formButtons">
  <a href="/arsts/skatit_pacientu/{{$patient->id}}" class="cancelButton">Atpakaļ</a>
  <input type="submit" value="Izrakstīt" class="regButton">
  </div>


</form>

@endsection