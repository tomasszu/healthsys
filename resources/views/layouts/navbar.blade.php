 
<div class="navbar_bar">
	<ul class="navbar_bar">
    <li class="navbar picture"><a class="picture navbarA"  href="/"><img src="{{ asset('leaf.png') }}" alt="icon"> 
 </a></li>
    <li class="navbar"><a class="navbarA" href="/par"> Par </a></li>
    @if(Auth::check())
      @if(auth()->user()->user_class == 1)
        <li class="navbar_profile"><a class="navbarA" href="/pacients"> {{auth()->user()->name }} </a></li>
      @elseif(auth()->user()->user_class == 2)
        <li class="navbar_profile"><a class="navbarA" href="/arsts"> {{auth()->user()->name }} </a></li>
      @elseif(auth()->user()->user_class == 3)
        <li class="navbar_profile"><a class="navbarA" href="/farmaceits"> {{auth()->user()->name }} </a></li>
      @endif
    @endif
</ul>
</div>