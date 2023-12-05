<?php 
include '../../core/sidebar.php';
include '../../core/config.php';
?>      
      
<div class="container-fluid">
        <!--  Main Content -->
        <div class="row">
        <section class="ftco-section">
		<div class="container">
			<div class="row">
				<div style="margin-top: -100px" class="col-md-12">
					<a class="btn btn-success mb-4" href="add-obat.php"><i class="bi bi-plus-lg"></i> Tambah Obat</a>
					<div class="table-wrap">
						<table class="table" id="example">
						  <thead style="background-color:#9bbe64 !important;" class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
								  <th>No</th>
								  <!-- <th>Kode Obat</th> -->
						    	<th>Gambar</th>
								<th>Kategori</th>
								<th>Nama Obat</th>
								<!-- <th>Komposisi</th>
								<th>Deskripsi</th>
								<th>Kemasan</th>
								<th>Dosis</th>
								<th>Penyajian</th>
								<th>Cara Penyimpanan</th>
								<th>Nama Standar MIMS</th>
								<th>Nomor Izin Edar</th> -->
								<th>Produsen</th>
								<th>Golongan Obat</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Tanggal Diubah</th>
								<th>Tanggal Ditambahkan</th>
								<th>Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php
								$products = mysqli_query($connect,"SELECT data_obat.*,kategori_obat.nama_kategori, produsen.nama_produsen,  golongan_obat.nama_golongan_obat
								FROM data_obat
								INNER JOIN produsen ON data_obat.id_produsen_obat =produsen.kode_produsen
								INNER JOIN kategori_obat ON data_obat.id_kategori =kategori_obat.id_kategori
								INNER JOIN golongan_obat ON data_obat.id_golongan_obat = golongan_obat.id_golongan
                                ");
								$no = 1;								
								while($row = mysqli_fetch_assoc($products)) {
							?>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
									<td><?=$no++;?></td>
									<td><img class="img-thumbnail" src="data:image/jpeg;base64,<?=base64_encode ($row['gambar_obat']);?>" alt="Gambar Obat"></td>
									<td><?=$row['nama_kategori'];?></td>
									<td><?=$row['nama_obat'];?></td>
									<td><?=$row['nama_produsen'];?></td>
									<td><?=$row['nama_golongan_obat'];?></td>
									<td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
									<td><?=$row['stok'];?></td>
									<td><?=$row['tanggal_diubah'];?></td>
									<td><?=$row['tanggal_ditambahkan'];?></td>
									<td>
									<div class="dropdown">
										<button style="background-color: transparent; border: none" class="btn btn-danger" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i style="color: #9bbe64" class="bi bi-three-dots"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="edit-obat.php?kode_obat=<?=$row['kode_obat'];?>"><i style="margin-left: -15px"class="bi bi-pencil-square"></i> Ubah</a>
										
										<li><hr class="dropdown-divider"></li><button onclick="hapus('<?php echo $row['kode_obat']; ?>')" class="dropdown-item"><i style="margin-left: -15px" class="bi bi-trash"></i> Hapus</button>
										
										</div>
									</div>
									</td>
							<?php } ?>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include '../../core/footer.php'; ?>      

