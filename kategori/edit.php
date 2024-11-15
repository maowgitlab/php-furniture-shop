<?php 
// include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_kategori where id = '$id'");
	$data = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=kategori';</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];

	$query = mysqli_query($konek,"update tb_kategori set nama='$b' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='?page=kategori';</script>";
	}else{
		echo "<script>alert('Gagal terubah');</script>";
	}
 } ?><div class="barang-aksi">
 <form action="" method="post">
		 <input type="hidden" name="id" readonly value="<?php echo $data[0]; ?>"><br>
		 <label for="">Nama Kategori</label><br>
		 <input type="text" class="data" name="nama" value="<?php echo $data[1]; ?>"><br>
		 <input type="submit" class="tombol" name="oke" value="UBAH"><br>
 </form>
 <button onclick="window.location='?page=barang'" class="tombol">KEMBALI</button>
</div>