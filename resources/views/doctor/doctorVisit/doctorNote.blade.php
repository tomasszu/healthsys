@extends('layouts.pinkForm')
@section('content')
  @include('layouts.errors')
<h3 class="formHeader">Izrakstīt pacientam zīmi / norīkojumu</h3>
<form method="POST" action="/arsts/norikojums_pacientam/{{$patient_id}}/izrakstit">
	{{ csrf_field() }}

  <label class="first" style="margin-top: -5px" for="recepient">Kam paredzēts izraksts:</label>
  <select class="second" name="recepient">
      <option selected="selected" value="">
        <?php 
            foreach ($specialists as $specialist) {
            echo '<option value="'.$specialist->id.'">' . $specialist->name .'</option>'."\r\n";
             }
        ?>
      </option>
  </select><br>

  <label class="first" style="margin-top: -5px" for="diagnosis">Pamatslimība:</label>
  <input class="second" type="text" name="diagnosis"><br>

  <label class="first" style="margin-top: -5px" for="complications">Sarežģījumi (blakusslimības):</label>
  <input class="second" type="text" name="complications"><br>

  <label class="first" style="margin-top: -5px" for="recomendations">Rekomendācijas, ārsta slēdziens, izmeklējumu un rehabilitācijas nepieciešamība:</label><br>

  <textarea class="second" style="margin-top: 5px" name="recomendations" id="recomendations"></textarea><br>

  <h4>Režīma norādījumi:</h4>
  <input class="second" type="radio" id="stacionars" name="regime" value="Arstesana stacionara">
  <label class="first" for="stacionars">Ārstēšana stacionārā </label>
  <input class="second" type="radio" id="majas" name="regime" value="Majas rezims">
  <label class="first" for="majas">Mājas režīms </label>
  <input class="second" type="radio" id="brivais" name="regime" value="Brivais rezims">
  <label class="first" for="brivais">Brīvais režīms </label><br>
    <div class="formButtons">
      <a href="/arsts/skatit_pacientu/{{$patient_id}}" class="cancelButton">Atpakaļ</a>
      <input type="submit" value="Izrakstīt" class="regButton">
   </div>
   
</form>

  @if(Auth::user()->role->doctor_class != 1)
  <button class="collapsibleP">Man paredzētie norīkojumi</button>
    <div class="expandContent">
        <table>
           @foreach ($notes as $note)
            <tr>
            <th colspan="2" class="topRowP">Izrakstošais ārsts : {{ $note->reporting_doctor->name }}</th>
            </tr>
            <tr>
              <td class="thSmaller">Datums :</td>
              <td class="thSmaller">{{ $note->created_at }}</td>
            </tr>
               @if($note->recepient != NULL)
            <tr>
                 <td class="thSmaller"> Kam paredzēts izraksts:</td>
                 <td class="thSmaller">{{ $note->recepient_spec->name }}</td>
            </tr>
               @endif
               @if($note->complications != NULL)
            <tr>
                 <td>Pamatslimība:</td>
                 <td>{{ $note->diagnosis }}</td>
            </tr>  
               @endif
            <tr>
                 <td>Sarežģījumi (blakusslimības):</td>
                 <td>{{ $note->complications }}</td>
            </tr>
            <tr>
                 <td class="thSmaller">Rekomendācijas, ārsta slēdziens, izmeklējumu un rehabilitācijas nepieciešamība:</td>
                 <td class="thSmaller">{{ $note->recomendations }}</td>
            </tr>
               @if($note->regime != NULL)
            <tr>
                 <td class="thSmaller">Režīma norādījumi:</td>
                 <td class="thSmaller">{{ $note->regime }}</td>
            </tr>  
               @endif
           @endforeach
        </table>
  </div>
  <script src="{{ asset('js/collapseButton.js')}}"></script> 
  @endif


@stop