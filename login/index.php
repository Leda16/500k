<?php

session_start();

include '../server-side/conn.php';

$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM bancousuarios WHERE email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        if (password_verify($password, $resultado['password'])) {
            $_SESSION['client'] = true;

            header('Location: /');
            exit();
        } else {
            $mensagemErro = '❌ Senha incorreta.';
        }
    } else {
        $mensagemErro = '❌ Usuário não encontrado.';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shopie</title>

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
            <a href="#">log out</a>
        </div>

        <nav class="navbar">
            <a href="/"> <i class="fas fa-angle-right"></i> Inicio </a>
            <a href="about.html"> <i class="fas fa-angle-right"></i> Sobre </a>
            <a href="products.html"> <i class="fas fa-angle-right"></i> Produtos </a>
            <a href="contact.html"> <i class="fas fa-angle-right"></i> Contato </a>
            <a href="/login"> <i class="fas fa-angle-right"></i> Login </a>
            <a href="/register"> <i class="fas fa-angle-right"></i> Registro </a>
            <a href="/carrinho"> <i class="fas fa-angle-right"></i> Carrinhos </a>
        </nav>

    </div> -->

    <!-- side-bar section ends -->

    <!-- login form section starts  -->

    <section class="login">

        <form action="index.php" method="POST">
            <h3>Entrar agora</h3>
            <input type="email" name="email" placeholder="Insira seu email" id="" class="box">
            <input type="password" name="password" placeholder="Insira sua senha" id="" class="box">
            <input type="submit" value="Entrar agora" class="btn">
            <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                <?php if ($mensagemErro): ?>
                <p><?php echo $mensagemErro; ?></p>
                <?php endif; ?>
            </div>
            <p>Ainda não tem uma conta?</p>
            <a href="/register" class="btn link">Registrar-se agora</a>
        </form>

    </section>

    <!-- login form section ends  -->














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

            <p> E-Commerce <span>SHOPIE </span> | Direitos Reservados. </p>

            <img src="/assets/images/card_img.png" alt="">

        </section>

    </footer>

    <!-- footer section ends -->




    <!-- swiper js link      -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="/assets/js/script.js"></script>

</body>

</html>
