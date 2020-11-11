$(document).ready(function(){
	
$('.btn-editarMat').click(function(){	
	var posicionup=$('.btn-editarMat').index(this);
	var a=$('.codCur').eq(posicionup);
	var b=$('.codDia').eq(posicionup);
	var c=$('.codHor').eq(posicionup);
	var d=$('.codMateria').eq(posicionup);
	var f=$('.codProfesorMat').eq(posicionup);
	codCur=a.val();	
	codDia=b.val();	
	codHora=c.val();	
	codMateria=d.val();	
	profe=f.val();	
	menu=1;

		$.ajax({
   			type: "POST",
   			url: "controlador.php",
		   	data:{codCur: codCur,codDia:codDia,codHora:codHora,codMateria:codMateria,profe:profe,menu:menu},
		   		success: function(res){
     			//alert(res); 


     			if (res.trim()==="Docente asignado correctamente") {
	 				swal({
				  			icon: "success",
				  			title: "Operacion Realizada",
  							text: res,
		 					button: "ok",
						});

     			}else{

     				if(res.trim()==="libre"){
     						swal({
				  			icon: "info",
				  			title: "Hora "+res+" asignada",
  							text: "Tenga en cuenta que esta no requiere profesor",
		 					button: "ok",
						});  

     				}else{

     					if (res.trim()==="ERROR") {
     						swal({
				  			icon: "error",
				  			title: "Lo sentimos",
  							text: "Ha ocurrido un error",
		 					button: "ok",
						});     				
						}else{
							swal({
				  			icon: "error",
				  			title: "Docente Ocupado",
  							text: res,
		 					button: "ok",
						});     
						}	

     					}
     				
									
					}
     			}
     	
     	  			

   
  		});



});


});