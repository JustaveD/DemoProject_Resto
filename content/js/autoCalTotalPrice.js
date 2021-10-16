
(function(){
    const allItem = document.querySelectorAll('#checked-item');
    const totalPrice = document.querySelector('#total-price');
    let value;
        allItem.forEach(i=>{
           i.addEventListener('click',function(){
                value = parseFloat(totalPrice.innerText);
                let quantity = parseInt(i.previousElementSibling.firstElementChild.lastElementChild.lastElementChild.previousElementSibling.value);
              
                let price = parseFloat(i.previousElementSibling.lastElementChild.lastElementChild.innerText);
                price = price * quantity;
                if(i.checked){
                    value =  value + price;
                    totalPrice.innerText = value;
                }
                else{
                    value =  value - price;
                    totalPrice.innerText = value;
                }
           })

           
        })
})();