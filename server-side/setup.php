<?php

include 'conn.php';

if (verificaTrava($conn)) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents('dbconfig.json', json_encode($_POST));
    header('Location: create.php');
    exit();
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
                                    <h4 class="text-center mb-4">Iniciar Tela Fake</h4>
                                    <form action="setup.php" method="post">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Host do Banco de Dados</strong></label>
                                            <input type="text" class="form-control" name="host"
                                                placeholder="localhost">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Nome do Banco de Dados</strong></label>
                                            <input type="text" class="form-control" name="dbname"
                                                placeholder="nome do banco">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Usuário do Banco de Dados</strong></label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="usuario do banco">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Senha do Banco de Dados</strong></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="senha do banco">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>


</html>
