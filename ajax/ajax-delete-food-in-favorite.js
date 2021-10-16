// Biến dùng kiểm tra nếu đang gửi ajax thì ko thực hiện gửi thêm
var is_busy = false;

function loadingAjax() {
  $(this).click(function () {
    $button = $(this);

    // Lấy id favorite
    let favoriteId = $button.attr("favorite_id");
    // Nếu đang gửi ajax thì ngưng
    if (is_busy == true) {
      return false;
    }

    // Gửi Ajax
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../ajax/delete-food-in-favorite.php",
      data: { favorite_id: favoriteId },
    });
  });
}
$(document).ready(function () {
  $(".ajax-delete-food-in-favorite").each(loadingAjax);
});
