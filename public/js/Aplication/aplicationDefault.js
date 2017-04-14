
$(document).ready(function(){
   alinear();
   
   
    $("#menuBoton").click(function () {
        if(menu == 0) { 
        $('#panel').animate({left: 0},350);
        menu++;       
     } else  {
         $('#panel').animate({left: -330},350);
         menu = 0;
     }
    });
    
    
    $( window ).resize(function() {
        alinear();
    });
    
});



        
function alinear(){
    var panelWidth = $('#panel').width();
    var windowWidth = $(window).width();
    var principalWidth = $('#principal').width();
    
    if( windowWidth < 1500 && windowWidth >=950) { 
        $('#principal').css({'margin-left': panelWidth + 30, 'left': 0});
        $('#panel').animate({'left': 0 });
    }
    else if (windowWidth < 950 && windowWidth > 766) { 
        $('#principal').css('margin-left', panelWidth + 10);
        $('#principal').width(windowWidth - panelWidth- 30);
        $('#panel').css('left', 0 );
        menu = 0;
    }
    else if(windowWidth <= 766) { 
        $('#principal').css('margin', '0 auto');        
        $('#principal').width('95%');
        $('#panel').css('left', -300 );
    } else { 
         $('#principal').css('margin', '0 auto');
    }
    
            
}
var menu = 0;
