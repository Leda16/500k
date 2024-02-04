<?php

session_start();
include 'conn.php';

if (!isset($_SESSION['logintrue']) || $_SESSION['logintrue'] !== true) {
    header("Location: login.php");
    exit;
}

$estado = $_GET['estado'] == 'ativada' ? 'ativada' : 'desativada';

$sql = "UPDATE usuarios SET trava = :estado";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':estado', $estado);
if ($stmt->execute()) {
    echo json_encode(['mensagem' => 'Trava atualizada com sucesso!']);

} else {
    echo json_encode(['mensagem' => 'Erro ao atualizar trava.']);

}
?>