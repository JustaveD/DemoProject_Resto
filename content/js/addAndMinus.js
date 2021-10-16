let addBtn = document.querySelector('#add');
let minusBtn = document.querySelector('#minus');
let quantity = document.querySelector('.quantity input');

let addToCartBtn = document.querySelector(".ajax-addToCart");
quantity.value = 1;
addBtn.onclick = ()=>{
    let currentValue = parseInt(quantity.value);
    quantity.value = currentValue + 1;
    addToCartBtn.setAttribute('add_quantity',currentValue + 1);

    

}
minusBtn.onclick = ()=>{
    let currentValue = parseInt(quantity.value);
    if(currentValue >1){
        quantity.value = currentValue - 1;
        addToCartBtn.setAttribute('add_quantity',currentValue - 1);

    }
}