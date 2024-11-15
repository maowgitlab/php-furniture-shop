<?php 
if($_SESSION['status']=="non master"){
	echo "<script>alert('Status Anda Tidak Memungkinkan Untuk Menambah atau Merubah Data');window.location='?page=karyawan';</script>";
}

// include '../data.php';
if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['email'];
	$d = $_POST['password'];
	$e = $_POST['jenkel'];
	$f = $_POST['status'];

	$query = mysqli_query($konek,"insert into tb_karyawan value('$a','$b','$c','$d','$e','$f')");
	if($query){
		echo "<script>alert('Data tersimpan');window.location='?page=karyawan';</script>";
	}else{
		echo "<script>alert('Gagal tersimpan');</script>";
	}
}
 
$getid = mysqli_query($konek,"select id from tb_karyawan order by id desc");
$rs = mysqli_fetch_row($getid);
$id = intval($rs[0])+1;
 ?>
<div class="karyawan-aksi">
	<form action="" method="post">
		<input type="hidden" class="data" name="id" value="<?php echo $id; ?>" readonly><br>
		<label for="">Nama</label><br>
		<input type="text" class="data" name="nama"><br>
		<label for="">Email</label><br>
		<input type="text" class="data" name="email"><br>
		<label for="">Password</label><br>
		<input type="password" class="data" name="password"><br>
		<label for="">Jenis Kelamin</label><br>
		<select class="data" name="jenkel">
			<option value="" selected></option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
		</select><br>
		<label for="">Status</label><br>
		<select class="data" name="status">
			<option value="" selected></option>
			<option value="master">MASTER</option>
			<option value="non master">NON MASTER</option>
		</select><br>
		<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=karyawan'" class="tombol">KEMBALI</button>
</div>