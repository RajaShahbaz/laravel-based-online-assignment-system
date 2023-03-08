(function($){
	$(document).ready(function(){
		$('.has-child > a').on('click', function(event){
			event.preventDefault();
			$(this).next('.children').slideToggle();
			$(this).toggleClass('icon-turn');
		});
		
		$('.menu-icon i').on('click', function(event){
			event.preventDefault();
			$('body').toggleClass('sidebar-off');
		});	

	});
}(jQuery))