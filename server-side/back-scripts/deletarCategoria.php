<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoriaId'])) {
    $categoriaId = $_POST['categoriaId'];

    $sql = "DELETE FROM BancoCategoria WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$categoriaId])) {
        echo "Categoria deletada com sucesso.";
    } else {
        echo "Erro ao deletar categoria.";
    }
}
?>