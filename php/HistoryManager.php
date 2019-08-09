<?php
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
    $sql = "SELECT * FROM history   WHERE keyuser = '$keyuser'";
    $result = $conn->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
    }
    if ($result->num_rows > 0) {
      $listhistory = [];
      while($row = $result->fetch_assoc()) {
          // $listhistory[] = ;
      }
      return $listhistory;
    }else {
      unset($_data);
      return null;
    }
  }

}
 ?>
