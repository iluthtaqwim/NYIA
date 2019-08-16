<?php
    function BuatKoneksi(){
  
        $koneksi_nama_host = "localhost";
        $koneksi_username_host = "root";
        $koneksi_password_host = "";
        $koneksi_nama_db_host = "ekabase";
        
        // $koneksi_nama_host = "localhost";
        // $koneksi_username_host = "u138673861_eka";
        // $koneksi_password_host = "Qwerty!2345";
        // $koneksi_nama_db_host = "u138673861_eka";

        return mysqli_connect($koneksi_nama_host,$koneksi_username_host,$koneksi_password_host,$koneksi_nama_db_host);
    }

    function TutupKoneksi($koneksi){
        mysqli_close($koneksi);
    }
?>
