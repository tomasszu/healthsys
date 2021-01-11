<!DOCTYPE html>
<html>
<head>
	<title>{{ $patient->user->name }} receptes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
</head>
<body>
  @include('layouts.navbar')
    @include('layouts.errors')
	<h1>Pieejamās medikamentu receptes klientam {{ $patient->user->name }}:</h1>
      <table>
           @foreach ($prescriptions as $prescription)
           @if($prescription->active == 1)
           <tr>
            <th colspan="2" class="topRow">{{ $prescription->drug->name }}</th>
           </tr>
           <tr>
            <th colspan="2">
             <form method="POST" action="/farmaceits/pacients/{{$patient->id}}/iznemt_recepti/{{ $prescription->id }}">
                 {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                   <button type="delete" class="strongButton">Izņemt recepti</button>
             </form>
            </th>
           </tr>
           <td>Ražotājs</td>
           <td>{{ $prescription->drug->producer }}</td>
           <tr>
           <td>Izrakstošais ārsts</td>
           <td>{{ $prescription->doctor->practice_name }}</td>
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
    <div class="formButtons">
      <a href="/farmaceits" class="goButton">Atpakaļ</a> 
    </div>

</body>
</html>