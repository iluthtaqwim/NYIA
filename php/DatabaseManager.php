<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
include 'koneksi.php';
include 'Keterangan.php';
include 'HistoryManager.php';
include 'DataUser.php';

//cara pake AddHistory(username,password,keterangan,keyuser);
//keterangan = Keterangan::Blasbala;
function AddHistory($username,$pass,$keterangan,$keyuser){
    $history = new HistoryManager;
    $conn = BuatKoneksi();
    $history->AddHistory($conn,$username,$pass,$keterangan,$keyuser);
    TutupKoneksi($conn);
    unset($history);
}

function CekUser($username,$pass){
  $du = new DataUser;
  $conn = BuatKoneksi();
  $user = $du->CekUser($conn,$username,$pass);
  if($user==null){
    TutupKoneksi($conn);
    unset($du);
    return null;
  }else {
    TutupKoneksi($conn);
    unset($du);
    return $user;
  }

}

//AddHistory("das","dasd",1,"Das");
CekUser("ekacahyo","test");
?>
