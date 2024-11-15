<?php 
// include '../data.php';
if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['nama'];

	$query = mysqli_query($konek,"insert into tb_kategori value('$a','$b')");
	if($query){
		echo "<script>alert('Data tersimpan');window.location='?page=kategori';</script>";
	}else{
		echo "<script>alert('Gagal tersimpan');</script>";
	}
 }
 $getid = mysqli_query($konek,"select id from tb_kategori order by id desc");
$rs = mysqli_fetch_row($getid);
$id = intval($rs[0])+1; ?>
<div class="barang-aksi">
	<form action="" method="post">
			<input type="hidden" name="id" readonly value="<?php echo $id; ?>"><br>
			<label for="">Nama Kategori</label><br>
			<input type="text" class="data" name="nama"><br>
			<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=barang'" class="tombol">KEMBALI</button>
</div>