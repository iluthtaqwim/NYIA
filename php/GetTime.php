<?php
class TypeTime{
  const NAMEFILE = 'Y-m-d-h-i-s';
  const DATEDB = 'Ymd';
  const DATE = 'Y-m-d';
}

function GetTimeThis($typetime){
  date_default_timezone_set('Asia/Jakarta');
  $date = date($typetime, time());
  return $date;
}
 ?>
