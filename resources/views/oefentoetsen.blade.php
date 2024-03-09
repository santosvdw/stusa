<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oefentoetsen</title>
</head>
<body>
    <h1>Oefentoetsen</h1>
    @if(session()->has('success'))
        <p>
            {{ session()->get('success') }}
        </p>
    @endif

    <a href="/oefentoets/uploaden">Uploaden</a>
    
    @foreach ($oefentoetsen as $oefentoets)
        <h2>{{$oefentoets->titel}}</h2>
        <p>{{$oefentoets->onderwerp}}</p>
        <a href="/oefentoets/{{$oefentoets->id}}">Bekijk</a>        
    @endforeach
</body>
</html>