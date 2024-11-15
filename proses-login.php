<?php
include'data.php';
if(isset($_POST['masuk'])){
    $email = $_POST['i-email'];
    $pass = $_POST['i-password'];

    $query = mysqli_query($konek,"select * from tb_pembeli where email='$email' and password='$pass'");
    $rs = mysqli_fetch_array($query);
    if(mysqli_num_rows($query)>0){
        session_start();
        $_SESSION['id'] = $rs['id'];
        $_SESSION['nama'] = $rs['nama'];
        $_SESSION['email'] = $rs['email'];
        header('location:index.php');
    }else{
        $query = mysqli_query($konek,"select * from tb_karyawan where email='$email' and password='$pass'");
        $rs = mysqli_fetch_array($query);
        if(mysqli_num_rows($query)>0){
            session_start();
            $_SESSION['nama'] = $rs['nama'];
            $_SESSION['email'] = $rs['email'];
            $_SESSION['status'] = $rs['status'];
            header('location:index.php');
        }else{
            echo "<script>alert('Email dan Password Salah');window.location='index.php?page=login';</script>";
        }
    }
} ?>