@extends('layouts.default')
 @section('title')
    <title>Equipo Wolosky - Gimnasia Artística - Tuxtla Gutierrez, Chiapas</title>
@endsection
@section('content') 
    <div class="slider fullscreen">
    <ul class="slides">
      <li>
        <img src="images/equipo/rebe.jpg"> <!-- random image -->
        <div class="caption left-align texto" style="opacity: .8;">
          <h3 class="oswaldo">Lic.Rebeca Wolosky Álvarez</h3>
          <h5 class="light grey-text text-lighten-3 thin">"Hola a todos, soy la fundadora de la Academia de Gimnasia Wolosky con mas de 30 años de sus inicios"</h5>
        </div>
      </li>
      <li>
        <img src="images/equipo/moi.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Led. Moisés Marín</h3>
          <h5 class="light grey-text text-lighten-3 thin">"Entrenador representante de Academia de Gimnasia Wolosky"</h5>
        </div>
      </li>
      <li>
        <img src="images/equipo/diana.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Led. Diana Lizeth Archila Castañón</h3>
          <h5 class="light grey-text text-lighten-3 thin">“Me gusta porque es un deporte que implica mucha disciplina, mucha constancia, así como mucha dedicación para poder vencer tus miedos.”</h5>
        </div>
      </li>
      <li>
        <img src="images/equipo/cara.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Lic. Uzías Calvo Ramírez</h3>
          <h5 class="light grey-text text-lighten-3 thin">"Soy entrenador de Gimnasia Artística. Me gusta la gimnasia porque es un deporte único en el  cual exige que tu cuerpo se desarrollé al máximo, y aprendes cada día nuevos elementos, elasticidad, flexibilidad, fuerza, etc…"</h5>
        </div>
      </li>


      <li>
        <img src="images/equipo/sr.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Lic. Jose Raul Morales Morales</h3>
          <h5 class="light grey-text text-lighten-3 thin">"Soy entrenador de Gimnasia, lo que gusta de la gimnasia es la disciplina con la que se tiene que aplicar, tiene que ser exacta y lo bonito es que un ejercicio bien hecho es estético, elegante..."</h5>
        </div>
      </li>

       <li>
        <img src="images/equipo/bere.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Lefd. Berenice Flores Arrasola</h3>
          <h5 class="light grey-text text-lighten-3 thin">"La Gimnasia es una gran forma de conocerte a ti  mismo ya que implica la superacion y progresion en cada entrenamiento" </h5>
        </div>
      </li>


       <li>
        <img src="images/equipo/Jose.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="oswaldo">Lefd. Jose Alfonso Esponda</h3>
          <h5 class="light grey-text text-lighten-3">"Llevo 20 años de entrenador de Gimnasia Artistica, me enfoque en la carrera de entrenamiento deportivo"</h5>
        </div>
      </li>

    </ul>
  </div>
@endsection

@section('scripts')    
    <script src="js/equipo.js"></script>

    <!--Materializewcss Slider-->
          <script>
              $(document).ready(function () {
                  $('.slider').slider({full_width: false});
              });
          </script>  

@endsection
    
