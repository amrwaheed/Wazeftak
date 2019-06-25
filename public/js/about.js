

$(document).ready(function(){
	'use strict';
	
    	
    $(".loading").fadeOut(2000,function(){
    $('body').css("overflow", "visible");
    
        }); 
    
    $("html").niceScroll({cursorwidth: '10px', autohidemode: true, zindex: 9999999999999999 ,cursorcolor : "#38a3dc" });
        

    
        	//Adjust slider Height
                var winH = $(window).height(),
			navH=$('.navbar').innerHeight();
             //   $('.image ').height(winH - ( navH ));
               
        $("ul li").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
        });


      /*################### خاص بالاسكرول  ##########################*/
	$(window).on("scroll", function () {
		var sc = $(window).scrollTop(),
            wids= $(window).width();
        
		 
		
        if(sc > 500){
			$(".scroll").fadeIn(1000);
		
		}else{
			$(".scroll").fadeOut(1000);
		}
		

        if(wids <767){
           $(".copyright").css({ display : "block"}); 
        }
	});
        


});








