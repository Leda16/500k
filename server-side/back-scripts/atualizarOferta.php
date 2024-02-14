<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produtoId = $_POST['produtoId'];
    $oferta = $_POST['oferta'];

    $sql = "UPDATE BancoProdutos SET oferta = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$oferta, $produtoId])) {
        echo "Oferta atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar oferta.";
    }
}
?>
