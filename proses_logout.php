<?php
session_start();

session_unset();
    //hancurkan sesi
    session_destroy();
    //kembali ke halaman index
    header("location:index.html");
    exit();
?>