<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #arrow {
            width: 5rem;
            height: 5rem;
            padding-top: 3rem;
            color: black;
        }

        body {
            font-family: sans-serif;
            background-color: rgb(172, 164, 146);
            font-weight: bold;
        }

        @media (max-width: 640px) {

        }
    </style>
</head>
<body>
<div class="d-flex flex-row-reverse">
    <a href="{{route('index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" id="arrow" fill="currentColor" class="bi bi-arrow-right"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
        </svg>
    </a>
</div>
<div class="p-3">
    <span>resolvedAddress: {{ $resolvedAddress }}</span><br>
    <span>timezone: {{ $timezone }}</span><br>
    <span>icons: </span>
    @forelse($icons as $index => $icon)
        <span>{{ $icon }}</span>
        <span>date: </span><span>{{ $datetime[$index] }}</span>
        <br>
    @empty
        <span>No rain</span>
    @endforelse
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
