<?php
if(isset($_GET['action'])){
	$aksi = $_GET['action'];
	switch($aksi){
		case 'tambah':
			include'tambah.php';
		break;
		case 'ubah':
			include'edit.php';
		break;
		case 'hapus':
			include'delete.php';
		break;
		default:
			echo "<script>window.location='index.php';</script>";
		break;
	}
}else{
	?>
		<div class="karyawan-data">
			<h2>Data Karyawan</h2>
			<table border=1>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Password</th>
					<th>Jenis Kelamin</th>
					<th>Status</th>
				</tr>
				<?php 
				$query = mysqli_query($konek,"select * from tb_karyawan where id > 0 order by id asc");
				if(mysqli_num_rows($query)==0){
					echo "<tr><td colspan=6>Tidak ada data</td></tr>";
				}else{
					while($rs = mysqli_fetch_row($query)){
						if($rs[4]=='L'){
							$jenis = "Laki-Laki";
						}else if($rs[4]=='P'){
							$jenis = "Perempuan";
						}
						echo "<tr>
								<td>".$rs[0]."</td>
								<td>".$rs[1]."</td>
								<td>".$rs[2]."</td>
								<td>".$rs[3]."</td>
								<td>".$jenis."</td>
								<td>".$rs[5]."</td>
								<td><a href='?page=karyawan&action=ubah&id=".$rs[0]."'>EDIT</a> 
									<a href='?page=karyawan&action=hapus&id=".$rs[0]."' ";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
							<tr>";
					}
				}
					?>
			</table>
			<a href="?page=karyawan&action=tambah">TAMBAH DATA KARYAWAN</a>
			<br><a href="karyawan/cetak.php" target="new_blank">CETAK</a>
		</div>
	<?php
} ?>