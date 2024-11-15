<?php 
// include '../data.php';
if($_SESSION['status']=="non master"){
	echo "<script>alert('Status Anda Tidak Memungkinkan Untuk Menambah atau Merubah Data');window.location='?page=karyawan';</script>";
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_supir where id = '$id'");
	$rs = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=supir';</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['tempat_lahir'];
	$d = $_POST['tanggal_lahir'];
	$e = $_POST['jenkel'];

	$query = mysqli_query($konek,"update tb_supir set nama='$b',tempat_lhr='$c',tgl_lhr='$d',jenkel='$e' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='?page=supir';</script>";
	}else{
		echo "<script>alert('Gagal terubah');</script>";
	}
 } ?>
<div class="supir-aksi">
	<form action="" method="post">
		<input type="hidden" class="data" name="id" value="<?php echo $rs[0]; ?>" readonly><br>
		<label for="">Nama</label><br>
		<input type="text" class="data" name="nama" value="<?php echo $rs[1]; ?>"><br>
		<label for="">Tempat Lahir</label><br>
		<input type="text" class="data" name="tempat_lahir" value="<?php echo $rs[2]; ?>"><br>
		<label for="">Tanggal Lahir</label><br>
		<input type="text" class="data" name="tanggal_lahir" value="<?php echo $rs[3]; ?>"><br>
		<label for="">Jenis Kelamin</label><br>
		<select class="data" name="jenkel">
			<option value=""></option>
			<option value="L" <?php if($rs[4]=="L"){ echo "selected"; } ?>>Laki-Laki</option>
			<option value="P" <?php if($rs[4]=="P"){ echo "selected"; } ?>>Perempuan</option>
		</select><br>
		<input type="submit" class="tombol" name="oke" value="UBAH"><br>
	</form>
	<button onclick="window.location='?page=supir'" class="tombol">KEMBALI</button>
</div>