<?php 
require_once('conexion.php');

Class administrador{

	public function insertCurso($grado,$nombre,$cupo){

		try{

			$adm=conexion::conexionDB()->prepare('call insertCurso(?,?,?)');
			$adm->BindParam(1,$grado);
			$adm->BindParam(2,$nombre);
			$adm->BindParam(3,$cupo);			

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

	
	public function reg_matricula($curso){

		try{

			$adm=conexion::conexionDB()->prepare('call insertMatricula(?)');			
			$adm->BindParam(1,$curso);			

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


	public function buscar_alumno($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_estudiante(?)');			
			$adm->BindParam(1,$documento);
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

	public function buscar_materias_definida(){

		try{

			$adm=conexion::conexionDB()->prepare('call materia_default()');			

			$adm->execute();

			$codMat1=$adm->fetchAll();			
	
			echo "";
		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}		
		return $codMat1;

	}
	
	public function buscar_cant_dias(){

		try{

			$adm=conexion::conexionDB()->prepare('call cantDias()');			

			$adm->execute();

			$cantDias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantDias;

	}
	
	public function buscar_cant_horas(){

		try{

			$adm=conexion::conexionDB()->prepare('call cantHoras()');			

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}
	public function buscar_profesores(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_profesores()');			

			$adm->execute();

			$profesores=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $profesores;

	}

	public function insertHorario($curso,$materia,$dia,$hora){

		try{

			$adm=conexion::conexionDB()->prepare('call insertHorario(?,?,?,?)');
			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$materia);			
			$adm->BindParam(3,$dia);
			$adm->BindParam(4,$hora);						
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

		public function insertHorarioP($curso,$materia,$dia,$hora,$profesor){

		try{

			$adm=conexion::conexionDB()->prepare('call insertHorarioP(?,?,?,?,?)');
			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$materia);			
			$adm->BindParam(3,$dia);
			$adm->BindParam(4,$hora);						
			$adm->BindParam(5,$profesor);						
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
	public function updateHorario($curso,$materia,$dia,$hora,$pro){

		try{

			$adm=conexion::conexionDB()->prepare('call updateHorario(?,?,?,?,?)');
			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$materia);			
			$adm->BindParam(3,$dia);
			$adm->BindParam(4,$hora);						
			$adm->BindParam(5,$pro);
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
		
		public function DeleteHorario($dia,$hora,$pro){

		try{

			$adm=conexion::conexionDB()->prepare('call deleteHorario(?,?,?)');
			
			
			$adm->BindParam(1,$dia);
			$adm->BindParam(2,$hora);						
			$adm->BindParam(3,$pro);
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
		public function borrarLibre($curso,$dia,$hora){

		try{

			$adm=conexion::conexionDB()->prepare('call LiberarHora(?,?,?)');
			
			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);
			$adm->BindParam(3,$hora);									
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

	public function buscar_lunes($curso,$dia){

		try{

			$adm=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);	

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}
	public function buscar_martes($curso,$dia){

		try{

			$adm=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);	

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}
	public function buscar_miercoles($curso,$dia){

		try{

			$adm=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);	

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}
	public function buscar_jueves($curso,$dia){

		try{

			$adm=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);	

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;
	}
	

	public function verificar_cupo($matricula){

		try{

			$adm=conexion::conexionDB()->prepare('call verificar_Cupo(?)');			

			$adm->BindParam(1,$matricula);			

			$adm->execute();

			$cupo=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cupo;

	}
	
	public function verificar_matricula($codigo){

		try{

			$adm=conexion::conexionDB()->prepare('call verificar_matricula(?)');			

			$adm->BindParam(1,$codigo);			

			$adm->execute();

			$cupo=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cupo;

	}
	public function verificar_inscripcion($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call verificar_inscripcion(?)');			

			$adm->BindParam(1,$documento);			

			$adm->execute();

			$cupo=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cupo;

	}

	public function buscar_viernes($curso,$dia){

		try{

			$adm=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$adm->BindParam(1,$curso);
			$adm->BindParam(2,$dia);	

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}
	//AQUI
	public function buscar_cursos(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_cursos()');			
			

			$adm->execute();

			$cursos=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $cursos;

	}

		public function buscar_cursos_parametro($curso){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_curso_parametro(?)');			
			$adm->BindParam(1,$curso);

			$adm->execute();

			$cursos=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $cursos;

	}
	
	public function disponibilidad_profesor($dia,$hora,$profesor){

		try{

			$adm=conexion::conexionDB()->prepare('call disponibilidad2(?,?,?)');			
			$adm->BindParam(1,$dia);
			$adm->BindParam(2,$hora);
			$adm->BindParam(3,$profesor);
			

			$adm->execute();

			$disponibilidad=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $disponibilidad;

	}
	
	public function buscar_grados(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_grados()');						

			$adm->execute();

			$grado=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;

	}
	
	public function buscar_grado($curso){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_grado(?)');			
			$adm->BindParam(1,$curso);

			$adm->execute();

			$grado=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;

	}
	//materias
	public function buscar_materias($grado){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_materias(?)');			
			$adm->BindParam(1,$grado);

			$adm->execute();

			$materias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $materias;

	}
		public function buscar_materias_grado(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_materia_grado()');						
			$adm->execute();

			$materias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $materias;

	}
	public function buscar_materias_existente($nombre,$grado){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_materia_existente(?,?)');						
			$adm->BindParam(1,$nombre);
			$adm->BindParam(2,$grado);
			$adm->execute();

			$materias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $materias;

	}
	public function buscar_logros($materia){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_logros(?)');			
			$adm->BindParam(1,$materia);

			$adm->execute();

			$logros=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $logros;

	}
	public function insertar_materia($nombre,$grado){

		try{

			$adm=conexion::conexionDB()->prepare('call insertMateria(?,?)');			

			$adm->BindParam(1,$nombre);
			$adm->BindParam(2,$grado);	
			
			
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
	//Matriculacion
	public function reg_matricular($codMatricula,$estudiante){

		try{

			$adm=conexion::conexionDB()->prepare('call registrar_matriculacion(?,?)');			

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
	//modificar matricula
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

	//sigue bueno
	public function insertar_logro($materia,$descripcion){

		try{

			$adm=conexion::conexionDB()->prepare('call insert_logros(?,?)');			

			$adm->BindParam(1,$materia);
			$adm->BindParam(2,$descripcion);	
			
			
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


	public function insertar_anucio($nombre,$descripcion,$fecha,$curso){

		try{

			$adm=conexion::conexionDB()->prepare('call insert_anuncion(?,?,?,?)');			

			$adm->BindParam(1,$nombre);
			$adm->BindParam(2,$descripcion);	
			$adm->BindParam(3,$fecha);
			$adm->BindParam(1,$curso);
			
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
	public function update_datos($codigo,$nombre,$apellido,$fecha,$foto){

		try{

			$adm=conexion::conexionDB()->prepare('call update_datos(?,?,?,?,?)');			

			$adm->BindParam(1,$codigo);
			$adm->BindParam(2,$nombre);	
			$adm->BindParam(3,$apellido);
			$adm->BindParam(4,$fecha);
			$adm->BindParam(5,$foto);
			
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

	
}
?>