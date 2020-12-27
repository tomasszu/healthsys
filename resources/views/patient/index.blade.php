<!DOCTYPE html>
<html>
<head>
    <title>Pacienta profils</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/sidebar.css') }}">
</head>
<body class="profile">
  @include('layouts.navbar')
  @extends('layouts.sidebar')
  <div class="profile">
    @section('sidebarOptions')
             <li><a class="sidebarA" href="/pacients/{{Auth::user()->role->id}}/dati">Personas dati</a></li>
             <li><a class="sidebarA" href="/pacients/meklet_arstu">Meklēt ārstu</a></li> 
             <li><a class="sidebarA" href="/zinojumi/0">Ziņojumi</a></li>
             <li><a class="sidebarA" href="/logout">Izrakstīties</a></li> 
    @stop
    <div class="mainbar">
      <button class="collapsible">Mans ģimenes ārsts</button>
      <div class="expandContent">
       <h4> Pacients pierakstīts ģimenes ārsta praksē : </h4>
       @if($family_doctor != NULL)
       <h5> {{$family_doctor->name}} </h5>
       <p> {{$family_doctor->info}} </p>
       @else
       <p> pacientam nepieciešams pierakstīties kādā ģimenes ārsta praksē </p>
       @endif
     </div>
      <button class="collapsible">Mana ārstniecības vēsture</button>
      <div class="expandContent">
        <table>
          <tr>
            <th class="topRow">Datums</th>
            <th class="topRow">Diagnoze</th>
            <th class="topRow">Apraksts</th>
          </tr>
           @foreach ($history as $medRecord)
          <tr>
            <th class="thSmaller">{{ $medRecord->created_at }}</th>
            <th class="thBigger">{{ $medRecord->diagnosis }}</th>
            <th class="thLong">{{ $medRecord->description }}</th>
          </tr>    
           @endforeach
        </table>
      </div>

      <button class="collapsible">Mani norīkojumi / zīmes</button>
      <div class="expandContent">
        <table>
           @foreach ($notes as $note)
            <tr>
            <th colspan="2" class="topRow">Izrakstošais ārsts : {{ $note->reporting_doctor->name }}</th>
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
      <button class="collapsible">Man izrakstītās receptes</button>
      <div class="expandContent">
        <table>
           @foreach ($prescriptions as $prescription)
           @if($prescription->active == 1)
           <tr>
            <th colspan="2" class="topRow">{{ $prescription->drug->name }}</th>
           </tr>
           <td>Ražotājs</td>
           <td>{{ $prescription->drug->producer }}</td>
           <tr>
           <td>Izrakstošais ārsts</td>
           <td>{{ $prescription->doctor->name }}</td>
           </tr>
           <tr>
           <td>Apraksts</td>
           <td class="thLong">{{ $prescription->drug->description }}</td>
           </tr>
           @else
           <tr>
            <th colspan="2" class="expiredHeader">Izņemta recepte</th>
           </tr>
           <tr>
            <th colspan="2" class="expired">{{ $prescription->drug->name }}</th>
           </tr>
           <td class="expired">Ražotājs</td>
           <td class="expired">{{ $prescription->drug->producer }}</td>
           <tr>
           <td class="expired">Izrakstošais ārsts</td>
           <td class="expired">{{ $prescription->doctor->name }}</td>
           </tr>
           <tr>
           <td class="expired">Apraksts</td>
           <td class="thLong expired">{{ $prescription->drug->description }}</td>
           </tr>
           @endif
           @endforeach
        </table>
     </div>
       </div>   
   </div>
   <script src="{{ asset('js/collapseButton.js')}}"></script> 
</body>
</html>