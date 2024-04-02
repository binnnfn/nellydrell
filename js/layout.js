(function($){
	var initLayout = function() {


		$('#myGallery').spacegallery({loadingClass: 'loading',duration:2000});
	};
	
	
	EYE.register(initLayout, 'init');
	
})(jQuery)