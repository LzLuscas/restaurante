let currentStep = 1;
function validarDataNascimento(data) {
  const regex = /^\d{2}\/\d{2}\/\d{4}$/;
  if (!regex.test(data)) {
    return "A data de nascimento inserida é inválida. Por favor, verifique e tente novamente.";
  }

  const [dia, mes, ano] = data.split("/").map(Number);

  if (mes < 1 || mes > 12) {
    return "O mês inserido é inválido. Por favor, verifique e tente novamente.";
  }

  const dataNascimento = new Date(ano, mes - 1, dia);
  const dataAtual = new Date();
  const idadeEmAnos = dataAtual.getFullYear() - dataNascimento.getFullYear();

  if (dataNascimento > dataAtual) {
    return "A data de nascimento inserida é no futuro. Por favor, verifique e tente novamente.";
  }
  if (idadeEmAnos < 16) {
    return "Você precisa ter pelo menos 16 anos para se cadastrar.";
  }

  if (idadeEmAnos > 100) {
    return "Você não pode ter mais de 100 anos para se cadastrar.";
  }

  return true;
}

function validarCPF(cpf) {
  cpf = cpf.replace(/[^\d]+/g, ""); // Remover caracteres não numéricos

  if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
    return false;
  }

  let sum = 0;
  let remainder;

  for (let i = 1; i <= 9; i++) {
    sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
  }

  remainder = (sum * 10) % 11;

  if (remainder === 10 || remainder === 11) {
    remainder = 0;
  }

  if (remainder !== parseInt(cpf.substring(9, 10))) {
    return false;
  }

  sum = 0;

  for (let i = 1; i <= 10; i++) {
    sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);
  }

  remainder = (sum * 10) % 11;

  if (remainder === 10 || remainder === 11) {
    remainder = 0;
  }

  if (remainder !== parseInt(cpf.substring(10, 11))) {
    return false;
  }

  return true;
}
const nomePattern = /^[a-zA-Záàâãéèêíïóôõöúç]+( [a-zA-Záàâãéèêíïóôõöúç]+)+$/;
const maePattern = /^[a-zA-Záàâãéèêíïóôõöúç]+( [a-zA-Záàâãéèêíïóôõöúç]+)+$/;
const telefonePattern = /^\(\+\d{2}\) \d{2} \d{4}-\d{4}$/;
const celularPattern = /^\(\+\d{2}\) \d{2} \d{5}-\d{4}$/;
const emailPattern =
  /^[a-zA-Z0-9._%+-]{6,}[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

function validateStep1() {
  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const dataNascimento = document.getElementById("data").value;
  const sexo = document.getElementById("genero").value;
  const nomeMae = document.getElementById("nomeMae").value;
  const cpfInput = document.getElementById("cpf");
  const cpf = cpfInput.value;
  const celular = document.getElementById("celular").value;
  const telefone = document.getElementById("telefone").value;

  // Verifica se algum dos campos está vazio
  if (
    !nome ||
    !email ||
    !dataNascimento ||
    !sexo ||
    !nomeMae ||
    !celular ||
    !telefone
  ) {
    exibirErro("Por favor, preencha todos os campos para prosseguir.");
    return false; // Retorna falso para indicar erro de validação
  }

  // Verifica se o nome estar com numericos  ou caracteres especiais
  if (!nomePattern.test(nome)) {
    exibirErro('O campo "nome" permite somente letras.');
    return false; // Retorna falso indicando erro de validação
  }

  // Verifica se a data de nascimento é válida usando a função validarDataNascimento
  const dataValida = validarDataNascimento(dataNascimento);
  if (typeof dataValida === "string") {
    exibirErro(dataValida);
    return false; // Retorna falso indicando erro de validação
  }

  // Verifica se o nome estar com numericos  ou caracteres especiais
  if (!maePattern.test(nomeMae)) {
    exibirErro('O campo "nome materno" permite somente letras.');
    return false; // Retorna falso indicando erro de validação
  }

  // Verifica se o CPF é válido usando a função validarCPF
  if (!validarCPF(cpf)) {
    exibirErro(
      "O CPF inserido é inválido. Por favor, verifique e tente novamente."
    );
    return false; // Retorna falso indicando erro de validação
  }

  // Verifica se o email estar faltando algo
  if (!emailPattern.test(email)) {
    exibirErro(
      'O campo "email" inserido é inválido. Por favor, verifique e tente novamente.'
    );
    return false; // Retorna falso indicando erro de validação
  }
  // Verifica se o numero da forma correta
  if (!celularPattern.test(celular)) {
    exibirErro(
      "O Celular inserido é inválido. Por favor, verifique e tente novamente."
    );
    return false; // Retorna falso indicando erro de validação
  }
  // Verifica se o numero da forma correta
  if (!telefonePattern.test(telefone)) {
    exibirErro(
      "O Telefone inserido é inválido. Por favor, verifique e tente novamente."
    );
    return false; // Retorna falso indicando erro de validação
  }

  // Retorna verdadeiro se todos os campos estiverem preenchidos e válidos
  return true;
}

function exibirErroCPFInvalido() {
  exibirErro(
    "O CPF inserido é inválido. Por favor, verifique e tente novamente."
  );
}

function validateStep2() {
  const cep = document.getElementById("cep").value;
  const rua = document.getElementById("rua").value;
  const numero = document.getElementById("numero").value;
  const bairro = document.getElementById("bairro").value;
  const cidade = document.getElementById("cidade").value;
  const uf = document.getElementById("uf").value;

  if (!cep || !rua || !numero || !bairro || !cidade || !uf) {
    exibirErro("Por favor, preencha todos os campos para prosseguir."); // Adicionar essa linha
    return false; // Retorna falso para indicar erro de validação
  }

  // Se todos os campos estiverem preenchidos, retorna true para indicar que a validação passou
  return true;
}


const senhaPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-+_={}[\]:;'"<>,.?/\\|]).{8,}$/;

  


// Função para validar o terceiro passo do formulário
function validateStep3() {
    // Obtém os valores dos campos
    const loginre = document.getElementById("loginre").value;
    const password = document.getElementById("password").value;
    const confirm_password = document.getElementById("confirm_password").value;
  
    // Verifica se algum dos campos está vazio
    if (!loginre || !password || !confirm_password) {
      exibirErro("Por favor, preencha todos os campos para prosseguir.");
      return false; // Retorna falso para indicar erro de validação
    }
  
    
    
    // Verifica se as senhas são diferentes
    if (password !== confirm_password) {
      exibirErro("As senhas digitadas não coincidem.");
      return false; // Retorna falso indicando que as senhas são diferentes
    }
    // Verifica a força da senha
    if (!senhaPattern.test(password)) {
        exibirErro('A senha precisa ter no minimo 8 caracteres sendo 1 letra maiuscula e minuscula e 1 caracter especial');
        return false;
    }
    // Se as senhas forem iguais, limpa a validação personalizada do campo de confirmação de senha
    confirm_password.setCustomValidity('');
  
    // Retorna true se todos os campos estiverem preenchidos, a senha for forte e as senhas forem iguais
    return true;
  }
  

function submitForm() {
  document.getElementById("multi-step-form").reset();
  document.getElementById("form-container").style.display = "none";
  document.getElementById("success-message").style.display = "block";
}

// EXIBIR ERRO
function exibirErro(mensagem) {
  var toasts = document.querySelectorAll(".toast"); // Seleciona todos os elementos com a classe .toasts
  if (toasts.length > 0) {
    // Verifica se pelo menos um elemento com a classe foi encontrado
    toasts.forEach(function (toast) {
      // Itera sobre cada elemento encontrado
      toast.innerText = mensagem; // Define o texto do toast
      toast.classList.add("show"); // Adiciona a classe 'show' para exibir o toast

      // Remover a classe 'show' após 3 segundos para ocultar o toast automaticamente
      setTimeout(function () {
        toast.classList.remove("show");
      }, 3000);
    });
  }
}

// PROXIMO
function nextStep() {
  if (currentStep === 1 && validateStep1()) {
    document.getElementById("step1").style.display = "none";
    currentStep++;
    document.getElementById("step2").style.display = "block";
  } else if (currentStep === 2 && validateStep2()) {
    document.getElementById("step2").style.display = "none";
    currentStep++;
    document.getElementById("step3").style.display = "block";
  } else if (currentStep === 3 && validateStep3()) {
    document.getElementById("step3").style.display = "none";
    currentStep++;
    document.getElementById("step4").style.display = "block";
  }
  if (!validarCPF(cpf)) {
    exibirErroCPFInvalido();
    return false; // Retorna falso indicando erro de validação
  }

  // Se houver erro de validação em qualquer etapa, exibe o toast de erro
  exibirErro("Por favor, preencha todos os campos para prosseguir.");
}

// VOLTAR
function prevStep() {
  if (currentStep > 1) {
    if (currentStep === 2) {
      document.getElementById("step2").style.display = "none";
      currentStep--;
      document.getElementById("step1").style.display = "block";
    } else if (currentStep === 3) {
      document.getElementById("step3").style.display = "none";
      currentStep--;
      document.getElementById("step2").style.display = "block";
    } else if (currentStep === 4) {
      document.getElementById("step4").style.display = "none";
      currentStep--;
      document.getElementById("step3").style.display = "block";
    }
  }
}

// VIA CEP

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
  }
  
  function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
      //Atualiza os campos com os valores.
      document.getElementById('rua').value = (conteudo.logradouro);
      document.getElementById('bairro').value = (conteudo.bairro);
      document.getElementById('cidade').value = (conteudo.localidade);
      document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
      //CEP não Encontrado.
      limpa_formulário_cep();
      alert("CEP não encontrado.");
    }
  }
  
  function pesquisacep(valor) {
  
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
  
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
  
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;
  
      //Valida o formato do CEP.
      if (validacep.test(cep)) {
  
        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value = "...";
        document.getElementById('bairro').value = "...";
        document.getElementById('cidade').value = "...";
        document.getElementById('uf').value = "...";
  
        //Cria um elemento javascript.
        var script = document.createElement('script');
  
        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
  
        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);
  
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  };
