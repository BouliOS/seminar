@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Detalji o filmu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{URL::to('/resources/assets/css/style.css')}}">
</head>
<body>
     <div class="container" style="width: 100%">
      <h2 style="text-align: center;">Detalji o filmu</h2>

      <table class="table">
            <tbody>
                <tr class="active"><td><strong>Naslov filma</strong> </td><td>{{$videoteka->film_naslov}}</td></tr>
                <tr class="info"><td><strong>Žanr </strong></td><td>{{$videoteka->film_zanr}}</td></tr>
                <tr class="active"><td><strong>Godina </strong> </td><td>{{$videoteka->film_godina}}</td></tr>
                <tr class="info"><td><strong> Trajanje </strong> </td>
                  <td>{{$videoteka->film_trajanje}}</td>
                </tr>
                <tr class="active"><td><strong> Slika </strong> </td>
                  @if($videoteka->film_slika!='')
                  <td><img src="{{ URL::to('/uploads/'.$videoteka->film_slika) }}" width="100px" height="100px" class="img-responsive" /></td>
                  @else
                    
                  @endif
                </tr>
            </tbody>
          </table>
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        <a href="{{URL::to('/videoteka')}}" class="btn btn-danger">Nazad</a>
      </div>
    </div>    
</div>
</body>
</html>
@stop