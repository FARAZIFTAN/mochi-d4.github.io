<?php
session_start();

session_unset();
    //hancurkan sesi
    session_destroy();
    //kembali ke halaman login
    header("location:index.php");
    exit();
?>