@extends('layouts.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uredi film</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{URL::to('/resources/assets/css/style.css')}}">
</head>
<body>
    <div class="container" style="width: 100%">
      <h2 style="text-align: center;">Uredi film</h2>
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

        {!! Form::open(array('url'=>'/update/'.$videoteka->film_id,'method'=>'post', 'files'=>true)) !!}
        <div class="form-group">
          <?php echo Form::label('naslov', 'Naslov:* ', ['class' => 'control-label col-sm-2','for'=>'naslov']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('naslov', $videoteka->film_naslov, array('class' => 'form-control','placeholder'=>'Unesi naslov','id'=>'naslov')) }}
          </div>
        </div>

        <div class="form-group">
          <?php echo Form::label('zanr', 'Žanr:* ', ['class' => 'control-label col-sm-2','for'=>'zanr']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('zanr', $videoteka->film_zanr , array('class' => 'form-control','placeholder'=>'Unesi zanr','id'=>'zanr')) }}
          </div>
        </div>

                <div class="form-group">
          <?php echo Form::label('trajanje', 'Trajanje:* ', ['class' => 'control-label col-sm-2','for'=>'trajanje']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('trajanje', $videoteka->film_trajanje , array('class' => 'form-control','placeholder'=>'Unesi trajanje','id'=>'trajanje')) }}
          </div>
        </div>

          <div class="form-group">
          <?php echo Form::label('godina', 'Godina:* ', ['class' => 'control-label col-sm-2','for'=>'godina']);  ?>
          <div class="col-sm-10 txt_space">
            {{ Form::text('godina', $videoteka->film_godina , array('class' => 'form-control','placeholder'=>'Unesi godinu','id'=>'godina')) }}
          </div>
        </div>
        

        <div class="form-group">
          <?php echo Form::label('image', 'Slika: ', ['class' => 'control-label col-sm-2','for'=>'image']);  ?>
          <div class="col-sm-10 txt_space">
                @if($videoteka->film_slika!='')
                <img src="{{ URL::to('/uploads/'.$videoteka->film_slika) }}" width="100px" height="50px" class="img-responsive" />
                @else
                
              @endif
              <div class="file_edit">{!! Form::file('film_slika') !!}</div>
          </div>
        </div>
      </div>

    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        {!! Form::submit('Uredi', array('class'=>'btn btn-primary')) !!}
        <a href="{{URL::to('/videoteka')}}" class="btn btn-danger">Otkaži</a>
      </div>
    </div>

    {{-- Hidden Field for the old image --}}

    {{ Form::hidden('old_img', $videoteka->film_slika) }}

    {!! Form::close() !!}
</div>
</body>
</html>
@stop