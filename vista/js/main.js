// metodo principal
$(document).ready(function(){

//ocultar los edit de cada hora de el hario
$('.btn-editarMat').hide();
$('.ediMat').hide();
$('.editPro').hide();
$('.text-hora-2').hide();
$('.titulo_horario').hide();
$('.text-materias').show();
$('.text-hora').show();
	
//
$('.btn-editarPrin').click(function(){

	// mostrar y ocultar  div es de jquery 
	if($(".ediMat:visible").length > 0){
		$('.text-hora').slideToggle(0);
		$('.text-materias').slideToggle(0);
		$('.btn-editarMat').slideToggle(0);
		
	}else{
		$('.text-materias').slideToggle(0);
		$('.text-hora').slideToggle(0);
		$('.btn-editarMat').slideToggle(800);

	}
		$('.ediMat').slideToggle(800);
		$('.editPro').slideToggle(800);
		$('.titulo_horario').slideToggle(800);
		$('.text-hora-2').slideToggle(800);

});	
$('#prueba').change(function(){

	$('#prueba option:selected').each(function(){

		log_grado=$(this).val();			
		
		$.ajax({
			url:'controlador/ejemplo.php',
			type:'post',
			data:{'log_grado':log_grado}
		})
		.done(function(res){
			$('#c').html(res)

		})

		.fail(function(){
			console.log('error')
		
			
		});
		});
		

	});


//
//
//// abrir descripcion de el lib
// $('.btn-editarMat').click(function(){
// 	alert('aqui');
//  });
//
//$('.btt').click(function(){
//     
//     var posicionbtn=$('.btt').index(this);
//     alert(posicionbtn);
//
////recuperar los datos de el formulario
//var codigo=$('.doca').eq(posicionbtn);
//        
//  codigoo=codigo.val();
//  
//  //envio 1 para entrar al metodo de eliminar
//
////usar ajax para asignar y eviar datos
//
//$.ajax({
//   url:"servletCliente",
//   //method="post",
//   data:{
//       
//       codigoEnvio:codigoo
//
//   }
//  
//});
//
//});
//
//$('.upda').click(function(){
//     
//     var posicionup=$('.upda').index(this);
//    
////recuperar los datos de el formulario
//var documento=$('.doc').eq(posicionup);
//var nombre=$('.nom').eq(posicionup);
//var apellido=$('.ape').eq(posicionup);
//var direccion=$('.dir').eq(posicionup);
//var telefono=$('.tel').eq(posicionup);
//var fecha=$('.fec').eq(posicionup);
//        
//alert(posicionup);
//  doc=documento.val();
//  nom=nombre.val();
//  ape=apellido.val();
//  dir=direccion.val();
//  tel=telefono.val();
//  fec=fecha.val();
//  //envio 1 para entrar al metodo de eliminar
//  conf=1;
////usar ajax para asignar y eviar datos
//
//$.ajax({
//   url:"servletCliente",
//   //method="post",
//   data:{
//       doc:doc,
//       nom:nom,
//       ape:ape,
//       dir:dir,
//       tel:tel,
//       fec:fec,
//       confir:conf
//   }
//    
//});
//});


});
// funciones anonimas (funciones nativas js)
//click en botn con index+

// 