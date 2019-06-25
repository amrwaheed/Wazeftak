$(document).ready(function() {
	'use strict';

	$(".loading").fadeOut(2000, function() {
		$('body').css("overflow", "visible");

	});

	$("html").niceScroll({
		cursorwidth: '10px',
		autohidemode: true,
		zindex: 9999999999999999,
		cursorcolor: "#38a3dc"
	});


	$('body .overlay').css("display", "block");


	$('body .overlay .lan a').on("click", function() {
		$('body .overlay').css("display", "none");
	});
	//Adjust slider Height
	var winH = $(window).height(),
		navH = $('.navbar').innerHeight();
	$('.slider , .carousel-item').height(winH - (navH));

	/* $("ul li").click(function () {
	     $(this).addClass("active").siblings().removeClass("active");
	 });*/



	$('.carousel').carousel();
	$('.carousel').carousel({
		interval: 4000
	});


	/*################### خاص بالاسكرول  ##########################*/
	$(window).on("scroll", function() {
		var sc = $(window).scrollTop(),
			wids = $(window).width();

	
		if (sc > 200) {
			$("nav").addClass("fixed-top").removeClass("sticky-top");

		} else {
			$("nav").removeClass("fixed-top").addClass("sticky-top");
		}

		if (wids < 767) {
			$(".copyright").css({
				display: "block"
			});
		}

		if (sc > 500) {
			$(".scroll").fadeIn(1000);

		} else {
			$(".scroll").fadeOut(1000);
		}
	});

	/* عندما يضغط على الديف يطلع بالاسكرول ببطئ */
	$(".scroll").on('click', function() {
		var body = $("html, body");

		body.animate({
			scrollTop: 0
		}, 700);
		return true;
	});




});




/**/
$('.center').slick({
	centerMode: true,
	centerPadding: '60px',
	slidesToShow: 4,
	responsive: [{
		breakpoint: 768,
		settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 4
		}
	}, {
		breakpoint: 480,
		settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 1
		}
	}]
});