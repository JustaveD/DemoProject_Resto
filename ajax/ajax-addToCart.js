// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
(function(){
var is_busy = false;

// Biến lưu trữ rạng thái phân trang
var stopped = false;


function loadingAjax() {
  $(this).click(function () {
    // ELement hiển thị chữ loadding
    $button = $(this);

    // Lấy id food

    let foodId = $button.attr("food_id");
    let addQuantity = $button.attr("add_quantity");

    // Nếu đang gửi ajax thì ngưng
    if (is_busy == true) {
      return false;
    }

    // Hiển thị loadding ...
    $button.html("ADDING ...");
    $cartNumber = $(".cart-number");
    // Gửi Ajax
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../ajax/add_to_cart.php",
      data: { food_id: foodId, add_quantity: addQuantity },
      success: function (result) {
       
        console.log(result);
        if (result.status) {
          if (result.notExist) {
            let value = parseInt($cartNumber.text()) + 1;
            $cartNumber.text(value);
          }
        }
      },

    }).always(function () {
      // Sau khi thực hiện xong thì đổi giá trị cho button
      $button.html("Add to cart");
      is_busy = false;
    });
  });
}
$(document).ready(function () {
  $(".ajax-addToCart").each(loadingAjax);
});
}


)()
