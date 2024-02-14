<?php
include '../conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produtoId'])) {
    $produtoId = $_POST['produtoId'];

    $sql = "DELETE FROM BancoProdutos WHERE id = ?";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([$produtoId]);
        if ($stmt->rowCount() > 0) {
            echo "Produto deletado com sucesso.";
        } else {
            echo "Produto não encontrado ou já foi deletado.";
        }
    } catch (PDOException $e) {
        echo "Erro ao deletar o produto: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>
