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
		<div class="barang-data">
			<h2>Data Barang</h2>
				<table border="1">
					<tr>
						<th>ID</th>
						<th>Kategori</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Stok</th>
						<th></th>
					</tr>
					<?php 
					$query = mysqli_query($konek,"select tb_barang.*,tb_kategori.nama from tb_barang left join tb_kategori on id_kategori=tb_kategori.id order by tb_barang.id asc");
					if(mysqli_num_rows($query)==0){
						echo "<tr><td colspan=6>Tidak ada data</td></tr>";
					}else{
						while($rs = mysqli_fetch_row($query)){
							echo "<tr>
									<td>".$rs[0]."</td>
									<td>".$rs[7]."</td>
									<td>".$rs[2]."</td>
									<td>".$rs[3]."</td>
									<td>".$rs[4]."</td>
									<td><a href='?page=barang&action=ubah&id=".$rs[0]."'>EDIT</a> 
										<a href='?page=barang&action=hapus&id=".$rs[0]."' ";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
								<tr>";
						}
					}
					?>
				</table>
				<a href="?page=barang&action=tambah">TAMBAH DATA BARANG</a>
				<br><a href="barang/cetak.php" target="new_blank">CETAK</a>
		</div>
	<?php
} ?>