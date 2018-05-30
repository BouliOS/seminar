<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Arial', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            userstable{
    border-collapse: collapse;
    max-width: 800px;
}

/* Numeric */
.sort{
    list-style: none;
}
.sort li{
    float: left;
    border: 1px solid #000;
    padding: 5px 7px;
    margin-right: 10px;
    border-radius: 3px;
}
.sort li a{
    text-decoration: none;
    color:black;
}

.active{
    color: red !important;
}
.remove-all-styles {
    all: revert;
  }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                
                <div style="hover"><?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "kolekcija"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
} ?>

                
                    
   
    <!-- Alphabets -->
    <ul class="sort">
        
        <?php
            echo '<li ><a href="index.php" '; 
            if( !isset($_GET['char']) ){
                    echo ' class="active" ';
            }
            echo ' >Svi filmovi</a></li>';

            // Select Alphabets and total records
            $alpha_sql = "select DISTINCT LEFT(film_naslov , 1)
 as firstCharacter,( select count(*) 
 from filmovi where LEFT(film_naslov , 1)= firstCharacter )
  AS counter from filmovi order by film_naslov asc";
            $result_alpha = mysqli_query($con,$alpha_sql);

            while($row_alpha = mysqli_fetch_array($result_alpha) ){
                $firstCharacter = $row_alpha['firstCharacter'];
                $counter = $row_alpha['counter'];
                
                echo '<li ><a href="?char='.$firstCharacter.'" '; 
                if( isset($_GET['char']) && $firstCharacter == $_GET['char'] ){
                    echo ' class="active" ';
                }
                echo ' >'.$firstCharacter.' ('.$counter.')</a></li>';

             
            }
        ?>
    </ul><br><br>
    
    <table class="table table-bordered table-hover" width="100%" id="userstable">
        <tr class="tr_header">
            <th>Br.</th>
            <th class="text-center">Slika</th>
            <th class="text-center">Naslov</th>
            <th class="text-center">Žanr</th>
            <th class="text-center">Godina</th>
            <th class="text-center">Trajanje</th>
            
        </tr>
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
   <td align='center'> <img src="uploads/<?php echo $slika?>" height="50px" width="49px"></td>
   <td align='center'><?php echo $naslov; ?></td>
   <td align='center'><?php echo $zanr; ?></td>
   <td align='center'><?php echo $godina; ?></td>
   <td align='center'><?php echo $trajanje; ?></td>
  </tr>
  <?php
   $sno ++;
  }
 ?>
 </table>

</div>
        
    </body>
</html>





