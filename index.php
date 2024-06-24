<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>

    <!-- custom css  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/framework/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/framework/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/framework/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="assets/css/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>
<div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->

    <div class="d-flex flex-column wrapper">
        <!-- NAVBAR -->
        <?php include_once "./navbar.php"; ?>

        <!-- carrinho lateral -->
        

        <!-- Conteúdo principal -->

        <main class="flex-fill">
            <section class="home">
                <div class="shape" data-aos="zoom-out" data-aos-duration="1000" ddata-aos-easing="ease-in-sine"></div>
                <div class="left content">
                    <h1 class="title " data-aos="zoom-in-right" data-aos-duration="700" data-aos-easing="ease-in-sine">
                        Sabor Bom Sucesso
                        <span>Restaurante</span>
                    </h1>


                    <div class="left_buttons" data-aos="fade-right" data-aos-duration="700" ddata-aos-easing="linear">
                        <a href="cardapio.php" class="btn-default cardapio">
                            Ver cardápio
                        </a>

                        <a href="https://api.whatsapp.com/message/IHMEQ73OGTFYI1?autoload=1&app_absent=0" id="phone_button" target="_blank">
                            <button class="btn-default cardapio">
                                <i class="fa-solid fa-phone"></i>
                            </button>
                            (21) 96750-2314
                        </a>
                    </div>
                    <div class="social-media-buttons" data-aos="fade-right" data-aos-duration="700"
                        ddata-aos-easing="linear">
                        <a href="https://api.whatsapp.com/message/IHMEQ73OGTFYI1?autoload=1&app_absent=0" target="_blank">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>

                        <a href="https://www.instagram.com/saborbomsucesso/"target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                </div>
                <div id="banner" data-aos="zoom-out" data-aos-duration="1700" ddata-aos-easing="ease-in-sine">
                    <img src="assets/images/fundos/hero.png" alt="">
                </div>
            </section>
            <section id="menu">
                <h2 class="section-title content" data-aos="fade-right" data-aos-duration="700"
                    ddata-aos-easing="linear">Cardápio</h2>
                <h3 class="section-subtitle content" data-aos="fade-right" data-aos-duration="700"
                    ddata-aos-easing="linear">Nossos pratos especiais</h3>

                <div id="dishes">
                    <div class="dish content" data-aos="zoom-in-down" data-aos-duration="1000"
                        ddata-aos-easing="ease-in-sine">
                        <div class="dish-heart">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <img src="assets/images/pratos/dish.png" class="dish-image" alt="">

                        <h3 class="dish-title">
                            Lorem Ipsum
                        </h3>

                        <span class="dish-description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </span>

                        <div class="dish-rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(500+)</span>
                        </div>

                        <div class="dish-price">
                            <h4>R$20,00</h4>
                            <button class="btn-default cardapio">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </div>
                    </div>

                    <div class="dish content" data-aos="zoom-in-down" data-aos-duration="1500"
                        ddata-aos-easing="ease-in-sine">
                        <div class="dish-heart">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <img src="assets/images/pratos/dish2.png" class="dish-image" alt="">

                        <h3 class="dish-title">
                            Lorem Ipsum
                        </h3>

                        <span class="dish-description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </span>

                        <div class="dish-rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(500+)</span>
                        </div>

                        <div class="dish-price">
                            <h4>R$20,00</h4>
                            <button class="btn-default cardapio">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </div>
                    </div>

                    <div class="dish content" data-aos="zoom-in-down" data-aos-duration="2000"
                        ddata-aos-easing="ease-in-sine">
                        <div class="dish-heart">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <img src="assets/images/pratos/dish3.png" class="dish-image" alt="">

                        <h3 class="dish-title">
                            Lorem Ipsum
                        </h3>

                        <span class="dish-description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </span>

                        <div class="dish-rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(500+)</span>
                        </div>

                        <div class="dish-price">
                            <h4>R$20,00</h4>
                            <button class="btn-default cardapio">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </div>
                    </div>

                    <div class="dish content" data-aos="zoom-in-down" data-aos-duration="2500"
                        ddata-aos-easing="ease-in-sine">
                        <div class="dish-heart">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <img src="assets/images/pratos/dish4.png" class="dish-image" alt="">

                        <h3 class="dish-title">
                            Lorem Ipsum
                        </h3>

                        <span class="dish-description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </span>

                        <div class="dish-rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(500+)</span>
                        </div>

                        <div class="dish-price">
                            <h4>R$20,00</h4>
                            <button class="btn-default cardapio">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="book-table section">
                <div class="book-table-shape">
                    <img src="assets/images/fundos/table-leaves-shape.png" alt="">
                </div>

                <div class="book-table-shape book-table-shape2">
                    <img src="assets/images/fundos/table-leaves-shape.png" alt="">
                </div>

                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5 content" data-aos="zoom-in-down"
                                    data-aos-duration="2500" ddata-aos-easing="ease-in-sine">
                                    <p class="sec-sub-title mb-3">mesa de livro</p>
                                    <h2 class="h2-title">Mesa De Abertura</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="book-table-info" data-aos="zoom-in-down" data-aos-duration="2500"
                            ddata-aos-easing="ease-in-sine">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="table-title text-center content">
                                        <h3>Segunda A Sexta</h3>
                                        <p>11:00 - 15:30</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="call-now text-center content">
                                        <i class="uil uil-phone"></i>
                                        <a href="https://api.whatsapp.com/message/IHMEQ73OGTFYI1?autoload=1&app_absent=0" target="_blank">(21) 96750-2314</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="table-title text-center content">
                                        <h3>Sábado</h3>
                                        <p>11:00 - 15:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="gallery" data-aos="zoom-in-down" data-aos-duration="2500"
                            ddata-aos-easing="ease-in-sine">
                            <div class="col-lg-10 m-auto">
                                <div class="book-table-img-slider" id="icon">
                                    <div class="swiper-wrapper">
                                        <a href="assets/images/carrousel-prato/bt1.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt1.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt2.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt3.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt3.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt4.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt4.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt1.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt1.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt2.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt3.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt3.jpg)"></a>
                                        <a href="assets/images/carrousel-prato/bt4.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/carrousel-prato/bt4.jpg)"></a>
                                    </div>

                                    <div class="swiper-button-wp">
                                        <div class="swiper-button-prev swiper-button">
                                            <i class="uil uil-angle-left"></i>
                                        </div>
                                        <div class="swiper-button-next swiper-button">
                                            <i class="uil uil-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </section>
            <section class="our-team section">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" data-aos="zoom-in-down" data-aos-duration="2000"
                                ddata-aos-easing="ease-in-sine">
                                <div class="sec-title text-center mb-5 content">
                                    <p class="sec-sub-title mb-3">A NOSSA EQUIPA</p>
                                    <h2 class="h2-title">Conheça os nossos Chefs</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row team-slider" data-aos="zoom-in-down" data-aos-duration="2500"
                            ddata-aos-easing="ease-in-sine">
                            <div class="swiper-wrapper">
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/ratatouille.jpg);"
                                            class="team-img back-img img-fluid">

                                        </div>
                                        <h3 class="h3-title">Linguini e Remy</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/paola_carosella.jpg);"
                                            class="team-img back-img img-fluid">

                                        </div>
                                        <h3 class="h3-title">Paola Carosella</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/jacquin.jpg);"
                                            class="team-img back-img img-fluid">

                                        </div>
                                        <h3 class="h3-title">Erick Jacquin</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/ana_maria.jpg);"
                                            class="team-img back-img img-fluid">

                                        </div>
                                        <h3 class="h3-title">Ana Maria Braga</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(assets/images/chef/bob_esponja.jpg);"
                                            class="team-img back-img img-fluid">

                                        </div>
                                        <h3 class="h3-title">Bob Esponja</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-wp">
                                <div class="swiper-button-prev swiper-button">
                                    <i class="uil uil-angle-left"></i>
                                </div>
                                <div class="swiper-button-next swiper-button">
                                    <i class="uil uil-angle-right"></i>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="faq-sec section-repeat-img" style="background-image: url(assets/images/faq-bg.png);">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" data-aos="zoom-in-down" data-aos-duration="2000"
                                ddata-aos-easing="ease-in-sine">
                                <div class="sec-title text-center mb-5 content">
                                    <p class="sec-sub-title mb-3">faqs</p>
                                    <h2 class="h2-title">Frequentemente <span>Questões Colocadas</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-row content" data-aos="fade-right" data-aos-duration="2500"
                            ddata-aos-easing="ease-in-sine">
                            <div class="faq-box">
                                <h4 class="h4-title">Quais são as horas de início de sessão?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">O que eu recebo o meu reembolso?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Quanto tempo demora a comida a chegar?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">O seu restaurante tem vegetais e não vegetais?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Voluptates, distinctio?</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Qual é o custo da entrega de alimentos?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Nam officiis ducimus, cum enim repudiandae animi.</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Quem é elegível para a adesão pro?</h4>
                                <p>It is Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ipsum
                                    vitae fugit laboriosam dolor distinctio. </p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </main>

        <!-- FOOTER -->
        <?php include "./partials/footer.php"; ?>

    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
    <!-- Script do Bootstrap -->
    <script src="assets/js/framework/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/framework/bootstrap.min.js"></script>
    <script src="assets/js/framework/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/framework/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/framework/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/framework/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/framework/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/framework/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/framework/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/framework/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/framework/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/framework/rellax.min.js"></script> -->
    <!-- <script src="assets/js/framework/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/framework/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dk.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/fonte.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>