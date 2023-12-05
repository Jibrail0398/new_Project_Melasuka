<!doctype html>
<html lang="en">
  <head>
  	<title>Table 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
					<h2 class="heading-section">Table #06</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3 class="h5 mb-4 text-center"></h3>
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>
						    	<th>&nbsp;</th>
								<th>No</th>
						    	<th>Gambar</th>
						    	<th>Kode Obat</th>
								<th>Kategori</th>
								<th>Nama Obat</th>
								<th>Komposisi</th>
								<th>Deskripsi</th>
								<th>Kemasan</th>
								<th>Dosis</th>
								<th>Penyajian</th>
								<th>Cara Penyimpanan</th>
								<th>Nama Standar MIMS</th>
								<th>Nomor Izin Edar</th>
								<th>Produsen</th>
								<th>Golongan Obat</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Gambar Obat</th>
								<th>Tanggal Diubah</th>
								<th>Tanggal Ditambahkan</th>
								<th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
							<?php
								require './config/db.php';
						  
				
								$products = mysqli_query($db_connect,"SELECT * FROM products");
								$no = 1;
								$root = "http://localhost:41062/www";
								while($row = mysqli_fetch_assoc($products)) {
							?>
						    <tr class="alert" role="alert">
						    	<td>
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox" checked>
										  <span class="checkmark"></span>
										</label>
						    	</td>
								
								<tr>
									<td><?=$no++;?></td>
									<td><?=$row['name'];?></td>
									<td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
									<!-- <td><img src="<?=$row['image'];?>" width="100"></td> -->
									<td><a class="btn btn-info" href="<?=$root.$row['image'];?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a></td>
									<td>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Edit
									</button>
										<!-- <a class="btn btn-warning" href="backend/edit.php?id=<?=$row['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> -->
										<button onclick="hapus(<?php echo $row['id']; ?>)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
				
									</td>
								</tr>
							<?php } ?>
						    </tr>

						    <tr class="alert" role="alert">
						    	<td class="border-bottom-0">
						    		<label class="checkbox-wrap checkbox-primary">
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
						    	</td>
						    	<td class="border-bottom-0">
						    		<div class="img" style="background-image: url(images/product-1.png);"></div>
						    	</td>
						      <td class="border-bottom-0">
						      	<div class="email">
						      		<span>Sneakers Shoes 2020 For Men </span>
						      		<span>Fugiat voluptates quasi nemo, ipsa perferendis</span>
						      	</div>
						      </td>
						      <td class="border-bottom-0">$40.00</td>
						      <td class="quantity border-bottom-0">
					        	<div class="input-group">
				             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
				          	</div>
				          </td>
				          <td class="border-bottom-0">$40.00</td>
						      <td class="border-bottom-0">
						      	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				            	<span aria-hidden="true"><i class="fa fa-close"></i></span>
				          	</button>
				        	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

