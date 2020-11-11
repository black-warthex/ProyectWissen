<?php 
require_once('conexion.php');

Class modelo_usuario{

    public function insert_usuario($usuario,$clave,$tipo_documento,$documento,$nombre,$apellido,$rh,$fecha,$rol){

        try{

            $usu=conexion::conexionDB()->prepare('call insertUsuario(?,?,?,?,?,?,?,?,?);');

            $usu->bindParam(1,$usuario);
            $usu->bindParam(2,$clave);
            $usu->bindParam(3,$tipo_documento);
            $usu->bindParam(4,$documento);
            $usu->bindParam(5,$nombre);
            $usu->bindParam(6,$apellido);
            $usu->bindParam(7,$rh);
            $usu->bindParam(8,$fecha);
            $usu->bindParam(9,$rol);

            if($usu->execute()){

                $estado=1;

            }else{

                $estado=0;

            }
        }catch(Exception $e){

            echo "Error de consulta ".$e;

        }
        return $estado;
    }



public function consultar_usuario($usuario){

		try{


			$usu=conexion::conexionDB()->prepare('call buscar_usuario(?);');

			$usu->bindParam(1,$usuario);

			$usu->execute();

			$usuario=$usu->fetchAll();			

		}catch(Exception $e){

			echo "Error en la consulta ".$e;
		}
		return $usuario;
	}

//BUSCAR DOCUMENTO
    public function consultar_documento($documento){

        try{


            $usu=conexion::conexionDB()->prepare('call buscarDocumento(?);');

            $usu->bindParam(1,$documento);

            $usu->execute();

            $usuario=$usu->fetchAll();          

        }catch(Exception $e){

            echo "Error en la consulta ".$e;
        }
        return $usuario;
    }



public function consultar_rol(){

    try{

        $usu=conexion::conexionDB()->prepare('call consultar_rol();');

        $usu->execute();

        $usuario=$usu->fetchAll();

    }catch(Exception $e){

        echo "Erro en la consulta".$e;

    }

    return $usuario;

}


public function logueo_usuario($usuario,$clave){

        try{


            $usu=conexion::conexionDB()->prepare('call logueo_usuario(?,?);');

            $usu->bindParam(1,$usuario);
            $usu->bindParam(2,$clave);

            $usu->execute();

            $usuario=$usu->fetchAll();          

        }catch(Exception $e){

            echo "Error en la consulta ".$e;
        }
        return $usuario;
    }


}
 ?>