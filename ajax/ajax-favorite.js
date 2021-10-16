// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
(function(){
var is_busy = false;

// Biến lưu trữ rạng thái phân trang
var stopped = false;

function loadingAjax() {
  
  $(this).click(function (e) {
      e.preventDefault();
    // ELement hiển thị chữ loadding
    $button = $(this);

    // Lấy id food

    let foodId = $button.attr("food_id");
    // Nếu đang gửi ajax thì ngưng
    if (is_busy == true) {
      return false;
    }

    // Hiển thị loadding ...
   
    $favoriteNumber = $(".favorite-number");
    // Gửi Ajax
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../ajax/favorite.php",
      data: { food_id: foodId },
      success: function (result) {
        console.log(result);
        if (result.status) {
          if (result.notExist) {
            let value = parseInt($favoriteNumber.text()) + 1;
            $favoriteNumber.text(value);
          }
        }
      },
    }).always(function () {
      // Sau khi thực hiện xong thì đổi giá trị cho button
     
      is_busy = false;
    });
  });
}
$(document).ready(function () {
  $(".ajax-favorite").each(loadingAjax);
})})();
