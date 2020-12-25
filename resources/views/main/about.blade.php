<!DOCTYPE html>
<html>
<head>
    <title>Par sistēmu</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/text.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/burbuli.css') }}">    
</head>
<body>
   @include('layouts.navbar')
   <h1 class="about_text">Par sistēmu</h1>
   <h3 class="about_text"> Viss ārstniecības sektors dažu klikšķu attālumā</h3>
   <p class="about_text"> Veselības aprūpes sistēma spēj atbalstīt Latvijā bāzēto Veselības aprūpes pakalpojumu darbību, digitalizējot pacientu-ārstu, ārstu-aptieku, aptieku-pacientu savstarpējo komunikāciju un padarot pieejamu visu nepieciešamo dokumentāciju e-vidē, lai nozare spētu piedāvāt pakalpojumus pēc iespējas efektīvāk, produktīvāk un bez aizķeršanās. Lietojot šo sistēmu palielinās ārstniecības pieejamība ikvienam Latvijas iedzīvotājam un samazinās ārstniecības praksē esoša nelegāla vai neprofesionāla darbība, kā arī zāļu nepamatota lietošana un to melnais tirgus. </p>
   @include('layouts.burbuli')
</body>
</html>