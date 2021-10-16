(function () {
  let btns = document.querySelectorAll(".ajax-delete-food-in-cart");

  btns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.target.parentElement.parentElement.remove();

      const allItem = document.querySelectorAll("#checked-item");
      const selectBtn = document.querySelector("#selected-btn");
      const totalPrice = document.querySelector("#total-price");

      totalPrice.innerText = 0;
      let value = 0;
      allItem.forEach((i) => {
        i.checked = true;
        let quantity = parseInt(
          i.previousElementSibling.firstElementChild.lastElementChild
            .lastElementChild.previousElementSibling.value
        );
        let price = parseFloat(
          i.previousElementSibling.lastElementChild.lastElementChild.innerText
        );
        price = price * quantity;
        value = value + price;
        totalPrice.innerText = value;
      });
    });
  });
})();
