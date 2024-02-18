<?php

session_start();

include '../../server-side/conn.php';

if (isset($_GET['categoria'])) {
    $categoriaNome = $_GET['categoria'];

    $sqlCategoria = "SELECT id FROM bancocategoria WHERE nome = ?";
    $stmtCategoria = $conn->prepare($sqlCategoria);
    $stmtCategoria->execute([$categoriaNome]);
    $categoria = $stmtCategoria->fetch(PDO::FETCH_ASSOC);

    if ($categoria) {
        $categoriaId = $categoria['id'];
        $sqlProdutos = "SELECT * FROM bancoprodutos WHERE categoria_id = ?";
        $stmtProdutos = $conn->prepare($sqlProdutos);
        $stmtProdutos->execute([$categoriaId]);
        $produtos = $stmtProdutos->fetchAll(PDO::FETCH_ASSOC);

        // echo "<pre>"; 
        // print_r($produtos); 
        // echo "</pre>";

    } else {
        // echo "Categoria não encontrada.";
        $produtos = [];
    }
} else {
    // echo "Categoria não especificada na URL.";
    $produtos = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Zenite: Produtos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>

    <header class="header">
        <section class="flex">
            <a href="home.html" class="logo">
                <i class="fas fa-store"></i> Zenite
            </a>

            <form action="" class="search-form">
                <input type="search" id="search-box" placeholder="search here..." />
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

    <div class="side-bar">
        <div id="close-side-bar" class="fas fa-times"></div>

        <div class="user">
            <img src="/assets/images/user-img.png" alt="" />
            <h3>shaikh anas</h3>
            <a href="#">log out</a>
        </div>

        <nav class="navbar">
            <a href="home.html"> <i class="fas fa-angle-right"></i> home </a>
            <a href="about.html"> <i class="fas fa-angle-right"></i> about </a>
            <a href="products.html">
                <i class="fas fa-angle-right"></i> products
            </a>
            <a href="contact.html"> <i class="fas fa-angle-right"></i> contact </a>
            <a href="login.html"> <i class="fas fa-angle-right"></i> login </a>
            <a href="register.html">
                <i class="fas fa-angle-right"></i> register
            </a>
            <a href="cart.html"> <i class="fas fa-angle-right"></i> cart </a>
        </nav>
    </div>






    <section class="products">
        <h1 class="heading">Categoria <span><?php echo htmlspecialchars($categoriaNome); ?></span></h1>

        <div class="box-container">
            <?php foreach ($produtos as $produto): ?>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($produto['imagem_url']); ?>" class="main-img" alt="" />
                        <img src="<?php echo htmlspecialchars($produto['imagem_url_hover']); ?>" class="hover-img" alt="" />
                        <div class="icons">
                            <a href="#" class="fas fa-shopping-cart"></a>
                            <a href="#" class="fas fa-search-plus"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-share"></a>
                        </div>
                    </div>
                    <div class="content">
                        <h3><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        <div class="price">$<?php echo htmlspecialchars($produto['preco']); ?> </div>
                        <!-- Avaliações ou outras informações aqui -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>



    <!-- products section ends -->

    <!-- product banner section ends -->

    <!-- footer section starts  -->

    <footer class="footer">
        <section class="quick-links">
            <a href="home.html" class="logo">
                <i class="fas fa-store"></i> shopie
            </a>

            <div class="links">
                <a href="home.html"> home </a>
                <a href="about.html"> about </a>
                <a href="products.html"> products </a>
                <a href="contact.html"> contact </a>
                <a href="login.html"> login </a>
                <a href="register.html"> register </a>
                <a href="cart.html"> cart </a>
            </div>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </section>

        <section class="credit">
            <p> E-Commerce <span>Zenite</span> | Direitos Reservados.</p>
            <img src="/assets/images/card_img.png" alt="" />
        </section>
    </footer>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/anim.js"></script>
</body>

</html>