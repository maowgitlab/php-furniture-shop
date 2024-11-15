<?php 
// include '../data.php';

// if (isset($_GET['id'])) {
	$id = $_SESSION['id'];
	$query = mysqli_query($konek,"select * from tb_pembeli where id = '$id'");
	$rs = mysqli_fetch_row($query);
// }else{
// 	echo "<script>alert('Tidak ada data');window.location:'../pembeli';</script>";
// }

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['email'];
	$d = $_POST['password'];
	$e = $_POST['alamat'];
	$f = $_POST['jenkel'];

	$query = mysqli_query($konek,"update tb_pembeli set nama='$b',email='$c',password='$d',alamat='$e',jenkel='$f' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='?page';</script>";
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
		<label for="">Alamat</label><br>
		<textarea name="alamat" id="" class="data" cols="30" rows="10"><?php echo $rs[4]; ?></textarea>
		<label for="">Jenis Kelamin</label><br>
		<select class="data" name="jenkel">
			<option value=""></option>
			<option value="L" <?php if($rs[5]=="L"){ echo "selected"; } ?>>Laki-Laki</option>
			<option value="P" <?php if($rs[5]=="P"){ echo "selected"; } ?>>Perempuan</option>
		</select><br>
		<input type="submit" class="tombol" name="oke" value="UBAH"><br>
	</form>
	<button onclick="window.location='?page'" class="tombol">KEMBALI</button>
</div>