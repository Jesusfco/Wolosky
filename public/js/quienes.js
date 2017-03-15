//Primera redimension pantalla completa contenedor Parallax-Container
  $(".parallax-container").css("height", $(window).height());

$(document).ready(function(){

  var x = 0;
  var alturaHijo = $('#hijoParallax').height();
  var alturaPadre = $('#padreParallax').height();
  var redimension;

  
    

   //Centrado Horizonatal del DivHijo 
  redimension = (alturaPadre-alturaHijo)/2;
  redimension = redimension + 'px';
  $('#hijoParallax').css('margin-top', redimension );


//Cuando la pantalle se redimensiona
  $(window).resize(function() {

    //Parrallax container adapta su Heigt segun la pantalla
    $(".parallax-container").css("height", $(window).height());

    //Obtenemos altura de los Div
    alturaPadre = $('#padreParallax').height();
    alturaHijo = $('#hijoParallax').height();    

    redimension = (alturaPadre-alturaHijo)/2;
    redimension = redimension - 50;
    
    $('#hijoParallax').css('top', redimension );
    

  }); //Fin de Window Resize function
});
