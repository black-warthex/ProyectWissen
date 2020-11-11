<?php 

Class Conexion {

	Public Static Function conexionDB(){
		try{
			$cnn=new PDO('mysql:host=localhost;dbname=wissen','warthex','1507');
			$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		}catch(Exception $e){
			die('Error en la conexion'.$e->GetMessage());
			echo 'linea de error'.$e->getLine();
		}
		return $cnn;
	}
}

conexion::conexionDB();

?>
