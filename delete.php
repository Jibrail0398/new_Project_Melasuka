<?php 
    require_once '../content/core/config.php';
    
    $kode_obat = $_GET['kode_obat'];
    
    mysqli_query($connect,"delete from data_obat where kode_obat='$kode_obat'");
    header("location: manajemenObat");
 
?>