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
		case 'konfirmasi':
			include'konfirmasi.php';
		break;
		default:
			echo "<script>window.location='index.php';</script>";
		break;
	}
}else{
	?>
		<div class="transaksi-data">
			<h2>Data Transaksi</h2>
			<table border="1">
				<tr>
					<th>ID</th>
					<th>Pembeli</th>
					<th>Karyawan</th>
					<th>Barang</th>
					<th>Quantity</th>
					<th>Total Harga</th>
					<th>Tanggal Beli</th>
					<th>Status</th>
				</tr>
				<?php 
				if(isset($_SESSION['status'])){
					$query = mysqli_query($konek,"select tb_transaksi.*,tb_pembeli.nama,tb_karyawan.nama,tb_barang.nama from tb_transaksi left join tb_pembeli on id_pembeli=tb_pembeli.id left join tb_karyawan on id_karyawan=tb_karyawan.id left join tb_barang on id_barang=tb_barang.id order by tgl_beli desc");
				}elseif(isset($_SESSION['id'])){
					$idPembeli = $_SESSION['id'];
					$query = mysqli_query($konek,"select tb_transaksi.*,tb_pembeli.nama,tb_karyawan.nama,tb_barang.nama from tb_transaksi left join tb_pembeli on id_pembeli=tb_pembeli.id left join tb_karyawan on id_karyawan=tb_karyawan.id left join tb_barang on id_barang=tb_barang.id where id_pembeli='$idPembeli' order by tgl_beli desc");
				}
				if(mysqli_num_rows($query)==0){
					echo "<tr><td colspan=8>Tidak ada data</td></tr>";
				}else{
					if(isset($_SESSION['status'])){
						while($rs = mysqli_fetch_row($query)){
							if($rs[2]==0){
								$karyawan = "";
							}else{
								$karyawan = $rs[9];
							}
							echo "<tr>
									<td>".$rs[0]."</td>
									<td>".$rs[8]."</td>
									<td>".$karyawan."</td>
									<td>".$rs[10]."</td>
									<td>".$rs[4]."</td>
									<td>".$rs[5]."</td>
									<td>".$rs[6]."</td>
									<td>"?><?php if($rs[7]==0){ echo "<a href='?page=transaksi&action=konfirmasi&id=".$rs[0]."'>KONFIRMASI</a> "; }else if($rs[7]==1){ echo "TERKONFIRMASI"; } ?><?php echo"</td>
									<td><a href='?page=transaksi&action=hapus&id=".$rs[0]."&id_barang=".$rs[3]."&stok=".$rs[4]."'";?>onclick="return confirm('Apakah data ingin di hapus?')"<?php echo ">DELETE</a></td>
								</tr>";
						}
					}elseif(isset($_SESSION['id'])){
						while($rs = mysqli_fetch_row($query)){
							if($rs[2]==0){
								$karyawan = "";
							}else{
								$karyawan = $rs[9];
							}
							echo "<tr>
									<td>".$rs[0]."</td>
									<td>".$rs[8]."</td>
									<td>".$karyawan."</td>
									<td>".$rs[10]."</td>
									<td>".$rs[4]."</td>
									<td>".$rs[5]."</td>
									<td>".$rs[6]."</td>
									<td>"?><?php if($rs[7]==1){ echo "TERKONFIRMASI "; }else if($rs[7]==0){ echo "BELUM DIKONFIRMASI"; } ?><?php echo"</td>
									<td><a href='?page=transaksi&action=hapus&id=".$rs[0]."&id_barang=".$rs[3]."&stok=".$rs[4]."' ";?>onclick="return confirm('Apakah ingin di batal ?')"<?php echo ">BATAL PEMESANAN</a></td>
								</tr>";
						}
					}
				}
				?>
			</table>
			<?php if(isset($_SESSION['status'])){ ?><br><a href="transaksi/cetak.php" target="new_blank">CETAK</a> <?php } ?>
		</div>
	<?php
} ?>