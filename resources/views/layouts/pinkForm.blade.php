<!DOCTYPE html>
<html>
<head>
  <title>Reģistrēties</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/pinkForm.css') }}">
</head>
<body class="pinkForm">
  <div class="roundedForm">
    <div class="roundedFormBorder">
      <div class="formImagePart">
        <img src="{{ asset('leaf.png') }}" class="formImage" fill="none" viewBox="0 0 24 24" alt="icon"> 
      </div>
      <div class="formFields">
            @yield('content')
      </div>
    </div>
  </div>
</body>
</html>