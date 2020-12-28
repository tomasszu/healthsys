        @extends('layouts.pinkForm')
        @section('content')
        <h3 class="formHeader">Reģistrēties</h3>
        <form method="POST" action="/register">
        	{{ csrf_field() }}
          <label class="first" for="name">Vārds:</label>
          <input class="second" type="text" name="name" required><br> 

          <label class="first" for="pers_id">Personas kods:</label>
          <input class="second" type="number" name="pers_id" required><br>

          <label class="first" for="age">Vecums:</label>
          <input class="second" type="number" name="age" required><br>

          <label class="first" for="email">e-pasts:</label>
          <input class="second" type="email" name="email" required><br>

          <label class="first" for="contacts">Kontaktinformācija:</label>
          <input class="second" type="text" name="contacts" required><br>

          <label class="first" for="password">Parole:</label>
          <input class="second" type="password" name="password" required><br>

          <label class="first" for="password_confirmation" >Parole vēlreiz:</label>
          <input class="second" type="password" name="password_confirmation" required><br>
          @include('layouts.errors')
          <div class="formButtons">
              <a href="/" class="cancelButton">Atpakaļ</a>
              <input type="submit" value="Reģistrēties" class="regButton">
          </div>
        </form>
        @stop
