<?php 
// include '../data.php';
if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['supir'];
	$c = $_POST['transaksi'];
	$d = $_POST['tgl'];
	$e = $_POST['alamat'];
	$f = 'Belum Terkirim';

	$query = mysqli_query($konek,"insert into tb_pengiriman value('$a','$b','$c','$d','$e','$f')");
	if($query){
		echo "<script>alert('Pengiriman sudah di Kirim');window.location='?page=pengiriman';</script>";
	}else{
		echo "<script>alert('Pengiriman gagal');</script>";
	}
 }
$getid = mysqli_query($konek,"select id from tb_pengiriman order by id desc");
$rs = mysqli_fetch_row($getid);
$id = intval($rs[0])+1; ?>
 <div class="pengiriman-aksi">
 	<form action="" method="post">
			<input type="hidden" class="data" name="id" value="<?php echo $id; ?>"><br>
			<label for="">Supir</label><br>
			<select name="supir" class="data">
				<option value="" selected></option>
				<?php 
				$getsupir = mysqli_query($konek,"select * from tb_supir order by id asc");
				while($supir = mysqli_fetch_row($getsupir)){
					echo "<option value='".$supir[0]."' >".$supir[1]."</option>";
				} ?>
			</select><br>
			<label for="">ID Transaksi</label><br>
			<select name="transaksi" class="data">
				<option value="" selected></option>
				<?php 
				$gettransaksi = mysqli_query($konek,"select * from tb_transaksi where id_karyawan not in (0) order by id asc");
				while($transaksi = mysqli_fetch_row($gettransaksi)){
					echo "<option value='".$transaksi[0]."' >".$transaksi[0]."</option>";
				} ?>
			</select><br>
			<label for="">Tanggal Pengiriman</label><br>
			<input type="date" class="data" name="tgl"><br>
			<label for="">Alamat Pengiriman</label><br>
			<textarea name="alamat" class="data" id="" cols="30" rows="10"></textarea>
			<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=pengiriman'" class="tombol">KEMBALI</button>
 </div>