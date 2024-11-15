<?php 
include '../data.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($konek,"select * from tb_transaksi where id = '$id'");
	$data = mysqli_fetch_row($query);
}else{
	echo "<script>alert('Tidak ada data');window.location='../transaksi;</script>";
}

if (isset($_POST['oke'])) {
	$a = $_POST['id'];
	$b = $_POST['pembeli'];
	$c = $_POST['karyawan'];
	$d = $_POST['barang'];
	$e = $_POST['quantity'];
	$f = $_POST['total'];
	$g = $_POST['status'];

	$query = mysqli_query($konek,"update tb_transaksi set id_pembeli='$b',id_karyawan='$c',id_barang='$d',quantity='$e',total_harga='$f',status='$g' where id='$a'");
	if($query){
		echo "<script>alert('Data terubah');window.location='../transaksi';</script>";
	}else{
		echo "<script>alert('Gagal terubah');</script>";
	}
 } ?>
<!DOCTYPE html>
<html>
<head>
	<title>WebSite</title>
</head>
<body>
	<ul>
		<li><a href="../karyawan">Karyawan</a></li>
		<li><a href="../pembeli">Pembeli</a></li>
		<li><a href="../kategori">Kategori</a></li>
		<li><a href="../barang">Barang</a></li>
		<li><a href="../transaksi">Transaksi</a></li>
		<li><a href="../pengiriman">Pengiriman</a></li>
		<li><a href="../supir">Supir</a></li>
	</ul>
	<form action="" method="post">
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" value="<?php echo $data[0]; ?>" readonly></td>
			</tr>
			<tr>
				<td>ID Pembeli</td>
				<td><select name="pembeli">
					<option value=""></option>
					<?php 
					while($pembeli = mysqli_fetch_row(mysqli_query($konek,"select * from tb_pembeli order by id asc");)){
						echo "<option value='".$pembeli[0]."' ";?><?php if($pembeli[0]==$data[1]){ echo "selected"; } ?><?php echo ">".$pembeli[1]."</option>";
					} ?>
				</select></td>
			</tr>
			<tr>
				<td>ID Karyawan</td>
				<td><select name="karyawan">
					<option value=""></option>
					<?php 
					while($karyawan = mysqli_fetch_row(mysqli_query($konek,"select * from tb_karyawan order by id asc");)){
						echo "<option value='".$karyawan[0]."' ";?><?php if($karyawan[0]==$data[2]){ echo "selected"; } ?><?php echo ">".$karyawan[1]."</option>";
					} ?>
				</select></td>
			</tr>
			<tr>
				<td>ID Barang</td>
				<td><select name="barang">
					<option value=""></option>
					<?php 
					while($barang = mysqli_fetch_row(mysqli_query($konek,"select * from tb_barang order by id asc");)){
						echo "<option value='".$barang[0]."' ";?><?php if($barang[0]==$data[3]){ echo "selected"; } ?><?php echo ">".$barang[1]."</option>";
					} ?>
				</select></td>
			</tr>
			<tr>
				<td>Jumlah Item</td>
				<td><input type="text" name="quantity" min="1" max="99999" value="<?php echo $data[4]; ?>"></td>
			</tr>
			<tr>
				<td>Total Harga</td>
				<td><input type="text" name="total" value="<?php echo $data[5]; ?>"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="number" name="status" min="1" max="99999" value="<?php echo $data[7]; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="oke" value="UBAH"></td>
			</tr>
		</table>
	</form>
</body>
</html>