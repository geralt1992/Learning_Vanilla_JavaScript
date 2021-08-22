@extends('master.master')

@section('content')

<div class="container">


    <my-work naslov="naslov">

    <div slot="marin">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores adipisci odio ducimus veritatis nesciunt sequi modi voluptates dignissimos incidunt dolor.</div>

    </my-work>



    <my-button pContent="Dobrodošli u moju komponentu">
        <div slot="mojSlot">Kako jebeno ovo radim iz <b>slota</b>!</div>
    </my-button>


    <my-card name="marin"></my-card>
    <br>


    <user-card name="dara" avatar="https://randomuser.me/api/portraits/men/1.jpg">
        <div slot="email">marin.sabljo@gmail.com</div>
        <div slot="phone">092 357 6009</div>
    </user-card>
    <br>
    <user-card name="nina" avatar="https://randomuser.me/api/portraits/women/1.jpg">
        <div slot="email">nina@gmail.com</div>
        <div slot="phone">0923 45909</div>
    </user-card>
    </div>

</div>



<script>

let m = document.createElement('template');
m.innerHTML =

`

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<style>
    .myD{
        padding: 2rem;
        background: #f4f4f4f4;
    }

    .myB{
        font-weight: 900;
        margin-top: 2rem;
    }
</style>


<div class="myD">
    <h1></h1>
    <div class="wrap">
        <slot name="marin"/>
    </div>
    <button></button>
</div>
`



class MyWork extends HTMLElement {
    constructor(){
        super();
        this.attachShadow({mode: 'open'});
        this.shadowRoot.appendChild(m.content.cloneNode(true));
        this.shadowRoot.querySelector('h1').innerText = this.getAttribute('naslov');

        let btn = this.shadowRoot.querySelector('button');
        btn.classList.add('btn' , 'myB');
        btn.innerText = 'SAKRI';
    }


    connectedCallback(){
        this.shadowRoot.querySelector('button').addEventListener('click' , () => this.hide());
    }

    hide(){
        let btn = this.shadowRoot.querySelector('button');
        let wrap = this.shadowRoot.querySelector('.wrap');

        if(btn.innerText === 'SAKRI'){
            btn.innerText = 'POKAZI';
            wrap.style.display = 'none';
        }else{
            btn.innerText = 'SAKRI';
            wrap.style.display = 'block';
        }
    }

    disconnectedCallback(){
        this.shadowRoot.querySelector('button').removeEventListener();
    }
}

window.customElements.define('my-work' , MyWork);


</script>






<script>


    const templatee = document.createElement('template');
    templatee.innerHTML = `


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <style>
            button{
                font-weight:800;
            }

            .mojDiv{
                margin: 5% auto;
                background: #f4f4f4;
                padding: 2rem;
                border-radius: 1px;
            }

        </style>

        <div class="mojDiv">
            <h3></h3>
            <p class="nultiP"></p>
            <p class="prviP"></p>
                <p> <slot name="mojSlot"/> </p>
            <button class="btn blue lighten-2"></button>
        </div>

    `;


    class MyButton extends HTMLElement{
        constructor(){
            super();

            this.attachShadow({mode: 'open'});
            this.shadowRoot.appendChild(templatee.content.cloneNode(true));

            this.shadowRoot.querySelector('h3').innerText = 'My Component';
            this.shadowRoot.querySelector('.nultiP').innerText = this.getAttribute('pContent');
            this.shadowRoot.querySelector('.prviP').innerText = 'Za Querianje koristi isključivo i samo klase ne id';
        // this.shadowRoot.querySelector('.drugiP').innerText = this.getAttribute('mojP');
            let dugme = this.shadowRoot.querySelector('button').innerText = 'KLIKNI ME';
        }


        connectedCallback(){
            this.shadowRoot.querySelector('button').addEventListener('click' , () => this.prikaziOvo());
        }

        prikaziOvo(){
            let dugme = this.shadowRoot.querySelector('button');

            if(dugme.innerText === 'KLIKNI ME'){
                this.shadowRoot.querySelector('h3').style.display = 'none';
                dugme.innerText = 'VRATI NAZAD'
            }else{
                this.shadowRoot.querySelector('h3').style.display = 'block';
                dugme.innerText = 'KLIKNI ME';
            }
        }

        disconnectedCallback(){
            this.shadowRoot.querySelector('button').removeEventListener();
        }
    }

    window.customElements.define('my-button' , MyButton);

