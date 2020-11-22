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
        <h3>Ražotājs: {{ $drug->producer }}</h3>
        <h3>Apraksts:</h3>
        <p>{{ $drug->description }}</p>

    <a href="/farmaceits">Atpakaļ</a>   

</body>
</html>