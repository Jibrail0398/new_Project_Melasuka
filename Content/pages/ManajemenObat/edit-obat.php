


<?php 
    include ("../../core/config.php");
    include ("../../core/OOP/medicine.php");
    $kode_obat = $_GET['kode_obat'];

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
        $gambar_obat = $_FILES['gambar_obat']['tmp_name'];
        $fileContent = file_get_contents($gambar_obat);
        $blob = base64_encode($fileContent);

        $medicine = new Medicine($connect);
        $medicine->edit_medicine($kode_obat,$namaObat,$komposisi,$deskripsi,$kemasan,$dosis,$nama_standar_mims,$nomor_izin_edar,$harga,$stok,$blob,$id_produsen,$id_kategori,$id_golongan_obat,$cara_penyajian,$cara_penyimpanan);

    }

    $products = mysqli_query($connect, "SELECT data_obat.*,kategori_obat.nama_kategori, cara_penyajian.cara_penyajian, produsen.nama_produsen, golongan_obat.nama_golongan_obat, cara_penyimpanan.cara_penyimpanan
    FROM data_obat
    INNER JOIN cara_penyajian ON data_obat.id_penyajian_obat =cara_penyajian.kode_penyajian
    INNER JOIN kategori_obat ON data_obat.id_kategori =kategori_obat.id_kategori
    INNER JOIN cara_penyimpanan ON data_obat.id_cara_penyimpanan = cara_penyimpanan.id_cara_penyimpanan
    INNER JOIN produsen ON data_obat.id_produsen_obat = produsen.kode_produsen
    INNER JOIN golongan_obat ON data_obat.id_golongan_obat = golongan_obat.id_golongan
    WHERE data_obat.kode_obat = '$kode_obat'");
    $no = 1;
    while($row = mysqli_fetch_assoc($products)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Gambar Obat</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="data:image/jpeg;base64,<?=base64_encode ($row['gambar_obat']);?>" alt="Gambar Obat"" alt="Gambar Obat">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <!-- <input class="btn btn-primary" type="submit" name=""> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail Obat</div>
                    <div class="card-body">
                            <!-- Form Group (username)-->
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="small mb-1" for="gambarObat">Gambar Obat</label>
                                <input class="form-control" name="gambar_obat" id="gambarObat" type="file" required>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="namaObat">Nama Obat</label>
                                <input class="form-control" id="namaObat" name="nama_obat" type="text" placeholder="Enter your username" value="<?php echo $row['nama_obat']; ?>">
                            </div>
                            <div class="mb-3">
                            <?php
                            //kategori obat
                            $kategori_obat = mysqli_query($connect, "SELECT * FROM kategori_obat");
                            $data_kategori = mysqli_fetch_all($kategori_obat, MYSQLI_ASSOC);
                            ?>
                            <label class="small mb-1" for="inputUsername">Kategori Obat</label>
                            <select name="id_kategori" class="form-control" required>
                                <?php foreach ($data_kategori as $kategori) : ?>
                                    <option value="<?= $kategori['id_kategori'] ?>" <?php if($row['id_kategori'] == $kategori['id_kategori']) { ?> selected="selected" <?php } ?>><?php echo $kategori['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label class="small mb-1" for="komposisi">Komposisi</label>
                            <input class="form-control" id="komposisi" name="komposisi" type="text" placeholder="Masukkan komposisi obat" value="<?php echo ($row['komposisi']) ? $row['komposisi'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" type="text" placeholder="Masukkan deskripsi obat"><?php echo $row['deskripsi']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="kemasan">Kemasan</label>
                                <input class="form-control" id="kemasan" name="kemasan" type="text" placeholder="Masukkan kemasan obat" value="<?php echo $row['kemasan']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="dosis">Dosis</label>
                                <input class="form-control" id="dosis" name="dosis" type="text" placeholder="Masukkan kemasan obat" value="<?php echo $row['dosis']; ?>">
                            </div>
                            <div class="mb-3">
                            <?php
                            $penyajian_obat = mysqli_query($connect, "SELECT * FROM cara_penyajian");
                            $data_penyajian = mysqli_fetch_all($penyajian_obat, MYSQLI_ASSOC);
                            ?>
                            <label class="small mb-1" for="inputUsername">Cara Penyajian</label>
                            <select name="id_penyajian_obat" class="form-control">
                                <?php foreach ($data_penyajian as $penyajian) : ?>
                                    <option value="<?= $penyajian['kode_penyajian'] ?>"><?php echo $penyajian['cara_penyajian']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <?php
                            $cara_penyimpanan = mysqli_query($connect, "SELECT * FROM cara_penyimpanan");
                            $data_penyimpanan = mysqli_fetch_all($cara_penyimpanan, MYSQLI_ASSOC);
                            ?>
                            <label class="small mb-1" for="inputUsername">Cara Penyimpanan</label>
                            <select name="id_cara_penyimpanan" class="form-control">
                                <?php foreach ($data_penyimpanan as $penyimpanan) : ?>
                                    <option value="<?= $penyimpanan['id_cara_penyimpanan'] ?>"><?php echo $penyimpanan['cara_penyimpanan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <?php
                            $produsen = mysqli_query($connect, "SELECT * FROM produsen");
                            $makers = mysqli_fetch_all($produsen, MYSQLI_ASSOC);
                            ?>
                            <label class="small mb-1" for="inputUsername">Produsen</label>
                            <select name="id_produsen_obat" class="form-control">
                                <?php foreach ($makers as $maker) : ?>
                                    <option value="<?= $maker['kode_produsen'] ?>"><?php echo $maker['nama_produsen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <?php
                            $golongan_obat = mysqli_query($connect, "SELECT * FROM golongan_obat");
                            $data_golongan_obat = mysqli_fetch_all($golongan_obat, MYSQLI_ASSOC);
                            ?>
                            <label class="small mb-1" for="inputUsername">Golongan Obat</label>
                            <select name="id_golongan_obat" class="form-control">
                                <?php foreach ($data_golongan_obat as $golongan) : ?>
                                    <option value="<?= $golongan['id_golongan'] ?>"><?php echo $golongan['nama_golongan_obat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="MIMS">Nama Standar MIMS</label>
                                <input class="form-control" id="MIMS" name="nama_standar_mims" type="text" placeholder="Masukan nama standar mims" value="<?php echo $row['nama_standar_mims']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="IzinEdar">Nomor Izin Edar</label>
                                <input class="form-control" id="IzinEdar" name="nomor_izin_edar" type="text" placeholder="Masukan nomor izin edar" value="<?php echo $row['nomor_izin_edar']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="Harga">Harga</label>
                                <input class="form-control" id="Harga" name="harga" type="number" placeholder="Masukan harga jual" value="<?php echo $row['harga']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="Stok">Stok</label>
                                <input class="form-control" id="Stok" name="stok" type="number" placeholder="Masukan stok obat" value="<?php echo $row['stok']; ?>">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>