@extends('layouts.app')

@section('title')
    Edit movies
@endsection

@section('content')

    <div class="createCard">
    <div class="cardadd">
        <form class="form-addcard" action="/movies/{{$catalog->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="createTitle">Prosimy zmienić dane, aby edytować Film.</div>
            <div class="form-group">
                <label for="titlemovie">Tytuł Filmu:</label>
                <input class="form-control"type="text" name="titlemovie" id="titlemovie" value="{{$catalog->titlemovie}}" required>
            </div>
            
            <div class="form-group">
                <label for="moviedescription">Opis Filmu:</label>
                <input class="form-control" type="textarea" name="moviedescription" id="moviedescription" value="{{$catalog->moviedescription}}" required>
            </div>
            <div class="form-group">
                <label for="moviecountry">Kraj Produkcji:</label>
                <select  data-placeholder="Wybór Kraju" id="moviecountry" name="moviecountry" class="form-control" value="{{$catalog->moviecountry}}" required>@include('parts.moviecountry')
                
            </select>
            </div>

            <div class="form-group">
                <label>Gatunek Filmu:</label>
              
    <div class="selectBox" onclick="showCheckboxes()">
      <select class="form-control" required>
        <option>Wybór Gatunków</option>
      </select>
      <div class="overSelect"></div>
    </div>
    <div id="checkboxes">@include('parts.movietype')</div>
 
            </div>

            <div class="form-group">
                <label for="foto">Okładka Filmu:</label>
                <input class="form-control-file" type="file" name="foto" id="foto">
            </div>
            <a href="javascript:history.back()"><button type="button" class="btn btn-primary">Powrót</button></a>
            <button class="btn btn-primary float-right" type="submit">Gotowe</button>
            
        </form>

        <script>
        var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
<script>
  $(document).mouseup(function(e) 
{
    var container = $("#checkboxes");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
 
</script>
    </div>
    </div> 
    <div class="indexCard">
        <div class="footer">
        <a href="https://www.adwers.com/damiannass.php"><i class="fa fa-globe">Autor: Damian Nass</i></a>
        </div>
    </div>
@endsection()