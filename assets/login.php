<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
    <div class="row ">
      <div class="col-xs-0 col-md-4"></div>
      <div class="col-xs-12 col-md-4 container" >
        <div class="card text-center bg-primary">
            <div class="card-body">
            <img src="../assets/img/Angkasa_Pura_logo_2011.svg.png" style="width:100%; padding:5% 5% 10% 5%" alt="" srcset="">
                <form action="" method="post">
                    <div class="row" style="padding-bottom: 20px">
                        <div class="col-md-3 col-xs-12">
                            <p>Username</p>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <input class="form-control" type="text" name="username" id="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            
                            <p>Password</p>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            
                            <input class="form-control" type="password" name="password" id="">
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

    if(isset($_POST['username'])&& isset($_POST['password'])){
        CekUser($_POST['username'],$_POST['password']);

    }

    if(AllowAcces()){
        header("location:../assets/index.php");
    }
?>