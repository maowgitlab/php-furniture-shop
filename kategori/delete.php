<?php 
// include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"delete from tb_kategori where id = '$id'");
	if($query){
		echo "<script>alert('Data terhapus');window.location='?page=kategori';</script>";
	}else{
		echo "<script>alert('Gagal terhapus');window.location='?page=kategori';</script>";
	}
}else{
	echo "<script>alert('Tidak ada data');window.location='?page=kategori';</script>";
} ?>