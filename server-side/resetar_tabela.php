<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = 'DELETE FROM info';
    $conn->exec($sql);

    $sql2 = 'DELETE FROM datas';
    $conn->exec($sql2);

    header('Location: dash.php');
}
?>
