<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
session_start();

include 'koneksi.php';
include 'Keterangan.php';
include 'HistoryManager.php';
include 'DataUser.php';
include 'DataFile.php';
include 'Upload.php';

function GetUsername(){
  return $_SESSION["username"];
}
function GetPassword(){
  return $_SESSION["password"];
}
function Logout(){
  session_destroy();
}
function ErrorReport(){
  echo "Need Allow Acces";
  return;
}
function AllowAcces(){
  return isset($_SESSION["username"]) && isset($_SESSION["password"]);
}

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
  if(!AllowAcces()) {echo "Need Login first"; return;}
  $userdata = CekUser(GetUsername(),GetPassword());
  $history = new HistoryManager;
  $conn = BuatKoneksi();
  $historydata = $history->GetHistory($conn,$userdata->keyuser());
  $histlenght=count($historydata);
  if($histlenght >0){
    TutupKoneksi($conn);
    return $historydata;
  }else {
    TutupKoneksi($conn);
    unset($historydata);
    return null;
  }

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

// Cara menggunakan dan menambahjan nodin
// if(isset($_FILES['file'])){
//   AddNewNodin($_FILES['file'],,$userdata,$namedoc,$ketdoc,$tgl);
// }
function AddNewNodin($file,$userdata,$namedoc,$ketdoc,$tgl){
  //$conn,$namamitra,$namakontrak,$tglkontrak,
  $upload = new Upload;
  $targetfolder = "../uploaddata/notadinas/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $userdata = CekUser(GetUsername(),GetPassword());
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $dafil->AddNodin($conn,$userdata,$namedoc,$ketdoc,$tgl,$link);
    if($dafil){
      TutupKoneksi($conn);
      unset($dafil);
      return true;
    }else {
      TutupKoneksi($conn);
      unset($dafil);
      return false;
    }
  }else {
    return false;
  }
}
function NewLampiran($file,$link_id_doc){
  $upload = new Upload;
  $targetfolder = "../uploaddata/notadinas/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $dafil->LampiranBaru($conn,$link_id_doc,$link);
    if($dafil){
      TutupKoneksi($conn);
      unset($dafil);
      return true;
    }else {
      TutupKoneksi($conn);
      unset($dafil);
      return false;
    }
  }else {
    return false;
  }
}

// $datane = GetDataFiles();
// foreach ($datane as $data) {
//   echo $data->GetKeteranganDoc()."\n";
//   foreach ($data->GetListData() as $lisd) {
//      echo $lisd->GetLink()."\n";
//   }
// }
function GetDataFiles(){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->GetDataFiles($conn);
  TutupKoneksi($conn);
  return $datne;
}
function DataDitolak($value,$idok){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  if(!AllowAcces())ErrorReport();
  $userLo = CekUser(GetUsername(),GetPassword());
  $datne =  $dafil->DataDitolak($conn,$userLo,$idok,$value);
  TutupKoneksi($conn);
  unset($dafil);
}
function DataDiterima($idok){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->DataDiterima($conn,$idok);
  TutupKoneksi($conn);
  unset($dafil);
}
function TambahDataPerusahaan($namaPerusahaan){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->AddDataPerusahaan($conn,$namaPerusahaan);
  TutupKoneksi($conn);
  unset($dafil);
}
function TambahBerkasPerusahaan($id_key_perusahaan,JENISFILE $id_key_jenis,$file,$expired){
  $upload = new Upload;
  $targetfolder = "../uploaddata/berkasperusahaan/".$id_key_perusahaan."/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $datne =  $dafil->AddBerkasPerusahaan($conn,$id_key_perusahaan,$id_key_jenis,$link,$expired);
    if($dafil){
      TutupKoneksi($conn);
      unset($dafil);
      return true;
    }else {
      TutupKoneksi($conn);
      unset($dafil);
      return false;
    }
  }else {
    return false;
  }
}
function GetBerkasPerusahaan(){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->GetBerkasPerusahaan($conn);
  TutupKoneksi($conn);
  return $datne;
}

$os = array(false, false, false, false);
if (in_array(true, $os)) {
    echo "Got Irix";
}


?>
