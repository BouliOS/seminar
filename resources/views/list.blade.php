@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
        <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{URL::to('/resources/assets/css/style.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <script>
        $(document).ready(function()
        {
            $(".del_rec").on('click',function (event) {
            var x = confirm("Jeste li sigurni da želite izbrisati ovaj film?");
            if (x) {
                return true;
            }
            else {
                event.preventDefault();
                return false;
            }
            });
        });
        </script>
    </head>
    <body>
        <div class="container" style="width:100%">
          <h1 class="heading">Popis filmova</h1>
          <h2 style="text-align: center;">Filmovi</h2>
          <div>
              @if(Session::has('success'))
                  <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! Session::get('success') !!}</strong>
                  </div>
              @endif
          </div>
          <a href="/create" class="btn btn-primary" style=float:right;">Dodaj film</a>

          <table class="table">
            <thead>
              <tr>
                <th>Slika</th>
                <th>Naslov</th>
                <th>Žanr</th>
                <th>Godina</th>
                <th>Trajanje</th>
                <th>Datum dodavanja</th>
              </tr>
            </thead>
            <tbody>
               @if(!$videoteka->isEmpty())
                   @foreach($videoteka as $emp)
                      <tr class="active">
                          @if($emp->film_slika!='')
                        <td><img src="{{ URL::to('/uploads/'.$emp->film_slika) }}" width="80px" height="50px" class="img-responsive" /></td>
                        @else
                          @if($emp->film_zanr=='0')
                              <td><img src="{{ URL::to('/uploads/male.jpg') }}" width="80px" height="50px" class="img-responsive" /></td>
                          @else
                              <td><img src="{{ URL::to('/uploads/female.jpg') }}" width="80px" height="50px" class="img-responsive" /></td>
                          @endif
                        @endif
                        <td>{{$emp->film_naslov}}</td>
                        <td>{{$emp->film_zanr}}</td>
                        <td>{{$emp->film_godina}}</td>
                        <td>{{$emp->film_trajanje}}</td>
                        
                        
                        <td>{{Carbon\Carbon::parse($emp->created_on)->format('d/m/Y ')}}
                        </td>
                        <td>
                            <div>
                                
           
                                <a href="/show/{{ $emp->film_id }}" class="btn btn-primary btn-edit">Uredi</a>

                            <a href="/view/{{ $emp->film_id }}" class="btn btn-primary btn-view">Detalji</a>
                            
                            {!! Form::open(['url'=>'/delete/'.$emp->film_id,'method' => 'DELETE','class' => 'del_btn']) !!}
                            {{ Form::submit('Izbriši', array('class' => 'btn btn-danger del_rec')) }}
                            {!! Form::close() !!}
                            
                            </div>
                            
                        </td>
                      </tr>
                     @endforeach
               @else
                    <tr class="active" style="text-align: center;">
                      <td colspan="7">Nije pronađen nijedan film</td>    
                    </tr>
              @endif
            </tbody>
          </table>
          {{ $videoteka->links() }}
        </div>
    </body>
</html>
@stop