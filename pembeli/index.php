<?php
if(isset($_GET['action'])){
	$aksi = $_GET['action'];
	switch($aksi){
		// case 'tambah':
		// 	include'tambah.php';
		// break;
		// case 'ubah':
		// 	include'edit.php';
		// break;
		case 'hapus':
			include'delete.php';
		break;
		default:
			echo "<script>window.location='index.php';</script>";
		break;
	}
}else{
	?>
		<div class="pembeli-data">
			<h2>Data Pembeli</h2>
			<table border="1">
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Password</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Tanggal Gabung</th>
				</tr>
				<?php 
				$query = mysqli_query($konek,"select * from tb_pembeli order by id asc");
				while($rs = mysqli_fetch_row($query)){
					echo "<tr>
							<td>".$rs[0]."</td>
							<td>".$rs[1]."</td>
							<td>".$rs[2]."</td>
							<td>".$rs[3]."</td>
							<td>".$rs[4]."</td>
							<td>".$rs[5]."</td>
							<td>".$rs[6]."</td>
							<td><a href='?page=pembeli&action=hapus&id=".$rs[0]."' ";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
						<tr>";
				} ?>
			</table>
			<!-- <a href="tambah.php">TAMBAH DATA PEMBELI</a> -->
			<br><a href="pembeli/cetak.php" target="new_blank">CETAK</a>
		</div>
	<?php
} ?>