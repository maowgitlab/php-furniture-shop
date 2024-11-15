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
$a->cell(0,1,'Data Karyawan',0,1,'C');
$a->setfont('Arial','B',10);
$a->cell(3,0.6,'ID',1,0,'C');
$a->cell(5.5,0.6,'NAMA',1,0,'C');
$a->cell(5,0.6,'JENIS KELAMIN',1,0,'C');
$a->cell(0,0.6,'STATUS',1,1,'C');
$a->setfont('Arial','',7);

include '../data.php';
$sql = mysqli_query($konek,"select * from tb_karyawan where id > 0 order by id asc");
while($data = mysqli_fetch_row($sql)){
    if($data[4]=='L'){
        $jenkel = "Laki - laki";
    }elseif($data[4]=='P'){
        $jenkel = "Perempuan";
    }
    $a->cell(3,0.6,$data[0],1,0,'C');
    $a->cell(5.5,0.6,$data[1],1,0,'C');
    $a->cell(5,0.6,$jenkel,1,0,'C');
    $a->cell(0,0.6,$data[5],1,1,'C');
}
$a->output(); ?>