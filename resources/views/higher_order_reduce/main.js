const numbers = [1, -1, 2, 3]; //this can represent all prices in shoping cart

//reduce all elemnts in array into single value 
//accumulator akumulira rezultat, reduce se izvrašava kao loop za svaki elemnt arraya, a svakim prolaskom acc se mijenja ovisno o elementu polja
// 0 predstavlja početnu vrijednost akumulatora
const sum = numbers.reduce( (accumulatro, currentValue) => {
    return accumulatro + currentValue;
}, 0)




const tryy = numbers.reduce( (acc , curr) => {
    return acc + curr;
}, 0);

alert(tryy);