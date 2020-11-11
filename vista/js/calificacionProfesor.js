$(document).ready(function(){
	// dejar por defecto el activado el pimero
	//$('ul li a:first').addClass('activo');
	// desaparecer el resto todos los articulos
	$('.secciones article').hide();
	// solo ver el primero
	$('.secciones article:first').show();

	//al hacer lcick mostrar la clase seleccionada
	$('.siguente').click(function(){
		// quitar la clase avita
		//$('ul li a').removeClass('activo');
		//solo asiganar a la que se de click
		$(this).addClass('activo');
		//ocultar todas las secciones
		$('.secciones article').hide();

		// mostrar el contenido al que se le de el click
		// traer el contenido de el href trae tab1 tab2 etc
		var activeTab = $(this).attr('href');
		//mostrar el seleccionado
		$(activeTab).show();

		return false;
	});


});