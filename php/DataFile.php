<?php
class DataLink{
  public function __construct($no,$link,$date){
    $this->no =$no;
    $this->link = $link;
    $this->date = $date;
  }
  public function GetNo(){
    return $this->no;
  }
  public function GetLink(){
    return $this->link;
  }
  public function GetDate(){
    return $this->date;
  }
}
class DataMessage{
  public function __construct($no,$date,$uploadby,$sendto,$value,$id_mess){
    $this->no =$no;
    $this->date = $date;
    $this->uploadby = $uploadby;
    $this->sendto = $sendto;
    $this->value = $value;
    $this->id_mess = $id_mess;
  }
  public function GetNo(){
    return $this->no;
  }
  public function GetDate(){
    return $this->date;
  }
  public function UploadBy(){
    return $this->uploadby;
  }
  public function SendTo(){
    return $this->sendto;
  }
  public function Value(){
    return $this->value;
  }
  public function IdMess(){
    return $this->id_mess;
  }
}
class DataManager{
  public function __construct($no,$date,$namedoc,$ketdoc,$tglcontrak,$linkconfrm,$status,$listData,$listMessage){
        $this->no = $no;
        $this->date = $date;
        $this->namedoc = $namedoc;
        $this->ketdok = $ketdoc;
        $this->tgl_contract = $tglcontrak;
        $this->linkconfrm = $linkconfrm;
        $this->status = $status;
        $this->listData = $listData;
        $this->listMessage = $listMessage;
  }
  public function GetNo(){
    return $this->no;
  }
  public function GetDate(){
    return $this->date;
  }

  public function GetNameDoc(){
    return $this->namedoc;
  }
  public function GetKeteranganDoc(){
    return $this->ketdok;
  }
  public function GetTanggalKontrak(){
    return $this->tgl_contract;
  }
  public function GetLinkConfirm(){
    return $this->linkconfrm;
  }
  public function GetStatus(){
    return $this->status;
  }
  public function GetListData(){
    return $this->listData;
  }
  public function GetMessage(){
    return $this->listMessage;
  }
}

