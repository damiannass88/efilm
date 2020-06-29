@extends('layouts.app')

@section('title')
    eFilm
@endsection

@section('content')
<div class="app-home">
<div class="home-div">
  <div class="container">
    <h1 class="home-title">Witaj w Filmowej Bazie Danych</h1>
    <p class="home-p">&nbsp Filmowa Baza Danych jest to Aplikacja zbudowna na podstawie technologii webowych: HTML, CSS, Bootstrap, PHP Laravel, JS, Jquery i MySql. Funkcje tej Aplikacji to: dodawanie recordów, a następnie możliwość edytowania, usuwania i przeglądania ich, oraz wyszukiwania danych po frazie.</p>
  </div>
  <div class="home-but">
  <a href="/api/movies/"><button class="btn btn-primary">REST API JSON</button></a>
  <a href="/movies/"><button class="btn btn-primary">Katalog Front-End</button></a>
</div></div></div>
@endsection