@extends('master.master')
@section('content')

<section>

    <div class="container title-selectInput" style="height:100vh;">
        
       <h1 class="center" style="margin-bottom: 4rem;">POŽELI</h1>

      

        <div class="row">
            <div class="input-field col">
                <select>
                    <option value="" disabled selected>Izaberi Dom/Organizaciju</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Odaberi</label>
            </div>
         
            </div>

            <div class="center-align col s1">
                <a a class=" btn-medium  waves-effect waves btn-large red lighten-3" style="margin-top:1rem;"><i class="material-icons left">send</i>Pregledaj odabrani Dom</a>
                <a class=" waves-effect waves-light btn-large pulse red lighten-3" style="margin-top:1rem;"><i class="material-icons left">comment</i>Pregledaj sve želje!</a>
            </div>

            <div class="row">
        <div class="carousel">
        <div class="col s4  carousel-item">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
        <a href="#">Ana, 13</a>
        </div>
      </div>
    </div>

    <div class="col s4 carousel-item">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">Ana, 13</a>
         
        </div>
      </div>
    </div>

    <div class="col s4  carousel-item">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action right">
        <a href="#">Ana, 13</a>
        </div>
      </div>
   
  </div>

</div>


  




</section>
      
    
<style>
    .select-dropdown {
  height: 300px;
}
</style>

<script>
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elemss = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elemss);
  });
</script>



@endsection