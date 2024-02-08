<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>products</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- swiper css link  -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <!-- cusom css file link  -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header class="header">
      <section class="flex">
        <a href="home.html" class="logo">
          <i class="fas fa-store"></i> shopie
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

    <!-- header section ends -->

    <!-- side-bar section starts -->

    <div class="side-bar">
      <div id="close-side-bar" class="fas fa-times"></div>

      <div class="user">
        <img src="images/user-img.png" alt="" />
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

    <!-- category section starts  -->

    <section class="category">
      <h1 class="heading">Compre por <span>categorias</span></h1>

      <div class="box-container">
        <a href="Ofertas" class="box">
          <img src="images/promocao.png" alt="" />
          <h3>Ofertas</h3>
        </a>

        <a href="Eletronicos" class="box">
          <img src="images/eletronicos.png" alt="" />
          <h3>Eletronicos</h3>
        </a>

        <a href="cosmeticos" class="box">
          <img src="images/cosmeticos.png" alt="" />
          <h3>Cosmeticos</h3>
        </a>

        <a href="casa" class="box">
          <img src="images/casa.png" alt="" />
          <h3>Casa</h3>
        </a>

        <a href="crianca" class="box">
          <img src="images/crianca.png" alt="" />
          <h3>Crianças</h3>
        </a>

        <a href="ferramentas" class="box">
          <img src="images/ferramentas.png" alt="" />
          <h3>Ferramentas</h3>
        </a>

        <a href="animais" class="box">
          <img src="images/animais.png" alt="" />
          <h3>Animais</h3>
        </a>
      </div>
    </section>

    <!-- category section ends -->

    <!-- products section starts  -->

    <section class="products">
      <h1 class="heading">featured <span>products</span></h1>

      <div class="box-container">
        <div class="box">
          <div class="image">
            <img src="images/product-1.jpg" class="main-img" alt="" />
            <img src="images/product-1-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-2.jpg" class="main-img" alt="" />
            <img src="images/product-2-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-3.jpg" class="main-img" alt="" />
            <img src="images/product-3-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-4.jpg" class="main-img" alt="" />
            <img src="images/product-4-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-5.jpg" class="main-img" alt="" />
            <img src="images/product-5-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-6.jpg" class="main-img" alt="" />
            <img src="images/product-6-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-7.jpg" class="main-img" alt="" />
            <img src="images/product-7-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-8.jpg" class="main-img" alt="" />
            <img src="images/product-8-hover.jpg" class="hover-img" alt="" />
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
            <img src="images/product-9.jpg" class="main-img" alt="" />
            <img src="images/product-9-hover.jpg" class="hover-img" alt="" />
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
          <img src="images/product-banner-1.jpg" alt="" />
          <div class="content">
            <span>special offer</span>
            <h3>upto 50% off</h3>
            <a href="#" class="btn">shop now</a>
          </div>
        </div>

        <div class="box">
          <img src="images/product-banner-2.jpg" alt="" />
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
        <p>created by <span>mr. web designer</span> | all rights reserved!</p>

        <img src="images/card_img.png" alt="" />
      </section>
    </footer>

    <!-- footer section ends -->

    <!-- swiper js link      -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
  </body>
</html>
