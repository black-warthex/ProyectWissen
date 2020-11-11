$(document).ready(function(){

// ocultar usando la clase de el div hide es de jquery
$('.tit').hide();
// cuando de click en libro aparescan los 3
// llamar funcion anonima cuando se de click en libros

// ocultar la descripcion de el libro
$('.des').hide();

$('.cmt').click(function(){
	// mostrar y ocultar  div es de jquery 
	$('.tit').slideToggle(600);
});

// abrir descripcion de el lib
$('.tit').click(function(){
	// generar indices automaticamente para cada lib1 existente
	var posicion=$('.tit').index(this);
	// guardar en una variable el indice cuando le doy click al div 
	// ver el alert para entender mejor
	//alert(posicion);

	// asignar a la a la descripcion
	var asigna=$('.des').eq(posicion);
	// aplicar el hide and show con toggle
	asigna.slideToggle(500);

});


});