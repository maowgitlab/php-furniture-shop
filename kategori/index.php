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
		<div class="kategori-data">
			<h2>Data Kategori</h2>
			<table border="1">
				<tr>
					<th>ID</th>
					<th>Kategori</th>
					<th>Barang</th>
				</tr>
				<?php 
				$query = mysqli_query($konek,"select tb_kategori.*,(select count(id_kategori) from tb_barang where id_kategori=tb_kategori.id) as barang from tb_kategori order by id asc");
				if(mysqli_num_rows($query)==0){
					echo "<tr><td colspan=3>Tidak ada data</td></tr>";
				}else{
					while($rs = mysqli_fetch_row($query)){
						echo "<tr>
								<td>".$rs[0]."</td>
								<td>".$rs[1]."</td>
								<td>".$rs[2]."</td>
								<td><a href='?page=kategori&action=ubah&id=".$rs[0]."'>EDIT</a> 
									<a href='?page=kategori&action=hapus&id=".$rs[0]."' ";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
							<tr>";
					}
				}
				?>
			</table>
			<a href="?page=kategori&action=tambah">TAMBAH KATEGORI</a>
			<br><a href="kategori/cetak.php" target="new_blank">CETAK</a>
		</div>
	<?php
} ?>
	