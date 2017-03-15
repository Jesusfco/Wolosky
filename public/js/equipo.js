$(document).ready(function(){
     
      
    var heightVenta = $(window).height();
    var y = $(window).width();
    
    if( y > 900) {        
        var alturaCaption = $('.caption').height();
        var mitad = heightVenta/2;
    //  alturaCaption = alturaCaption/2;
        alturaCaption = mitad;
        $('.caption').css("top", alturaCaption + 85);
    }
    
    if( y > 600 && y <= 900) {        
        var alturaCaption = $('.caption').height();
        var mitad = heightVenta/2;
    //  alturaCaption = alturaCaption/2;
        alturaCaption = mitad;
        $('.caption').css("top", alturaCaption + 40);
    }
    
    
});
