//Todo esse JS descoberto na Internet com algumas alterações
let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  let distanceFromTop = currentScrollPos;
  if (distanceFromTop < 100) { //quando ele estiver a baixo de 100 pixels retonará ao seu lugar
    document.getElementById("menu_flutuante").style.top = "0";// ele ajusta o navbar para retorna ao seu lugar quando descer a tela 
  } else {
    document.getElementById("menu_flutuante").style.top = "-20px"; // ele ajusta o navbar para subir quando a tela sobe
  }
  prevScrollpos = currentScrollPos;
}


window.addEventListener('scroll', function() {
  var navbar = document.getElementById('menu_flutuante');
  if (window.scrollY > 50) {
    navbar.style.marginLeft = '0';
    navbar.style.marginRight = '0'; 
    navbar.style.borderRadius = '0';
  } else {
    navbar.style.marginLeft = '28px';
    navbar.style.marginTop = '20px';
    navbar.style.marginRight = '28px'; 
    navbar.style.borderRadius = '16px';
  }
});

// sistema para buscar na tabela
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const tableBody = document.getElementById('tabela_body');
  const rows = tableBody.getElementsByTagName('tr');

  searchInput.addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();

    for (let i = 0; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName('td');
      let found = false;

      for (let j = 0; j < cells.length; j++) {
        const cellText = cells[j].textContent.toLowerCase();

        if (cellText.includes(searchTerm)) {
          found = true;
          break;
        }
      }

      if (found) {
        rows[i].classList.remove('d-none');
      } else {
        rows[i].classList.add('d-none');
      }
    }
  });
});

//valor total na tela
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchInput');
  const span = document.getElementById("valorTotal");

  function atualizarValorTotal() {
    const tableBody = document.getElementById('tabela_body');
    const rows = tableBody.getElementsByTagName('tr');
    let valorTotal = 0;

    for (let i = 0; i < rows.length; i++) {
      const valores = rows[i].getElementsByClassName('valor')[0];
      
      if (valores && window.getComputedStyle(rows[i]).display !== 'none') {
        valorTotal += parseFloat(valores.textContent) || 0;
      }
    }

    span.innerText = `R$${valorTotal.toFixed(2)}`;
  }

  // Atualiza o valor total ao carregar a página
  atualizarValorTotal();

  // Atualiza o valor total ao filtrar os registros
  searchInput.addEventListener('input', function () {
    atualizarValorTotal();
  });
});



// Seleciona o link de âncora
const link = document.getElementById('mostrarMensagem');

// Adiciona um evento de clique ao link de âncora
link.addEventListener('click', function(event) {
// Previne o comportamento padrão do link
event.preventDefault();

// Cria um elemento de mensagem
const mensagem = document.createElement('div');
mensagem.classList.add('alert', 'alert-success', 'mensagem');
mensagem.innerText = 'Foi adicionado ao carrinho com sucesso';

// Adiciona a mensagem ao corpo do documento
document.body.appendChild(mensagem);

// Define um tempo para a mensagem desaparecer após 3 segundos
setTimeout(function() {
  mensagem.remove();
}, 3000);
});