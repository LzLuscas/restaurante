<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
    $status = isset($_POST['status']) ? 1 : 0;

    // Preparar e executar a inserção no banco de dados
    $stmt = $conexao->prepare("INSERT INTO cardapio (nome, descricao, preco, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $nome, $descricao, $preco, $status);
    
    if ($stmt->execute()) {
        $prato_id = $stmt->insert_id; // ID do prato recém-criado

        // Verifica se uma imagem foi enviada
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $imagemNome = basename($_FILES['imagem']['name']);
            $imagemTmp = $_FILES['imagem']['tmp_name'];
            $imagemPasta = '../uploads/' . $imagemNome;

            // Verificar se o diretório de uploads existe e criar se não existir
            if (!is_dir('../uploads')) {
                mkdir('../uploads', 0777, true);
            }

            // Move a imagem para o diretório de uploads
            if (move_uploaded_file($imagemTmp, $imagemPasta)) {
                // Atualiza a tabela cardapio com o nome da imagem
                $stmtImagem = $conexao->prepare("UPDATE cardapio SET imagem = ? WHERE id = ?");
                $stmtImagem->bind_param("si", $imagemNome, $prato_id);

                if ($stmtImagem->execute()) {
                    header('Location: admin_pratos.php');
                } else {
                    echo "Erro ao salvar a imagem: " . $stmtImagem->error;
                }
            } else {
                echo "Erro ao mover a imagem para o diretório de uploads.";
            }
        } else {
            header('Location: admin_pratos.php');
        }
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo $url?>/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Link do google para icon-->
</head>

<body>
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->
    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <?php include_once "../../navbar.php"; ?>
        

          <!-- Conteúdo principal -->
          <main class="flex-fill" id="profile">

             <!-- Conteúdo LATERAL -->
            <div class="offcanvas offcanvas-start" id="demo">
              <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="nav flex-column">
                  <li class="nav-item perfil-link">
                    <a href="admin_index.php" class="nav-link perfil-link active">
                      <span>Meu Perfil</span>
                      <i>
                        <ion-icon name="person-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_pratos.php" class="nav-link">
                      <span>Cardápio</span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_lista_clientes.php" class="nav-link">
                      <span>Clientes</span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_financeiro.php" class="nav-link">
                      <span>Financeiro</span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_modelo_db.php" class="nav-link">
                      <span>Modelo DB</span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_fale_conosco.php" class="nav-link">
                      <span>Fale conosco </span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                  <li class="nav-item atendimento-link">
                    <a href="admin_pedidos.php" class="nav-link">
                      <span>Pedidos</span>
                      <i>
                        <ion-icon name="headset-outline"></ion-icon>
                      </i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
            <div class="container-fluid ">
              <button class="btn botao_admin_lateral " type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                  <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                </svg>
              </button>
            </div>

            
            <section data-current-page="perfil" >
              <div class="container">
                <div class="row">
                  <div class="col-12 my-4">
                    <div class="row">

                      <div class="fundo_bloco">
                        <div class="row p-3">
                          <div class="col-md-8 col-sm-12 px-0">
                          <a href="http://localhost/restaurante/adm/itens_cardapio/admin_pratos.php" class="lista_admin_fale_conosco_voltar">Voltar</a>
                          </div>

        <!-- Adicionar prato -->
        <div class="cardapio_adicionar_prato card mx-4 my-5 p-5 text-center">
            <h1 class="h3 mb-3 fw-normal">Adicionar Novo Prato</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome aqui" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required placeholder="Descrição do prato aqui"></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" required placeholder="R$ 0,00">
                </div>
                <div class="mb-3">
                    <label for="imagem" type="submit" class="btn botao_geral_cardapio">Imagem:</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*" required>
                </div>
                <button type="submit" class="btn botao_geral_cardapio">Salvar Alterações</button>
            </form>
        </div>
    </main>


</div>

<!-- Script do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
crossorigin="anonymous"></script>
<script src="<?php echo $url?>/assets/js/script.js"></script>
<script src="<?php echo $url?>/assets/js/dk.js"></script>
</body>
</html>

<?php
mysqli_close($conexao);
?>
