<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>eFilmy - Baza Danych</title>
    <meta name="author" content="Damian Nass">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/home">eFilmy</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>&nbsp;menu</button>
        
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/home">Strona Główna</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/api/movies">REST API JSON</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movies">Katalog Front-End</a>
                </li>
                
                
            </ul>

            <ul class="navbar-nav ml-auto">
                @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Logowanie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Rejestracja</a>
                    </li>
                @else
                    <li class="nav-item">
                        <p style="margin-right:20px;" class="nav navbar-text welcomename">Witaj, {{Auth::user()['name']}}</p>
                    </li>
                    <li class="nav-item">
                        <form id="logout_form" action="{{route('logout')}}" method="POST"> 
                            @csrf
                            <a class="nav-link" href="javascript:$('#logout_form').submit();">Wyloguj się</a>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="appCard">
        @yield('content')
    </div>
     
</body>
</html>