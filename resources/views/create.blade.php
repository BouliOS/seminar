@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dodavanje novog filma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{URL::to('/resources/assets/css/style.css')}}">
</head>
<body>
     <div class="container" style="width: 100%">
      <h2 style="text-align: center;">Dodaj film</h2>
      <div class="col-sm-10 col-sm-offset-2">

        @if(Session::has('success'))
            <div class="alert alert-success">
              <strong>{!! Session::get('success') !!}</strong>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
              <strong>{!! Session::get('error') !!}</strong>
            </div>
        @endif
      </div>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <span>{{ $error }}</span><br>
              @endforeach
          </div>
        @endif

        {!! Form::open(array('url'=>'/store','method'=>'POST', 'files'=>true)) !!}
        <div class="form-group">
          <?php echo Form::label('naslov', 'Naslov filma:* ', ['class' => 'control-label col-sm-2','for'=>'naslov']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('naslov', '', array('class' => 'form-control','placeholder'=>'Unesi naslov filma','id'=>'naslov')) }}
          </div>
            <div class="form">
          <?php echo Form::label('zanr', 'Žanr:* ', ['class' => 'control-label col-sm-2','for'=>'zanr']);  ?>
          <div class="col-sm-10 col-sm-offset-2">
           <select name="zanr">
  <option value="">Izaberi Žanr...</option>
  <option value="Akcija">Akcija</option>
  <option value="Avantura">Avantura</option>
  <option value="Drama">Drama</option>
  <option value="Fantazija">Fantazija</option>
  <option value="Komedija">Komedija</option>
  <option value="Horor">Horor</option>
  <option value="Triler">Triler</option>
</select>
          </div>
        </div>
          <div class="form-group">
          <?php echo Form::label('godina', 'Godina:* ', ['class' => 'control-label col-sm-2','for'=>'godina']);  ?>
         <div class="col-sm-10 col-sm-offset-2">
            <select name="godina">
<?php 
   for($i = 1900 ; $i <= date('Y'); $i++){
      echo "<option>$i</option>";
   }
?>
            </select> 
          </div>
            </div> 
            <div class="form-group">
          <?php echo Form::label('trajanje', 'Trajanje:* ', ['class' => 'control-label col-sm-2','for'=>'trajanje']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('trajanje', '', array('class' => 'form-control','placeholder'=>'Unesi trajanje filma','id'=>'trajanje')) }}
          </div>
        </div>        
        </div>   
        

        <div class="form-group">
          <?php echo Form::label('image', 'Slika:* ', ['class' => 'control-label col-sm-2','for'=>'image']);  ?>
          <div class="col-sm-10 txt_space">
                {!! Form::file('film_slika') !!}
          </div>
        </div>
      
<div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        {!! Form::submit('Dodaj', array('class'=>'btn btn-primary')) !!}
        <a href="{{URL::to('/videoteka')}}" class="btn btn-danger">Otkaži</a>
      </div>
    </div>
    {!! Form::close() !!}
        
            </div>
          </div>
        </div>
      </div>

    
</div>
</body>
</html>
@stop