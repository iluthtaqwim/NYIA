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
    if(!isset($_SESSION["username"])) return false;
    else return isset($_SESSION["username"]) && isset($_SESSION["password"]);
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
    return $historydata;
    unset($historydata);
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
    if(!isset($_SESSION["username"])&&!isset($_SESSION["password"])){
        $_SESSION["username"] = $user->username();
        $_SESSION["password"] = $user->password();
    }
    return $user;
  }
}

// Cara menggunakan dan menambahjan nodin
// if(isset($_FILES['file'])){
//   AddNewNodin($_FILES['file'],,$userdata,$namedoc,$ketdoc,$tgl);
// }
function AddNewNodin($file,$namedoc,$ketdoc,$tgl){
  //$conn,$namamitra,$namakontrak,$tglkontrak,
  $tgl = str_replace('-', '',$tgl);
  $upload = new Upload;
  $targetfolder = "../uploaddata/notadinas/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $userdata = CekUser(GetUsername(),GetPassword());
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    $nafil = $file['name'];
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $dafil->AddNodin($conn,$userdata,$namedoc,$ketdoc,$tgl,$link,$nafil);
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
    $dafil->LampiranBaru($conn,$link_id_doc,$link,$file['name']);
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
function NewLampiranNodin($file,$link_id_doc,$node){
  $upload = new Upload;
  $targetfolder = "../uploaddata/notadinas/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $dafil->LampiranBaruNodin($conn,$link_id_doc,$link,$node,$file['name']);
    if($dafil){
      TutupKoneksi($conn);
      unset($dafil);
      return true;
    }else {
      TutupKoneksi($conn);
      unset($dafil);
      return false;
    }
  }
}
function FixLampiran($file,$link_id_doc){
  $upload = new Upload;
  $targetfolder = "../uploaddata/notadinasFix/";
  $link = $upload->Data($file,$targetfolder);
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $dafil->LampiranBaruFix($conn,$link_id_doc,$link,$file['name']);
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
function GetDataFilesSales($uploadby){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->GetDataFilesSales($conn,$uploadby);
  TutupKoneksi($conn);
  return $datne;
}
function DataDitolak($value,$idok,$no,$filr){
  NewLampiranNodin($filr,$idok,1);
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  if(!AllowAcces())ErrorReport();
  $userLo = CekUser(GetUsername(),GetPassword());
  $datne =  $dafil->DataDitolak($conn,$userLo,$idok,$value,$no);
  TutupKoneksi($conn);
  unset($dafil);
}
function DataDiterima($idok,$no,$file){
    NewLampiranNodin($file,$idok,2);
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->DataDiterima($conn,$idok,$no);
  TutupKoneksi($conn);
  unset($dafil);
  return $datne;
}
function DataDiterimax($idok,$no,$nox){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->DataDiterimax($conn,$idok,$no,$nox);
  TutupKoneksi($conn);
  unset($dafil);
  return $datne;
}
function DataDiterimaS($idok,$no,$file,$s){
    NewLampiranNodin($file,$idok,$s);
}
function TambahDataPerusahaan($namaPerusahaan){
  $conn = BuatKoneksi();
  $dafil = new DataFile;
  $datne =  $dafil->AddDataPerusahaan($conn,$namaPerusahaan);
  TutupKoneksi($conn);
  return $dafil;
}
function TambahBerkasPerusahaan($id_key_perusahaan,$id_key_jenis,$file,$expired){
    echo "hai";
    $tgl = str_replace('-', '',$expired);
  $upload = new Upload;
  $targetfolder = "../uploaddata/berkasperusahaan/";
  $link = $upload->Data($file,$targetfolder);
  $ll = $link->GetLink();
  if($link->GetStats()!=0){
    if(!AllowAcces())ErrorReport();
    $dafil = new DataFile;
    $conn = BuatKoneksi();
    //$tgl = GetTimeThis(TypeTime::DATEDB);
    $datne =  $dafil->AddBerkasPerusahaan($conn,$id_key_perusahaan,$id_key_jenis,$ll,$expired);
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

?>
