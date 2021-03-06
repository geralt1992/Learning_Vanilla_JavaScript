const closeCartBtn = document.getElementById('closeCartBtn');
const cart = document.getElementById('cart');

//close cart with btn
closeCartBtn.addEventListener('click' , (e) => {
    e.preventDefault();
    cart.style.display = 'none';
})


let buyBtn = document.querySelectorAll('.buy');

for(let i = 0; i < buyBtn.length; i++){

    buyBtn[i].addEventListener('click' , (e) => {
        e.preventDefault();
        let clickedBtn = buyBtn[i];

        //get price and name of clicked product
        let nameOfProduct = clickedBtn.parentNode.parentNode.querySelector('.name').innerHTML;
        let priceOfProduct = clickedBtn.parentNode.parentNode.querySelector('.price').innerHTML;

        //make object - item
        let item = {
            name : nameOfProduct,
            price : priceOfProduct
        }

        //save to localStore
        let store =localStorage;
        if(store.getItem('cart') === null){
            let cart = [];
            cart.push(item);
            store.setItem('cart' , JSON.stringify(cart));
        }else{
            let cart = JSON.parse(store.getItem('cart'));
            cart.push(item);
            store.setItem('cart' , JSON.stringify(cart));
        }

        saveToCart();
    })

}


function saveToCart(){
    let cart = JSON.parse(localStorage.getItem('cart'));

    //show all products from lStorage
    let out = '';
    cart.forEach( (item) => {
        out+= `<p>${item.name}</p>`
    })
    let cartName = document.getElementById('cName').innerHTML = out;


    //add all prices together, and show them up!
    let sum = 0;
    cart.forEach( (itemPrice) => {
        //SUPER CAKA!
        sum += parseInt(itemPrice.price);

    })
    let cartPrice = document.getElementById('cPrice').innerHTML = sum;
    const carT = document.getElementById('cart');
    carT.style.display = 'block';
}


//OBIRŠI
let cisti = document.getElementById('clear');
cisti.addEventListener('click' , (e) => {
    e.preventDefault();
    localStorage.clear();
    // za reload stranice bez refresha
    window.location = window.location
} )
