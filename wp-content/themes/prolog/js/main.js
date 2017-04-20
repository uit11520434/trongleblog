/*global $:false */

jQuery(document).ready(function($){'use strict';

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > 130 ) {
			$('#masthead').addClass('sticky');
		}

		else {
		$('#masthead').removeClass('sticky');
		}

	});


	$("a[data-rel]").prettyPhoto();

	var masonry = $('.masonery_area');
	$(window).load(function(){
			masonry.masonry();//Masonry
	});

});

