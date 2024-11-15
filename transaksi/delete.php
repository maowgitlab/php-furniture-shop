<?php 
// include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$barang = $_GET['id_barang'];
	$quantity = $_GET['stok'];
	$getstok = mysqli_query($konek,"select * from tb_barang where id='$barang'");
	$exe = mysqli_fetch_array($getstok);
	$stok = intval($exe[4])+$quantity;
	mysqli_query($konek,"update tb_barang set stok='$stok' where id='$barang'");
	$query = mysqli_query($konek,"delete from tb_transaksi where id = '$id'");
	if($query){
		echo "<script>alert('Pesanan di batalkan');window.location='?page=transaksi';</script>";
	}else{
		echo "<script>alert('Pesanan Gagal di batalkan');window.location='?page=transaksi';</script>";
	}
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=transaksi';</script>";
} ?>