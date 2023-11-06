@extends('app')
@section('welcome')

<head>
    <link rel="stylesheet" href="{{ asset('css/welcome.css')}}">
</head>

<body>
    <h1>WELCOME</h1>
    <div class="animation"></div>

    <div class="buttons-container">
        <a class="button-doc" href="products">Products</a>
        <a class="button-doc" href="tickets">Tickets</a>
    </div>
</body>

</html>

@endsection