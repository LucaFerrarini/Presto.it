<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title?? 'Presto.it'}}</title>
    <link rel="icon" type="image/x-icon" href="/img/P.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/076ab933f6.js" crossorigin="anonymous"></script>
    @livewireStyles  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
<x-navbar />

<div class="min-vh-100">
    {{$slot}}
</div>

<x-footer />


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
@livewireScripts
</body>
</html>