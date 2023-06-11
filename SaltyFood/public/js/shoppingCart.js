let shoppingCart;

$(document).ready(function() {
    shoppingCart = new ShoppingCart();
    $('.cartcount').text(shoppingCart.GetCount());
});