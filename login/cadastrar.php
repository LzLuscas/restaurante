<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/cadastroLogin/cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<script>
    window.onload = function () {
        // Verificar se a mensagem está presente na URL
        var mensagem = "<?php echo isset($_GET['mensagem']) ? $_GET['mensagem'] : ''; ?>";
        if (mensagem) {
            alert(mensagem);
        }
    }
</script>

<body>
    <main class="d-flex align-items-center justify-content-center">
        <div class="form-container m-4" id="form-container">
            <form id="multi-step-form" action="action/cadastro.php" method="post" onsubmit="return validateStep3()">
                <div id="step1">

                    <div class="info-step-1">
                        <p class="p-1">Detalhes pessoais</p>
                        <p class="p-2">Endereço</p>
                        <p class="p-3">Login</p>

                    </div>
                    <div id="toast" class="toast"></div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome aqui" required>
                    </div>

                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-calendar-heart" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1m7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                        </svg>
                        <input type="text" class="form-style" placeholder="Data de Nascimento" autocomplete="off"
                            id="data" name="data" onkeypress="$(this).mask('00/00/0000')" pattern="[0-9 | /]" required>
                    </div>

                    <div class="select">
                        <select id="genero" name="genero" required>
                            <option value="" disabled selected>Selecione seu sexo aqui</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>


                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <input type="text" id="nomeMae" name="nomeMae" placeholder="Digite o nome materno aqui"
                            required>
                    </div>


                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o seu CPF aqui"
                            id="cpf" name="cpf" onkeypress="$(this).mask('000.000.000-00');"
                            pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                        </svg>
                        <input type="email" id="email" name="email" placeholder="Digite seu email aqui" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <input type="tel" class="form-style" autocomplete="off"
                            placeholder="Digite seu telefone celular aqui" id="celular" name="celular"
                            onkeypress="$(this).mask('(+55) 00 00000-0009')" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <input type="tel" class="form-style" autocomplete="off"
                            placeholder="Digite seu telefone fixo aqui" id="telefone" name="telefone"
                            onkeypress="$(this).mask('(+55) 00 0000-0000')" required>
                    </div>

                    <div class="mb-4">
                        <button type="button" class="next" onclick="nextStep()">Próximo</button>
                    </div>
                </div>

                <div id="step2" style="display: none;">
                    <div class="info-step-2">
                        <p class="p-1">Detalhes pessoais</p>
                        <p class="p-2">Endereço</p>
                        <p class="p-3">Login</p>
                    </div>
                    <div id="toast" class="toast"></div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-globe-americas" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o CEP aqui"
                            onkeypress="$(this).mask('00000-000')" name="cep" id="cep" value=""
                            onblur="pesquisacep(this.value);" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o logradouro aqui"
                            name="rua" id="rua" size="60" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o numero aqui"
                            name="numero" id="numero" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" id="complemento" name="complemento"
                            placeholder="Digite o complemento aqui">
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o bairro aqui"
                            name="bairro" id="bairro" size="40" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="digite a sua cidade aqui"
                            name="cidade" id="cidade" size="40" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="digite a UF aqui"
                            name="uf" id="uf" size="2" required>
                    </div>
                    <div class="mb-4">
                        <button type="button" class="back" onclick="prevStep()">Voltar</button>
                        <button type="button" class="next" onclick="nextStep()">Próximo</button>
                    </div>
                </div>

                <div id="step3" style="display: none;">
                    <div class="info-step-3">
                        <p class="p-1">Detalhes pessoais</p>
                        <p class="p-2">Endereço</p>
                        <p class="p-3">Login</p>
                    </div>
                    <div id="toast" class="toast"></div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <input type="text" class="form-style" autocomplete="off" placeholder="Digite o login Aqui"
                            minlength="6" maxlength="6" pattern="^[a-záàâãéèêíïóôõöúç]+$" id="loginre" name="loginre"
                            title="Apenas letras do alfabeto são permitidas" required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <input type="password" class="form-style" autocomplete="off" placeholder="Digite sua senha aqui"
                            id="password" minlength="8" name="password"
                            pattern="^(?=.*[A-Z])(?=.*[!#@$%&])(?=.*[0-9])(?=.*[a-z]).{6,15}$"
                            title="Deve conter pelo menos um caracter especial, uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres"
                            required>
                    </div>
                    <div class="input-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <input type="password" class="form-style" autocomplete="off" id="confirm_password" minlength="8"
                            placeholder="Confirme sua senha" required>
                    </div>

                    <div id="confirmation"></div>
                    <div class="mb-4">
                        <button type="button" class="back" onclick="prevStep()">Voltar</button>
                        <button type="submit" class="next">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="success-message" style="display: none;">
            <h1>Informações enviadas com sucesso.</h1>
        </div>
    </main>
    <!-- Inclua a biblioteca Toastr via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="../assets/js/cadastro.js"></script>
</body>

</html>