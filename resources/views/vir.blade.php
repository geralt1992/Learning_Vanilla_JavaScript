@extends('master.master_vir')

@section('content')


<!---------------BANNER---------------------->


<section id="banner" class="section">

    <nav class="navbar navbar-expand-lg navbar-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false"
         aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="#vir">Vir</a>
              </li>

            <li class="nav-item">
              <a class="nav-link" href="#services">Što nudimo</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#about_us">Zašto odabrati nas</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#gallery_bg">Galerija</a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="#social_media">Kontakt</a>
            </li>

          </ul>
        </div>
      </nav>

    <h1>#Sabljo - Vir Apartmans</h1>

    <div class="video-container">
    <video autoplay  loop muted id="myVideo">
        <source src="{{url('videos/beach_1.mp4')}}" type="video/mp4">
      </video>
    </div>
</section>


<!---------------VIR


<section id="vir">
    <div class="container">
        <h1 class="title text-center" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000" >VIR</h1 >
        <br>
        <div class="row">

            <div class="col-md-7 ">
                <div class="wraper">
              <h2 class="vir_title" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Vir raj s dušom!</h2>
                <p class="vir_text_1" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Vir je jedna od najpoželjnih turističkih destinacija Hrvatske.
                    Vir obilježavaju: restorani i kafići s terasama u hladu, konobe, beach barovi, disco-klubovi,
                     beach partiji na plaži Jadro, program virskog ljeta, koncerti na terasi Kotarina s mnogim poznatim imenima,
                     iznajmljivanje automobila, brodica, glisera gumenjaka, bicikla, buggija, yacht charter, ronilački klub,
                      big game fishing, organizirani izleti i mnoge druge usluge te ambulanta, ljekarna, pošta, mjenjačnica,
                       bogata zelena tržnica i ribarnica te turistička agencija Vir turizam čine ponudu čine kvalitetnijom i privlačnijom.
                </p>
            </div>
            </div>

            <div class="col-md-5 vir" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                <div class="img_wraper">
                <br><br>
            <img src="{{'pictures/vir_4.jpg'}}" alt="picture of Vir" class="img-fluid vir-pic">
            </div>
        </div>
        </div>
    </div>
    </section>
    
--------------->

<!---------------SERVICES---------------------->


<section id="services" class="sec">
 <div class="container text-center">
    <h1 class="title" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">ŠTO NUDIMO ?</h1>

    <div class="row text-center">

        <div class="col-md-4 services" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
        <img src="{{url('pictures/apartmans_new.png')}}" alt="servuce_pic_1" class="service-img">
        <h4>Tri odvojena apartmana sa zasebnim ulazima</h4>
        <p>Tri zasebno odvojena apartmana (za 4 osobe!), površine 50 m/2!
            Po apartmanu se nalaze:
            dnevni boravak, dvije (odvojene!) sobe, kuhinja te kupatilo!</p>
        </div>

        <div class="col-md-4 services" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
        <img src="{{url('pictures/prices_new.png')}}" alt="servuce_pic_2" class="service-img">
        <h4>Najeftnije cijene noćenja</h4>
        <p>Cijene noćenja 15 EURA po osobi u sezoni (6. - 9. mjesec), a 10 EURA u pred/postsezoni!</p>
        </div>

        <div class="col-md-4 services" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
            <img src="{{url('pictures/plaža_1_new.png')}}" alt="servuce_pic_3" class="service-img">
            <h4>Plaža nadohvat ruke/noge</h4>
            <p>Udaljenost apartmana od plaže je svega 400-tinjak metara (3 - 4 minute laganog hoda)!</p>
            </div>
    </div>
 </div>
</section>


<!---------------ABOUT US---------------------->


<section id="about_us">
<div class="container">
<h1 class="title text-center" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">ZAŠTO ODABRATI NAS ?</h1>
<div class="row">

    <div class="col-md-6 about-us">
        <p class="about-title" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000" >Što Vam još nudimo</p>
        <ul>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Klimatizirani prostor (uz nadoplatu 4€/dan)</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Grill u sklopu apartmana</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Bicikli za kretanje po otoku</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Dvije terase (20 m/2) s prekrasnim pogledom (stolci i stolice)</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Bračni i jednokrevetni ležajevi</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Ormari i noćni ormarići u sobama</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">TV uređaji u svakom apartmanu</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Kuhinje s hladnjacima, pećnicom i kuhalom za vodu</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Pribor za jelo i posuđe za pripremu jela</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Ulica u kojoj se nalaze apartmani je asfaltirana mirna te s rasvjetom</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Mirni dio otoka, savršen za opuštanje!</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Animal friendly!</li>
            <li data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">Besplatni parking (jedno osobno vozilo po apartmanu)!</li>
        </ul>
    </div>
    <div class="col-md-6">
    <img src="{{'pictures/travel.png'}}" class="img-fluid" alt="image of beach 2">
    </div>
