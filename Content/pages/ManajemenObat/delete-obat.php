<?php 
    include ("../../core/config.php");
    include ("../../core/OOP/medicine.php");

    $kode_obat = $_GET['kode_obat'];
    $medicine = new Medicine($connect);
    $medicine->delete_medicine($kode_obat);
    
?>