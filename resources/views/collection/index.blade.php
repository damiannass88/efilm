@extends('layouts.app')

@section('title')
    All the movie
@endsection()

@section('content')
<div class="indexCard">
    <h1 class="h1-index">Katalog Bazy Filmów</h1>

    <form style="margin-bottom: 20px;" action="/movies/search" method="POST">
        @csrf
        <div class="input-group">
            @if($sear == null)
                <input style="margin-right: 10px;" type="text" class="form-control" name="sear" placeholder="Dowolna fraza..">
            @else
                <input style="margin-right: 10px;" type="text" class="form-control" name="sear" value="{{$sear}}">
            @endif
            <button type="submit" class="btn btn-primary">Filtruj</button>
        </div>
    </form>
    <div class="addbook"> 
                <a href="/movies/create"><button class="btn btn-primary">Dodaj Nowy Film</button></a>  
                
        </div>

    <div style="text-align:center;">
        @if($catalog->count() == 0)
            @if($sear == null)
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h4 class="home-title">Brak Pozycji, Prosimy dodać Nowy Film.</h4>
                    </div>
                </div>
            @else
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h4 class="home-title">Brak Wyników wyszukiwania, Prosimy Spróbować Ponownie</h4> 
                    </div>
                </div>
            @endif
        
        </div>
        <div id="tablecol" style="display:none;">
   <div class="header-index">Zbór Kolekcji</div>
   @else
        </div>
        <div id="tablecol" class="table-index">
   <div class="header-index">Zbór Kolekcji</div>
   @endif
   <table cellspacing="0">
      <tr>
         <th>Okładka</th>
         <th>Tytuł Filmu</th>
         <th>Opis Filmu</th>
         <th>Kraj Produkcji</th>
         <th>Gatunek Filmu</th>
      </tr>
    @foreach($catalog as $item)
            @if(file_exists('./storage/img/emovie/'.md5($item->id)))  

      <tr onclick="location.href='/movies/{{$item->id}}';">
         <td> <img src="{{asset('storage/img/emovie/'.md5($item->id))}}" alt="{{$item->titlemovie}}"></td>
         <td>{{ strlen($item->titlemovie) > 20 ? trim(substr($item->titlemovie,0,20)).'..' : $item->titlemovie }}</td>
         <td>{{ strlen($item->moviedescription) > 20 ? trim(substr($item->moviedescription,0,20)).'..' : $item->moviedescription }}</td>
         <td>{{ strlen($item->moviecountry) > 20 ? trim(substr($item->moviecountry,0,20)).'..' : $item->moviecountry }}</td>
         <td>{{ strlen($item->typesmovie) > 20 ? trim(substr($item->typesmovie,0,20)).'..' : $item->typesmovie }}</td> 
      </tr>
  
@else
      <tr  onclick="location.href='/movies/{{$item->id}}';">
         <td><img src="{{asset('img/no-image.png')}}" alt="{{$item->titlemovie}}"></td>
         <td>{{ strlen($item->titlemovie) > 20 ? trim(substr($item->titlemovie,0,20)).'..' : $item->titlemovie }}</td>
         <td>{{ strlen($item->moviedescription) > 20 ? trim(substr($item->moviedescription,0,20)).'..' : $item->moviedescription }}</td>
         <td>{{ strlen($item->moviecountry) > 20 ? trim(substr($item->moviecountry,0,20)).'..' : $item->moviecountry }}</td>
         <td>{{ strlen($item->typesmovie) > 20 ? trim(substr($item->typesmovie,0,20)).'..' : $item->typesmovie }}</td>
      </tr>
@endif  
        @endforeach
        </table>
</div>
        </div>
        <div class="indexCard">
        <div class="footer">
        <a href="https://www.adwers.com/damiannass.php"><i class="fa fa-globe">Autor: Damian Nass</i></a>
        </div>
    </div>
@endsection()
