<?php 
    class Medicine{
        
            public $join_query;
            public function __construct($connect){
                $this->connect = $connect;
            }

            //Tambah Obat
            public function add_medicine($kode_obat,$namaObat,$komposisi,$deskripsi,$kemasan,$dosis,$nama_standar_mims,$nomor_izin_edar,$harga,$stok,$gambar_obat,$id_produsen,$id_kategori,$id_golongan_obat,$cara_penyajian,$cara_penyimpanan){
                $query = "INSERT INTO `data_obat`(`kode_obat`, `nama_obat`, `komposisi`, `deskripsi`, `kemasan`, `dosis`, `nama_standar_mims`, `nomor_izin_edar`, `harga`, `stok`, `gambar_obat`,`tanggal_ditambahkan`, `id_produsen_obat`, `id_kategori`, `id_golongan_obat`, `id_penyajian_obat`, `id_cara_penyimpanan`) VALUES ('$kode_obat','$namaObat','$komposisi','$deskripsi','$kemasan','$dosis','$nama_standar_mims','$nomor_izin_edar',$harga,'$stok','$gambar_obat',CURRENT_TIMESTAMP(),$id_produsen,$id_kategori,$id_golongan_obat,$cara_penyajian,$cara_penyimpanan)";

                if (mysqli_query($this->connect, $query)) {
                    echo '
                    <script>
                    alert("Data Berhasil Ditambahkan")
                    window.location = "ManajemenObat"
                    </script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
                }
            }

            public function delete_medicine($kode_obat){
                $query = "delete from data_obat where kode_obat='$kode_obat'";
                if (mysqli_query($this->connect, $query)) {
                    echo '
                    <script>
                    alert("Data Berhasil Dihapus")
                    window.location = "ManajemenObat"
                    </script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
                } 
            }
            public function edit_medicine($kode_obat,$namaObat,$komposisi,$deskripsi,$kemasan,$dosis,$nama_standar_mims,$nomor_izin_edar,$harga,$stok,$blob,$id_produsen,$id_kategori,$id_golongan_obat,$cara_penyajian,$cara_penyimpanan){
                $query = "UPDATE `data_obat` SET `nama_obat` = '$namaObat', `komposisi` = '$komposisi', `deskripsi` = '$deskripsi', `kemasan` = '$kemasan', `dosis` = '$dosis', `nama_standar_mims` = '$nama_standar_mims', `nomor_izin_edar` = '$nomor_izin_edar', `harga` = '$harga', `stok` = '$stok', `gambar_obat` = '$blob', `tanggal_diubah` = CURRENT_TIMESTAMP(), `id_produsen_obat` = $id_produsen, `id_kategori` = '$id_kategori', `id_golongan_obat` = $id_golongan_obat, `id_penyajian_obat` = '$cara_penyajian', `id_cara_penyimpanan` = '$cara_penyimpanan' WHERE `kode_obat` = '$kode_obat'";

            if (mysqli_query($this->connect, $query)) {
                echo '
                <script>
                alert("Data Berhasil Diubah")
                window.location = "ManajemenObat"
                </script>';
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
            }       
        }
    }
?>