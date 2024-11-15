<?php 
session_start();
session_destroy();
echo "<script>alert('Berhasil LOGOUT');window.location='index.php';</script>"; ?>