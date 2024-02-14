<?php
include '../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchTerm'])) {
    $searchTerm = "%{$_POST['searchTerm']}%";

    $sql = "SELECT p.id, p.nome, p.oferta, p.vendidos, c.nome AS categoria_nome FROM BancoProdutos p LEFT JOIN BancoCategoria c ON p.categoria_id = c.id WHERE p.nome LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$searchTerm]);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sqlCategorias = "SELECT id, nome FROM BancoCategoria";
    $stmtCategorias = $conn->prepare($sqlCategorias);
    $stmtCategorias->execute();
    $categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);
    
    $promocoes = ['Sem Oferta', 'Promoção Relâmpago', '50% OFF'];

    foreach ($produtos as $produto) {

        echo "<div class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'>";
        echo "<div class='ms-2 me-auto'>";
        echo "<div class='fw-bold'>" . htmlspecialchars($produto['nome']) . "</div>";
        echo htmlspecialchars($produto['oferta']) . " | ";
        echo $produto['vendidos'] > 0 ? "Foi vendido: " . $produto['vendidos'] . " item(s)" : "Sem vendas";
        echo "</div>";
    
        echo "<select class='form-select categoria-dropdown' data-produto-id='{$produto['id']}'>";
        foreach ($categorias as $categoria) {
            $selected = $categoria['id'] == $produto['categoria_id'] ? 'selected' : '';
            echo "<option value='{$categoria['id']}' {$selected}>{$categoria['nome']}</option>";
        }
        echo "</select>";

        echo "<select class='form-select oferta-dropdown' data-produto-id='{$produto['id']}'>";
        foreach ($promocoes as $oferta) {
            $selected = $oferta == $produto['oferta'] ? 'selected' : '';
            echo "<option {$selected}>{$oferta}</option>";
        }
        echo "</select>";
        
        echo "</div>";
    }
}
?>