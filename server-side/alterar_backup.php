<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header('Location: login.php');
    exit();
}

$sql = 'SELECT formatoBackup FROM config LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
$formatoAtual = $resultado ? $resultado['formatoBackup'] : null;

$estado = $formatoAtual == 'TXT' ? 'JSON' : 'TXT';

$sql = 'UPDATE config SET formatoBackup = :estado';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':estado', $estado);
if ($stmt->execute()) {
    echo json_encode(['mensagem' => 'Backup atualizado com sucesso para ' . $estado]);
} else {
    echo json_encode(['mensagem' => 'Erro ao atualizar backup.']);
}
?>
