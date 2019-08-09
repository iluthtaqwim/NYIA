<?php
class User {
  public function __construct($name,$username,$pass,$keyuser,$jabatan,$last_login,$register,$status,$kat)
  {
    $this->nama = $name;
    $this->username = $username;
    $this->password = $pass;
    $this->keyuser = $keyuser;
    $this->jabatan = $jabatan;
    $this->last_login = $last_login;
    $this->register = $register;
    $this->status = $status;
    $this->kat = $kat;
  }

  public function name()
  {
    return $this->nama;
  }

  public function username(){
    return $this->username;
  }

  public function password(){
    return $this->password;
  }

  public function keyuser(){
    return $this->keyuser;
  }

  public function jabatan(){
    return $this->jabatan;
  }

  public function last_login(){
    return $this->last_login;
  }

  public function register(){
    return $this->register;
  }

  public function status()
  {
    return $this->status;
  }

  public function kat()
  {
    return $this->kat;
  }

}

class DataUser{

  public function CekUser($conn,$username,$pass){
    $sql = "SELECT * FROM user  WHERE username = '$username' AND password = '$pass' ";
    $result = $conn->query($sql);
    if (!$result) {
      trigger_error('Invalid query: ' . $conn->error);
    }

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $_data = new User($row["nama"],$row["username"],$row["password"],$row["keyuser"],$row["jabatan"],$row["last_login"],$row["register"],$row["status"],$row["kat"]);
          return $_data;
      }
    }else {
      unset($_data);
      return null;
    }
  }
}

?>
