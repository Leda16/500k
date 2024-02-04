<?php
$serverSidePath = __DIR__;

$dbConfig = json_decode(file_get_contents($serverSidePath . '/dbconfig.json'), true);

$host = $dbConfig['host'];
$dbname = $dbConfig['dbname'];
$username = $dbConfig['username'];
$password = $dbConfig['password'];

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}

function verificaTrava($conn) {
    try {
        $sql = "SELECT COUNT(*) FROM config WHERE trava = 'ativada'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        return false;
    }
}
?>