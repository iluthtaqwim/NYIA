<?php
    function BuatKoneksi(){
        //Variabel koneksi
        $koneksi_nama_host = "localhost";
        $koneksi_username_host = "root";
        $koneksi_password_host = "";
        $koneksi_nama_db_host = "ekabase";

        return mysqli_connect($koneksi_nama_host,$koneksi_username_host,$koneksi_password_host,$koneksi_nama_db_host);
    }

    function TutupKoneksi($koneksi){
        mysqli_close($koneksi);
    }
?>
