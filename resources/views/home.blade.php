@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <!-- Content Header (Page header) -->
    <style>.content-header h1 {
    font-size   : 38px;
    line-height : 1.5;
}
    .index-header {
    margin     : -10px;
    text-align : center;
    color      : #fff;
    height     : 160px;
}
.inner-bg {
    padding : 44px 0;
}</style>
    <div>
        <div style="background-image:url('../uploads/bg.jpg')">
        <section class="content-header">
            <div class="index-header">
                <div class="inner-bg inner-bg1">
                    <div class="header-section">
                        <div class="row">
                            <div class="col-xl-6 col-md-4 col-lg-4 d-none d-lg-block mt-2">
                                <h1>Dashboard</span></h1>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8 col-xl-6 welcome">
                                <div class="row text-center">
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 ">
                                        <h2>
                                            <strong>97.3k</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-thumbs-o-up"></i>
                                                #Lajkova
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 ">
                                        <h2 class="animation-hatch">
                                            <strong>197k</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-heart-o"></i>
                                                #Pratitelja
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 pl-0 pl-md-3 pl-lg-3 pl-xl-3">
                                        <h2 class="animation-hatch">
                                            <strong>
<div id="clock"> <?php
date_default_timezone_set('UTC');
?>
<script>
var d = new Date(<?php echo time() * 1000 ?>);
function digitalClock() {
  d.setTime(d.getTime() + 1000);
  var hrs = d.getHours();
  var mins = d.getMinutes();
  var secs = d.getSeconds();
  mins = (mins < 10 ? "0" : "") + mins;
  secs = (secs < 10 ? "0" : "") + secs;
  var apm = (hrs < 12) ? "am" : "pm";
  hrs = (hrs > 24) ? hrs - 24 : hrs;
  hrs = (hrs == 0) ? 12 : hrs;
  var ctime = hrs + ":" + mins;
  document.getElementById("clock").firstChild.nodeValue = ctime;
}
window.onload = function() {
  digitalClock();
  setInterval('digitalClock()', 1000);
}
</script></div></strong>
                                            
                                            <small>
                                                <i class="fa fa-calendar-o"></i>
                                                Vrijeme
                                            </small>
                                        </h2>
                                    </div>
                                    <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3 col-4 d-none d-md-block">
                                        <h2 class="animation-hatch">
                                            <strong>22°</strong>
                                            <br>
                                            <small>
                                                <i class="fa fa-map-marker"></i>
                                                #Osijek
                                            </small>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('content')

<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <?php
$con=mysqli_connect("localhost","root","","kolekcija");
$query = "select count(film_id) from filmovi
 where deleted=0";
$filmovi= mysqli_query($con,$query) or die(mysql_error());
while($row = mysqli_fetch_assoc($filmovi)){
    foreach($row as $cname => $brojfilmova){
       
    }
     
} ?>
              <h3><?php echo $brojfilmova?></h3>

              <p>Broj filmova</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-facetime-video"></i>
            </div>
            <a href="/videoteka" class="small-box-footer">Više informacija <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>#Statistika 1</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Više informacija <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <?php
$con=mysqli_connect("localhost","root","","kolekcija");
$query = "select count(id) from users";
$korisnici= mysqli_query($con,$query) or die(mysql_error());
while($row = mysqli_fetch_assoc($korisnici)){
    foreach($row as $cname => $brojkorisnika){
       
    }
     
} ?>
              <h3><?php echo $brojkorisnika?></h3>

              <p>Broj registriranih</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Više informacija <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>#Statistika 2</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Više informacija <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.16/i18n/Croatian.json"></script>
<?php $host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "kolekcija"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
} ?>

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Br.</th>
            <th>Slika</th>
            <th>Naslov</th>
            <th>Žanr</th>
            <th>Godina</th>
            <th>Trajanje</th>
        </tr>
    </thead>
    <tbody>
         <?php        

       // selecting rows
  $sql = "SELECT * FROM filmovi where 1"; 
  if( isset($_GET['char']) ){
   $sql .= " and LEFT(film_naslov,1)='".$_GET['char']."' ";
  }
  $sql .=" ORDER BY film_naslov ASC";
  $result = mysqli_query($con,$sql);

  $sno = 1;
  
 
  while($fetch = mysqli_fetch_array($result)){
   $naslov = $fetch['film_naslov'];
   $zanr = $fetch['film_zanr'];
   $godina = $fetch['film_godina'];
   $trajanje = $fetch['film_trajanje'];
   $slika = $fetch['film_slika'];
  ?>
  <tr>
      <td align='center'><?php echo $sno; ?></td>
   <td align='left'><img src="uploads/<?php echo $slika?>" height="50px" width="49px"></td>
   <td align='left'> <?php echo $naslov; ?></td>
   <td align='left'> <?php echo $zanr; ?></td>
   <td align='left'> <?php echo $godina; ?></td>
   <td align='left'> <?php echo $trajanje; ?></td>
  </tr>
  <?php
   $sno ++;
  }
 ?>
    </tbody>
    <script>$(document).ready( function () {
    $('#table_id').DataTable({
        "language": {
    "sEmptyTable":      "Nema podataka u tablici",
    "sInfo":            "Prikazano _START_ do _END_ od _TOTAL_ rezultata",
    "sInfoEmpty":       "Prikazano 0 do 0 od 0 rezultata",
    "sInfoFiltered":    "(filtrirano iz _MAX_ ukupnih rezultata)",
    "sInfoPostFix":     "",
    "sInfoThousands":   ",",
    "sLengthMenu":      "Prikaži _MENU_ rezultata po stranici",
    "sLoadingRecords":  "Dohvaćam...",
    "sProcessing":      "Obrađujem...",
    "sSearch":          "Pretraži:",
    "sZeroRecords":     "Ništa nije pronađeno",
    "oPaginate": {
        "sFirst":       "Prva",
        "sPrevious":    "Nazad",
        "sNext":        "Naprijed",
        "sLast":        "Zadnja"
    },
    "oAria": {
        "sSortAscending":  ": aktiviraj za rastući poredak",
        "sSortDescending": ": aktiviraj za padajući poredak"
    }
}
    } );
} );</script>
</table>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
   
@stop
