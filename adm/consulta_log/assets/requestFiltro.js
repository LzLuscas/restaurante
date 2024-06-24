function incluirResponseNoHTML(response) {
    $('tbody').html(response);
}

var consulta = document.getElementById("searchCPF");
consulta.addEventListener('input', () => {
    var valor = consulta.value
    // Fazendo a requisição AJAX GEET para o servidor
    $.ajax({
        url: 'http://localhost/restaurante/adm/consulta_log/action/adminLogFiltro.php',
        method: 'GET',
        data: { search: valor },
        success: function(response) {
            // Função para incluir o response no HTML
            incluirResponseNoHTML(response)
        },
        error: function(error) {
            console.error('Ocorreu um erro:', error);
        }
    });
});
