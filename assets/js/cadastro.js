// Arquivo: assets/js/cadastro.js (CORRIGIDO)

let currentStep = 1;

function validarDataNascimento(data) {
    const regex = /^\d{2}\/\d{2}\/\d{4}$/;
    if (!regex.test(data)) {
        return "Formato de data inválido. Use dd/mm/aaaa.";
    }

    const [dia, mes, ano] = data.split("/").map(Number);
    const dataNascimento = new Date(ano, mes - 1, dia);

    if (dataNascimento.getDate() !== dia || dataNascimento.getMonth() !== mes - 1 || dataNascimento.getFullYear() !== ano) {
        return "Data de nascimento inválida (ex: 31/02).";
    }
    
    const dataAtual = new Date();
    let idade = dataAtual.getFullYear() - dataNascimento.getFullYear();
    const m = dataAtual.getMonth() - dataNascimento.getMonth();
    if (m < 0 || (m === 0 && dataAtual.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    if (dataNascimento > dataAtual) {
        return "Data de nascimento não pode ser no futuro.";
    }
    if (idade < 16) {
        return "Você precisa ter pelo menos 16 anos para se cadastrar.";
    }
    if (idade > 120) {
        return "Idade inválida.";
    }
    return true;
}

function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) return false;
    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
    resto = (soma * 10) % 11;
    if ((resto === 10) || (resto === 11)) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) return false;
    return true;
}

const nomePattern = /^[a-zA-ZÀ-ú\s]{2,}(\s[a-zA-ZÀ-ú\s]*)+$/;
const maePattern = /^[a-zA-ZÀ-ú\s]{2,}(\s[a-zA-ZÀ-ú\s]*)+$/;
const telefonePattern = /^\(\+\d{2}\) \d{2} \d{4}-\d{4}$/;
const celularPattern = /^\(\+\d{2}\) \d{2} \d{5}-\d{4}$/;
const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

function validateStep1() {
    const campos = {
        nome: { value: document.getElementById("nome").value, pattern: nomePattern, msg: 'Digite seu nome completo (nome e sobrenome).' },
        data: { value: document.getElementById("data").value },
        genero: { value: document.getElementById("genero").value },
        nomeMae: { value: document.getElementById("nomeMae").value, pattern: maePattern, msg: 'Digite o nome completo da sua mãe.' },
        cpf: { value: document.getElementById("cpf").value },
        email: { value: document.getElementById("email").value, pattern: emailPattern, msg: 'Formato de e-mail inválido.' },
        celular: { value: document.getElementById("celular").value, pattern: celularPattern, msg: 'Formato de celular inválido: (+55) 00 00000-0000.' },
        telefone: { value: document.getElementById("telefone").value, pattern: telefonePattern, msg: 'Formato de telefone inválido: (+55) 00 0000-0000.' }
    };

    for (const campo in campos) {
        if (!campos[campo].value) {
            exibirErro('Por favor, preencha todos os campos obrigatórios.');
            return false;
        }
        if (campos[campo].pattern && !campos[campo].pattern.test(campos[campo].value)) {
            exibirErro(campos[campo].msg);
            return false;
        }
    }

    const dataValida = validarDataNascimento(campos.data.value);
    if (typeof dataValida === 'string') {
        exibirErro(dataValida);
        return false;
    }
    
    if (!validarCPF(campos.cpf.value)) {
        exibirErro('CPF inválido.');
        return false;
    }

    return true;
}

function validateStep2() {
    const campos = ["cep", "rua", "numero", "bairro", "cidade", "uf"];
    for (const id of campos) {
        if (!document.getElementById(id).value) {
            exibirErro("Por favor, preencha todos os campos do endereço.");
            return false;
        }
    }
    return true;
}

const senhaPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{8,}$/;

function validateStep3() {
    const login = document.getElementById("loginre").value;
    const senha = document.getElementById("password").value;
    const confirmaSenha = document.getElementById("confirm_password").value;
    
    if (!login || !senha || !confirmaSenha) {
        exibirErro("Por favor, preencha todos os campos de login.");
        return false;
    }
    if (senha !== confirmaSenha) {
        exibirErro("As senhas não coincidem.");
        return false;
    }
    if (!senhaPattern.test(senha)) {
        exibirErro('A senha deve ter no mínimo 8 caracteres, incluindo maiúscula, minúscula, número e símbolo.');
        return false;
    }
    return true;
}

/**
 * NOVA FUNÇÃO: Chamada pelo botão "Cadastrar" para validar e enviar o formulário.
 */
function submitFormIfValid() {
    if (validateStep3()) {
        document.getElementById('multi-step-form').submit();
    }
}

function exibirErro(mensagem) {
    let toast = document.querySelector(`#step${currentStep} .toast`);
    if (toast) {
        toast.innerText = mensagem;
        toast.classList.add("show");
        setTimeout(() => toast.classList.remove("show"), 3000);
    }
}

function nextStep() {
    if (currentStep === 1 && validateStep1()) {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
        currentStep++;
    } else if (currentStep === 2 && validateStep2()) {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step3").style.display = "block";
        currentStep++;
    }
}

function prevStep() {
    if (currentStep === 2) {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
        currentStep--;
    } else if (currentStep === 3) {
        document.getElementById("step3").style.display = "none";
        document.getElementById("step2").style.display = "block";
        currentStep--;
    }
}

// VIA CEP
function limpa_formulário_cep() {
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('uf').value = "";
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('rua').value = conteudo.logradouro;
        document.getElementById('bairro').value = conteudo.bairro;
        document.getElementById('cidade').value = conteudo.localidade;
        document.getElementById('uf').value = conteudo.uf;
    } else {
        limpa_formulário_cep();
        exibirErro("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    const cep = valor.replace(/\D/g, '');
    if (cep !== "") {
        const validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";
            const script = document.createElement('script');
            script.src = `https://viacep.com.br/ws/${cep}/json/?callback=meu_callback`;
            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            exibirErro("Formato de CEP inválido.");
        }
    } else {
        limpa_formulário_cep();
    }
}