class FilePerushaan{
  public function __construct($no,$date,$id_key_berkas,$id_key_jenis,$link_berkas,$status,$expired){
    $this->no =$no;
    $this->date = $date;
    $this->id_key_perusahaan =$id_key_perusahaan;
    $this->id_key_berkas =$id_key_berkas;
    $this->id_key_jenis =$id_key_jenis;
    $this->link_berkas =$link_berkas;
    $this->status =$status;
    $this->expired =$expired;
  }
  public function No(){
    return $this->no;
  }
  public function Date(){
    return $this->date;
  }
  public function IdKeyPerusahaan(){
    return $this->id_key_perusahaan;
  }
  public function IdKeyBerkas(){
    return $this->id_key_berkas;
  }
  public function JenisFile(){
    return $this->id_key_jenis;
  }
  public function LinkBerkas(){
    return $this->link_berkas;
  }
  public function Status(){
    return $this->status;
  }
  public function Expired(){
    return $this->expired;
  }
  public function isExpired(){
    $date = GetTime(TypeTime::DATE);
    $expir = $this->expired;
    if($date>$expir){
      return true;
    }else {
      return false;
    }
  }
}
class DataPerusahaan{
  public function __construct($no,$nama_perusahaan,$id_key_perusahaan,$status,$fileperushaan,$date){
    $this->no =$no;
    $this->nama_perusahaan =$nama_perusahaan;
    $this->id_key_perusahaan =$id_key_perusahaan;
    $this->status =$status;
    $this->fileperushaan =$fileperushaan;
    $this->date =$date;
  }
  public function ChekData(JENISFILE $jenisfile){
    $kan = $this->fileperushaan;
    $fungsi = array();
    foreach ($kan->JenisFile() as $value) {
      if($value==$jenisfile){
        $fungsi[] = new $value->isExpired();
      }
    }
    if (in_array(true, $fungsi->isExpired())) {
      return true;
    }else {
      return false;
    }
  }
  public function IsAdaKurangan($obj){
    $fungsi = array();
    $fungsi[] = $obj->ChekData(JENISFILE::AKTAPENDIRIAN);
    $fungsi[] = $obj->ChekData(JENISFILE::TDP);
    $fungsi[] = $obj->ChekData(JENISFILE::SIUP);
    $fungsi[] = $obj->ChekData(JENISFILE::NPWP);
    $fungsi[] = $obj->ChekData(JENISFILE::SPPKP);
    $fungsi[] = $obj->ChekData(JENISFILE::KTPDIREKTUR);

    if (in_array(true, $fungsi)) {
      return true;
    }else {
      return false;
    }
  }
  public function No(){
    return $this->no;
  }
  public function NamaPerusahaan(){
    return $this->nama_perusahaan;
  }
  public function IdKeyPerusahaan(){
    return $this->id_key_perusahaan;
  }
  public function Status(){
    return $this->status;
  }
  public function FilePerusahaan(){
    return $this->fileperushaan;
  }
  public function Date(){
    return $this->date;
  }
}
class DataFile{
  public function GetDataFiles($conn){
    $sql = "SELECT * FROM `data` ORDER BY `data`.`no` DESC";
    $result = $conn->query($sql);
    if (!$result) {
      return null;
    }else {
      $listdatas = array();
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          //Create link gambat
          // NOTE: elingono
          $link_file = array();
          $keyber = $row['link_id'];
          $sql_linkfile = "SELECT * FROM `data_link` WHERE `link_id` = '$keyber'";
          $result_file = $conn->query($sql_linkfile);
            if ($result_file->num_rows > 0) {
              while($row_file = $result_file->fetch_assoc()) {
                $link_file[] = new DataLink($row_file['no'],$row_file['link'],$row_file['date']);
              }
            }
          //Create link message
          // NOTE: elingono
          $link_message = array();
          $sql_message = "SELECT * FROM `message` WHERE `id_data` = '$keyber'";
          $result_message = $conn->query($sql_message);
            if ($result_message->num_rows > 0) {
              while($row_mess = $result_message->fetch_assoc()) {
                $link_message[]  = new DataMessage($row_mess['no'],$row_mess['tgl'],$row_mess['upload_by'],$row_mess['send_to'],$row_mess['value'],$row_mess['id_message']);
              }
            }

          $listdatas[] = new DataManager($row['no'],$row['date'],$row['name_doc'],$row['ket_doc'],$row['tgl_contract'],$row['link_con'],$row['status'],$link_file,$link_message);
        }
        return $listdatas;
      }else {
        return null;
      }
    }
  }
  public function SendMessage($conn,$user,$value,$idok){
    $idmess=0;
    $send_to="Sales";
    $usere = $user->keyuser();
    $sql = "INSERT INTO
    `message`(`upload_by`, `send_to`, `value`, `id_data`, `id_message`)
    VALUES ('$usere','$send_to','$value','$idok',$idmess)";
    $result = $conn->query($sql);
    if (!$result)
    {
    echo("Error description: " . mysqli_error($conn));
    }

  }
  public function AddNodin($conn,User $user,$namedoc,$ketdoc,$tglcat,$link){
    $status_doc = 0;
    $send_to = "Legal";
    $link_confirm = "notset";
    $sql_counting = "SELECT COUNT(*) FROM data";
    $fid_result = $conn->query($sql_counting);
    $finfo = mysqli_fetch_assoc($fid_result);
    $totalrow = $finfo['COUNT(*)'];
    $link_id_create = "key%500%".$user->username()."%500%".$totalrow;
    $sql = "INSERT INTO
    `data`(`link_id`, `upload_by`, `send_to`, `name_doc`, `ket_doc`, `tgl_contract`, `link_con`, `status`)
    VALUES ('$link_id_create', '$user->keyuser', '$send_to', '$namedoc', '$ketdoc',STR_TO_DATE($tglcat, '%Y%m%d') , '$link_confirm', $status_doc)";
    $result = $conn->query($sql);
    if (!$result) {
      return false;
    }else {
      $inlink = $link->GetLink();
      $sql_newLink = "INSERT INTO `data_link`(`link_id`, `link`) VALUES ('$link_id_create','$inlink')";
      $resulte = $conn->query($sql_newLink);
      if (!$resulte) {
        return false;
      }else {
        return true;
      }
    }
  }
  public function LampiranBaru($conn,$idok,$link){
    $inlink = $link->GetLink();
    $sql = "UPDATE `data` SET `status`=0 WHERE `link_id` = '$idok'";
    $resultex = $conn->query($sql);
    $sql_newLink = "INSERT INTO `data_link`(`link_id`, `link`) VALUES ('$idok','$inlink')";
    $resulte = $conn->query($sql_newLink);
    if (!$resulte) {
      return false;
    }else {
      return true;
    }
  }
  public function DataDiterima($conn,$idok){
    $sql = "UPDATE `data` SET `status`=2 WHERE `link_id` = '$idok'";
    $resulte = $conn->query($sql_newLink);
    if (!$resulte) {
      return false;
    }else {
      return true;
    }
  }
  public function DataDitolak($conn,$user,$idok,$alasan){
    $this->SendMessage($conn,$user,$alasan,$idok);
    $sql = "UPDATE `data` SET `status`=1 WHERE `link_id` = '$idok'";
    $resulte = $conn->query($sql);
    if (!$resulte) {
      return false;
    }else {
      return true;
    }
  }
  public function AddDataPerusahaan($conn,$nama_perusahaan){
    $sql_counting = "SELECT COUNT(*) FROM data_perusahaan";
    $fid_result = $conn->query($sql_counting);
    $finfo = mysqli_fetch_assoc($fid_result);
    $totalrow = $finfo['COUNT(*)'];
    $id_create = "VENDOR".$totalrow;
    $sqlw = "INSERT INTO `data_perusahaan`
    (`nama_perusahaan`, `id_key_perusahaan`, `statsus`)
    VALUES ('$nama_perusahaan','$id_create','1')";
    $resulte = $conn->query($sqlw);
    if (!$resulte) {
      return false;
    }else {
      return true;
    }
  }
  public function AddBerkasPerusahaan($conn,$id_key_perusahaan,JENISFILE $id_key_jenis,$link,$expired){
    $sql_counting = "SELECT COUNT(*) FROM data_berkas";
    $fid_result = $conn->query($sql_counting);
    $finfo = mysqli_fetch_assoc($fid_result);
    $totalrow = $finfo['COUNT(*)'];
    $id_create = "BERKAS".$totalrow;
    $sql = "INSERT INTO `data_berkas`
    (`id_key_perusahaan`, `id_key_berkas`, `id_key_jenis`, `link_berkas`, `status`, `expired`)
    VALUES ('$id_key_perusahaan','$id_create','$id_key_jenis','$link',1,STR_TO_DATE($expired, '%Y%m%d'))";

    $resulte = $conn->query($sql);
    if (!$resulte) {
      return false;
    }else {
      return true;
    }
  }
  public function GetBerkasPerusahaan($conn){
    $sql = "SELECT * FROM `data_perusahaan` ORDER BY `no` DESC";
    $result = $conn->query($sql);
    $listdatas = array();
    if (!$result) {
      return $listdatas;
    }else {
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $link_file = array();
          $keyber = $row['id_key_perusahaan'];
          $sql_linkfile = "SELECT * FROM `data_berkas` WHERE `id_key_perusahaan` = '$keyber'";
          $result_file = $conn->query($sql_linkfile);
            if ($result_file->num_rows > 0) {
              while($row_file = $result_file->fetch_assoc()) {
                //$no,$date,$id_key_berkas,$id_key_jenis,$link_berkas,$status,$expired
                $link_file[] = new FilePerushaan($row_file['no'],$row_file['date'],$row_file['id_key_berkas'],$row_file['id_key_jenis'],$row_file['link_berkas'],$row_file['status'],$row_file['expired']);
              }
            }
            //$no,$nama_perusahaan,$id_key_perusahaan,$status,$fileperushaan
          $listdatas[] = new DataPerusahaan($row['no'],$row['nama_perusahaan'],$row['id_key_perusahaan'],$row['statsus'],$link_file,$row['date']);
        }
        return $listdatas;
      }else {
        return $listdatas;
      }
    }
  }
}
 ?>
