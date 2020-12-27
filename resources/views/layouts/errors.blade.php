@if (count($errors))

<div class="errorLog">
<ul>
	@foreach ($errors->all() as $error)

	<li> {{$error}} </li>

	@endforeach

</ul>
</div>

@endif