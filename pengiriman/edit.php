<?php 
// include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_pengiriman where id = '$id'");
	$data = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='../pengiriman;</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['supir'];
	$c = $_POST['transaksi'];
	$d = $_POST['tgl'];
	$e = $_POST['alamat'];
	$f = $_POST['status'];

	$query = mysqli_query($konek,"update tb_pengiriman set id_supir='$b',id_transaksi='$c',tgl_pengiriman='$d',alamat_pengiriman='$e',status='$f' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='?page=pengiriman';</script>";
	}else{
		echo "<script>alert('Gagal terubah');</script>";
	}
 } ?>
 <div class="pengiriman-aksi">
 	<form action="" method="post">
			<input type="hidden" class="data" name="id" value="<?php echo $id; ?>"><br>
			<label for="">Supir</label><br>
			<select name="supir" class="data">
				<option value=""></option>
				<?php 
				$getsupir = mysqli_query($konek,"select * from tb_supir order by id asc");
				while($supir = mysqli_fetch_row($getsupir)){
					echo "<option value='".$supir[0]."' ";?><?php if($data[1]==$supir[0]){ echo "selected"; } ?><?php echo ">".$supir[1]."</option>";
				} ?>
			</select><br>
			<label for="">ID Transaksi</label><br>
			<input type="text" name="transaksi" readonly class="data" value="<?php echo $data[2]; ?>"><br>
			<label for="">Tanggal Pengiriman</label><br>
			<input type="date" class="data" name="tgl" value="<?php echo $data[3]; ?>"><br>
			<label for="">Alamat Pengiriman</label><br>
			<textarea name="alamat" class="data" id="" cols="30" rows="10"><?php echo $data[4]; ?></textarea>
			<label for="">Status</label><br>
			<select name="status" id="" class="data">
				<option value=""></option>
				<option value="Terkirim">Terkirim</option>
				<option value="Belum Terkirim" <?php if($data[5]=="Belum Terkirim"){ echo "selected"; } ?>>Belum Terkirim</option>
			</select><br>		
			<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=pengiriman'" class="tombol">KEMBALI</button>
 </div>