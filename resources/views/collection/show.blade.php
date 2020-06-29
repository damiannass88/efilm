@extends('layouts.app') 

@section('title')
    Movie Base
@endsection()

@section('content')
<div class="createCard">
    <div class="cardadd">
        <div class="show-card-card">
            @csrf
            <div class="createTitle">Szczegóły Pozycji</div>

            <div class="form-group">
            @if(file_exists('./storage/img/emovie/'.md5($catalog->id)))
            <div class="show-buts">
                <img class="show-img" src="{{asset('storage/img/emovie/'.md5($catalog->id))}}">
            </div>
        @else
        <div class="show-buts">
                <img class="show-img" src="{{asset('img/no-image.png')}}">
            </div>
        @endif
            </div>
            <div class="form-group">
                <label class="label-show">Tytuł Filmu:</label>
                <p class="show-card">{{$catalog->titlemovie}}</p>
            </div>
            
            <div class="form-group">
                <label class="label-show">Opis Filmu:</label>
                <p class="show-card">{{$catalog->moviedescription}}</p>
            </div>
            <div class="form-group">
                <label class="label-show">Kraj Produkcji:</label>
                <p class="show-card">{{$catalog->moviecountry}}</p>
                
            </select>
            </div>

            <div class="form-group">
                <label>Gatunek Filmu:</label>
                <p class="show-card">{{$catalog->typesmovie}}</p>
            </div>

            
            <div class="show-buts">

                <a style="display:inline-block;" href="{{$catalog->id}}/edit"><button class="btn btn-primary">Edycja</button></a>
                
                
                <form style="display:inline-block;" action="/movies/{{$catalog->id}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">Usuń</button> 
                </form>

                <a style="display:inline-block;" href="/movies"><button class="btn btn-primary">Powrót</button></a>
            </div>
        </div>
            
      
            
</div>
 
    </div>
     
    <div class="indexCard">
        <div class="footer">
        <a href="https://www.adwers.com/damiannass.php"><i class="fa fa-globe">Autor: Damian Nass</i></a>
        </div>
    </div>

 
@endsection()
