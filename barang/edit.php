<?php 
// include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_barang where id = '$id'");
	$data = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=barang';</script>";
}

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
			$query = mysqli_query($konek,"update tb_barang set id_kategori='$b',nama='$c',harga='$d',stok='$e',foto='$nama',detail='$f' where id='$a'");
			if($query){
				echo "<script>alert('Data terubah');window.location='?page=barang';</script>";
			}else{
				echo "<script>alert('Gagal terubah');</script>";
			}
		}
	}
 } ?>
 <div class="supir-aksi">
 	<form action="" method="post" enctype="multipart/form-data">
	 	<input type="hidden" name="id" class="data" value="<?php echo $data[0]; ?>" readonly><br>
		<label for="">Nama Produk</label><br>
		<input type="text" name="nama" class="data" value="<?php echo $data[2]; ?>"><br>
		<label for="">Kategori</label><br>
		<select name="kategori" class="data">
			<option value=""></option>
			<?php 
			$kategori = mysqli_query($konek,"select * from tb_kategori order by id asc");
			while($rs = mysqli_fetch_row($kategori)){
				echo "<option value='".$rs[0]."' ";?><?php if($rs[0]==$data[1]){ echo "selected"; } ?><?php echo ">".$rs[1]."</option>";
			} ?>
		</select><br>
		<label for="">Harga</label><br>
		<input type="text" class="data" name="harga" value="<?php echo $data[3]; ?>"><br>
		<label for="">Stok</label><br>
		<input type="number" class="data" name="stok" min="1" max="99999" value="<?php echo $data[4]; ?>"><br>
		<label for="">Detail</label><br>
		<textarea class="data" name="detail" id="" cols="30" rows="10"><?php echo $data[6];?></textarea>
		<label for="">Gambar</label><br>
		<input type="file" name="gambar" value="<?php echo $data[5]; ?>"><br>
		<input type="submit" class="tombol" name="oke" value="UBAH"><br>
	</form>
	<button onclick="window.location='?page=barang'" class="tombol">KEMBALI</button>
</div>