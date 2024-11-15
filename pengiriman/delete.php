<?php 
//include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"delete from tb_pengiriman where id = '$id'");
	if($query){
		echo "<script>alert('Data terhapus');window.location='../pengiriman';</script>";
	}else{
		echo "<script>alert('Gagal terhapus');window.location='../pengiriman';</script>"
	}
}else{
	echo "<script>alert('Tidak ada data');window.location='../pengiriman';</script>";
} ?>