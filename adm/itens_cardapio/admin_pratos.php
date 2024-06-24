<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

// Consulta para listar todos os pratos
$sql = "SELECT id,imagem, nome, descricao, preco, status FROM cardapio";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
  <title>Sabor Bom Sucesso Restaurante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="<?php echo $url?>/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Link do google para icon-->
</head>

<body>
  <div class="bloco_protecao"></div> <!-- Bloco Branco -->
  <div class="d-flex flex-column wrapper">
    <!-- NAVBAR -->
    <?php include_once "../../navbar.php"; ?>

    <!-- Conteúdo principal -->
    <main class="flex-fill" id="profile">
      <!-- Conteúdo LATERAL -->
      <?php include_once "../partials/nav_lateral_adm.php"; ?>

      <section data-current-page="perfil">
        <div class="container">
          <div class="row">
            <div class="col-12 my-4">
              <div class="row">

                <div class="fundo_bloco">
                  <div class="row p-3">
                    <div class="col-md-10 col-sm-12 px-0">
                      <h5 class="text-white">
                        Cardápio
                      </h5>
                    </div>
                    <div class="col-md-2 col-sm-12 px-0">
                      <h5 class="text-white">
                        <a href="admin_pratos_adicionar.php" class="adm_botao_cardapio">Adicionar</a>
                      </h5>
                    </div>

                    <!-- Bloco qualquer -->
                    <div class="mt-2">
                      <div class="card">
                        <div class="lista_admin_fale_conosco">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="px-4">Foto</th>
                                <th class="px-4">Arquivo</th>
                                <th class="px-4">Nome</th>
                                <th class="px-4">Descrição</th>
                                <th class="px-1">Preço</th>
                                <th class="px-1">Status</th>
                                <th class="px-4">Ação</th>
                                <th></th>
                              </tr>
                              <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo '<td><img src="' . $url . '/adm/uploads/' . $row['imagem'] . '" class="card-img-top" height="35" alt="' . $row['nome'] . '"></td>';
                                        echo "<td>" . $row['imagem'] . "</td>";
                                        echo "<td>" . $row['nome'] . "</td>";
                                        echo "<td>" . $row['descricao'] . "</td>";
                                        echo "<td>" . $row['preco'] . "</td>";
                                        echo "<td>" . ($row['status'] ? 'Ativo' : 'Inativo') . "</td>";
                                        echo "<td>";
                                        echo "<a href='admin_pratos_editar.php?id=" . $row['id'] . "' class='lista_admin_fale_conosco_botao'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z' />
                                              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z' />
                                            </svg></a> |";
                                        echo "<a href='admin_pratos_deletar.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja deletar?\")' class='lista_admin_fale_conosco_botao m-1'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                              <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z' />
                                              <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z' />
                                            </svg></a> | ";
                                        echo "<a href='admin_pratos_visualizar.php?id=" . $row['id'] . "' class='lista_admin_fale_conosco_botao'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                              <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0' />
                                              <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7' />
                                              </svg></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Nenhum cardápio encontrado</td></tr>";
                                }
                              ?>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
      </section>

    </main>

  </div>

  <!-- Script do Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?php echo $url?>/assets/js/script.js"></script>
  <script src="<?php echo $url?>/assets/js/dk.js"></script>
  <script src="<?php echo $url?>/assets/js/fonte.js"></script>
</body>

</html>
<?php
$conexao->close();
?>
