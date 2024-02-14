<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produtoId = $_POST['produtoId'];
    $categoriaId = $_POST['categoriaId'];

    $sql = "UPDATE BancoProdutos SET categoria_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$categoriaId, $produtoId])) {
        echo "Categoria atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar categoria.";
    }
}
?>
