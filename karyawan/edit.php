<?php 
// include '../data.php';
if($_SESSION['status']=="non master"){
	echo "<script>alert('Status Anda Tidak Memungkinkan Untuk Menambah atau Merubah Data');window.location='?page=karyawan';</script>";
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_karyawan where id = '$id'");
	$rs = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=karyawan';</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['email'];
	$d = $_POST['password'];
	$e = $_POST['jenkel'];
	$f = $_POST['status'];

	$query = mysqli_query($konek,"update tb_karyawan set nama='$b',email='$c',password='$d',jenkel='$e',status='$f' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='?page=karyawan';</script>";
	}else{
		echo "<script>alert('Gagal terubah');</script>";
	}
 } ?>
<div class="karyawan-aksi">
	<form action="" method="post">
		<!-- <label for="">ID</label><br> -->
		<input type="hidden" class="data" name="id" value="<?php echo $rs[0]; ?>" readonly><br>
		<label for="">Nama</label><br>
		<input type="text" class="data" name="nama" value="<?php echo $rs[1]; ?>"><br>
		<label for="">Email</label><br>
		<input type="text" class="data" name="email" value="<?php echo $rs[2]; ?>"><br>
		<label for="">Password</label><br>
		<input type="text" class="data" name="password" value="<?php echo $rs[3]; ?>"><br>
		<label for="">Jenis Kelamin</label><br>
		<select class="data" name="jenkel">
			<option value=""></option>
			<option value="L" <?php if($rs[4]=="L"){ echo "selected"; } ?>>Laki-Laki</option>
			<option value="P" <?php if($rs[4]=="P"){ echo "selected"; } ?>>Perempuan</option>
		</select><br>
		<label for="">Status</label><br>
		<select class="data" name="status">
			<option value=""></option>
			<option value="master" <?php if($rs[5]=="master"){ echo "selected"; } ?>>MASTER</option>
			<option value="non master" <?php if($rs[5]=="non master"){ echo "selected"; } ?>>NON MASTER</option>
		</select><br>
		<input type="submit" class="tombol" name="oke" value="UBAH"><br>
	</form>
	<button onclick="window.location='?page=karyawan'" class="tombol">KEMBALI</button>
</div>