var btnClose = document.getElementById("btnClose")
var modal = document.getElementsByClassName("modal")[0];
var btnConfirmar = document.getElementById("btnConfirmar")

// iterando botões de exclusão e atribuindo eventlsitner ao click em uma função closure
function excluirRegistro() {
    var registros = Array.from(document.getElementsByTagName("tr"));
    console.log(registros)
    var btnExcluir = Array.from(document.getElementsByClassName("btnExcluir"));
    // Itera sobre a coleção de elementos e adiciona o evento a cada um
    for (var i = 0; i < btnExcluir.length; i++) {
        (function(index) {
            btnExcluir[index].addEventListener('click', function() {
                let id = registros[index + 1].getAttribute('id');
                modalExcluir(id);
            });
        })(i);
    }
}

function modalExcluir(id) {
    var registro = document.getElementById(id);
    var textRegistro = String(registro.innerText);
    modal.classList.add('d-block');
    $('.modal-body').html(textRegistro);

    btnConfirmar.addEventListener('click', function() {
        requestDelete(id);
        modal.classList.remove('d-block');
        setTimeout(function() {
            registro.remove()
        }, 500)
    });
}

btnClose.addEventListener('click', function() {
    modal.classList.remove('d-block');
});

function modalResposta(response) {
    setTimeout(function(){
        $('.modal-body').html(response);
        modal.classList.add('d-block');
        btnConfirmar.classList.add('d-none');
        setTimeout(function() {
            modal.classList.remove('d-block');
        }, 4000);
    }, 2000)
}

// Fazendo a requisição DELETE com jQuery AJAX
function requestDelete(id) {
    $.ajax({
    url: 'http://localhost/restaurante/adm/clientes_cadastrados/action/adminDelete.php',
    type: 'DELETE',
    data: { id: id },
    success: function(response) {
        //mensagem
        modalResposta(response)

        
    },
    error: function(error) {
        // Tratamento de erros
        console.error('Erro na requisição DELETE:', error);
    }
    });
}

excluirRegistro();

/*
//metodo get para inserir dados na tabela
function incluirResponseNoHTML(response) {
    $('tbody').html(response);
}

function loadPage() {
$.ajax({
        url: 'http://localhost/restaurante/adm/clientes_cadastrados/action/adminService.php',
        method: 'GET',
        success: function(response) {
            // Função para incluir o response no HTML usando innerHTML
            incluirResponseNoHTML(response);
            excluirRegistro();
            console.log("load realizado")
        },
        error: function(error) {
            console.error('Ocorreu um erro:', error);
        }
});
};
loadPage();

// Função que será chamada quando houver mudança no input
var consulta = document.getElementById("search");
consulta.addEventListener('input', () => {
    var valor = consulta.value
    console.log("input acionado")
    console.log(valor)
    // Fazendo a requisição AJAX GEET para o servidor
    $.ajax({
        url: 'http://localhost/restaurante/adm/clientes_cadastrados/action/adminFiltro.php',
        method: 'GET',
        data: { search: valor },
        success: function(response) {
            // Função para incluir o response no HTML
            incluirResponseNoHTML(response)
            excluirRegistro();
        },
        error: function(error) {
            console.error('Ocorreu um erro:', error);
        }
    });
});
*/