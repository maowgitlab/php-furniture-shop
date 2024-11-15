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
		<div class="pengiriman-data">
			<h2>Data Pengiriman</h2>
			<table border="1">
				<tr>
					<th>ID</th>
					<th>Supir</th>
					<th>ID Transaksi</th>
					<th>Tanggal Pengiriman</th>
					<th>Alamat Pengiriman</th>
					<th>Status</th>
				</tr>
				<?php 
				$query = mysqli_query($konek,"select tb_pengiriman.*,tb_supir.nama from tb_pengiriman left join tb_supir on id_supir=tb_supir.id order by id asc");
				if(mysqli_num_rows($query)==0){
					echo "<tr><td colspan=6>Tidak ada data</td></tr>";
				}else{
					while($rs = mysqli_fetch_row($query)){
						echo "<tr>
								<td>".$rs[0]."</td>
								<td>".$rs[6]."</td>
								<td>".$rs[2]."</td>
								<td>".$rs[3]."</td>
								<td>".$rs[4]."</td>
								<td>".$rs[5]."</td>
								<td><a href='?page=pengiriman&action=ubah&id=".$rs[0]."'>EDIT</a> 
									<a href='?page=pengiriman&action=hapus&id=".$rs[0]."' ";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
							<tr>";
					}
				}
				?>
			</table>
			<a href="?page=pengiriman&action=tambah">SET PENGIRIMAN</a>
			<br><a href="pengiriman/cetak.php" target="new_blank">CETAK</a>
		</div>
	<?php
} ?>
	