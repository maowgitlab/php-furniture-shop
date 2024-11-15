<?php 
// include '../data.php';
if($_SESSION['status']=="non master"){
	echo "<script>alert('Status Anda Tidak Memungkinkan Untuk Menambah atau Merubah Data');window.location='?page=karyawan';</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['tempat_lahir'];
	$d = $_POST['tanggal_lahir'];
	$e = $_POST['jenkel'];
	$f = date("Y-m-d");

	$query = mysqli_query($konek,"insert into tb_supir value('$a','$b','$c','$d','$e','$f')");
	if($query){
		echo "<script>alert('Data tersimpan');window.location='?page=supir';</script>";
	}else{
		echo "<script>alert('Gagal tersimpan');</script>";
	}
 }
 $getid = mysqli_query($konek,"select id from tb_supir order by id desc");
$rs = mysqli_fetch_row($getid);
$id = intval($rs[0])+1; ?>
 <div class="supir-aksi">
 	<form action="" method="post">
			<input type="hidden" class="data" name="id" value="<?php echo $id; ?>"><br>
			<label for="">Nama</label><br>
			<input type="text" class="data" name="nama"><br>
			<label for="">Tempat Lahir</label><br>
			<input type="text" class="data" name="tempat_lahir"><br>
			<label for="">Tanggal Lahir</label><br>
			<input type="date" class="data" name="tanggal_lahir"><br>
			<label for="">Jenis Kelamin</label><br>
			<select name="jenkel" class="data">
				<option value="" selected></option>
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select><br>
			<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=supir'" class="tombol">KEMBALI</button>
 </div>