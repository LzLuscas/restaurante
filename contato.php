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
        

        <!-- Conteúdo principal -->
        <main class="flex-fill">

       <!-- Blocos de Informações 3 -->
       <div class="container mt-5">
        <div class="row justify-content-center m-5">


        <!-- Caixa de informação do formulario -->
            <div class="col-md-6 content">
                <div class="container_informativo">
                  <div class="text-center">
                    <img src="assets/images/imagem_formulario.jpg" alt="Sua Imagem" class="img-fluid mb-3">
                </div>

                <div>
                    <h3 class="text-center text-white mb-4 fw-bold">Entre em Contato</h3>
                    <p class="texto_justificado_formulario">Valorizamos sua opinião e sua experiência conosco. Estamos ansiosos para receber suas sugestões
                         e feedback para continuarmos aprimorando nossos serviços. 
                        Sua contribuição é fundamental para o nosso crescimento e melhoria contínua.</p>
                </div>

                  </div>
             </div>

          <div class="col-md-6 content">
            <div class="container_formulario"> 
        <!-- Formulario -->
              <form action="contato_enviar.php" method="post">
              <div class="mb-3">
                <label for="name-f" class="form-label mx-3 texto_formulario fw-bold">Nome</label>
                <input type="text" class="form-control border border-3 shadow-lg p-1 mb-1 bg-white m-2 p-2" name="name" id="name-f" placeholder="Digite seu Nome" required>
              </div>
              <div class="mb-3">
                <label for="name-l" class="form-label mx-3 texto_formulario fw-bold">Sobrenome</label>
                <input type="text" class="form-control border border-3 shadow-lg p-1 mb-1 bg-white m-2 p-2" name="Sobrenome" id="name-l" placeholder="Digite seu Sobrenome" required>
              </div>
              <div class="mb-3">
                <label for="email"  class="form-label  mx-3 texto_formulario fw-bold">Email</label>
                <input type="email" class="form-control  border border-3 shadow-lg p-1 mb-1 bg-white m-2 p-2" name="email" id="email" placeholder="Digite seu E-mail" required>
              </div>  
              <div class="mb-3">
                <label for="tel" class="form-label mx-3 texto_formulario fw-bold">Telefone</label>
                <input type="tel" class="form-control border border-3 shadow-lg p-1 mb-1 bg-white m-2 p-2" name="tel" id="tel" placeholder="Digite o número do seu Telefone" required onkeypress="$(this).mask('(00) 00000-0009')">
              </div>
              <div class="mb-3">
                <label for="mens" class="form-label mx-3 texto_formulario fw-bold">Mensagem</label>
                <textarea type="mens"  class="form-control border border-3 shadow-lg p-1 mb-1 bg-white m-2 p-2" name="mens" id="mens" rows="4" placeholder="Digite aqui a sua Mensagem" required></textarea>
              </div>
              <a href="#">
              <button type="submit" class="btn mx-3 botao_formulario" onclick="submitForm()" > Enviar</button>
            </a>
              </form>
              </div>
         </div>
        </div>
       </div>
            
        </main>


        <!-- FOOTER -->
        <?php include "./partials/footer.php"; ?>

    </div>
    <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/dk.js"></script>
    <script src="assets/js/fonte.js"></script>
</body>

</html>
