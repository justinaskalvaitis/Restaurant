$(document).ready(function() {
// Prideda preke i krepseli
  $('.add-to-cart').click(function(e) {
    e.preventDefault();
    var dish_id = $(this).data('id');

   $.ajax({
      url: window.Laravel.cartAddRoute,
      method: 'post',
      data: {
        _token: window.Laravel.csrfToken,
        id: dish_id
      },
      success: function(response) {
        $('#cart-total').html(response.total);
        refreshCart(response.items);
      }
    })
  });
  // Isvalo pirkiniu krepseli
  $('#clear-cart').click(function(e) {
    e.preventDefault();

     $.ajax({
        url: window.Laravel.cartClearRoute,
        method: 'delete',
        data: {
          _token: window.Laravel.csrfToken,
        },
        success: function(response) {
          $('#cart-total').html(0);
          refreshCart([]);
        }
      })
  })

});

function refreshCart(items) {
  var list = $('#cart-items');
  list.empty();

 for (var i = 0; i < items.length; i++) {
    var item = '<li>' +
                  '<a href="">' + items[i].title + ' x ' + items[i].quantity +  ' = ' + '<strong>' + items[i].total + ' €</strong></a>' +
                '</li>';
    list.append(item);
  }
}

$('#delete-item').click(function(e) {
  e.preventDefault();

 $.ajax({
    url: window.Laravel.cartDeleteItem,
    method: 'delete',
    data: {
      _token: window.Laravel.csrfToken,
    },
    success: function(response) {
      $('#cart-total').html(0);
      refreshCart([]);
    }
  })
});