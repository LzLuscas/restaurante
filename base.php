<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Link do google para icon-->
</head>

<body>

    <div class="bloco_protecao"></div> <!-- Bloco Branco -->

    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="menu_flutuante">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/images/logos/logonavbar.png" class="logomenu" width="80px" alt="LOGO">
                </a>  
                <div class="bloco_central"></div> <!-- Bloco Branco -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- LINKS NAV BAR -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav justify-content-center flex-grow-1 ">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 fw-bold" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 fw-bold" href="cardapio.php">Cardápio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 fw-bold" href="contato.php">Fale Conosco</a>
                        </li>
                    </ul>
                    <a href="" class="btn btn-primary position-relative fa">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                        </span>
                    </a>
                    <div class="btn-container">
                        <span id="controle_zoom">
                            <a href="javascript:void(0);" id="btnAumentar">A+</a> | <a href="javascript:void(0);" id="btnDiminuir">A-</a>
                        </span>
                    </div>
        
                    <div class="dark-mod">
                        <input type="checkbox" class="checkbox" id="chk" />
                        <label class="label" for="chk">
                            <i class="fas fa-moon"></i>
                            <i class="fas fa-sun"></i>
                            <div class="ball"></div>
                        </label>
                    </div>
                    <a href="login/login.php" class="botaologin justify-content-end mx-4">Login</a>
                </div>
            </div>
        </nav>
        

        <!-- Conteúdo principal -->
        <main class="flex-fill">

        </main>


        <!-- Footer -->
        
        <footer class="footer bg-dark text-white text-center">

<div class="container-fluid">
    <div class="row justify-content-center">
      <ul class="col-3 col-lg-3 col-7">
        <a href="#">
          <img src="assets/images/logos/logo_footer2.png" alt="logo" width="180" class="img-fluid">
        </a> 
        <p class="texto_ajustado">Bem-vindo ao Sabor Bom Sucesso, o restaurante que é referência em Bonsucesso há mais de 25 anos!
                                  Aqui, o paladar é surpreendido por uma variada e autêntica seleção de comidas.
        </p>    
      </ul>

      <ul class="info-footer col-3 col-lg-3 col-7">
        <h4>Menu</h4>
        <br>
        <li><a href="#">Home</a></li>
        <li><a href="#">Cardápio</a></li>
        <li><a href="#">Fale Conosco</a></li>
      </ul>

      <ul class="info-footer col-3 col-lg-3 col-7">
        <li>
          <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
          </svg> Horários de Funcionamento </h5>
          <br>
          
        </li>
        <li>Segunda a Sexta de 11h às 15:30</li>
        <li>Sábado de 11h às 15h</li>
      </ul>

      <ul class="info-footer col-3 col-lg-3 col-7">
        <li>
          <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
          </svg> Bonsucesso</h5>
        </li>
        <br>

          <a href="https://www.google.com/maps/place/Rua+Cardoso+de+Morais,+51+-+Bonsucesso,+Rio+de+Janeiro+-+RJ,+21032-000/@-22.8651493,-43.2550787,17z/data=!3m1!4b1!4m6!3m5!1s0x997c0171beaaab:0xc63bc21ffbc53a9b!8m2!3d-22.8651493!4d-43.2550787!16s%2Fg%2F11g9nlv02d?entry=ttu"
          target="_blank" class="text-decoration-none endereco_cor">
        <li>Rua Cardoso de Morais, 51<br>
            Rio de Janeiro - RJ, 21032-000
        </li>
          </a>
          
          <div class="social-midia-footer">
            <br>
        <span>Siga-nos</span>
        <br>
        <br>
        <a href="https://api.whatsapp.com/message/IHMEQ73OGTFYI1?autoload=1&app_absent=0"
            target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
            </svg></a>

        <a href="https://www.instagram.com/saborbomsucesso/" target="_blank"><svg
                xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                class="bi bi-instagram" viewBox="0 0 16 16">
                <path
                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" /></svg></a>
          </div>
      </ul>

    </div>
</div>

<div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2)">
    ©2024 Copyright
    <a class="text-white text-decoration-none" href="portfolio.php">ADS</a>
</div>
</footer>

    </div>

    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
