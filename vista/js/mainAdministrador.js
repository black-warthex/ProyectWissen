$(document).ready(function(){
	// dejar por defecto el activado el pimero
	$('ul li a:first').addClass('activo');
	// desaparecer el resto todos los articulos
	$('.secciones article').hide();
	// solo ver el primero
	$('.secciones article:first').show();

	//al hacer lcick mostrar la clase seleccionada
	$('ul li a').click(function(){
		// quitar la clase avita
		$('ul li a').removeClass('activo');
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
        $('.actualizar_p').hide();
        
        $('.btn_editar_p').click(function (){
                        $('.actualizar_p').slideToggle(300);
        });
//ocultar los edit de cada hora de el hario

$('.hora_oculta').hide();
$('.columna').hide();


$('.titulo-dia').click(function(){

	var posicion=$('.titulo-dia').index(this);
	// guardar en una variable el indice cuando le doy click al div 
	// ver el alert para entender mejor
	//alert(posicion);

	// asignar a la a la descripcion
	var asigna=$('.columna').eq(posicion);
	// aplicar el hide and show con toggle
	asigna.slideToggle(20);


});
	

$('.btn-editarPrin').click(function(){

$('.hora_oculta').slideToggle(20);

});		

	
});