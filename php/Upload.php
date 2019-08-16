<?php
include 'GetTime.php';
class DataUpload
{

  public function __construct($link,$stats)
  {
    $this->link = $link;
    $this->stats = $stats;
  }

  public function GetLink(){
    return $this->link;
  }

  public function GetStats(){
    return $this->stats;
  }
}

class Upload
{
  public function Data($file, $targetfolder){
    //return "http://sancaya.com";
    $domain = "http://192.168.64.2/NYIA/";
    $time = GetTimeThis(TypeTime::NAMEFILE);
    if (!file_exists($targetfolder)) {
      mkdir($targetfolder, 777, true);
    }
    $targetfolder = $targetfolder . $time."-".basename( $file['name']) ;
    $file_type = $file['type'];
    if ($file_type=="application/pdf") {
    if(move_uploaded_file($file['tmp_name'], $targetfolder))
      {
      $nganu = new DataUpload($targetfolder,1);
      return $nganu;
      //Jalankan perintah insert ke database
      }
      else {
      $nganu = new DataUpload($targetfolder,0);
      return $nganu;
      }
    }
    else {
      return "Format Berbeda";
    }
  }
}

?>
