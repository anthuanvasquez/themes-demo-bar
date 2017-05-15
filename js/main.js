var theme_list_open = false;
				
jQuery(document).ready(function($) {
	
	// Show preview image on product list
	imagePreview();
	
	var headerHeight = $('.switcher-wrap').outerHeight();

	function fixHeight() {
		$('.view-wrap iframe').attr('height', $(window).height() + 'px');
	}
	
	// Fix hight ifrime		
	$(window).resize(function () {
		fixHeight();
	}).resize();

	// Set padding top
	$('.view-wrap').css('paddingTop', headerHeight + 'px');
	
	// Show product list
	$('.theme-select').on( 'click', function(e) {
		e.preventDefault();

		if ( theme_list_open === true ) {
			$('.themes ul').fadeOut('fast');
			theme_list_open = false;
		} else {
			$('.themes ul').fadeIn('fast');
			theme_list_open = true;
		}
	});
	
	// Select theme	
	$('.themes ul li a').on( 'click', function(e) {

		e.preventDefault();
		
		// Get theme data
		var theme_url = $(this).attr('data-url'),
			theme_shop = $(this).attr('data-shop'),
			theme_name = $(this).attr('data-name');

		// Put data
		$('.theme-purchase').attr('href', theme_shop);
		$('.theme-remove').attr('href', theme_url);
		$('.view-wrap iframe').attr('src', theme_url);

		// Remove span text
		var clone = $(this).clone();
		var type = $('.theme-type', clone).text();

		$('.theme-type', clone).remove();		
		$('.themes .theme-select').html( theme_name + '<span>' + type + '</span>' );

		// Hide themes list
		$('.themes ul').hide();
		
		theme_list_open = false;
	});

	// Responsive Views
	$('.desktop').on( 'click', function() {
		$('.device').removeAttr('class').addClass('device desktop');
		$('.view-wrap .device').css('width', 100 + '%');
		return false;
	});

	$('.tablet-land').on( 'click', function() {
		$('.device').removeAttr('class').addClass('device tablet-land');
		$('.view-wrap .device').css('width', 1024);
		return false;
	});

	$('.tablet-port').on( 'click', function() {
		$('.device').removeAttr('class').addClass('device tablet-port');
		$('.view-wrap .device').css('width', 768);
		return false;
	});

	$('.mobile-land').on( 'click', function() {
		$('.device').removeAttr('class').addClass('device mobile-land');
		$('.view-wrap .device').css('width', 480);
		return false;
	});

	$('.mobile-port').on( 'click', function() {
		$('.device').removeAttr('class').addClass('device mobile-port');
		$('.view-wrap .device').css('width', 320);
		return false;
	});

}); 