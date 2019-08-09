<?php
class History{
  public function __construct($no,$username,$pass,$ip,$date,$ket,$keyuser){
    $this->no = $no;
    $this->username = $username;
    $this->password = $pass;
    $this->ip = $ip;
    $this->date = $date;
    $this->ket = $ket;
    $this->keyuser = $keyuser;
  }

  public function no(){
    return $this->no;
  }

  public function username()[
    return $this->username;
  ]

  public function password(){
    return $this->password;
  }

  public function ip(){
    return $this->ip;
  }

  public function date(){
    return $this->date;
  }

  public function ket(){
    return $this->ket;
  }

  public function keyuser(){
    return $this->keyuser;
  }

}

class HistoryManager{

  function GetIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
  }

  function CekNulVal($value){
    if($value==null||$value==""){
      return "null";
    }else {
      return $value;
    }
  }

  public function AddHistory($conn,$username,$pass,$keterangan,$keyuser){
    $MyIp = $this->GetIp();
    $MyKeyuser = $this->CekNulVal($keyuser);
    $_username = $username;
    $_pass = $pass;
    $_keterangan = $keterangan;

    $sql = "INSERT INTO history (`username`, `pass`, `ip`, `ket`, `keyuser`) VALUES ('$_username','$_pass','$MyIp','$_keterangan','$MyKeyuser')";
    return !$conn->query($sql);
  }

  public function GetHistory($conn,$keyuser){
    $sql = "SELECT * FROM history WHERE keyuser = '$keyuser'";
    $result = $conn->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
    }
    if ($result->num_rows > 0) {
      $listhistory = [];
      while($row = $result->fetch_assoc()) {
           $listhistory[] = new History($row ["no"],$row ["username"],$row ["pass"],$row ["ip"],$row ["date"],$row ["ket"],$row ["keyuser"]);
      }
      return $listhistory;
    }else {
      unset($_data);
      return null;
    }
  }

}
 ?>
