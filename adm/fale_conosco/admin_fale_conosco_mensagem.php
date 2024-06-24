<?php
// Incluir conexão com o BD
include_once "../../conexao.php";
                          // Consultar mensagens
$sql = "SELECT id, nome_cliente, data_criacao, status FROM mensagens";
$result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://localhost/restaurante/assets/css/style.css" rel="stylesheet">
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
            
<?php
          // Obter o ID da mensagem do parâmetro GET
$id =$_GET['id'];

// Atualizar o status para 'visualizada' e a data_atualizacao para o momento atual
$update_sql = "UPDATE mensagens SET status='visualizada', data_atualizacao=NOW() WHERE id=?";
$update_stmt = $conexao->prepare($update_sql);
$update_stmt->bind_param("i", $id);
$update_stmt->execute();
$update_stmt->close();

// Consultar a mensagem
$sql = "SELECT nome_cliente, sobrenome, email, telefone, conteudo_mensagem, data_criacao FROM mensagens WHERE id=?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nome_cliente, $sobrenome, $email, $telefone, $conteudo_mensagem, $data_criacao);
$stmt->fetch();
$stmt->close();
$conexao->close();
?>



<section data-current-page="perfil">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <div class="row">
                        <div class="fundo_bloco">
                            <div class="row p-3">
                                <div class="col-md-8 col-sm-12 px-0">
                                    <h5 class="text-white">
                                        Mensagem de "<?php echo htmlspecialchars($nome_cliente); ?>"
                                    </h5>
                                </div>

                                <!-- Bloco qualquer -->
                                <div class="mt-2 justify-content-end">
                                    <div class="card">
                                        <div class="lista_admin_fale_conosco">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="px-4">Email</th>
                                                        <th class="px-1">N° do Cliente</th>
                                                        <th class="px-1">Telefone</th>
                                                        <th class="px-1">Data de Recebimento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($email); ?></td>
                                                        <td><?php echo htmlspecialchars($id); ?></td>
                                                        <td><?php echo htmlspecialchars($telefone); ?></td>
                                                        <td><?php echo htmlspecialchars($data_criacao); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h5 class="px-4">Mensagem</h5>
                                            <div class="card bb">
                                                <p class="px-1 text-white"><?php echo nl2br(htmlspecialchars($conteudo_mensagem)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="admin_fale_conosco.php" class="lista_admin_fale_conosco_voltar">Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






          </main>
    </div>

    <!-- Script do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="../assets/js/dk.js"></script>
        <script src="/assets/js/script.js"></script>
    </body>

</html>