</script>








<script>



////////////////////////////////////////////////////////////////////////////////////////////////
//STVORIŠ SVOJ HTML ELEMENT
//stvoriš klasu, ekstendaš i u konstrutoru dodaješ osobine koje
//treba imati taj novi elemnt
//na kraju spariš ime novog elementa i klasu s win.custEl.define();

    class MyCard extends HTMLElement {
        constructor() {
            //construcotr of class thet we are extending - constroctor of HTMLElement
            super();
            //postavio si da je ono sto se prikaze na ekranu zapravo sadrzaj atributa ime (to mnjeaš gore)
            this.innerHTML = `<h3>${this.getAttribute('name')}</h3>`;
        }
    }
    window.customElements.define('my-card' , MyCard);






//<SLOT>
    //genijalna stvar u markaup u templatu staviš to i on umetne tu što god da napišeš gore u HTMLu





//SHADOW DOM I TEMPLETSI

    //napraviš templet ovako - ovaj style se odnosi samo na komponentu tj template, ne i okolo
    const template = document.createElement('template');
    template.innerHTML = `

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

            <style>
                .user-card{
                    font-family: 'Arial' , sans-serif;
                    background: #f4f4f4;
                    width: 500px;
                    display: grid;
                    grid-template-columns: 1fr 2fr;
                    grid-gap: 10px;
                    margin-bottom: 15px;
                    border-bottom: darkorchid 5px solid;
                }

                .user-card img{
                    height: 100%;
                }

                .user-card button{
                    cursor: pointer;
                    background: darkorchid;
                    color: white;
                    broder: 0;
                    border-radius: 5px;
                    padding: 5px 10px;
                }
            </style>

            <div class="user-card">
                <img />
                <div>
                    <h4></h4>
                    <div class="info">
                        <p> <slot name="email"/> </p>
                        <p> <slot name="phone"/> </p>
                    </div>
                    <button id="toggle-info">HIDE INFO</button>
                </div>
            </div>
    `;




    class UserCard extends HTMLElement {
        constructor() {
            //construcotr of class thet we are extending - constroctor of HTMLElement
            super();

            //show info - dodano zbog eventa toogle info
            this.showInfo = true;

            //SHADOW DOM
            this.attachShadow( { mode: 'open'});
            //vraca kopi of noda
            this.shadowRoot.appendChild(template.content.cloneNode(true));
            //sad je ovaj shd root spojen s onim gore templetom i unutar njega je sve od gore
            //sad mozes raditi querySelec na njemu i napravit onu foru s attributom od iznad
            this.shadowRoot.querySelector('h4').innerText = this.getAttribute('name');
            //za dodat image - moras imati <img /> u templatu
            this.shadowRoot.querySelector('img').src = this.getAttribute('avatar');
        }

        //za spojit nešto iz templeta s event listenerom koristis ovo connectedCallback
        connectedCallback(){
            this.shadowRoot.querySelector('#toggle-info').addEventListener('click' , () => this.toggleInfo());
        }

        //za sakriti funkcija koju si zvao iznad
        toggleInfo(){
            this.showInfo = !this.showInfo;

            let info = this.shadowRoot.querySelector('.info');
            let toggleBtn = this.shadowRoot.querySelector('#toggle-info');

            if(this.showInfo) {
                info.style.display = 'block';
                toggleBtn.innerText = 'Hide Info';
            }else{
                info.style.display = 'none';
                toggleBtn.innerText = 'Show Info';
            }
        }

        //za maknuti event listener --  NUŽNO IMATI U TEMPLETU KADA ZOVES E LISTENERE
        disconnectedCallback(){
            this.shadowRoot.querySelector('#toggle-info').removeEventListener();
        }
    }

    //DEFINIRANJE!
    window.customElements.define('user-card' , UserCard);
</script>


<style>

    h3{
        color:red;
    }

</style>
@endsection
