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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> <!-- Link do sitema de verificação de numero-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> <!-- Link do sitema de verificação de numero-->
</head>

<body>

    <div class="bloco_protecao"></div> <!-- Bloco Branco -->

    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <?php include_once "./navbar.php"; ?>

        <!-- carrinho lateral -->
        <?php include_once "./partials/carrinho.php"; ?>
        

<!-- Conteúdo principal -->
<main class="flex-fill">
  <!-- PORTFOLIO -->
  <div class="container my-5">
      <div class="row">
          <!-- Criador 1 -->
          <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/oseias.jpg" class="text-center img_port" alt="Foto Criador 1">
                  <div class="card-body">
                      <p class="card-title t_cor h5">Oséias Cavalcante de Melo</p>
                      <p class="card-text t_cor">
                          Email: oseiasmelo@souunisuam.com.br<br>
                          Turma: ADS0101N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 23201310
                      </p>
                  </div>
              </div>
          </div>

          <!-- Criador 2 -->
          <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/jose.jpg" class="text-center img_port" alt="Foto Criador 2">
                  <div class="card-body">
                      <p class="card-title t_cor h5">José Luiz Garruth de Almeida Júnior</p>
                      <p class="card-text t_cor">
                          Email: josegarruth@souunisuam.com.br<br>
                          Turma: ADS0202N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 00000000
                      </p>
                  </div>
              </div>
          </div>

          <!-- Criador 3 -->
          <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/jorge.jpg" class="text-center img_port" alt="Foto Criador 3">
                  <div class="card-body">
                      <p class="card-title t_cor h5">Jorge Luiz Aguiar do Nascimento Filho</p>
                      <p class="card-text t_cor">
                          Email: jorgeluizfilho@souunisuam.com.br<br>
                          Turma: ADS0202N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 00000000
                      </p>
                  </div>
              </div>
          </div>
           <!-- Criador 4 -->
           <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/lucas.jpg" class="text-center img_port" alt="Foto Criador 4">
                  <div class="card-body">
                      <p class="card-title t_cor h5">Lucas de Oliveira da Silva</p>
                      <p class="card-text t_cor">
                          Email: lucas.oliveira.s@souunisuam.com.br<br>
                          Turma: ADS0202N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 00000000
                      </p>
                  </div>
              </div>
          </div>
          <!-- Criador 5 -->
          <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/quaresma.jpg" class="text-center img_port" alt="Foto Criador 5">
                  <div class="card-body">
                      <p class="card-title t_cor h5">Gabriel Quaresma Araujo</p>
                      <p class="card-text t_cor ">
                          Email: quaresma.a@souunisuam.com.br<br>
                          Turma: ADS0202N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 00000000
                      </p>
                  </div>
              </div>
          </div>
          <!-- Criador 6 -->
          <div class="col-md-4">
              <div class="card border border-3 shadow-lg p-1 mb-1 m-2 p-2 bg-transparent">
                  <img src="assets/images/grupo/bruno.jpg" class="text-center img_port" alt="Foto Criador 6">
                  <div class="card-body">
                      <p class="card-title t_cor h5">Bruno de Almeida Araujo</p>
                      <p class="card-text t_cor">
                          Email: bruno.almeida.araujo@souunisuam.com.br<br>
                          Turma: ADS0202N<br>
                          Curso: SUPERIOR DE TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS<br>
                          Matrícula: 23202849
                      </p>
                  </div>
              </div>
          </div>

      </div>
  </div>
</main>



        <!-- FOOTER -->
        <?php include "./partials/footer.php"; ?>

    </div>
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



