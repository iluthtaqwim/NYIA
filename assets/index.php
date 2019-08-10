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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
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
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <img src="../assets/img/menu.png" width="30px" alt="">
                    </button>
                    <h2><?php echo CekUser(GetUsername(),GetPassword())->name(); ?></h2>
                    <form action="" method="post">
                        <button name="logout" class="btn btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i></button>
                    </form>
                </nav>
            
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
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
    $(document).ready(function () {

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});

});
</script>
<?php
    if(isset($_POST['logout'])){
       // header("location:../assets/login.php");
        logout();
        unset($_POST['logout']);
    }
    
    
?>

</body>
</html>