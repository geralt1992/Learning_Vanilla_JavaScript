import {item1 , item2 , item3 , item4 , item5} from './items.js'; 


//CONSTS
const addNewItem = document.getElementById('addNewItemBtn');

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
    let out = '';

    if(items === null){
        console.log('Trenutno nema itema za prodaju!');
    }else{
        items.forEach( (item) => {
            out += ``
        })
    }
}
showFromStore();