<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #inline {
            display: inline
        }
    </style>
</head>
<body>
<h1>queryCost => {{ $queryCost }}</h1>
<h1>latitude => {{ $latitude }}</h1>
<h1>longitude => {{ $longitude }}</h1>
<h1>resolvedAddress => {{ $resolvedAddress }}</h1>
<h1>timezone => {{ $timezone }}</h1>
<h1>tzoffset => {{ $tzoffset }}</h1>
<h1>address => {{ $address }}</h1>
<h1 id="inline">days => </h1>
@foreach($days as $day)
    <h1>{{ $day['datetime']  }}</h1>
    <h1>{{ $day['icon']  }}</h1>
    <br>
@endforeach
</body>
</html>
