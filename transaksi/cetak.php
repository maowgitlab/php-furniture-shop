<?php
include '../PDF/fpdf.php';

$a = new FPDF('P','cm','A4');
$a->addpage();
$a->setfont('Arial','B',20);
$a->image('../perusahaan.png',7,0.25,1.5,1.5);
$a->cell(0,0.3,"Toko DK",0,1,'C');
$a->setlinewidth(0.08);
$a->line(1,1.8,20,1.8);
$a->setlinewidth(0);
$a->ln(0.6);
$a->setfont('Arial','',16);
$a->cell(0,1,'Data Transaksi',0,1,'C');
$a->setfont('Arial','B',10);
$a->cell(1,0.6,'ID',1,0,'C');
$a->cell(4.5,0.6,'PEMBELI',1,0,'C');
$a->cell(3,0.6,'BARANG',1,0,'C');
$a->cell(3,0.6,'QUANTITY',1,0,'C');
$a->cell(3,0.6,'TOTAL',1,0,'C');
$a->cell(0,0.6,'TANGGAL',1,1,'C');
$a->setfont('Arial','',7);

include '../data.php';
$sql = mysqli_query($konek,"select tb_transaksi.*,tb_pembeli.nama,tb_karyawan.nama,tb_barang.nama from tb_transaksi left join tb_pembeli on id_pembeli=tb_pembeli.id left join tb_karyawan on id_karyawan=tb_karyawan.id left join tb_barang on id_barang=tb_barang.id order by tgl_beli desc");
while($data = mysqli_fetch_row($sql)){
    $a->cell(1,0.6,$data[0],1,0,'C');
    $a->cell(4.5,0.6,$data[8],1,0,'C');
    $a->cell(3,0.6,$data[10],1,0,'C');
    $a->cell(3,0.6,$data[4],1,0,'C');
    $a->cell(3,0.6,$data[5],1,0,'C');
    $a->cell(0,0.6,$data[6],1,1,'C');
}
$a->output(); ?>