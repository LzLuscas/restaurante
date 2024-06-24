<?php
if (isset($_GET['idPedidos'])) {
    $idPedidos = $_GET['idPedidos'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/logos/icon_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pagamento</title>
</head>

<body>
    <!--Font Awesome CDN-->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 400px;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1),
                0 5px 12px -2px rgba(0, 0, 0, 0.1),
                0 18px 36px -6px rgba(0, 0, 0, 0.1);
        }

        .container .title {
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container form input {
            display: none;
        }

        .container form .category {
            margin-top: 10px;
            padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 15px;
        }

        .category label {
            height: 145px;
            padding: 20px;
            box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 5px;
            position: relative;
        }

        #visa:checked~.category .visaMethod,
        #mastercard:checked~.category .mastercardMethod,
        #paypal:checked~.category .paypalMethod,
        #amex:checked~.category .amexMethod {
            box-shadow: 0px 0px 0px 1px #6064b6;
        }

        #visa:checked~.category .visaMethod .check,
        #mastercard:checked~.category .mastercardMethod .check,
        #paypal:checked~.category .paypalMethod .check,
        #amex:checked~.category .amexMethod .check {
            display: block;
        }

        label .imgName {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            flex-direction: column;
            gap: 10px;
        }

        .imgName span {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            top: 72%;
            transform: translateY(-72%);
        }

        .imgName .imgContainer {
            width: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 35%;
            transform: translateY(-35%);
        }

        img {
            width: 50px;
            height: auto;
        }

        .visa img {
            width: 80px;
        }

        .mastercard img {
            width: 65px;
        }

        .paypal img {
            width: 80px;
        }

        .amex img {
            width: 50px;
        }

        .check {
            display: none;
            position: absolute;
            top: -4px;
            right: -4px;
        }

        .check i {
            font-size: 18px;
        }

        .bloco_acao {
            text-align: center;
            margin: 15px auto 10px;
            background-color: transparent;
            padding: 10px 10px 10px 10px;
            border-radius: 4px;
        }
    </style>

    <?php

    ?>
    <div class="container">
        <div class="title">
            <h4>Selecione o método de <span style="color: #6064b6">Pagamento</span></h4>
        </div>

        <form id="paymentForm" action="formaPagamento.php?idPedidos=<?php echo $idPedidos ?>" method="POST">

            <input type="radio" name="formaPagamento" id="visa" value="visa">
            <input type="radio" name="formaPagamento" id="mastercard" value="mastercard">
            <input type="radio" name="formaPagamento" id="paypal" value="dinheiro">
            <input type="radio" name="formaPagamento" id="amex" value="pix">

            <div class="category">
                <label for="visa" class="visaMethod">
                    <div class="imgName">
                        <div class="imgContainer visa">
                            <img src="https://i.ibb.co/vjQCN4y/Visa-Card.png" alt="">
                        </div>
                        <span class="name">VISA</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="mastercard" class="mastercardMethod">
                    <div class="imgName">
                        <div class="imgContainer mastercard">
                            <img src="https://i.ibb.co/vdbBkgT/mastercard.jpg" alt="">
                        </div>
                        <span class="name">Mastercard</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="paypal" class="paypalMethod">
                    <div class="imgName">
                        <div class="imgContainer paypal">
                            <img src="https://conceito.de/wp-content/uploads/2012/01/banknotes-159085_1280.png" alt="">
                        </div>
                        <span class="name">Dinheiro</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="amex" class="amexMethod">
                    <div class="imgName">
                        <div class="imgContainer amex">
                            <img src="./assets/images/logo-pix-520x520.png" alt="">
                        </div>
                        <span class="name">PIX</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>
            </div>


            <div class="bloco_acao text-center">
                <button type="submit" id="confirmBtn" class="btn bloco_adicionar" style="height: 30px; width:75px;">Confirmar</button>
            </div>
        </form>
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

</body>

</html>