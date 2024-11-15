<?php 
// include '../data.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_barang where id = '$id'");
	$data = mysqli_fetch_row($query);
	$stok = $data[4];
	if($stok==0){
		echo "<script>alert('Stok habis');window.location='?page';</script>";
	}
}else{
	echo "<script>alert('Tidak ada data');window.location='?page';</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['pembeli'];
	$c = "";
	$d = $_POST['barang'];
	$e = $_POST['quantity'];
	$f = $_POST['total'];
	$g = date('Y-m-d');
	$h = "0";

	if($e>$data[4]){
		echo "<script>alert('Jumlah yang di Beli melebihi stok');</script>";
	}else{
		$sisa_stok = intval($data[4])-intval($e);
		mysqli_query($konek,"update tb_barang set stok='$sisa_stok' where id = '$data[0]'");
		$query = mysqli_query($konek,"insert into tb_transaksi value('$a','$b','$c','$d','$e','$f','$g','$h')");
		if($query){
			echo "<script>alert('Permintaan Berhasil di Kirim');window.location='?page';</script>";
		}else{
			echo "<script>alert('Gagal Terkirim');</script>";
		}
	}
 }
$getid = mysqli_query($konek,"select id from tb_transaksi order by id desc");
$rs = mysqli_fetch_row($getid);
$exe = intval($rs[0])+1;?>
 <div class="pembelian">
 <script>
	function hitung(){
		var a = document.getElementById("harga").value;
		var b = document.getElementById("quantity").value;
		var c = a * b;
		document.getElementById("total").value = c;
	}
 </script>
 	<h2>Transaksi</h2>
 	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $exe; ?>"><br>
		<label for="">Pembeli</label><br>
		<input type="hidden" name="pembeli" value="<?php echo $_SESSION['id']; ?>">
		<input type="text" class="data" value="<?php echo $_SESSION['nama']; ?>" readonly><br>
		<label for="">Barang</label><br>
		<input type="hidden" name="barang" value="<?php echo $data[0]; ?>">
		<input type="text" class="data" value="<?php echo $data[2]; ?>" readonly><br>
		<label for="">Jumlah Item (stok : <?php echo $data[4]; ?>)</label><br>
 		<input type="hidden" name="harga" id="harga" value="<?php echo $data[3]; ?>">
		<input type="number" onkeyup="hitung()" onclick="hitung()" name="quantity" id="quantity" class="data" min="0" max="99999" value="0"><br>
		<label for="">Total Harga</label><br>
		<input type="text" class="data" name="total" readonly id="total"><br>
		<input type="submit" name="oke" class="tombol" value="TAMBAH"><br>
	</form>
	<button class="tombol" onclick="window.location='?page'">KEMBALI</button>
 </div>