(function () {
  const allItem = document.querySelectorAll("#checked-item");
  const selectBtn = document.querySelector("#selected-btn");
  const totalPrice = document.querySelector('#total-price');
  
  selectBtn.addEventListener("click", () => {
    totalPrice.innerText = 0;
    let value = 0;
    allItem.forEach((i) => {
      i.checked = true;
      let quantity = parseInt(i.previousElementSibling.firstElementChild.lastElementChild.lastElementChild.previousElementSibling.value);
      let price = parseFloat(
        i.previousElementSibling.lastElementChild.lastElementChild.innerText
      );
      price = price * quantity;
      value =  value + price;
      totalPrice.innerText = value;
    });
  });
})();
