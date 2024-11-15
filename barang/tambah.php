<?php 
// include '../data.php';
if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['kategori'];
	$c = $_POST['nama'];
	$d = $_POST['harga'];
	$e = $_POST['stok'];
	$f = $_POST['detail'];

	//Proses gambar
	$ekstensi_diperbolehkan = array('png','jpg');
	$nama = $_FILES['gambar']['name'];
	$x = explode('.',$nama);
	$ekstensi = strtolower(end($x));
	$ukuran = $_FILES['gambar']['size'];
	$file_tmp = $_FILES['gambar']['tmp_name'];

	if(in_array($ekstensi,$ekstensi_diperbolehkan)===true){
		if($ukuran < 1044070){
			move_uploaded_file($file_tmp, 'file/'.$nama);
			$query = mysqli_query($konek,"insert into tb_barang value('$a','$b','$c','$d','$e','$nama','$f')");
			if($query){
				echo "<script>alert('Data tersimpan');window.location='?page=barang';</script>";
			}else{
				echo "<script>alert('Gagal tersimpan');</script>";
			}
		}
	}
	
 }
 $getid = mysqli_query($konek,"select id from tb_barang order by id desc");
 $rs = mysqli_fetch_row($getid);
 $id = intval($rs[0])+1; ?>
 <div class="supir-aksi">
 	<form action="" method="post" enctype="multipart/form-data">
	 	<input type="hidden" class="data" name="id" value="<?php echo $id; ?>"><br>
		<label for="">Nama Produk</label><br>
		<input type="text" class="data" name="nama"><br>
		<label for="">Kategori</label><br>
		<select name="kategori" class="data">
			<option value="" selected></option>
			<?php 
			$kategori = mysqli_query($konek,"select * from tb_kategori order by id asc");
			while($rs = mysqli_fetch_row($kategori)){
				echo "<option value='".$rs[0]."' >".$rs[1]."</option>";
			} ?>
		</select><br>
		<label for="">Harga</label><br>
		<input type="text" name="harga" class="data"><br>
		<label for="">Stok</label><br>
		<input type="number" class="data" name="stok" min="1" max="99999"><br>
		<label for="">Detail</label><br>
		<textarea class="data" name="detail" id="" cols="30" rows="10"></textarea>
		<label for="">Gambar</label><br>
		<input type="file" name="gambar"><br>
		<input type="submit" class="tombol" name="oke" value="TAMBAH"><br>
	</form>
	<button onclick="window.location='?page=barang'" class="tombol">KEMBALI</button>
</div>