<!DOCTYPE html>
<html>
<head>
	<title>{{ $drug->name }}</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/text.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/burbuli.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/varaviksne.css') }}">

</head>
<body>
   @include('layouts.navbar')
	<h1 class="about_text">{{ $drug->name }}</h1>
	@if($drug->count() != NULL)
		<h3 class="about_text">Skaits aptiekā: {{$drug->count()}} </h3>
	@else
		<h3 class="about_text">Aptiekā šobrīd nav pieejams </h3>
	@endif
        <h3 class="about_text">Ražotājs: {{ $drug->producer }}</h3>
        <h4 class="about_text">Apraksts:</h4>
        <p class="about_text">{{ $drug->description }}</p>

    <div class="formButtons">
      <a href="/farmaceits" class="goButton">Atpakaļ</a> 
    </div>
   @include('layouts.varaviksne')
</body>
</html>