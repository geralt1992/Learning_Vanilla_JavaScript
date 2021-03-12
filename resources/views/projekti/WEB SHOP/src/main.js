import {item1 , item2 , item3 , item4 , item5} from './items.js'; 


//CONSTS
const addNewItem = document.getElementById('addNewItemBtn');
const clear = document.getElementById('clear');
const  parent = document.getElementById('parentRow');

//RANDOM ITEMS FROM ARRAY
let itemArray = [ item1 , item2 , item3 , item4 , item5];
let randomItem = itemArray[Math.floor(Math.random() * itemArray.length)];

// console.log(randomItem);

addNewItem.addEventListener('click' , (e) => {
    
    let store = localStorage;

    if(store.getItem('shopItems') === null){
        let items = [];
        items.push(randomItem);
        store.setItem('shopItems' , JSON.stringify(items));
    }else{
        let items = JSON.parse(store.getItem('shopItems'));
        items.push(randomItem);
        store.setItem('shopItems' , JSON.stringify(items));
    }

    location.reload();
});

//FUNKCIJA PRIKAZA IZ STOREA U HTML

function showFromStore(){
    let store = localStorage;
    let items = JSON.parse(store.getItem('shopItems'));
    

    if(items === null){
        console.log('Trenutno nema itema za prodaju!');
    }else{
        items.forEach( (item) => {
            let out = document.createElement("div"); 
            out.innerHTML = 
            `
                <div class="col">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                        <h4 class="my-0 fw-normal">${item.name}</h4>
                        </div>
                        <div class="card-body">
                        <h1 class="card-title pricing-card-title">$${item.price} <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>${item.users} users included</li>
                            <li>${item.storage} of storage</li>
                            <li>${item.emailOrNot}</li>
                            <li>${item.helpOrNot}</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Dodaj u Košaricu </button>
                        </div>
                    </div>
                </div>
            `
            parent.appendChild(out);
        });
    }
}
showFromStore();


//FUNKCIJA SPREMI STVARI U CART
function saveToCart(){
    let cards = document.querySelectorAll('.card')
   

    for(let i = 0; i < cards.length; i++){

        let btnForEvent = cards[i].querySelector('button');
        btnForEvent.addEventListener('click' , (e) => {
            e.preventDefault();

            let price = e.target.parentNode.querySelector('h1').innerText;
            let finalPrice = price.slice(1, 4);
            
            console.log(finalPrice);
            
        });

    }
    
}

saveToCart();

//FUNKCIJA OČISTI STORE
clear.addEventListener('click'  , (e) => {
    e.preventDefault();
    localStorage.clear();
    location.reload();
})