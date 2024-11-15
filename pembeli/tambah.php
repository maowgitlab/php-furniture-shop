<?php 
// include '../data.php';
if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];
	$c = $_POST['email'];
	$d = $_POST['password'];
	$e = $_POST['alamat'];
	$f = $_POST['jenkel'];
	$g = date('Y-m-d');

	$query = mysqli_query($konek,"insert into tb_pembeli value('$a','$b','$c','$d','$e','$f','$g')");
	if($query){
		echo "<script>alert('Berhasil Membuat Akun Baru');window.location='?page=log-pembeli';</script>";
	}else{
		echo "<script>alert('Gagal Membuat Akun Baru');</script>";
	}
 }
 $getid = mysqli_query($konek,"select id from tb_pembeli order by id desc");
 $rs = mysqli_fetch_row($getid);
 $id = intval($rs[0])+1;
  ?>
 <div class="register">
	 <h2>BUAT AKUN BARU</h2>
	 <form action="" method="post">
		 <input type="hidden" class="data" name="id" value="<?php echo $id; ?>" readonly><br>
		 <label for="">Nama</label><br>
		 <input type="text" class="data" name="nama"><br>
		 <label for="">Email</label><br>
		 <input type="text" class="data" name="email"><br>
		 <label for="">Password</label><br>
		 <input type="password" class="data" name="password"><br>
		 <label for="">Alamat</label><br>
		 <textarea name="alamat" class="data" id="" cols="30" rows="10"></textarea><br>
		 <label for="">Jenis Kelamin</label><br>
		 <select class="data" name="jenkel">
			 <option value="" selected></option>
			 <option value="L">Laki-Laki</option>
			 <option value="P">Perempuan</option>
		 </select><br>
		 <input type="submit" class="tombol" name="oke" value="REGISTER"><br>
	 </form>
	 <button onclick="window.location='?page=log-pembeli'" class="tombol">KEMBALI</button>
 </div>