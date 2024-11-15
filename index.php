<?php 
session_start();
include'data.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WebSite</title>
</head>
<body>
	<style>
		html, body{
			background-color: rgba(255,240,230);
			margin: 0;
			padding: 0;
			height: 100%;
		}
		.side{
			width: 15%;
			float: left;
			height: inherit;
			background-color: rgba(180,150,170);
			overflow-x: hidden;
			position: relative;
		}
		.side ul{
			list-style-type: none;
			overflow: hidden;
			margin: 0;
			padding: 0;
		}
		.side > ul > li{
			float: none;
		}
		.side li a{
			text-decoration: none;
			display: inline-block;
			color: white;
			text-align: left;
			padding: 14px 16px;
			width: 100%;
		}
		.side li a:hover{
			background-color: rgba(200,100,170)
		}
		/* .side li.dropdown{
			display: inline-block;
		} */
		.dropdown:hover .isi-dropdown{
			display: block;
		}
		.isi-dropdown a:hover{
			color: #fff !important;
		}
		.isi-dropdown{
			position: relative;
			display: none;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
			z-index: 1;
			background-color: #f9f9f9;
		}
		.isi-dropdown a{
			color: #c3c3c3 !important;
		}
		.isi-dropdown a:hover{
			color: #232323 !important;
			background: #f3f3f3 !important;
		}

		div.header{
			background-color: rgba(180,150,170);
			padding: 5px;
			text-align: center;
			font-size: 23px;
			font-weight: bold;
		}
		div.header a{
			text-decoration: none;
			color: black;
		}
		div.header ul{
			list-style-type: none;
			/* position: relative; */
			margin: 0;
			padding: 0;
			overflow: hidden;
		}
		div.header > ul > li{
			float: left;
		}
		div.header li a{
			color: whitesmoke;
			display: inline-block;
			text-decoration: none;
			/* background-color: black; */
			text-align: center;
			padding: 0 15px;
			/* width: 30%; */
		}
		div.header li a:hover{
			background-color: rgba(160,140,150);
		}
		li.akun label{
			color: rgba(90,0,0);
		}
		.akun:hover .sub-akun{
			display: block;
		}
		.sub-akun a:hover{
			color: #fff !important;
		}
		.sub-akun{
			position: absolute;
			display: none;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.5);
			z-index: 1;
			background-color: #f9f9f9;
			border-radius: 0 4px 21px 0;
		}
		.sub-akun a{
			color: #c3c3c3 !important;
		}
		.sub-akun a:hover{
			color: #232323 !important;
			background: #f3f3f3 !important;
		}
		.sub-akun div.profil{
			padding: 10px 18px;
			font-size: 15px;
		}
		div.header span{
			/* position: relative; */
			/* margin-left: -4%; */
			margin-bottom: 10px;
			font-size: 40px;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			color: #f9f9f9;
			/* padding-bottom: 10px; */
		}

		div.main{
			/* background-color: #f3f3f3; */
			width: 100%;
			height: inherit;
			float: left;
			overflow-y: auto;
			overflow-x: hidden;
		}
		div.box{
			width: 25%;
			height: 40%;
			background-color: white;
			margin: 20px 30px;
			padding: 10px;
			position: relative;
			text-align: center;
			box-shadow: 0px 0px 15px 6px rgba(0,0,0,0.3);
			border-radius: 20px;
			float: left;
			cursor: pointer;
		}
		div.box:hover{
			box-shadow: 2px 4px 12px 9px rgba(0,0,0,0.3);
			/* margin: 19px 28px; */
		}
		img.gambar{
			width: 90%;
			height: 80%;
		}
		div.box span{
			font-weight: bold;
		}

		div.karyawan-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.karyawan-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.karyawan-data, div.karyawan-aksi{
			text-align: center;
			padding: 2% 4%;
		}
		div.karyawan-aksi form{
			text-align: left;
		}
		div.karyawan-aksi label{
			margin: 1%;
		}
		div.karyawan-aksi .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.karyawan-aksi .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		}

		div.register{
			text-align: center;
			padding: 3% 10%;
		}
		div.register .data{
			background-color: inherit;
            border-color: black;
            border-width: 0 0 2px 0;
            text-align: center;
            padding-bottom: 5px;
            margin: 5px 0;
            width: 50%;
		}
		div.register .data:focus{
            background-color: rgba(255,240,230);
			outline: none;
		}
		div.register .tombol{
			margin: 5px 0;
            padding: 3px;
            width: 30%;
            background-color: rgba(180,150,170);
            font-weight: bold;
            cursor: pointer;
		}
		div.register .tombol:hover{
			background-color: rgba(200,180,170);
		}

		div.form{
            text-align: center;
            margin-top: 10%;
        }
        form.login input[type=text], form.login input[type=password]{
            background-color: inherit;
            border-color: black;
            border-width: 0 0 2px 0;
            text-align: center;
            padding-bottom: 5px;
            margin: 5px 0;
            width: 20%;
        }
        form.login input[type=text]:focus, form.login input[type=password]:focus{
            outline: none;
            background-color: rgba(255,240,230);
        }
        form.login input[type=submit], div.form button{
            margin: 5px 0;
            padding: 3px;
            width: 20%;
            background-color: rgba(180,150,170);
            font-weight: bold;
            cursor: pointer;
        }
        form.login input[type=submit]:hover, div.form button:hover{
            background-color: rgba(200,180,170);
		}
		
		div.pembeli-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.pembeli-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.pembeli-data{
			text-align: center;
			padding: 2% 4%;
		}

		div.supir-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.supir-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.supir-data, div.supir-aksi{
			text-align: center;
			padding: 2% 4%;
		}
		div.supir-aksi form{
			text-align: left;
		}
		div.supir-aksi label{
			margin: 1%;
		}
		div.supir-aksi .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.supir-aksi .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		}

		div.barang-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.barang-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.barang-data, div.barang-aksi{
			text-align: center;
			padding: 2% 4%;
		}
		div.barang-aksi form{
			text-align: left;
		}
		div.barang-aksi label{
			margin: 1%;
		}
		div.barang-aksi .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.barang-aksi .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		}

		div.kategori-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.kategori-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.kategori-data, div.kategori-aksi{
			text-align: center;
			padding: 2% 4%;
		}
		div.kategori-aksi form{
			text-align: left;
		}
		div.kategori-aksi label{
			margin: 1%;
		}
		div.kategori-aksi .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.kategori-aksi .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		}

		div.pembelian{
			text-align: center;
			padding: 2% 20%;
		}
		div.pembelian form{
			text-align: left;
		}
		div.pembelian label{
			margin: 1%;
		}
		div.pembelian .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.pembelian .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		}

		div.transaksi-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.transaksi-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.transaksi-data{
			text-align: center;
			padding: 2% 4%;
		}

		div.pengiriman-data table{
			width: 100%;
			margin: 2% 0;
			/* text-transform: uppercase; */
		}
		div.pengiriman-data table tr:nth-child(1){
			text-transform: uppercase;
		}
		div.pengiriman-data, div.pengiriman-aksi{
			text-align: center;
			padding: 2% 4%;
		}
		div.pengiriman-aksi form{
			text-align: left;
		}
		div.pengiriman-aksi label{
			margin: 1%;
		}
		div.pengiriman-aksi .data{
			margin: 1% 0;
			padding: 5px 0;
			background-color: rgba(255,180,170);
			width: 100%;
		}
		div.pengiriman-aksi .tombol{
			margin: 0.5% 0;
			padding: 5px 6px;
			width: 100%;
			cursor: pointer;
		} 
		div.header img{
			width: 50px;
			height: 50px;
			/* margin-top: 5px; */
			position: absolute;
			margin-left: -55px;
		}
	</style>

	<div class="header">
		<img src="perusahaan.png" alt=""><span>TOKO DK</span>
		<ul>
			<?php
			if(isset($_SESSION['email'])){
				?>
					<li class="akun">
						<label for="">Pengaturan</label>
						<ul class="sub-akun">
							<li>
								<div class="profil">
									<?php echo $_SESSION['nama'];
										if(isset($_SESSION['id'])){
											echo "<br><br><a href='?page=data-pembeli'>EDIT DATA</a>";
										} ?>
									<hr>
									<a href="proses-logout.php">LOGOUT</a>
								</div>
							</li>
						</ul>
					</li>
				<?php 
			}else{
				?>
					<li><a href="?page=login">LOGIN</a></li>
				<?php 
			} ?>
			<li><a href="index.php">HOME</a></li>
			<li><a href="javascript:void[0];" id="jwpopupLink" onclick="muncul()">PROFIL</a></li>
		</ul>
	</div>

	<div class="main">
		<?php 
		if(isset($_GET['page'])){
			$halaman = $_GET['page'];
			switch($halaman){
				case 'login':
					include'login.php';
				break;
				case 'karyawan':
					include'karyawan/index.php';
				break;
				case 'supir':
					include'supir/index.php';
				break;
				case 'kategori':
					include'kategori/index.php';
				break;
				case 'barang':
					include'barang/index.php';
				break;
				case 'pengiriman':
					include'pengiriman/index.php';
				break;
				case 'transaksi':
					include'transaksi/index.php';
				break;
				case 'pembeli':
					include'pembeli/index.php';
				break;
				case 'register':
					include'pembeli/tambah.php';
				break;
				case 'data-pembeli':
					include'pembeli/edit.php';
				break;
				case 'pembelian':
					include'transaksi/tambah.php';
				break;
				default:
					echo "<script>window.location='index.php';</script>";
				break;
			}
		}else{
			$query = mysqli_query($konek,"select * from tb_barang");
			while($rs = mysqli_fetch_array($query)){
				?>
					<div class="box" onclick="window.location='index.php?id=<?php echo $rs['id']; ?>&nama=<?php echo $rs['nama']; ?>&foto=<?php echo $rs['foto']; ?>&harga=<?php echo $rs['harga']; ?>&stok=<?php echo $rs['stok']; ?>'">
						<span><?php echo $rs['nama'] ?></span><br>
						<img src="barang/file/<?php echo $rs['foto']; ?>" alt="" class="gambar"><br>
						<span>Rp. <?php echo $rs['harga']; ?></span><br>
						<span>Stok <?php echo $rs['stok']; ?></span>
					</div>
				<?php 
			} ?>

			<style>
				div.detail{
					display: none;
					position: fixed;
					z-index: 1;
					padding-top: 110px;
					left: 0;
					top: 0;
					width: 100%;
					height: 100%;
					overflow: auto;
					background-color: rgba(0,0,0,0.7);
				}
				div.detail-isi{
					position: relative;
					background-color: #ffffff;
					margin: auto;
					padding: 0;
					max-width: 900px;
					border-radius: 20px 20px 10px 10px;
				}
				div.detail-main{
					text-align: center;
					padding: 10px 17px;
				}
				div.detail-main img.gambar{
					width: 200px;
					height: 180px;
				}
				div.detail-main span{
					font-weight: bold;
				}
				div.detail-foot{
					text-align: right;
					margin-right: 20px;
				}
				div.detail-foot button{
					width: 100px;
					font-weight: bold;
					padding: 5px 10px;
					margin-bottom: 5px;
				}
				div.detail-foot button:hover{
					background-color: #fefefe;
				}
			</style>
			<div class="detail" <?php
				if(isset($_GET['id'])){
					echo "style='display: block'";
					$id = $_GET['id'];
					$a = mysqli_query($konek,"select * from tb_barang where id='$id'");
					$data = mysqli_fetch_array($a);
			} ?>>
				<div class="detail-isi">
					<div class="detail-main">
						<h2><?= $data['nama']; ?></h2>
						<img src="barang/file/<?php echo $_GET['foto']; ?>" alt="" class="gambar"><br>
						<span>Rp. <?php echo $_GET['harga']; ?></span><br>
						<span>Stok <?php echo $_GET['stok']; ?></span><br>
						<p><?php echo $data['detail']; ?></p>
					</div>
					<div class="detail-foot">
						<?php if(!isset($_SESSION['status'])){ ?><button <?php if(isset($_SESSION['id'])){?>onclick="window.location='?page=pembelian&id=<?php echo $_GET['id']; ?>'"<?php }elseif(!isset($_SESSION['id'])&&!isset($_SESSION['status'])){?>onclick="alert('Harap Login Dulu');window.location='?page=login';"<?php } ?>>BELI</button><?php } ?> <button onclick="window.location='index.php'">TUTUP</button>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>


	<?php 
	if(isset($_SESSION['nama'])){
		?>
			<style>
				div.main{
					width: 85%;
				}
			</style>
			<div class="side">
				<ul>
			<?php
			if(isset($_SESSION['status'])){
				?>
					<li class="dropdown"><a href="#">Master Data</a>
						<ul class="isi-dropdown">
							<li><a href="?page=karyawan">Karyawan</a></li>
							<li><a href="?page=supir">Supir</a></li>
							<li><a href="?page=pembeli">Pembeli</a></li>
						</ul>
					</li>
					<li><a href="?page=kategori">Kategori</a></li>
					<li><a href="?page=barang">Barang</a></li>
					<li><a href="?page=transaksi">Transaksi</a></li>
					<li><a href="?page=pengiriman">Pengiriman</a></li>
				<?php
			}elseif(isset($_SESSION['id'])){
				?>
					<li><a href="?page=transaksi">Riwayat Transaksi</a></li>
				<?php
			} ?>
				</ul>
			</div>
		<?php
 	} ?>

	<style>
		/* detail view */
		.jwpopup{
			display: none;
			position: fixed;
			z-index: 1;
			padding-top: 110px;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0,0,0,0.7);
		}
		.jwpopup-content{
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			max-width: 500px;
		}
		.jwpopup-head{
			font-size: 11px;
			padding: 1px 16px;
			color: white;
			background: rgba(100,90,120);
		}
		.jwpopup-main{
			padding: 20px 16px;
			/* text-align:center; */
			position: relative;
		}
		.close{
			margin-top: 7px;
			color: white;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}
		.close:hover, .close:focus{
			color: #999999;
			text-decoration: none;
			cursor: pointer;
		}
		div.clearfix{
			clear: both;
		}
	</style>
	<div id="jwpopupBox" class="jwpopup">
		<div class="jwpopup-content">
			<div class="jwpopup-head">
				<span class="close" onclick="tutup()">x</span>
				<h2>PROFIL PEMBUAT</h2>
			</div>
			<div class="jwpopup-main">
				<img src="myyy.png" alt="" style="width: 30%;height:20%;float: left;margin-bottom: 20px;margin-right:20px;"><br>
				<p>Nama : Muhammad Robbianoor Ilhamni <br>
				Umur : 22 Tahun</p>	
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<script>
		var jwpopup = document.getElementById("jwpopupBox");
		var mplink = document.getElementById("jwpopupLink");
		var close = document.getElementsByClassName("close")[0];

		mplink.onclick = function(){
			jwpopup.style.display = "block";
		}

		function tutup(){
			jwpopup.style.display = "none";
		}

		window.onclick = function(event){
			if(event.target == jwpopup){
				jwpopup.style.display = "none";
			}
		}
	</script>

</body>
</html>