<?php

session_start();

include '../server-side/conn.php';

$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $repass = $_POST['repass'];
    $codigoIndicacao = $_POST['codigoIndicacao'] ?? null;

    if ($senha == $repass) {
        if (strlen($senha) > 6 && preg_match('/[^a-zA-Z\d]/', $senha)) {
            $stmt = $conn->prepare('SELECT COUNT(*) FROM bancousuarios WHERE username = ?');
            $stmt->execute([$username]);
            $userExists = $stmt->fetchColumn() > 0;

            $stmt = $conn->prepare('SELECT COUNT(*) FROM bancousuarios WHERE email = ?');
            $stmt->execute([$email]);
            $emailExists = $stmt->fetchColumn() > 0;

            if (!$userExists && !$emailExists) {
                function gerarCodigoUnico($conn)
                {
                    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$&*-+?';
                    do {
                        $codigo = '';
                        for ($i = 0; $i < 8; $i++) {
                            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
                        }
                        $stmt = $conn->prepare('SELECT COUNT(*) FROM bancousuarios WHERE codigo = ?');
                        $stmt->execute([$codigo]);
                        $codigoExists = $stmt->fetchColumn() > 0;
                    } while ($codigoExists);
                    return $codigo;
                }

                $codigo = gerarCodigoUnico($conn);

                $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $conn->prepare('INSERT INTO bancousuarios (username, email, password, codigo) VALUES (?, ?, ?, ?)');
                $stmt->execute([$username, $email, $hashedPassword, $codigo]);

                $usuarioId = $conn->lastInsertId();

                if ($codigoIndicacao) {
                    $stmt = $conn->prepare('SELECT id FROM bancousuarios WHERE codigo = ?');
                    $stmt->execute([$codigoIndicacao]);
                    $usuarioIndicador = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($usuarioIndicador) {
                        $stmt = $conn->prepare('INSERT INTO BancoDeIndicacao (usuario_id, usuario_indicado_id) VALUES (?, ?)');
                        $stmt->execute([$usuarioIndicador['id'], $usuarioId]);
                    } else {
                        $mensagemErro = 'Codigo inexistente!';
                    }
                }

                $mensagemErro = 'Usuário registrado com sucesso!';
            } else {
                if ($userExists) {
                    $mensagemErro = 'Nome de usuário já existe...';
                } else {
                    $mensagemErro = 'E-mail já está sendo usado...';
                }
            }
        } else {
            $mensagemErro = 'A senha deve conter mais de 6 caracteres e incluir pelo menos um caractere especial...';
        }
    } else {
        $mensagemErro = 'Senhas diferentes...';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Shopie</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- bootstrap  -->
    <link href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- toastr  -->
    <link rel="stylesheet" href="/assets/vendor/toastr/css/toastr.min.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <section class="flex">

            <a href="/" class="logo"> <i class="fas fa-store"></i> shopie </a>

            <form action="" class="search-form">
                <input type="search" id="search-box" placeholder="Procure aqui...">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
                <div id="search-btn" class="fas fa-search"></div>
                <a href="/login" class="fas fa-user"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="/carrinho" class="fas fa-shopping-cart"></a>
            </div>


        </section>

    </header>

    <!-- header section ends -->

    <!-- side-bar section starts -->

    <!-- <div class="side-bar">

        <div id="close-side-bar" class="fas fa-times"></div>

        <div class="user">
            <img src="images/user-img.png" alt="">
            <h3>shaikh anas</h3>
            <a href="#">Sair</a>
        </div>

        <nav class="navbar">
            <a href="/"> <i class="fas fa-angle-right"></i> Inicio </a>
            <a href="about.html"> <i class="fas fa-angle-right"></i> Sobre </a>
            <a href="products.html"> <i class="fas fa-angle-right"></i> Produtos </a>
            <a href="contact.html"> <i class="fas fa-angle-right"></i> Contato </a>
            <a href="/login"> <i class="fas fa-angle-right"></i> Entrar </a>
            <a href="/register"> <i class="fas fa-angle-right"></i> Registrar </a>
            <a href="/carrinho"> <i class="fas fa-angle-right"></i> Carrinho </a>
        </nav>

    </div> -->

    <!-- side-bar section ends -->

    <!-- side-bar section ends -->

    <!-- register form section starts  -->

    <section class="register">

        <form action="index.php" method="POST">
            <h3>Registre-se agora</h3>
            <input type="text" name="username" placeholder="Insira seu nome" id="" class="box">
            <input type="email" name="email" placeholder="Insira seu email" id="" class="box">
            <input type="password" name="senha" placeholder="Insira sua senha" id="" class="box">
            <input type="password" name="repass" placeholder="Reinsira sua senha" id="" class="box">
            <input type="text" name="codigoIndicacao" placeholder="Código de Indicação (Opcional)" class="box">
            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                <?php if ($mensagemErro): ?>
                <p><?php echo $mensagemErro; ?></p>
                <?php endif; ?>
            </div>
            <input type="submit" value="Registrar" class="btn">
            <p>Você já possui uma conta?</p>
            <a href="/login" class="btn link">Entrar</a>
        </form>

    </section>

    <!-- register form section ends  -->















    <!-- footer section starts  -->

    <footer class="footer">

        <section class="quick-links">

            <a href="/" class="logo"> <i class="fas fa-store"></i> shopie </a>

            <div class="links">
                <a href="/"> Inicio </a>
                <a href="about.html"> Sobre </a>
                <a href="products.html"> Produtos </a>
                <a href="contact.html"> Contato </a>
                <a href="/login"> Entrar </a>
                <a href="/register"> Registrar </a>
                <a href="/carrinho"> Carrinho </a>
            </div>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>

        </section>

        <section class="credit">

            <p> E-Commerce <span>SHOPIE</span> | direitos reservados. </p>

            <img src="/assets/images/card_img.png" alt="">

        </section>

    </footer>

    <!-- footer section ends -->




    <!-- swiper js link      -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="/assets/js/script.js"></script>
    <script src="/assets/vendor/global/global.min.js"></script>
    <script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Toastr -->
    <script src="/assets/vendor/toastr/js/toastr.min.js"></script>
    <!-- All init script -->
    <script src="/assets/js/plugins-init/toastr-init.js"></script>



</body>

</html>
