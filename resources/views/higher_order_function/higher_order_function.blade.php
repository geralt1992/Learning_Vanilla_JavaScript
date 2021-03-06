@extends('master.master')

@section('content')



<script>

const companies = [
    {name: "Company One", category: "Finance", start: 1981, end: 2003},
    {name: "Company Two", category: "Retail", start: 1992, end: 2008},
    {name: "Company Three", category: "Auto", start: 1999, end: 2007},
    {name: "Company Four", category: "Retail", start: 1989, end: 2010},
    {name: "Company Five", category: "Technology", start: 2009, end: 2014},
    {name: "Company Six", category: "Finance", start: 1987, end: 2010},
    {name: "Company Seven", category: "Auto", start: 1986, end: 1996},
    {name: "Company Eight", category: "Technology", start: 2011, end: 2016},
    {name: "Company Nine", category: "Retail", start: 1981, end: 1989}
];

const ages = [33, 12, 20, 16, 5, 54, 21, 44, 61, 13, 15, 45, 25, 64, 32];


//foreach
companies.forEach( (companie) => console.log(companie.name));

//filter - filter things out from array

    //s for
        let canDrink = [];
        for( let i = 0; i < ages.length; i++){
            if(ages[i] >= 21){
                canDrink.push(ages[i]);
            }
        }
        console.log(canDrink);


    //s filter
        let cantDrink = ages.filter( (age) => {
            if(age >= 21) {
                return true;
            }
        })
        console.log(cantDrink);

        const retailCompanies = companies.filter( (company) =>{
            if(company.category === 'Retail') {
                return true;
            }
        });
        console.log(retailCompanies);


        const start = companies.filter( (company) => {
            if(company.start >= 1992) return true;
        });
        console.log(start);

        const last = companies.filter( (company) => {

<<<<<<< HEAD
            if(company.end - company.start >= 10)
=======
            if(company.end - company.start >= 10)
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
            return true;
        });
        console.log(last);

<<<<<<< HEAD


//map - stvara novi array od current arraya

=======


//map - stvara novi array od current arraya

>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
    //create array of company names

    const companyNames = companies.map( (company) => {
        return company.name
        });

    console.log(companyNames);


    const categories = companies.map( (company) => {
        return company.category;
    });
    console.log(categories);


    const agesSquare = ages.map(age => Math.sqrt(age));
    console.log(agesSquare);



//sort - uzima dvije values, dvije kompanije i kompera ih, uvijek se stavlja return 1 za pozitiv
<<<<<<< HEAD
    //i - 1 za negativ rezultat usporedbe,
=======
    //i - 1 za negativ rezultat usporedbe,
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
    //dolje smo sortirali po godinama kompanije

const sortedComp = companies.sort( (c1 , c2) => {
    if(c1.start > c2.start) {
        return 1;
    }else {
        return -1;
    }
});

console.log(sortedComp);




//reduce - to add all ages together - NE ZAMARAJ SE S TIM JOŠ!

    //s forom prvo
    let ageSum = 0;
    for(let i = 0; i < ages.length; i++){
        ageSum += ages[i];
    }
    console.log(ageSum);


    //s reduce
    const aageSum = ages.reduce( (total, age) => {
        return total + age;
    }, 0);

    console.log(aageSum);


    const totalYears = companies.reduce( (total, company) => {
        return total + (company.end - company.start);
    }, 0);

    console.log(totalYears);



</script>
















































<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> ffbaea2c71c854b2ef02cf1a1e891bbffeba86f3
