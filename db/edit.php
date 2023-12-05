<?php 
// session_start();
// if ($_SESSION['role'] != 'admin') {
//     echo "
//     <script>
//     alert('Halaman ini hanya bisa di akses oleh admin');
//     window.location = '../profile.php';
//     </script>
//     ";
// }
include "config.php";
$kode_obat = $_GET['kode_obat'];
// $kode_obat = 'ob001';
// $query = mysqli_query($connect, "SELECT * FROM data_obat WHERE kode_obat='$kode_obat'");


if (isset($_POST['simpan'])) {
    $namaObat = $_POST['nama_obat'];
    $komposisi = $_POST['komposisi'];
    $deskripsi = $_POST['deskripsi'];
    $kemasan = $_POST['kemasan'];
    $dosis = $_POST['dosis'];
    $cara_penyajian = $_POST['id_penyajian_obat'];
    $cara_penyimpanan = $_POST['id_cara_penyimpanan'];
    $nama_standar_mims = $_POST['nama_standar_mims'];
    $nomor_izin_edar = $_POST['nomor_izin_edar'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['id_kategori'];
    $id_produsen = $_POST['id_produsen_obat'];
    $id_golongan_obat = $_POST['id_golongan_obat'];
    $gambar_obat = $_POST['gambar_obat'];

    $query = "UPDATE `data_obat` SET `nama_obat` = '$namaObat', `komposisi` = '$komposisi', `deskripsi` = '$deskripsi', 
              `kemasan` = '$kemasan', `dosis` = '$dosis', `nama_standar_mims` = '$nama_standar_mims', 
              `nomor_izin_edar` = '$nomor_izin_edar', `harga` = '$harga', `stok` = '$stok', 
              `gambar_obat` = '$gambar_obat', `id_produsen_obat` = $id_produsen, `id_kategori` = '$id_kategori', 
              `id_golongan_obat` = $id_golongan_obat, `id_penyajian_obat` = '$cara_penyajian', 
              `id_cara_penyimpanan` = '$cara_penyimpanan' WHERE `kode_obat` = '$kode_obat'";

    // Eksekusi query
    if (mysqli_query($connect, $query)) {
        echo "Data obat berhasil diubah.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // Tutup koneksi
    mysqli_close($connect);
}
?>