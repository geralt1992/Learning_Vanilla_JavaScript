     //initals ratings
     const ratings = {
        sony : 4.7, 
        samsung : 3.4,
        vizio : 2.3,
        panasonic : 3.6,
        phillips : 4.1
    }

    //total stars
    const starsTotal = 5;


    //run getRatings when DOm loads 
    document.addEventListener('DOMContentLoaded' , getRatings);

    //form elements
    const productSelect = document.getElementById('product-select');
    const ratingControl = document.getElementById('rating-control');

    //init product
    let product;

    //product select change
    productSelect.addEventListener('change' , (e) => {
        product = e.target.value;
        //enable rating control
        ratingControl.disabled = false;
        ratingControl.value = ratings[product];
    });

    //rating control change 
    ratingControl.addEventListener('blur' , (e) => {
        const rating = e.target.value;

        //make sure 5 or under
        if(rating > 5){
            alert('Plase rate 1 - 5');
            return false;
        }

        //change rating
        ratings[product] = rating;
        getRatings();
    });

   //get ratings
   function getRatings() {
       for(let rating in ratings){
          //get percentage
          const starPercentage = (ratings[rating] / starsTotal) *  100;

          //round to nearest 10
          const starPercentageRounded = `${Math.round(starPercentage /  10) * 10}%`;
          
          //set width of stars inner to percentage
          document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;

          //add number rating
          document.querySelector(`.${rating} .number-rating`).innerHTML = ratings[rating];
         
       }
   }

   
   const new_tv = document.getElementById('tv_btn').addEventListener('click' , (e) => {
       e.preventDefault();
    
       let new_tv = document.getElementById('new_tv').value;
       ratings[new_tv] = 1;
       console.log(ratings)

       let store = localStorage;
       
       store.setItem('c')
   });
  