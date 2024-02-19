<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zenite: Inicio</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <section class="flex">
            <a href="home.html" class="logo">
                <i class="fas fa-store"></i> Zenite
            </a>

            <form action="" class="search-form">
                <input type="search" id="search-box" placeholder="Procure aqui..." />
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
            <img src="assets/images/user-img.png" alt="" />
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

    <!-- side-bar section ends -->

    <!-- home section starts  -->

    <div class="home-container">
        <section class="home">
            <div class="swiper home-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="assets/images/home-img-1.jpg" alt="" />
                        </div>
                        <div class="content">
                            <span>50% OFF</span>
                            <h3>Celular</h3>
                            <a href="#" class="btn">Compre agora</a>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="assets/images/home-img-2.jpg" alt="" />
                        </div>
                        <div class="content">
                            <span>50% OFF</span>
                            <h3>Relogios</h3>
                            <a href="#" class="btn">Compre agora</a>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="assets/images/home-img-3.jpg" alt="" />
                        </div>
                        <div class="content">
                            <span>50% OFF</span>
                            <h3>Fones de Ouvido</h3>
                            <a href="#" class="btn">Compre agora</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
    </div>

    <!-- home section ends -->

    <!-- banner section starts  -->

    <section class="banner">
        <div class="box-container">
            <a href="#" class="box">
                <img src="assets/images/banner-1.jpg" alt="" />
                <div class="content">
                    <span>Oferta Relampago</span>
                    <h3>50% OFF</h3>
                </div>
            </a>

            <a href="#" class="box">
                <img src="assets/images/banner-2.jpg" alt="" />
                <div class="content">
                    <span>Oferta Relampago</span>
                    <h3>50% OFF</h3>
                </div>
            </a>

            <a href="#" class="box">
                <img src="assets/images/banner-3.jpg" alt="" />
                <div class="content">
                    <span>Oferta Relampago</span>
                    <h3>50% OFF</h3>
                </div>
            </a>
        </div>
    </section>

    <!-- banner section ends -->

    <!-- arrivals section starts  -->

    <section class="arrivals">
        <h1 class="heading">Novos <span>produtos</span></h1>

        <div class="box-container">
            <?php
            
            include 'server-side/conn.php';
            
            try {
                $sql = 'SELECT nome, descricao, preco, imagem_url, imagem_url_hover FROM bancoprodutos';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            
                $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Erro ao buscar produtos: ' . $e->getMessage();
                $produtos = []; // Garante que produtos é um array, mesmo em caso de erro
            }
            
            foreach ($produtos as $produto) {
                echo '<div class="box">';
                echo '  <div class="image">';
                echo '    <img src="' . htmlspecialchars($produto['imagem_url']) . '" class="main-img" alt="" />';
                echo '    <img src="' . htmlspecialchars($produto['imagem_url_hover']) . '" class="hover-img" alt="" />';
                echo '  </div>';
                echo '  <div class="content">';
                echo '    <h3>' . htmlspecialchars($produto['nome']) . '</h3>';
                echo '    <div class="price">$' . htmlspecialchars($produto['preco']) . '</div>';
                echo '  </div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- arrivals section ends -->

    <!-- footer section starts  -->

    <footer class="footer">
        <section class="quick-links">
            <a href="home.html" class="logo">
                <i class="fas fa-store"></i> shopie
            </a>

            <div class="links">
                <a href="/"> home </a>
                <a href="/sobre"> about </a>
                <a href="/produtos"> products </a>
                <a href="contact.html"> contact </a>
                <a href="/login"> login </a>
                <a href="/registre"> register </a>
                <a href="/carrinho"> cart </a>
            </div>

            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </section>

        <section class="credit">
            <p>E-Commerce <span>Zenite</span> | Direitos Reservados.</p>

            <img src="assets/images/card_img.png" alt="" />
        </section>
    </footer>

    <!-- footer section ends -->

    <!-- swiper js link      -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="assets/js/script.js"></script>
</body>

</html>
