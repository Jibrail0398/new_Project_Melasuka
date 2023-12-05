<?php 
include '../../core/sidebar.php';
include '../../core/config.php';

if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $role = $_POST['role'];

    $query = mysqli_query($connect,'UPDATE `data_users` SET `role`= "$role" WHERE id_data_user = $id_user');
}
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
						    	<th>Foto Profil</th>
								<th>Nama</th>
                                <th>Email</th>
								<th>Nomor Telepon</th>
								<th>Tanggal Lahir</th>
								<th>Jenis Kelamin</th>
								<th>Role</th>
								<th>Tanggal Diubah</th>
								<th>Tanggal Daftar</th>
								<th>Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php
								$user = mysqli_query($connect,"SELECT * FROM data_users");
								$no = 1;								
								while($row = mysqli_fetch_assoc($user)) {
							?>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
									<td><?=$no++;?></td>
									<td><img class="img-thumbnail" src="data:image/jpeg;base64,<?=base64_encode ($row['foto_profil']);?>" alt="Gambar Obat"></td>
									<td><?=$row['name'];?></td>
									<td><?=$row['email_user'];?></td>
									<td><?=$row['nomor_telepon'];?></td>
									<td><?=$row['tanggal_lahir'];?></td>
									<td><?=$row['jenis_kelamin'];?></td>
									<td><?=$row['role'];?></td>
									<td><?=$row['tanggal_diubah'];?></td>
									<td><?=$row['tanggal_daftar'];?></td>
									<td>
									<div class="dropdown">
										<button style="background-color: transparent; border: none" class="btn btn-danger" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i style="color: #9bbe64" class="bi bi-three-dots"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<!-- <a class="dropdown-item" href="edit-obat.php?kode_obat=<?=$row['kode_obat'];?>"><i style="margin-left: -15px"class="bi bi-pencil-square"></i> Ubah</a> -->
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i style="margin-left: -15px"class="bi bi-pencil-square"></i> Ubah</button>										
										<li><hr class="dropdown-divider"></li><button onclick="hapus('<?php echo $row['id_data_user']; ?>')" class="dropdown-item"><i style="margin-left: -15px" class="bi bi-trash"></i> Hapus</button>									
										</div>    
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header"> 
                                            <h4 class="fs-5 mb-0">Ubah Peran</h4>                               
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                <div class="mb-3">                                                    
                                                <?php
                                                 $role = mysqli_query($connect, "SELECT role FROM data_users");
                                                 $data_role = mysqli_fetch_all($role, MYSQLI_ASSOC);
                                                foreach ($data_role as $role_item) : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="<?= $role_item['role'] ?>">
                                                    <label class="form-check-label">
                                                        <?= $role_item['role'] ?>
                                                    </label>
                                                </div>
                                                <?php endforeach; ?>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" name="simpan" class="btn btn-success">Simpan</button>
                                            </div>
                                            </div>
                                        </div>
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

