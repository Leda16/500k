<?php

session_start();

include '../server-side/conn.php';

$mensagemErro = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (strlen($senha) > 6 && preg_match('/[^a-zA-Z\d]/', $senha)) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM bancousuarios WHERE username = ?");
        $stmt->execute([$username]);
        $userExists = $stmt->fetchColumn() > 0;

        if (!$userExists) {
            $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO bancousuarios (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $mensagemErro = 'Usuário registrado com sucesso!';
        } else {
            $mensagemErro = 'Nome de usuário ja existe...';
        }
    } else {
        $mensagemErro = 'A senha deve conter 6 caracteres e um caractere especial...';
    }
}

// <div class="">
// <span><i class="mdi mdi-help"></i></span>
// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
// </button>
// <strong>Error!</strong> Message Sending failed.
// </div>



?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="css/style.css">

    <!-- bootstrap  -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- toastr  -->
    <link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">


</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <section class="flex">

            <a href="home.html" class="logo"> <i class="fas fa-store"></i> shopie </a>

            <form action="" class="search-form">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <a href="login.html" class="fas fa-user"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="cart.html" class="fas fa-shopping-cart"></a>
            </div>


        </section>

    </header>

    <!-- header section ends -->

    <!-- side-bar section starts -->

    <div class="side-bar">

        <div id="close-side-bar" class="fas fa-times"></div>

        <div class="user">
            <img src="images/user-img.png" alt="">
            <h3>shaikh anas</h3>
            <a href="#">Sair</a>
        </div>

        <nav class="navbar">
            <a href="home.html"> <i class="fas fa-angle-right"></i> Inicio </a>
            <a href="about.html"> <i class="fas fa-angle-right"></i> Sobre </a>
            <a href="products.html"> <i class="fas fa-angle-right"></i> Produtos </a>
            <a href="contact.html"> <i class="fas fa-angle-right"></i> Contato </a>
            <a href="login.html"> <i class="fas fa-angle-right"></i> Entrar </a>
            <a href="register.html"> <i class="fas fa-angle-right"></i> Registrar </a>
            <a href="cart.html"> <i class="fas fa-angle-right"></i> Carrinho </a>
        </nav>

    </div>

    <!-- side-bar section ends -->

    <!-- side-bar section ends -->

    <!-- register form section starts  -->

    <section class="register">

        <form action="index.php" method="POST">
            <h3>Registre-se agora</h3>
            <input type="text" name="username" placeholder="Insira seu nome" id="" class="box">
            <input type="email" name="email" placeholder="Insira seu email" id="" class="box">
            <input type="password" name="senha" placeholder="Insira sua senha" id="" class="box">
            <input type="password" name="senha" placeholder="Insira sua senha" id="" class="box">
            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                <?php if ($mensagemErro): ?>
                <p><?php echo $mensagemErro; ?></p>
                <?php endif; ?>
            </div>
            <button type="button" class="btn btn-danger mb-2  me-2" id="toastr-danger-top-right">Error</button>
            <input type="submit" value="Registrar" class="btn">
            <p>Você ja possui uma conta?</p>
            <a href="login.html" class="btn link">Entrar</a>
        </form>

    </section>

    <!-- register form section ends  -->















    <!-- footer section starts  -->

    <footer class="footer">

        <section class="quick-links">

            <a href="home.html" class="logo"> <i class="fas fa-store"></i> shopie </a>

            <div class="links">
                <a href="home.html"> Inicio </a>
                <a href="about.html"> Sobre </a>
                <a href="products.html"> Produtos </a>
                <a href="contact.html"> Contato </a>
                <a href="login.html"> Entrar </a>
                <a href="register.html"> Registrar </a>
                <a href="cart.html"> Carrinho </a>
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

            <img src="images/card_img.png" alt="">

        </section>

    </footer>

    <!-- footer section ends -->




    <!-- swiper js link      -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
    <script src="vendor/toastr/js/toastr.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

</body>

</html>