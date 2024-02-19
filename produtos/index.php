<?php

session_start();

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



    <section class="category">
        <h1 class="heading">Compre por <span>categorias</span></h1>

        <div class="box-container" id="box-container">
            <!-- As caixas serão geradas dinamicamente -->
        </div>
    </section>





    <section class="products">
        <h1 class="heading">Produtos em <span>Promoção</span></h1>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-1.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-1-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>smartphone</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-2.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-2-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>camera</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-3.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-3-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>television</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-4.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-4-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>speaker</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-5.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-5-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>speaker</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-6.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-6-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>smartwatch</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-7.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-7-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>headphone</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-8.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-8-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>smartphone</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="/assets/images/product-9.jpg" class="main-img" alt="" />
                    <img src="/assets/images/product-9-hover.jpg" class="hover-img" alt="" />
                    <div class="icons">
                        <a href="#" class="fas fa-shopping-cart"></a>
                        <a href="#" class="fas fa-search-plus"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>camera</h3>
                    <div class="price">$249.99 <span>$399.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- products section ends -->

    <!-- product banner section starts  -->

    <section class="product-banner">
        <h1 class="heading"><span>deal</span> of the day</h1>

        <div class="box-container">
            <div class="box">
                <img src="/assets/images/product-banner-1.jpg" alt="" />
                <div class="content">
                    <span>special offer</span>
                    <h3>upto 50% off</h3>
                    <a href="#" class="btn">shop now</a>
                </div>
            </div>

            <div class="box">
                <img src="/assets/images/product-banner-2.jpg" alt="" />
                <div class="content">
                    <span>special offer</span>
                    <h3>upto 50% off</h3>
                    <a href="#" class="btn">shop now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- product banner section ends -->

    <!-- footer section starts  -->

    <footer class="footer">
        <section class="quick-links">
            <a href="home.html" class="logo">
                <i class="fas fa-store"></i> shopie
            </a>

            <div class="links">
                <a href="/"> Inicio </a>
                <a href="/termos"> Termos </a>
                <a href="/produtos"> Produtos </a>
                <a href="contact.html"> contact </a>
                <a href="/login"> Entrar </a>
                <a href="/register"> Registrar-se </a>
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
            <p> E-Commerce <span>Zenite</span> | Direitos Reservados.</p>
            <img src="/assets/images/card_img.png" alt="" />
        </section>
    </footer>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/anim.js"></script>
</body>

</html>
