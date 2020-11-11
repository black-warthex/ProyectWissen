$(document).ready(function(){
	
        $('.actualizar_p').hide();
        
        $('.btn_editar_p').click(function (){
                        $('.actualizar_p').slideToggle(300);
        });
//ocultar los edit de cada hora de el hario

$('.hora_oculta').hide();
$('.titulo-dia').show();
$('.columna').hide();
$('.back').hide();

$('.titulo-dia').click(function(){

	var posicion=$('.titulo-dia').index(this);
	// guardar en una variable el indice cuando le doy click al div 
	// ver el alert para entender mejor
	//alert(posicion);

	// asignar a la a la descripcion
	var asigna=$('.columna').eq(posicion);
	// aplicar el hide and show con toggle
	asigna.slideToggle(700);


});
	

$('.btn-editarPrin').click(function(){
 //le asigno un index a el boton de editar
var posicionBtnEditar=$('.btn-editarPrin').index(this);
//mostrar boton atras
// var atras=$('.back').eq(posicionBtnEditar);
$('.back').show();
//muestro la zona de edicion
$('.hora_oculta').slideToggle(700);
//oculta la zona de visualizacion
$('.materia-hora').slideToggle(700);
$('.btn-editarPrin').hide();
});		


$('.back').click(function(){
	//Función para actualizar cada 4 segundos(4000 milisegundos)
	//var posicion=$('.back').index(this);

  location.reload(true);
  	// alert(posicion);
  	// var asigna=$('.columna').eq(posicion);
	// aplicar el hide and show con toggle
	//$('.columna').slideToggle(700);	


});

  // $('.onemodal').click(function(){        
  //       $('#exampleModalScrollable').modal('hide');
  //  }); 

  // $('.backonemodal').click(function(){        
  //       $('#exampleModalScrollable').modal('show');
  //  }); 
	
});