</div>
</div>


<!---------------GALLERY---------------------->


<section id="gallery_bg"></section>

<section id="gallery" class="gallery">

        <h1 class="title text-center" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">NAŠA GALERIJA</h1>

                        <a href="{{'pictures/kuca_1.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_1.jpg'}}" alt="vir_pic_1" class="img-responsive my-3 mx-3" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_2.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_2.jpg'}}" alt="vir_pic_2" class="img-responsive my-3 mx-3" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_3.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_3.jpg'}}" alt="vir_pic_3" class="img-responsive my-3 mx-3" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_4.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_4.jpg'}}" alt="vir_pic_4" class="img-responsive my-3 mx-3" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_5.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_5.jpg'}}" alt="vir_pic_5" class="img-responsive my-3 mx-3" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_6.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_6.jpg'}}" alt="vir_pic_6" class="img-responsive my-3 mx-3" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_7.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_7.jpg'}}" alt="vir_pic_7" class="img-responsive my-3 mx-3" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_8.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_8.jpg'}}" alt="vir_pic_8" class="img-responsive my-3 mx-3" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_9.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_9.jpg'}}" alt="vir_pic_19" class="img-responsive my-3 mx-3" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

                        <a href="{{'pictures/kuca_10.jpg'}}" target=”_blank” class="test-popup-link">
                            <img src="{{'pictures/kuca_10.jpg'}}" alt="vir_pic_10" class="img-responsive my-3 mx-3" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
                        </a>

</section>


<!---------------SOCIAL MEDIA---------------------->


<section id="social_media">
<div class="container text-center" data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000">
<p>MI NA SOCIJALNIM MREŽAMA</p>
</div>

<div class="social-icons text-center">
<a href="https://www.facebook.com/marin.sabljo" target="_blank"><img src="{{'pictures/facebook.png'}}" alt="facebook icon" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000"></a>
<a href="https://www.facebook.com/marin.sabljo" target="_blank"><img src="{{'pictures/instagram.png'}}" alt="instragram icon" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000"></a>
<a href="https://www.facebook.com/marin.sabljo" target="_blank"><img src="{{'pictures/whats_up.png'}}" alt="whats_up icon" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000"></a>
<a href="https://www.facebook.com/marin.sabljo" target="_blank"><img src="{{'pictures/snap.png'}}" alt="snap icon" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000"></a>
<a href="https://www.facebook.com/marin.sabljo" target="_blank"><img src="{{'pictures/twiter.png'}}" alt="twitter icon" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="2000"></a>
</div>
</section>


<!---------------FOOTER---------------------->

<section id="footer">
<img src="{{'pictures/wave_down.png'}}" class="footer-img wave" alt="wave pictures">

<div class="container">
    <div class="row">

        <div class="col-md-4 footer-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2470.9199634230863!2d15.053727634320456!3d44.31439074728964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47622266ae725539%3A0x5fc9383b5677490a!2sPut%20Biskuplja%C4%8De%2023%2C%2023234%2C%20Vir!5e0!3m2!1sen!2shr!4v1582240171122!5m2!1sen!2shr"
            width="300" height="200" frameborder="" style="border:" allowfullscreen=""></iframe>
        </div>

        <div class="col-md-4 footer-box">
        <p><b>KONTAKTIRAJ TE NAS!</b></p>
        <p><i class="fa fa-map-marker"></i> Put Biskupljače 23, Vir</p>
        <p><i class="fa fa-phone"></i> +385 92 357 5008</p>
        <p><i class="fa fa-envelope"></i> marin.sabljo@gmail.com</p>
        </div>

        <div class="col-md-4 footer-box">
            <p>Pretplatite se putem e-maila! Očekuju Vas sezonski popusti do 30%!</p>
            <form action="{{route('newsletter')}}" method="POST">
                @csrf
                <label for="mail">Unesi svoj mail za tjedne i mjesečne popuste!</label>
                <input type="email" placeholder="Vaš E-mail"   class="form-control" name="mail" id="name">
                <button type="submit" class="btn btn-primary">Pošalji!</button>
            </form>
         </div>

    </div>

    <hr>
    <p class="crafted">Crafted by Marin! </p>
</div>
</section>

@endsection

