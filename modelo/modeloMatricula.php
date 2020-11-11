<?php 
require_once('conexion.php');

class matricula{

public function buscar_cursos(){

		try{

			$mtc=conexion::conexionDB()->prepare('call buscar_cursos()');			
			

			$mtc->execute();

			$cursos=$mtc->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $cursos;

}

public function buscar_grados(){

		try{

			$mtc=conexion::conexionDB()->prepare('call buscar_grados()');						

			$mtc->execute();

			$grado=$mtc->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;

}


	public function buscar_datosPersona($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call comprobar_registroEst(?);');			

			$adm->BindParam(1,$documento);			

			$adm->execute();

			$datos=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $datos;

	}

	public function comprobar_curso($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call comprobar_curso(?)');			
			$adm->BindParam(1,$documento);
			$adm->execute();

			$codMat=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $codMat;

	}

	public function buscar_matriculas2($grado){

		try{

			$adm=conexion::conexionDB()->prepare('call asignar_grado(?)');			
			$adm->BindParam(1,$grado);

			$adm->execute();

			$codMat=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $codMat;

	}

	public function buscar_matriculas(){

		try{

			$adm=conexion::conexionDB()->prepare('call mostrar_matriculas()');			
			
			$adm->execute();

			$codMat=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $codMat;

	}

	public function mod_matricular($codMatricula,$estudiante){

		try{

			$adm=conexion::conexionDB()->prepare('call modificar_matriculacion(?,?)');			

			$adm->BindParam(1,$estudiante);
			$adm->BindParam(2,$codMatricula);	
			
			
			if($adm->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

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

     public function insert_datosContacto($documento,$direccion,$telefono,$correo){

        try{

            $usu=conexion::conexionDB()->prepare('call insert_datosContacto(?,?,?,?);');

            $usu->bindParam(1,$documento);
            $usu->bindParam(2,$direccion);
            $usu->bindParam(3,$telefono);
            $usu->bindParam(4,$correo);            

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

}

?>