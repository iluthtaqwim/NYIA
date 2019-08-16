<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Angkasa Pura Tracking App</title>
    <meta name="keywords" content="angkasa, pura, angkasa pura 1, angkasa pura I, angkasapura, bandara, world class, airport, airline, karir, career, juanda, surabaya, sultan hasanuddin, makassar, sams sepinggan, balikpapan, frans kaisiepo, biak, adisutjipto, yogyakarta, lombok, bandara international, sam ratulangi, manado, syamsudin noor, banjarmasin, ahmad yani, semarang, el tari, kupang, pattimura, ambon, adi soemarmo, surakarta, solo ">

	<meta name="author" content="PT Angkasa Pura I (Persero)">
	<meta name="description" content="StartApp Tracking website for Angkasa Pura Airport">
	<link rel="shortcut icon" type="images/x-icon" href="https://ap1.co.id/frontend/images/material/favicon.ico">
	<meta name="copyright" content="Pengembang Sebelah">
	<meta name=’robots’ content=’index,follow’>
	
	<meta name="og:title" content="Angkasa Pura Tracking App"/>
<meta name="og:type" content="startapp"/>
<meta name="og:url" content="http://eka.pengembangsebelah.com/"/>
<meta name="og:image" content="http://eka.pengembangsebelah.com/assets/img/Angkasa_Pura_logo_2011.svg.png"/>
<meta name="og:site_name" content="Angkasa Pura"/>
<meta name="og:description" content="StartApp Tracking website for Angkasa Pura Airport.."/>
	<meta itemprop="rating" content="4.5" /> 
	
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
    <div class="row ">
      <div class="col-xs-0 col-md-4"></div>
      <div class="col-xs-12 col-md-4 container" >
        <div class="card text-center" style="background-color:skyblue">
            <div class="card-body">
            <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width:100%; padding:5% 5% 10% 5%" alt="" srcset="">
                <form action="doing.php" method="post">
                    <div class="row" style="padding-bottom: 20px">

                        <div class="col-md-12 col-xs-12">
                            <label style="color:white" for="">Username</label>
                            <input class="form-control" type="text" name="username" id="" placeholder="Username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <label style="color:white" for="">Password</label>
                            <input class="form-control" type="password" name="password" id="" placeholder="Password">
                        </div>
                    </div>
                    <div style="padding-top: 20px" class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <button class="btn btn-light" name="simpan" type="submit">LOGIN</button>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
</body>

<script src="../dist/js/bootstrap.js"></script>
<script src="../js/src/popover.js"></script>
</html>

<?php 
    include '../php/DatabaseManager.php';

    if(AllowAcces()){
        header("location:../assets/index.php");
    }
?>