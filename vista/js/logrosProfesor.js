$(document).ready(function(){

$('.content_view').hide();
$('.content_edit').hide();

$('.title_mat').click(function(){

	var posicion=$('.title_mat').index(this);
	// asignar a la a la descripcion
	var asigna=$('.content_view').eq(posicion);
	// aplicar el hide and show con toggle
	asigna.slideToggle(20);	 
    
});

$('.agregar').click(function(){
 //le asigno un index a el boton de editar
var posicionBtnEditar=$('.agregar').index(this);
//muestro la zona de edicion
var asigna=$('.content_edit').eq(posicionBtnEditar);
asigna.slideToggle(20);
//oculta la zona de visualizacion
var asigna2=$('.content_view').eq(posicionBtnEditar);
asigna2.slideToggle(20);
});	

$('.back').click(function(){
 //le asigno un index a el boton de editar
var posicionBtnEditar=$('.back').index(this);
//muestro la zona de edicion
var asigna=$('.content_edit').eq(posicionBtnEditar);
asigna.slideToggle(20);
//oculta la zona de visualizacion
var asigna2=$('.content_view').eq(posicionBtnEditar);
asigna2.slideToggle(20);

});	

});