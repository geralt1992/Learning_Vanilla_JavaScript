//function to validate zip code

export function isValidZip(zip){
    //reg expres for zip code validation, min 5 digita, or 4 digit with dash
    return /^\d{5}(-\d{4})?$/.test(zip);
}


//display alert message
export function showAlert(message, className){
    //create div
    const div = document.createElement('div');
    div.className = `alert alert-${className}`;
    //add text
    div.appendChild(document.createTextNode(message));
    //get container
    const container = document.querySelector('.container');
    //get form
    const form = document.querySelector('#pet-form');

    //insert alert - sto insertamo , gdje insertamo
    container.insertBefore(div , form);

    setTimeout(() => {
        document.querySelector('.alert').remove();
    }, 3000);
}
