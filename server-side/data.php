<?php
include 'conn.php'; 

if (verificaTrava($conn)) {
    header("Location: login.php");
    exit;
}

$sql = "CREATE TABLE IF NOT EXISTS datas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    acessos VARCHAR(255),
    pescados VARCHAR(255)
)";

$conn->exec($sql);

$sql = "CREATE TABLE IF NOT EXISTS config (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numeroItens INT,
    formatoBackup VARCHAR(255),
    trava VARCHAR(255)
)";
$conn->exec($sql);

$sql = "INSERT INTO config (numeroItens, formatoBackup, trava) VALUES ('20','JSON','ativada')";
$conn->exec($sql);

// Tabela de Usuários
$sqlUsuarios = "CREATE TABLE IF NOT EXISTS BancoUsuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    codigo VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->exec($sqlUsuarios);

// Tabela de Admin
$sqlAdmin = "CREATE TABLE IF NOT EXISTS BancoAdmin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->exec($sqlAdmin);

// Tabela de Produtos
$sqlProdutos = "CREATE TABLE IF NOT EXISTS BancoProdutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco VARCHAR(255),
    categoria VARCHAR(255),
    imagem_url VARCHAR(255),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->exec($sqlProdutos);

// Tabela de Pedidos
$sqlPedidos = "CREATE TABLE IF NOT EXISTS BancoPedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    categoria VARCHAR(255),
    status VARCHAR(255),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES BancoUsuarios(id)
)";
$conn->exec($sqlPedidos);

// Tabela de Status de Produtos
$sqlStatusProdutos = "CREATE TABLE IF NOT EXISTS BancoStatusProdutos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    status VARCHAR(50),
    data_status TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (produto_id) REFERENCES BancoProdutos(id)
)";
$conn->exec($sqlStatusProdutos);

// Tabela de Carrinho de Usuário
$sqlCarrinho = "CREATE TABLE IF NOT EXISTS BancoUsuarioCarrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES BancoUsuarios(id),
    FOREIGN KEY (produto_id) REFERENCES BancoProdutos(id)
)";
$conn->exec($sqlCarrinho);

// Tabela de Compras de Usuário
$sqlCompras = "CREATE TABLE IF NOT EXISTS BancoUsuarioCompras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    pedido_id INT NOT NULL,
    data_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES BancoUsuarios(id),
    FOREIGN KEY (pedido_id) REFERENCES BancoPedidos(id)
)";
$conn->exec($sqlCompras);

// Tabela de Indicação
$sqlIndicacao = "CREATE TABLE IF NOT EXISTS BancoDeIndicacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    usuario_indicado_id INT NOT NULL,
    data_indicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES BancoUsuarios(id),
    FOREIGN KEY (usuario_indicado_id) REFERENCES BancoUsuarios(id)
)";
$conn->exec($sqlIndicacao);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO bancoadmin (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute([$usuario, $senhaCriptografada]);
    
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iniciar Tela Fake | By Leda</title>
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

</html>