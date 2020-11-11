<?php 

Class Conexion {

	Public Static Function conexionDB(){
		try{
			$cnn=new PDO('mysql:host=db4free.net;dbname=wissen','warthex','dbwissen');
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
