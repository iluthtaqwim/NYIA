<?php
 include '../php/DatabaseManager.php'; 
if(isset($_POST['namaPerusahaan'])){
    $user = CekUser(GetUsername(),GetPassword());
    AddHistory(GetUsername(),GetPassword(),Keterangan::MENAMBAH_DATA_PERUSAHAAN,$user->keyuser());
        TambahDataPerusahaan($_POST['namaPerusahaan']);
        header ("Location:../assets/index.php?assets=mitra");
}

if(isset($_POST['namaMitra'])){
    if(isset($_POST['namaMitra'])&&isset($_POST['namaPerjanjian'])&&isset($_POST['tanggalKontrak'])&&$_FILES['files']['name'] == true){
     $user = CekUser(GetUsername(),GetPassword());
     $r = $_FILES['files'];
    //echo $r;
    AddHistory(GetUsername(),GetPassword(),Keterangan::MEMASUKAN_NODIN_BARU,$user->keyuser());
    AddNewNodin($r,$_POST['namaMitra'],$_POST['namaPerjanjian'],$_POST['tanggalKontrak']);
    ///assets/index.php?assets=tracking
    header ("Location:../assets/index.php?assets=tracking");
    }else{
        header ("Location:../assets/index.php?assets=tracking&error=somedatanull");
    }
  }
  
 if(isset($_POST['username'])&& isset($_POST['password'])){
     $user = CekUser($_POST['username'],$_POST['password']);
        if($user!=null){
            header ("Location:../assets/index.php");
            AddHistory(GetUsername(),GetPassword(),Keterangan::MASUK_PORTAL,$user->keyuser());
        }else{
            AddHistory($_POST['username'],$_POST['password'],Keterangan::MENCOBA_MASUK,"unknown");
            header ("Location:../assets/login.php?message=error");
            
        }
     
 }
 
 if(isset($_POST['logout'])){
      $user = CekUser(GetUsername(),GetPassword());
     AddHistory(GetUsername(),GetPassword(),Keterangan::LOGOUT,$user->keyuser());
        logout();
        header ("Location:../assets/login.php");
    }
    

    if(isset($_POST['indexdata'])){
         $user = CekUser(GetUsername(),GetPassword());
        //echo $_POST['indexdata'].$_POST['fungsi'];
        //Terima
        if($_POST['fungsi']==5){
                AddHistory(GetUsername(),GetPassword(),12,$user->keyuser());
                DataDiterimax($_POST['indexdata'],1,4);
                header ("Location:../assets/index.php?assets=tracking");
                
            }else if($_POST['fungsi']==6){
                AddHistory(GetUsername(),GetPassword(),13,$user->keyuser());
                DataDiterimax($_POST['indexdata'],1,5);
                header ("Location:../assets/index.php?assets=tracking");
                
            }else if($_FILES['filex']['name'] == true){
            if($_POST['fungsi']==1){
                AddHistory(GetUsername(),GetPassword(),Keterangan::MENERIMA_NODIN,$user->keyuser());
                $rr = DataDiterima($_POST['indexdata'],$_POST['nolink'],$_FILES['filex']);
                header ("Location:../assets/index.php?assets=tracking");
            }else if($_POST['fungsi']==0){
                if($_POST['alasanmenolak']==null){
                    echo "hay";
                    header ("Location:../assets/index.php?assets=tracking&error=nullmessage");
                }else{
                    AddHistory(GetUsername(),GetPassword(),Keterangan::MENOLAK_NODIN,$user->keyuser());
                    $rr = $_POST['indexdata'];
                    $dd = $_POST['alasanmenolak'];
                    $dds = $_POST['nolink'];
                    DataDitolak($dd,$rr,$dds,$_FILES['filex']);
                    header ("Location:../assets/index.php?assets=tracking");
                }
            }else if($_POST['fungsi']==3){
                AddHistory(GetUsername(),GetPassword(),10,$user->keyuser());
                $rr = DataDiterimaS($_POST['indexdata'],$_POST['nolink'],$_FILES['filex'],3);
                header ("Location:../assets/index.php?assets=tracking");
            }else if($_POST['fungsi']==4){
                AddHistory(GetUsername(),GetPassword(),11,$user->keyuser());
                $rr = DataDiterimaS($_POST['indexdata'],$_POST['nolink'],$_FILES['filex'],4);
                header ("Location:../assets/index.php?assets=tracking");
            }
        }else{
            header ("Location:../assets/index.php?assets=tracking&error=fileuploadnull");
        }
    }
    
    if(isset($_POST['indexd'])){
        if($_FILES['files']['name'] == true){
            echo 'sdasd';
             $user = CekUser(GetUsername(),GetPassword());
            $ddd=$_FILES['files'];
            AddHistory(GetUsername(),GetPassword(),Keterangan::MENANDATANGANI_NODIN,$user->keyuser());
            if(FixLampiran($ddd,$_POST['indexd'])) echo 'dsadas';
        }
        header ("Location:../assets/index.php?assets=tracking");
  }
  if(isset($_POST['indexde'])){
        if($_FILES['files']['name'] == true){
             $user = CekUser(GetUsername(),GetPassword());
            $ddd=$_FILES['files'];
            AddHistory(GetUsername(),GetPassword(),Keterangan::MEREVISI_NODIN,$user->keyuser());
            if(NewLampiran($ddd,$_POST['indexde'])) echo 'dsadas';
        }
        header ("Location:../assets/index.php?assets=tracking");
  }
  
  if(isset($_POST['updateBerkas'])){
      $idkep = $_POST['idperu'];
      $ff = $_POST['tanggal'];
       echo"$ff"; 
      if($_FILES['files']['name'] == true&&isset($_POST['tanggal'])){
        $fas = $_POST['updateBerkas'];
        echo"$fas";    
        echo"kasd";  
        $dsad = TambahBerkasPerusahaan($idkep,$fas,$_FILES['files'],$_POST['tanggal']);
        if($dsad){
            echo "dasda";
        }else{
            echo "dasdas";
        }
        }
      //assets/index.php?assets=mitra&id_perusahaan=VENDOR4
      header ("Location:../assets/index.php?assets=mitra&id_perusahaan=$idkep");
  }
  
?>