<?php
include '../../server-side/conn.php';

$sql = "SELECT nome AS title, imagem AS img FROM BancoCategoria";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($categorias as $key => $categoria) {
    $categorias[$key]['href'] = strtolower(str_replace(' ', '-', $categoria['title']));
}

echo json_encode($categorias);
