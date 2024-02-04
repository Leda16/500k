<?php
session_start();
include 'conn.php';

$mensagemErro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM bancoadmin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$usuario]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        if (password_verify($senha, $resultado['password'])) {
            $_SESSION['logintrue'] = true; 
    
            header("Location: burp.php");
            exit;
        } else {
            $mensagemErro = '❌ Senha incorreta.';
        }
    } else {
        $mensagemErro = '❌ Usuário não encontrado.';
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Tela Fake | By Leda</title>
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index-2.html">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Logar na Tela | 🚀</h4>
                                    <form action="login.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Usuario</strong></label>
                                            <input type="text" id="usuario" name="usuario" class="form-control"
                                                value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" id="senha" name="senha" class="form-control">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" value="Login"
                                                class="btn btn-primary btn-block">Entrar</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <?php if ($mensagemErro): ?>
                                        <p><?php echo $mensagemErro; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>


</html>