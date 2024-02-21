<?php

date_default_timezone_set('America/Sao_Paulo');

class BaseDeDadosPDOProxy {
    private $pdo;
    private $diretorioLog = __DIR__ . '/LOGS';
    private $arquivoLog;

    public function __construct($dsn, $usuario, $senha) {
        // Verifica se a pasta LOGS existe, se não, cria
        if (!file_exists($this->diretorioLog)) {
            mkdir($this->diretorioLog, 0777, true);
        }

        $this->arquivoLog = $this->diretorioLog . '/banco_de_dados_operacoes.log';

        try {
            $this->pdo = new PDO($dsn, $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro na conexão: ' . $e->getMessage());
        }
    }

    public function prepare($sql) {
        if (preg_match('/^(INSERT|UPDATE|DELETE)/i', $sql)) {
            $this->registrarOperacao($sql);
        }
        return $this->pdo->prepare($sql);
    }

    private function registrarOperacao($sql) {
        $timestamp = date('Y-m-d H:i:s');
        $mensagemLog = "$timestamp - $sql\n";
        file_put_contents($this->arquivoLog, $mensagemLog, FILE_APPEND);
    }

    public function exec($sql) {
        if (preg_match('/^(INSERT|UPDATE|DELETE)/i', $sql)) {
            $this->registrarOperacao($sql);
        }
        return $this->pdo->exec($sql);
    }
}

$serverSidePath = __dir__;
$dbConfig = json_decode(file_get_contents($serverSidePath . '/dbconfig.json'), true);

$host = $dbConfig['host'];
$dbname = $dbConfig['dbname'];
$username = $dbConfig['username'];
$password = $dbConfig['password'];
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $conn = new BaseDeDadosPDOProxy($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
    exit();
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
