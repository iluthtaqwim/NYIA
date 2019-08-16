<?php
    include '../php/DatabaseManager.php';
    include '../assets/view_builder.php';
    include '../helper/helper.php';

if(!AllowAcces()){
    header("location:../assets/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    if(isset($_GET['assets'])){
        $h=$_GET['assets'];
        if($h=="mitra"){
            echo"<title>Mitra Usaha - Angkasa Pura</title>";
        }else if($h=="tracking"){
            echo"<title>Tracking - Angkasa Pura</title>";
        }else if($h=="document"){
            echo"<title>Documents - Angkasa Pura</title>";
        }else{
            echo"<title>Tracking App - Angkasa Pura</title>";
        }
        
    }else{
        echo"<title>Tracking App - Angkasa Pura</title>";
    }
    ?>
    <meta name="keywords" content="angkasa, pura, angkasa pura 1, angkasa pura I, angkasapura, bandara, world class, airport, airline, karir, career, juanda, surabaya, sultan hasanuddin, makassar, sams sepinggan, balikpapan, frans kaisiepo, biak, adisutjipto, yogyakarta, lombok, bandara international, sam ratulangi, manado, syamsudin noor, banjarmasin, ahmad yani, semarang, el tari, kupang, pattimura, ambon, adi soemarmo, surakarta, solo ">

	<meta name="author" content="PT Angkasa Pura I (Persero)">
	<meta name="description" content="Official website of PT Angkasa Pura I (Persero), is a State-Owned Enterprises (SOEs), which provides air traffic services and business airports in Indonesia focusing on regional services of central Indonesia and the eastern Indonesian region.">
	<link rel="shortcut icon" type="images/x-icon" href="https://ap1.co.id/frontend/images/material/favicon.ico">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<nav class="navbar navbar-dark fixed-top navbar-expand-lg" style="background-color: #009BE0;opacity: 0.9;">
    <div style="height: auto; width: 531px">
            <div style="background-image: url(../assets/img/bg_logo.png)">
                <a class="navbar-brand" href="../assets/index.php"><img width="70%" src="https://ap1.co.id/contents/logo/large/ori-logo-ap-corp.png" alt="" srcset=""></a>
            </div>
        </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?assets=mitra">MITRA</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          JUMLAH
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">F & B</a>
          <a class="dropdown-item" href="#">Service</a>
          <a class="dropdown-item" href="#">Retail</a>
          <a class="dropdown-item" href="#">Cargo</a>
        </div>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav" style="margin-right: 20px;">
        <li class="nav-item"><a class="nav-link" href="#">DEFAULT</a></li>
        <li class="nav-item"><a class="nav-link">|</a></li>
        <li class="nav-item"><a class="nav-link" href="#">MATERIAL</a></li>
    </ul>
    <form class="form-inline ml-auto" action="doing.php" method="post">
        <button name="logout" class="btn btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i></button>
    </form>
</nav>

<div class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://ap1.co.id/contents/news/large/ori-banner-home-1.jpg">
        <div class="carousel-caption ">
            <h1 style="color: #fafafa;">ANGKASA PURA</h1>  
            <h5>Bandara Adi Sutjipto Yogyakarta</h5>
        </div>   
                   
      </div>
    </div>
  </div>

<!-- <div class="wrapper"> -->
        <!-- Sidebar  -->
        <!-- <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width:100%" alt="" srcset="">
            </div>

            <ul class="list-unstyled components">

                <li class="notClicked">
                    <a href="?assets=beranda">Beranda</a>
                </li>
                <li class="notClicked">
                    <a href="?assets=mitra">Mitra Usaha</a>
                </li>
                <div id="tabs">
                    <li id="tab" >
                        <a href="?assets=tracking">Tracking</a>
                    </li>
                </div>

                <li>
                    <a href="?assets=document">Document</a>
                </li>

            </ul>
        </nav> -->

        <!-- Page Content  -->
        <div id="content">

            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <img src="../assets/img/menu.png" width="30px" alt="">
                    </button>
                    <h2><?php 
                    $userer = CekUser(GetUsername(),GetPassword());
                    if($userer->kat()==1){
                        $pem = "Legal";
                    }else if($userer->kat()==2){
                        $pem = "Sales";
                    }
                    echo $userer->name()." ( ".$pem." )"; 
                    
                    ?></h2>
                   
                </nav> -->

            <?php
                $assets=@$_GET['assets'];
                if($assets== ''){
                    include "../assets/beranda.php";
                }
                if($assets== 'tracking'){
                    include "../assets/tracking.php";
                }
                if($assets== 'beranda'){
                    include "../assets/beranda.php";
                }
                if($assets== 'document'){
                    include "../assets/document.php";
                }
                if($assets== 'mitra'){
                    include "../assets/mitra_usaha.php";
                }
            ?>
        </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
<?php
    


?>
<!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="text-right bg-light py-3 mr-2"> 2019 ©  
          <a href="">PengembangSebelah.com</a>
        </div>
        <!-- Copyright -->
      
    </footer>
<!-- Footer -->
</body>
</html>
