jQuery(document).ready(function() {

	// disable svg images for old android, or any other browser that does not support it
	if ( ! document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1")) {
  		jQuery('#logo').addClass('nosvg');
	}

});


//safari back button issue.
window.onunload = function(){};
