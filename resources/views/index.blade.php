@if(session()->has('success'))
    <p>
        {{ session()->get('success') }}
    </p>
@endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{$titel}}</title>
        <link rel="stylesheet" href="style.css">
        
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>
        @include('partials._navigatie', ['vakken' => $vakken])
        <h1>Home</h1>
        <p> Hello World </p>
       
    </body>
</html>
