<?php
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$status = $_SESSION['status'];
$karyawan = mysqli_query($konek,"select * from tb_karyawan where nama='$nama' and email='$email' and status='$status'");
$data = mysqli_fetch_array($karyawan);

$id = $_GET['id'];
$query = mysqli_query($konek,"update tb_transaksi set id_karyawan='$data[0]',status='1' where id='$id' ");
if($query){
    echo "<script>alert('Data dikonfirmasi');window.location='?page=transaksi'</script>";
} ?>