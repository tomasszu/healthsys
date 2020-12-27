    <div class="sidebar">
      <div class="sidebarItemsCenter">
      <h3 class="barh3">Sveicināti, {{Auth::user()->name}} </h3><br>
      @if(auth()->user()->user_class == 1)
      <h4 class="barh4">Pacienta profils</h4><br>
      @elseif(auth()->user()->user_class == 2)
      <h4 class="barh4">Ārsta profils</h4><br>
      @else
      <h4 class="barh4">Farmaceita profils</h4><br>
      @endif
      </div>
          <ul class="sidebarUl">
            @yield('sidebarOptions')
          </ul>
      </div>
