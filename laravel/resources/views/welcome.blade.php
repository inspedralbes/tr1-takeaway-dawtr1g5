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
    <div class="btn-logout-container">
        <div class="btn-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="button-doc">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>

@endsection