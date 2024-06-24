$(document).ready(function() {
    // Atualiza o total do carrinho quando a página é carregada
    updateTotal();
    
    // Função para aumentar a quantidade do produto
    $(document).on('click', '.increase-quantity', function() {
      var input = $(this).closest('.cart-item').find('.quantity');
      var quantity = parseInt(input.val());
      input.val(quantity + 1);
      updateTotal();
    });
    
    // Função para diminuir a quantidade do produto
    $(document).on('click', '.decrease-quantity', function() {
      var input = $(this).closest('.cart-item').find('.quantity');
      var quantity = parseInt(input.val());
      if (quantity > 1) {
        input.val(quantity - 1);
        updateTotal();
      }
    });
    
    // Função para remover o produto do carrinho
    $(document).on('click', '.remove-item', function() {
      $(this).closest('.cart-item').remove();
      updateTotal();
    });
    
    // Função para adicionar o produto aos favoritos
    $(document).on('click', '.add-favorite', function() {
      // Lógica para adicionar aos favoritos
      alert('Produto adicionado aos favoritos!');
    });
    
    // Função para aplicar o cupom
    $('#apply-coupon').click(function() {
      var coupon = $('#coupon').val();
      // Lógica para aplicar o cupom
      alert('Cupom aplicado: ' + coupon);
    });
    
    // Função para atualizar o total do carrinho
    function updateTotal() {
      var total = 0;
      $('.cart-item').each(function() {
        var price = parseInt($(this).data('price'));
        var quantity = parseInt($(this).find('.quantity').val());
        total += price * quantity;
      });
      $('#total').text('$' + total.toFixed(2));
    }
    
  });

  //função limpar carrinho

  document.getElementById('limpar-carrinho').addEventListener('click', function() {
  var cartItems = document.querySelectorAll('.cart-item');
  cartItems.forEach(function(item) {
    item.remove();
  });
  document.getElementById('total').textContent = '$0.00'; // Reseta o total para $0.00
});

  document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("pay-now").addEventListener("click", function() {
      // Coloque aqui o código para redirecionar para a página de pagamento
      window.location.href = "pagina-de-pagamento.html";
  });
});