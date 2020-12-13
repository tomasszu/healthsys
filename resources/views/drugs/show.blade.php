@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
	<title>{{ $drug->name }}</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
</head>
<body>
	<h1>{{ $drug->name }}</h1>
	@if($drug->count() != NULL)
		<h3>Skaits aptiekā: {{$drug->count()}} </h3>
	@else
		<h3>Aptiekā šobrīd nav pieejams </h3>
	@endif
        <h3>Ražotājs: {{ $drug->producer }}</h3>
        <h3>Apraksts:</h3>
        <p>{{ $drug->description }}</p>

    <a href="/farmaceits">Atpakaļ</a>   

</body>
</html>