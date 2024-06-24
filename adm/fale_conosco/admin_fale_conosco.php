
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logos/icon_logo.png" type="image/x-icon">
    <title>Sabor Bom Sucesso Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://localhost/restaurante/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Link do google para icon-->
    <link rel="stylesheet" href="../assets/css/adm/styleAdmin.css">
</head>

<body>
    <div class="bloco_protecao"></div> <!-- Bloco Branco -->
    <div class="d-flex flex-column wrapper" >
        <!-- NAVBAR -->
        <?php include_once "../../navbar.php"; ?>
        

          <!-- Conteúdo principal -->
          <main class="flex-fill" id="profile">

             <!-- Conteúdo LATERAL -->
             <?php include_once "../partials/nav_lateral_adm.php"; ?>

            
            <section data-current-page="perfil" >
              <div class="container">
                <div class="row">
                  <div class="col-12 my-4">
                    <div class="row">

                      <div class="fundo_bloco">
                        <div class="row p-3">
                          <div class="col-md-8 col-sm-12 px-0">
                            <h5 class="text-white">
                              Mensagens dos Clientes
                            </h5>
                          </div>


<?php
// Incluir conexão com o BD
include_once "../../conexao.php";

                          // Consultar mensagens
$sql = "SELECT id, nome_cliente, data_criacao, status FROM mensagens";
$result = $conexao->query($sql);
?>



                          <table class="table">
                        
        <tr>
          <th>Nome</th>
          <th>N do Cliente</th>
            <th>Data de Recebimento</th>
            <th>Situação</th>
            <th>Ação</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
              if (ucfirst($row["status"])=="Pendente"){
                echo "<tr class=\"table-danger\">";
              }
              else{
                echo "<tr>";
              }
                
                echo "<td>" . $row["nome_cliente"] . "</td>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["data_criacao"] . "</td>";
                echo "<td>" . ucfirst($row["status"]) . "</td>";
                echo "<td><a href='admin_fale_conosco_mensagem.php?id=" . $row["id"] ."'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-eye-fill\" viewBox=\"0 0 16 16\">
                                            <path d=\"M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0\"/>
                                            <path d=\"M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7\"/>
                                          </svg></a></td>";
                echo "</tr>";
              
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma mensagem encontrada</td></tr>";
        }
        ?>
    </table>



                            
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
