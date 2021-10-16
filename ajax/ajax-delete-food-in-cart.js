// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
var is_busy = false;

function loadingAjax() {
  $(this).click(function () {
    $button = $(this);

    // Lấy id food
    let cartId = $button.attr("cart_id");
    // Nếu đang gửi ajax thì ngưng
    if (is_busy == true) {
      return false;
    }
    $cartNumber = $(".cart-number");
    // Gửi Ajax
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../ajax/delete-food-in-cart.php",
      data: { cart_id: cartId },
      success: function (result) {
        $cart = $(".cart-number");
        console.log(result);
        if (result.status) {
          let value = parseInt($cartNumber.text()) - 1;
          $cartNumber.text(value);
        }
      },
    });
  });
}
$(document).ready(function () {
  $(".ajax-delete-food-in-cart").each(loadingAjax);
});
