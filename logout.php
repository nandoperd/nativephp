<?php
    // membuka session
    session_start();

    // menghapus session
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
?>