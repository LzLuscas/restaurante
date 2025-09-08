<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Sabor Bom Sucesso</title>
    <link rel="stylesheet" href="../assets/css/cadastroLogin/cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex align-items-center justify-content-center">
        <div class="form-container m-4" id="form-container">
            <form id="multi-step-form" action="action/cadastro.php" method="POST">
                
                <div id="step1">
                    <div class="info-step-1">
                        <p class="p-1"><strong>Detalhes pessoais</strong></p>
                        <p class="p-2 text-muted">Endereço</p>
                        <p class="p-3 text-muted">Login</p>
                    </div>
                    <div class="toast"></div>

                    <div class="input-box">
                        <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
                    </div>
                    <div class="input-box">
                        <input type="text" id="data" name="data" placeholder="Data de Nascimento (dd/mm/aaaa)" onkeypress="$(this).mask('00/00/0000')" required>
                    </div>
                    <div class="select">
                        <select id="genero" name="genero" required>
                            <option value="" disabled selected>Selecione seu sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="text" id="nomeMae" name="nomeMae" placeholder="Nome materno completo" required>
                    </div>
                    <div class="input-box">
                        <input type="text" id="cpf" name="cpf" placeholder="CPF" onkeypress="$(this).mask('000.000.000-00');" required>
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-box">
                        <input type="tel" id="celular" name="celular" placeholder="Celular (+55) 00 00000-0000" onkeypress="$(this).mask('(+55) 00 00000-0009')" required>
                    </div>
                    <div class="input-box">
                        <input type="tel" id="telefone" name="telefone" placeholder="Telefone fixo (+55) 00 0000-0000" onkeypress="$(this).mask('(+55) 00 0000-0000')" required>
                    </div>
                    <div class="mb-4">
                        <button type="button" class="next" onclick="nextStep()">Próximo</button>
                    </div>
                </div>

                <div id="step2" style="display: none;">
                    <div class="info-step-2">
                        <p class="p-1 text-muted">Detalhes pessoais</p>
                        <p class="p-2"><strong>Endereço</strong></p>
                        <p class="p-3 text-muted">Login</p>
                    </div>
                    <div class="toast"></div>
                    
                    <div class="input-box">
                        <input type="text" name="cep" id="cep" placeholder="CEP" onkeypress="$(this).mask('00000-000')" onblur="pesquisacep(this.value);" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="rua" id="rua" placeholder="Rua / Logradouro" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="numero" id="numero" placeholder="Número" required>
                    </div>
                    <div class="input-box">
                        <input type="text" id="complemento" name="complemento" placeholder="Complemento (opcional)">
                    </div>
                    <div class="input-box">
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>
                    </div>
                    <div class="input-box">
                        <input type="text" name="uf" id="uf" placeholder="Estado (UF)" required>
                    </div>
                    <div class="mb-4">
                        <button type="button" class="back" onclick="prevStep()">Voltar</button>
                        <button type="button" class="next" onclick="nextStep()">Próximo</button>
                    </div>
                </div>

                <div id="step3" style="display: none;">
                    <div class="info-step-3">
                        <p class="p-1 text-muted">Detalhes pessoais</p>
                        <p class="p-2 text-muted">Endereço</p>
                        <p class="p-3"><strong>Login</strong></p>
                    </div>
                    <div class="toast"></div>
                    
                    <div class="input-box">
                        <input type="text" id="loginre" name="loginre" placeholder="Usuário (6 caracteres)" minlength="6" maxlength="6" required>
                    </div>
                    <div class="input-box">
                        <input type="password" id="password" name="password" placeholder="Senha" minlength="8" required>
                    </div>
                    <div class="input-box">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme sua senha" minlength="8" required>
                    </div>
                    <div class="mb-4">
                        <button type="button" class="back" onclick="prevStep()">Voltar</button>
                        <button type="button" class="next" onclick="submitFormIfValid()">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="success-message" style="display: none;">
            <h1>Informações enviadas com sucesso.</h1>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/cadastro.js"></script>

    <script>
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const mensagem = urlParams.get('mensagem');
            if (mensagem) {
                exibirErro(mensagem);
            }
        };
    </script>
</body>
</html>