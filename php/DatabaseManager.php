<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
session_start();

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

function GetHistory(){
  $userdata = CekUser(GetUsername(),GetPassword());
  $history = new HistoryManager;
  $conn = BuatKoneksi();
  $history->GetHistory();
  TutupKoneksi($conn);
  unset($history);
}

//Cekuser akan mengembalikan data dari datqauser berupa segala sesuatu yang ada di username
// $_user = Cekuser(username,password)
//if($user!=null) dapat diambil $user->name() dll seperti di object data user
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
    $_SESSION["username"] = $user->username();
    $_SESSION["password"] = $user->password();
    return $user;
  }
}

function GetUsername(){
  return $_SESSION["username"];
}

function GetPassword(){
  return $_SESSION["password"];
}

function AddNewNodin($conn,$namamitra,$namakontrak,$tglkontrak,$file){
  $upload = new Upload;
  $link = $upload->Data($file);
  if($link!=null){
    $userdata = CekUser(GetUsername(),GetPassword());
    AddNodin($conn,$userdata,$namamitra,$namakontrak,$tglkontrak,$link);
  }else {
    echo "Error upload file";
  }
}
// CekUser("ekacahyo","test");
// echo GetUsername();

?>
