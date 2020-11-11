-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2020 a las 13:30:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wissen`
--

CREATE DATABASE wissen;
USE wissen;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarclave` (`usuario` VARCHAR(50), `clave` TEXT)  update tblUsuario set UsuClave=hex(aes_encrypt(clave,usuario)) where UsuNombre=usuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario` (`UsuNombre_in` VARCHAR(50), `PerNombre_in` VARCHAR(50), `PerApellido_in` VARCHAR(50), `PerFechaNacimiento_in` DATE, `UsuFoto_in` VARCHAR(255), `UsuCodigo_in` INT(11))  update tblusuario inner join tblpersona on UsuCodigo=PerUsuario set UsuNombre=UsuNombre_in,PerNombre=PerNombre_in,PerApellido=PerApellido_in,PerFechaNacimiento=PerFechaNacimiento_in,UsuFoto=UsuFoto_in
where UsuCodigo=UsuCodigo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AllCursos` ()  SELECT*FROM TblCurso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AllDias` ()  SELECT*FROM TblDia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `asignar_grado` (`CurCodGrado_in` INT)  SELECT MatrCodigo,MatrFecha,CurCodGrado,MatrCurso,GraNombre,CurCupo FROM TblMatricula  INNER JOIN TblCurso ON CurNombre=MatrCurso INNER JOIN TblGrado ON CurCodGrado=GraCodigo  WHERE CurCodGrado!=7 AND CurCupo!=0 AND CurCodGrado=CurCodGrado_in  OR CurCodGrado=(CurCodGrado_in+1) ORDER BY CurCodGrado DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCursoM` (`PerMatrPerDocumento_in` VARCHAR(11))  SELECT MatrCurso,GraCodigo,GraNombre FROM TblMatricula INNER JOIN TblCurso ON CurNombre=MatrCurso INNER JOIN TblMatricula_TblPersona ON MatrCodigo=PerMatrMatrCodigo INNER JOIN TblGrado ON GraCodigo=CurCodGrado WHERE PerMatrPerDocumento=PerMatrPerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCursoMatriculado` (`PerMatrPerDocumento_in` VARCHAR(11))  SELECT MatrCurso FROM TblMatricula INNER JOIN TblMatricula_TblPersona ON MatrCodigo=PerMatrMatrCodigo WHERE PerMatrPerDocumento=PerMatrPerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarDocumento` (`PerDocumento_in` VARCHAR(11))  SELECT * FROM TblPersona WHERE PerDocumento=PerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarPQR` (`PerDocumento_in` VARCHAR(11))  BEGIN
SET @CodigoUsu=(SELECT PerUsuario FROM TblPersona WHERE PerDocumento=PerDocumento_in);
select PqrId,PqrAsunto,PqrDescripcion,PqrUsuario,PqrAdmi,PqrTipo,PqrFechaEnviado,
PqrRespuesta,PqrFechaRespuesta,PqrEstado,PqrLeido,PerDocumento,PerNombre,PerApellido from TblPqr inner join  TblUsuario on PqrUsuario=UsuCodigo
inner join TblPersona on UsuCodigo=PerUsuario WHERE UsuCodigo=@CodigoUsu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_cursos` ()  SELECT*FROM TblCurso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_curso_parametro` (`CurNombre_in` VARCHAR(10))  SELECT*FROM TblCurso WHERE CurNombre=CurNombre_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_estudiante` (`PerDocumento_in` VARCHAR(11))  SELECT PerDocumento,PerNombre,PerApellido,RolTipo FROM TblPersona INNER JOIN TblUsuario_TblRol ON PerUsuario=URUsuCodigo  INNER JOIN TblRol ON URolId=RolId WHERE RolTipo="ALUMNO" AND PerDocumento=PerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_grado` (`CurNombre_in` VARCHAR(10))  SELECT CurCodGrado FROM TblCurso WHERE CurNombre=CurNombre_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_grados` ()  SELECT*FROM TblGrado ORDER BY  GraCodigo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_logros` (`LogMateria_in` INT)  SELECT LogDescripcion FROM TblLogros WHERE LogMateria=LogMateria_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_materias` (`MatGrado_in` INT)  SELECT * FROM TblMateria WHERE MatGrado=MatGrado_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_materia_existente` (`MatNombre_in` VARCHAR(50), `MatGrado_in` INT)  SELECT*FROM TblMateria WHERE MatNombre=MatNombre_in AND MatGrado=MatGrado_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_materia_grado` ()  SELECT MatCodigo,MatNombre,GraCodigo,GraNombre  FROM TblMateria INNER JOIN TblGrado ON MatGrado=GraCodigo  ORDER BY MatGrado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_profesores` ()  SELECT PerDocumento,PerNombre,PerApellido,RolTipo FROM TblPersona INNER JOIN TblUsuario_TblRol ON PerUsuario=URUsuCodigo  INNER JOIN TblRol ON URolId=RolId WHERE RolTipo="PROFESOR"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_usuario` (`UsuNombre_in` VARCHAR(50))  SELECT * FROM TblUsuario WHERE UsuNombre=UsuNombre_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cantDias` ()  SELECT COUNT(*) FROM TblDia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cantHoras` ()  SELECT COUNT(*) FROM TblHora$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cantidad_logros` (`LogPerNombrePeriodo_in` VARCHAR(50), `LogMateria_in` INT)  SELECT COUNT(*) FROM TblLogros INNER JOIN TblMateria ON MatCodigo=LogMateria WHERE LogCodigo IN(SELECT LogPerCodigoLogro FROM TblLogros inner join TblLogrosPeriodo on LogCodigo=LogPerCodigoLogro WHERE LogPerNombrePeriodo=LogPerNombrePeriodo_in) AND LogMateria=LogMateria_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `comprobar_curso` (`PerMatrPerDocumento_in` VARCHAR(11))  SELECT MatrCurso,CurCodGrado FROM TblMatricula INNER JOIN TblMatricula_TblPersona ON MatrCodigo=PerMatrMatrCodigo inner join TblCurso on MatrCurso=CurNombre  WHERE PerMatrPerDocumento=PerMatrPerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `comprobar_estudiante` (`PerDocumento_in` VARCHAR(11))  select PerNombre,PerApellido,URolId from TblPersona inner join TblUsuario_TblRol on URUsuCodigo=PerUsuario  WHERE PerDocumento=1233$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `comprobar_logros` (`CalCodigoUsuario_in` INT, `CalCodigoLogro_in` INT)  SELECT * FROM TblCalificacion WHERE CalCodigoUsuario=CalCodigoUsuario_in AND CalCodigoLogro=CalCodigoLogro_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `comprobar_registroEst` (`PerDocumento_in` VARCHAR(11))  select PerNombre,PerApellido,URolId,RolTipo from TblPersona inner join TblUsuario_TblRol on URUsuCodigo=PerUsuario inner join TblRol on RolId=URolId  WHERE PerDocumento=PerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultardatosjava` (`UsuCodigo_in` INT(11))  select UsuNombre,PerNombre,PerApellido,PerFechaNacimiento,UsuFoto,UsuCodigo from tblusuario inner join  tblpersona on UsuCodigo=PerUsuario  where UsuCodigo=UsuCodigo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_rol` ()  SELECT*FROM TblRol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `default_calificacion` (`CalCodigoUsuario_in` INT, `CalCodigoLogro_in` INT)  INSERT INTO TblCalificacion VALUES (CalCodigoUsuario_in,CalCodigoLogro_in,'NO CALIFICADO')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHorario` (`CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11))  DELETE FROM TblCurso_TblMateria WHERE CM_CurNombre=0 AND CM_DiaCodigo=CM_DiaCodigo_in  AND CM_MatCodigo=1  AND CM_HorCodigo=CM_HorCodigo_in AND CM_DocProfesor=CM_DocProfesor_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disponibilidad` (`CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11), `CM_CurNombre_in` VARCHAR(11))  SELECT TblCurso_TblMateria.*,GraNombre FROM TblCurso_TblMateria INNER JOIN TblCurso ON  CM_CurNombre=CurNombre INNER JOIN TblGrado ON CurCodGrado=GraCodigo WHERE  GraNombre!="DEFAULT" AND CM_DiaCodigo=CM_DiaCodigo_in AND CM_HorCodigo=CM_HorCodigo_in AND CM_DocProfesor=CM_DocProfesor_in AND CM_DocProfesor!=0  AND CM_CurNombre!=CM_CurNombre_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disponibilidad2` (`CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11))  SELECT TblCurso_TblMateria.*,GraNombre FROM TblCurso_TblMateria INNER JOIN TblCurso ON  CM_CurNombre=CurNombre INNER JOIN TblGrado ON CurCodGrado=GraCodigo WHERE  CM_DiaCodigo=CM_DiaCodigo_in AND CM_HorCodigo=CM_HorCodigo_in AND CM_DocProfesor=CM_DocProfesor_in AND CM_DocProfesor!=0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarPqr` (`PqrId_el` INT(11))  delete from TblPqr where PqrId=PqrId_el$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_Lperiodo` (`LogPerCodigoLogro_in` INT, `LogPerNombrePeriodo_in` VARCHAR(50))  DELETE FROM TblLogrosPeriodo WHERE LogPerCodigoLogro=LogPerCodigoLogro_in AND LogPerNombrePeriodo=LogPerNombrePeriodo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtro_Pqr` (`pqr` VARCHAR(100))  select PqrId,PqrAsunto,PqrDescripcion,PqrUsuario,PqrAdmi,PqrTipo,PqrFechaEnviado,
PqrRespuesta,PqrFechaRespuesta,PqrEstado,PqrLeido,PerDocumento,PerNombre,PerApellido from TblPqr inner join  TblUsuario on PqrUsuario=UsuCodigo
inner join TblPersona on UsuCodigo=PerUsuario WHERE  PqrTipo=pqr and PqrEstado='En Espera'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtro_Pqr_Todos` (`pqr` VARCHAR(100))  select PqrId,PqrAsunto,PqrDescripcion,PqrUsuario,PqrAdmi,PqrTipo,PqrFechaEnviado,
PqrRespuesta,PqrFechaRespuesta,PqrEstado,PqrLeido,PerDocumento,PerNombre,PerApellido from TblPqr inner join  TblUsuario on PqrUsuario=UsuCodigo
inner join TblPersona on UsuCodigo=PerUsuario WHERE  PqrTipo=pqr$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `find_alumnosC` (`MatrCurso_in` VARCHAR(10))  SELECT PerUsuario,PerDocumento,PerNombre,PerApellido,MatrCurso FROM TblPersona INNER JOIN TblMatricula_TblPersona ON PerDocumento=PerMatrPerDocumento INNER JOIN TblMatricula ON PerMatrMatrCodigo=MatrCodigo WHERE MatrCurso=MatrCurso_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `find_cursos` (`CM_DocProfesor_in` VARCHAR(11))  SELECT DISTINCT CM_CurNombre FROM TblCurso_TblMateria WHERE CM_DocProfesor=CM_DocProfesor_in AND CM_CurNombre!=0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `find_materias` (`CM_DocProfesor_in` VARCHAR(11), `CurNombre_in` VARCHAR(10))  SELECT distinct CM_MatCodigo,MatNombre,GraNombre,CurNombre FROM TblCurso_TblMateria INNER JOIN TblMateria ON CM_MatCodigo=MatCodigo INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblGrado ON CurCodGrado=GraCodigo WHERE CM_DocProfesor=CM_DocProfesor_in AND MatNombre!="LIBRE" AND CurNombre=CurNombre_in ORDER BY GraCodigo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `find_materias_alumno` (`CurNombre_in` VARCHAR(10))  SELECT distinct CM_MatCodigo,MatNombre,GraNombre,CurNombre FROM TblCurso_TblMateria INNER JOIN TblMateria ON CM_MatCodigo=MatCodigo INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblGrado ON CurCodGrado=GraCodigo WHERE  MatNombre!="LIBRE" AND CurNombre=CurNombre_in ORDER BY GraCodigo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPqr` (`PqrAsunto_in` VARCHAR(200), `PqrDescripcion_in` TEXT, `PqrUsuario_in` INT, `PqrTipo_in` TEXT)  insert into TblPqr(PqrAsunto,PqrDescripcion,PqrUsuario,PqrTipo,PqrFechaEnviado,PqrEstado,PqrLeido) values (PqrAsunto_in,PqrDescripcion_in,PqrUsuario_in,PqrTipo_in,curdate(),"En Espera","No")$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_logros` (`LogDescripcion_in` TEXT)  INSERT INTO TblLogros (LogDescripcion) VALUES (LogDescripcion_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Lperiodo` (`LogPerCodigoLogro_in` INT, `LogPerNombrePeriodo_in` VARCHAR(50))  INSERT INTO TblLogrosPeriodo VALUES(LogPerCodigoLogro_in,LogPerNombrePeriodo_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCurso` (`CurCodGrado_in` INT, `CurNombre_in` VARCHAR(10), `CurCupo_in` INT)  INSERT INTO TblCurso (CurCodGrado,CurNombre,CurCupo) VALUES (CurCodGrado_in,CurNombre_in,CurCupo_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDia` (`DiaNombre_in` VARCHAR(50))  INSERT INTO TblDia (DiaNombre) VALUES (DiaNombre_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertGrado` (`GraNombre_in` VARCHAR(30))  INSERT INTO TblGrado (GraNombre) VALUES (GraNombre_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHora` (`HorDescripcion_in` VARCHAR(50))  INSERT INTO TblHora (HorDescripcion)VALUES (HorDescripcion_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHorario` (`CM_CurNombre_in` INT, `CM_MatCodigo_in` INT, `CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT)  INSERT INTO TblCurso_TblMateria VALUES (CM_CurNombre_in,CM_MatCodigo_in,CM_DiaCodigo_in,CM_HorCodigo_in,0)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHorarioP` (`CM_CurNombre_in` INT, `CM_MatCodigo_in` INT, `CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11))  INSERT INTO TblCurso_TblMateria VALUES (CM_CurNombre_in,CM_MatCodigo_in,CM_DiaCodigo_in,CM_HorCodigo_in,CM_DocProfesor_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertMateria` (`MatNombre_in` VARCHAR(50), `MatGrado_in` INT)  INSERT INTO TblMateria (MatNombre,MatGrado) VALUES(MatNombre_in,MatGrado_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertMatricula` (`MatrCurso_in` INT)  INSERT INTO TblMatricula (MatrFecha,MatrCurso) VALUES (now(),MatrCurso_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRol` (`RolTipo_in` VARCHAR(50))  INSERT INTO TblRol(RolTipo)VALUES (RolTipo_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUsuario` (`UsuNombre_in` VARCHAR(50), `UsuClave_in` LONGBLOB, `PerTipoDocumento_in` VARCHAR(30), `PerDocumento_in` VARCHAR(11), `PerNombre_in` VARCHAR(50), `PerApellido_in` VARCHAR(50), `PerRh_in` CHAR(2), `PerFechaNacimiento_in` DATE, `URolId_in` INT)  BEGIN 
INSERT INTO TblUsuario (UsuNombre,UsuClave,UsuEstado,UsuFoto) VALUES (UsuNombre_in,hex(aes_encrypt(UsuClave_in,UsuNombre)),"activo","default.png");
SET @codUsu=(SELECT UsuCodigo FROM TblUsuario WHERE UsuNombre=UsuNombre_in);
INSERT INTO TblPersona VALUES(@codUsu,PerTipoDocumento_in,PerDocumento_in,PerNombre_in,PerApellido_in,PerRh_in,PerFechaNacimiento_in);
INSERT INTO TblUsuario_TblRol VALUES(URolId_in,@codUsu);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_anuncion` (`AnuNombre_in` VARCHAR(50), `AnuDescripcion_in` TEXT, `AnuFecha_in` DATE, `AnuCurso_in` VARCHAR(10))  INSERT INTO TblAnuncio(AnuNombre,AnuDescripcion,AnuFecha,AnuCurso) VALUES (AnuNombre_in,AnuDescripcion_in,AnuFecha_in,AnuCurso_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_comentario` (`ComComentario_in` TEXT, `ComTipo_in` VARCHAR(50), `ComPersona_in` VARCHAR(50))  INSERT INTO TblComentario (ComFecha,ComComentario,ComTipo,ComPersona)VALUES (NOW(),ComComentario_in,ComTipo_in,ComPersona_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_logros` (`LogMateria_in` INT, `LogDescripcion_in` TEXT)  INSERT INTO TblLogros (LogMateria,LogDescripcion) VALUES (LogMateria_in,LogDescripcion_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LiberarHora` (`CM_CurNombre_in` VARCHAR(10), `CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT)  BEGIN
DELETE FROM TblCurso_TblMateria WHERE CM_CurNombre=CM_CurNombre_in AND CM_DiaCodigo=CM_DiaCodigo_in AND CM_HorCodigo=CM_HorCodigo_in;
INSERT INTO TblCurso_TblMateria VALUES (CM_CurNombre_in,1,CM_DiaCodigo_in,CM_HorCodigo_in,0);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logros_alumno` (`CalCodigoUsuario_in` INT, `LogMateria_in` INT, `LogPerNombrePeriodo_in` VARCHAR(50))  SELECT*FROM TblCalificacion INNER JOIN TblLogros ON LogCodigo=CalCodigoLogro INNER JOIN TblLogrosPeriodo ON  CalCodigoLogro=LogPerCodigoLogro WHERE CalCodigoUsuario=CalCodigoUsuario_in AND LogMateria=LogMateria_in AND LogPerNombrePeriodo=LogPerNombrePeriodo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logros_asignados` (`LogMateria_in` INT)  SELECT*FROM TblLogros INNER JOIN TblMateria ON MatCodigo=LogMateria WHERE  LogMateria=LogMateria_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logros_no_asignados` (`LogMateria_in` INT)  SELECT*FROM TblLogros INNER JOIN TblMateria ON MatCodigo=LogMateria WHERE LogCodigo NOT IN(SELECT LogPerCodigoLogro FROM TblLogros inner join TblLogrosPeriodo on LogCodigo=LogPerCodigoLogro) AND LogMateria=LogMateria_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logros_periodo` (`LogPerNombrePeriodo_in` VARCHAR(50), `LogMateria_in` INT)  SELECT * FROM TblLogros inner join TblLogrosPeriodo on LogCodigo=LogPerCodigoLogro WHERE LogPerNombrePeriodo=LogPerNombrePeriodo_in AND LogMateria=LogMateria_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logueo_usuario` (`UsuNombre_in` VARCHAR(50), `UsuClave_in` LONGBLOB)  SELECT UsuNombre,(aes_decrypt(unhex(UsuClave),UsuNombre_in)) as clave,UsuEstado,PerUsuario,PerTipoDocumento,PerDocumento,PerNombre,PerApellido,PerRh,PerFechaNacimiento,RolTipo,UsuFoto FROM TblUsuario inner join TblPersona on UsuCodigo=PerUsuario inner join TblUsuario_TblRol on URUsuCodigo=PerUsuario inner join TblRol on RolId=URolId where UsuNombre=UsuNombre_in and UsuClave_in=aes_decrypt(unhex(UsuClave),UsuNombre_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `materiaxgrado` (`GraCodigo_in` INT)  SELECT MatCodigo,MatNombre,GraCodigo,GraNombre  FROM TblMateria INNER JOIN TblGrado ON MatGrado=GraCodigo  WHERE  GraCodigo=GraCodigo_in ORDER BY MatGrado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `materia_default` ()  SELECT MatCodigo FROM TblMateria WHERE MatNombre="LIBRE"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mensajes` (IN `Cursomensaje` VARCHAR(10))  select * from Tblanuncio where AnuCurso=Cursomensaje$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificar_calificacion` (`CalEstado_in` VARCHAR(50), `CalCodigoUsuario_in` INT, `CalCodigoLogro_in` INT)  UPDATE TblCalificacion SET CalEstado=CalEstado_in WHERE CalCodigoUsuario=CalCodigoUsuario_in AND CalCodigoLogro=CalCodigoLogro_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `modificar_matriculacion` (`PerMatrPerDocumento_in` VARCHAR(11), `PerMatrMatrCodigo_in` INT)  BEGIN
DELETE FROM TblMatricula_TblPersona WHERE PerMatrPerDocumento=PerMatrPerDocumento_in;
INSERT INTO TblMatricula_TblPersona VALUES(PerMatrPerDocumento_in,PerMatrMatrCodigo_in);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_comentarios` ()  SELECT*FROM TblComentario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_matriculas` ()  SELECT MatrCodigo,MatrFecha,CurCodGrado,MatrCurso,GraNombre,CurCupo FROM TblMatricula  INNER JOIN TblCurso ON CurNombre=MatrCurso INNER JOIN TblGrado ON CurCodGrado=GraCodigo  WHERE CurCodGrado!=7 AND CurCupo!=0 ORDER BY CurCodGrado DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_pqr` ()  select PqrId,PqrAsunto,PqrDescripcion,PqrUsuario,PqrAdmi,PqrTipo,PqrFechaEnviado,
PqrRespuesta,PqrFechaRespuesta,PqrEstado,PqrLeido,PerDocumento,PerNombre,PerApellido from TblPqr inner join  TblUsuario on PqrUsuario=UsuCodigo
inner join TblPersona on UsuCodigo=PerUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nombre_materia` (`MatCodigo_in` INT)  SELECT MatNombre FROM TblMateria WHERE MatCodigo=MatCodigo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `profesor_materias` (`CM_DocProfesor_in` VARCHAR(11))  SELECT DISTINCT CM_MatCodigo,MatNombre,GraNombre FROM TblCurso_TblMateria INNER JOIN TblMateria ON CM_MatCodigo=MatCodigo INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblGrado ON CurCodGrado=GraCodigo WHERE CM_DocProfesor=CM_DocProfesor_in AND MatNombre!="LIBRE" ORDER BY GraCodigo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba` ()  SELECT  CurNombre,MatNombre,DiaNombre,HorDescripcion,CM_DiaCodigo,CM_HorCodigo,CM_MatCodigo,CurCodGrado,CM_DocProfesor FROM TblCurso_TblMateria INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblMateria ON MatCodigo=CM_MatCodigo INNER JOIN TblDia ON CM_DiaCodigo=DiaCodigo INNER JOIN  TblHora ON CM_HorCodigo=HorCodigo WHERE  CM_DiaCodigo=1 and CM_DocProfesor=9904  ORDER BY DiaCodigo,HorCodigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readHorario` (`CurNombre_in` VARCHAR(10), `CM_DiaCodigo_in` INT)  SELECT  CurNombre,MatNombre,DiaNombre,HorDescripcion,CM_DiaCodigo,CM_HorCodigo,CM_MatCodigo,CurCodGrado,CM_DocProfesor FROM TblCurso_TblMateria INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblMateria ON MatCodigo=CM_MatCodigo INNER JOIN TblDia ON CM_DiaCodigo=DiaCodigo INNER JOIN  TblHora ON CM_HorCodigo=HorCodigo WHERE CurNombre=CurNombre_in AND CM_DiaCodigo=CM_DiaCodigo_in ORDER BY DiaCodigo,HorCodigo,CurCodGrado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recuperar_hora` (`CM_DiaCodigo_in` INT, `CM_HoraCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11))  INSERT INTO Tblcurso_Tblmateria VALUES(0,1,CM_DiaCodigo_in,CM_HoraCodigo_in,CM_DocProfesor_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_matriculacion` (`PerMatrPerDocumento_in` VARCHAR(11), `PerMatrMatrCodigo_in` INT)  INSERT INTO TblMatricula_TblPersona VALUES(PerMatrPerDocumento_in,PerMatrMatrCodigo_in)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `restaurar_horas` (`CM_DocProfesor_in` VARCHAR(11), `CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT)  select*From tblcurso_tblmateria where CM_DocProfesor=CM_DocProfesor_in and CM_DiaCodigo=CM_DiaCodigo_in and CM_HorCodigo=CM_HorCodigo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario` (`CM_CurNombre_in` INT, `CM_MatCodigo_in` INT, `CM_DiaCodigo_in` INT, `CM_HorCodigo_in` INT, `CM_DocProfesor_in` VARCHAR(11))  UPDATE TblCurso_TblMateria SET CM_MatCodigo=CM_MatCodigo_in,CM_DocProfesor=CM_DocProfesor_in WHERE CM_CurNombre=CM_CurNombre_in AND CM_DiaCodigo=CM_DiaCodigo_in AND CM_HorCodigo=CM_HorCodigo_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePQR` (`PqrId_in` INT, `PqrAdmi_in` VARCHAR(100), `PqrRespuesta_in` TEXT)  UPDATE TblPqr SET PqrAdmi=PqrAdmi_in,PqrRespuesta=PqrRespuesta_in,PqrFechaRespuesta=curdate(),PqrEstado="Resuelto",PqrLeido="Si" WHERE  PqrId=PqrId_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_datos` (`PerUsuario_in` INT, `PerNombre_in` VARCHAR(50), `PerApellido_in` VARCHAR(50), `PerFechaNacimiento_in` DATE, `UsuFoto_in` VARCHAR(255))  BEGIN
UPDATE TblPersona SET PerNombre=PerNombre_in,PerApellido=PerApellido_in,PerFechaNacimiento=PerFechaNacimiento_in WHERE PerUsuario=PerUsuario_in;
UPDATE TblUsuario SET UsuFoto=UsuFoto_in WHERE UsuCodigo=PerUsuario_in;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verHorarioP` (`CM_DocProfesor_in` VARCHAR(11), `CM_DiaCodigo_in` INT)  SELECT  CurNombre,MatNombre,DiaNombre,HorDescripcion,CM_DiaCodigo,CM_HorCodigo,CM_MatCodigo,CurCodGrado,CM_DocProfesor FROM TblCurso_TblMateria INNER JOIN TblCurso ON CM_CurNombre=CurNombre INNER JOIN TblMateria ON MatCodigo=CM_MatCodigo INNER JOIN TblDia ON CM_DiaCodigo=DiaCodigo INNER JOIN  TblHora ON CM_HorCodigo=HorCodigo WHERE  CM_DiaCodigo=CM_DiaCodigo_in and CM_DocProfesor=CM_DocProfesor_in ORDER BY HorCodigo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_cupo` (`MatrCodigo_in` INT)  BEGIN
SET @curso=(SELECT MatrCurso FROM TblMatricula WHERE MatrCodigo=MatrCodigo_in);
SELECT CurCupo FROM TblCurso WHERE CurNombre=@curso;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_inscripcion` (`PerMatrPerDocumento_in` VARCHAR(11))  SELECT CurNombre FROM TblCurso INNER JOIN TblMatricula ON MatrCurso=CurNombre INNER JOIN TblMatricula_TblPersona ON PerMatrMatrCodigo=MatrCodigo WHERE PerMatrPerDocumento=PerMatrPerDocumento_in$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificar_matricula` (`MatrCurso_in` VARCHAR(10))  SELECT * FROM TblMatricula WHERE MatrCurso=MatrCurso_in$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblanuncio`
--

CREATE TABLE `TblAnuncio` (
  `AnuCodigo` int(11) NOT NULL,
  `AnuNombre` varchar(50) DEFAULT NULL,
  `AnuDescripcion` text DEFAULT NULL,
  `AnuFecha` date DEFAULT NULL,
  `AnuCurso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblauditar_tblmatricula`
--

CREATE TABLE `TblAuditar_TblMatricula` (
  `AMatrCodigo` int(11) NOT NULL,
  `AMatrDocumento` varchar(11) DEFAULT NULL,
  `AMatrCurso` varchar(10) DEFAULT NULL,
  `AMatrGradoNombre` varchar(50) DEFAULT NULL,
  `AMatrFecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblauditar_tblmatricula`
--

INSERT INTO `TblAuditar_TblMatricula` (`AMatrCodigo`, `AMatrDocumento`, `AMatrCurso`, `AMatrGradoNombre`, `AMatrFecha`) VALUES
(1, '1233', '1001', 'DECIMO', '2019-12-12 00:48:40'),
(2, '1233', '1002', 'DECIMO', '2019-12-12 09:14:51'),
(3, '1233', '1002', 'DECIMO', '2019-12-12 09:15:54'),
(4, '1233', '1003', 'DECIMO', '2019-12-12 09:23:40'),
(5, '1233', '1002', 'DECIMO', '2019-12-12 09:37:24'),
(6, '1233', '1003', 'DECIMO', '2019-12-12 09:37:55'),
(7, '1233', '1003', 'DECIMO', '2019-12-12 09:38:34'),
(8, '1233', '1003', 'DECIMO', '2019-12-12 09:39:04'),
(9, '1233', '1001', 'DECIMO', '2020-02-03 08:28:41'),
(10, '1233', '999', 'NOVENO', '2020-02-03 12:40:01'),
(11, '1233', '608', 'SEXTO', '2020-02-03 23:41:39'),
(12, '1233', '1010', 'DECIMO', '2020-02-09 02:26:45'),
(13, '1233', '1010', 'DECIMO', '2020-02-18 09:13:32'),
(14, '1233', '1109', 'ONCE', '2020-02-19 00:10:04'),
(15, '1233', '1003', 'DECIMO', '2020-02-19 01:16:42'),
(16, '1233', '1109', 'ONCE', '2020-02-19 01:18:26'),
(17, '1233', '999', 'NOVENO', '2020-02-19 01:19:03'),
(18, '1233', '999', 'NOVENO', '2020-02-19 01:19:16'),
(19, '1233', '1010', 'DECIMO', '2020-02-19 01:21:07'),
(20, '1233', '1003', 'DECIMO', '2020-02-19 01:21:30'),
(21, '9901', '1101', 'ONCE', '2020-02-23 11:21:11'),
(22, '1233', '1102', 'ONCE', '2020-02-23 12:30:48'),
(23, '1233', '1102', 'ONCE', '2020-02-23 12:31:40'),
(24, '1233', '1101', 'ONCE', '2020-02-23 12:32:13'),
(25, '1233', '1101', 'ONCE', '2020-02-23 12:32:40'),
(26, '1233', '1101', 'ONCE', '2020-02-23 12:46:13'),
(27, '9901', '1102', 'ONCE', '2020-02-23 12:46:13'),
(28, '9901', '1001', 'DECIMO', '2020-02-24 20:35:03'),
(29, '9902', '1002', 'DECIMO', '2020-02-24 20:35:17'),
(30, '9901', '1001', 'DECIMO', '2020-02-26 20:50:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcalificacion`
--

CREATE TABLE `TblCalificacion` (
  `CalCodigoUsuario` int(11) NOT NULL,
  `CalCodigoLogro` int(11) NOT NULL,
  `CalEstado` enum('NO CALIFICADO','APROBADO','NO APROBADO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcalificacion`
--

INSERT INTO `TblCalificacion` (`CalCodigoUsuario`, `CalCodigoLogro`, `CalEstado`) VALUES
(3, 19, 'APROBADO'),
(3, 20, 'NO CALIFICADO'),
(3, 21, 'NO CALIFICADO'),
(3, 22, 'APROBADO'),
(3, 23, 'NO CALIFICADO'),
(3, 24, 'NO CALIFICADO'),
(3, 25, 'NO APROBADO'),
(3, 26, 'NO CALIFICADO'),
(3, 30, 'APROBADO'),
(10, 19, 'APROBADO'),
(10, 20, 'NO CALIFICADO'),
(10, 21, 'NO CALIFICADO'),
(10, 22, 'NO CALIFICADO'),
(10, 23, 'NO APROBADO'),
(10, 24, 'APROBADO'),
(10, 25, 'NO APROBADO'),
(10, 26, 'NO CALIFICADO'),
(10, 27, 'APROBADO'),
(11, 19, 'NO CALIFICADO'),
(11, 20, 'NO CALIFICADO'),
(11, 21, 'NO CALIFICADO'),
(11, 22, 'NO CALIFICADO'),
(11, 23, 'NO CALIFICADO'),
(11, 24, 'NO CALIFICADO'),
(11, 25, 'APROBADO'),
(11, 26, 'NO CALIFICADO'),
(11, 30, 'NO CALIFICADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomentario`
--

CREATE TABLE `TblComentario` (
  `ComId` int(11) NOT NULL,
  `ComFecha` datetime DEFAULT NULL,
  `ComComentario` text DEFAULT NULL,
  `ComTipo` varchar(50) DEFAULT NULL,
  `ComPersona` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcomentario`
--

INSERT INTO `TblComentario` (`ComId`, `ComFecha`, `ComComentario`, `ComTipo`, `ComPersona`) VALUES
(1, '2019-12-08 23:53:24', 'aqyu', ':V', NULL),
(2, '2019-12-08 23:58:33', 'aqyu', ':V', NULL),
(3, '2019-12-08 23:58:47', 'aqyu', ':V', NULL),
(4, '2019-12-09 00:00:34', 'aqyu', ':V', NULL),
(5, '2019-12-09 00:15:00', 'Second Beta', 'Hola', '0'),
(6, '2019-12-09 00:15:55', ':V', 'Holaa', 'Yonathan Alexis Montilla Combita'),
(7, '2019-12-09 00:16:29', ':V', 'Holaa', 'Yonathan Alexis Montilla Combita'),
(8, '2020-02-03 23:44:09', 'Prueba de registro men :v', 'SIN DORMIR', ' '),
(9, '2020-02-03 23:45:01', 'ALFIN :\'V', 'SEE', 'Yonathan Alexiis Montilla'),
(10, '2020-02-03 23:50:51', 'seeee', 'final a dormir', 'Yonathan Montilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcurso`
--

CREATE TABLE `TblCurso` (
  `CurCodGrado` int(11) DEFAULT NULL,
  `CurNombre` varchar(10) NOT NULL,
  `CurCupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcurso`
--

INSERT INTO `TblCurso` (`CurCodGrado`, `CurNombre`, `CurCupo`) VALUES
(7, '0', 0),
(NULL, '1', 1),
(5, '1001', 48),
(5, '1002', 49),
(5, '1003', 10),
(5, '1009', 30),
(NULL, '123', 21),
(4, '901', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcurso_tblmateria`
--

CREATE TABLE `TblCurso_TblMateria` (
  `CM_CurNombre` varchar(10) NOT NULL,
  `CM_MatCodigo` int(11) DEFAULT NULL,
  `CM_DiaCodigo` int(11) NOT NULL,
  `CM_HorCodigo` int(11) NOT NULL,
  `CM_DocProfesor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcurso_tblmateria`
--

INSERT INTO `TblCurso_TblMateria` (`CM_CurNombre`, `CM_MatCodigo`, `CM_DiaCodigo`, `CM_HorCodigo`, `CM_DocProfesor`) VALUES
('0', 1, 1, 1, '321'),
('0', 1, 1, 1, '9904'),
('0', 1, 1, 2, '321'),
('0', 1, 1, 2, '7777'),
('0', 1, 1, 2, '9904'),
('0', 1, 1, 3, '321'),
('0', 1, 1, 3, '7777'),
('0', 1, 1, 3, '9904'),
('0', 1, 1, 3, '9921'),
('0', 1, 1, 4, '321'),
('0', 1, 1, 4, '7777'),
('0', 1, 1, 4, '9904'),
('0', 1, 1, 5, '321'),
('0', 1, 1, 5, '7777'),
('0', 1, 2, 1, '321'),
('0', 1, 2, 1, '9904'),
('0', 1, 2, 2, '9904'),
('0', 1, 2, 2, '9921'),
('0', 1, 2, 3, '321'),
('0', 1, 2, 3, '7777'),
('0', 1, 2, 3, '9904'),
('0', 1, 2, 4, '321'),
('0', 1, 2, 4, '9904'),
('0', 1, 2, 4, '9921'),
('0', 1, 2, 5, '321'),
('0', 1, 2, 5, '7777'),
('0', 1, 2, 5, '9904'),
('0', 1, 2, 5, '9921'),
('0', 1, 3, 1, '321'),
('0', 1, 3, 1, '9904'),
('0', 1, 3, 2, '321'),
('0', 1, 3, 2, '7777'),
('0', 1, 3, 2, '9904'),
('0', 1, 3, 2, '9921'),
('0', 1, 3, 3, '321'),
('0', 1, 3, 3, '9904'),
('0', 1, 3, 3, '9921'),
('0', 1, 3, 4, '321'),
('0', 1, 3, 4, '9904'),
('0', 1, 3, 4, '9921'),
('0', 1, 3, 5, '321'),
('0', 1, 3, 5, '7777'),
('0', 1, 3, 5, '9904'),
('0', 1, 3, 5, '9921'),
('0', 1, 4, 1, '321'),
('0', 1, 4, 1, '7777'),
('0', 1, 4, 1, '9904'),
('0', 1, 4, 1, '9921'),
('0', 1, 4, 2, '321'),
('0', 1, 4, 2, '9904'),
('0', 1, 4, 2, '9921'),
('0', 1, 4, 3, '321'),
('0', 1, 4, 3, '7777'),
('0', 1, 4, 3, '9904'),
('0', 1, 4, 3, '9921'),
('0', 1, 4, 4, '321'),
('0', 1, 4, 4, '9904'),
('0', 1, 4, 4, '9921'),
('0', 1, 4, 5, '321'),
('0', 1, 4, 5, '9904'),
('0', 1, 4, 5, '9921'),
('0', 1, 5, 1, '321'),
('0', 1, 5, 1, '9904'),
('0', 1, 5, 1, '9921'),
('0', 1, 5, 2, '321'),
('0', 1, 5, 2, '9904'),
('0', 1, 5, 2, '9921'),
('0', 1, 5, 3, '321'),
('0', 1, 5, 3, '7777'),
('0', 1, 5, 3, '9904'),
('0', 1, 5, 3, '9921'),
('0', 1, 5, 4, '321'),
('0', 1, 5, 4, '7777'),
('0', 1, 5, 4, '9904'),
('0', 1, 5, 4, '9921'),
('0', 1, 5, 5, '321'),
('0', 1, 5, 5, '7777'),
('0', 1, 5, 5, '9904'),
('0', 1, 5, 5, '9921'),
('1', 1, 1, 2, '0'),
('1', 1, 1, 3, '0'),
('1', 1, 1, 4, '0'),
('1', 1, 1, 5, '0'),
('1', 1, 2, 1, '0'),
('1', 1, 2, 2, '0'),
('1', 1, 2, 3, '0'),
('1', 1, 2, 4, '0'),
('1', 1, 2, 5, '0'),
('1', 1, 3, 1, '0'),
('1', 1, 3, 2, '0'),
('1', 1, 3, 3, '0'),
('1', 1, 3, 4, '0'),
('1', 1, 3, 5, '0'),
('1', 1, 4, 1, '0'),
('1', 1, 4, 2, '0'),
('1', 1, 4, 3, '0'),
('1', 1, 4, 4, '0'),
('1', 1, 4, 5, '0'),
('1', 1, 5, 1, '0'),
('1', 1, 5, 2, '0'),
('1', 1, 5, 3, '0'),
('1', 1, 5, 4, '0'),
('1', 1, 5, 5, '0'),
('1001', 1, 1, 2, '0'),
('1001', 1, 1, 3, '0'),
('1001', 1, 1, 4, '0'),
('1001', 1, 1, 5, '0'),
('1001', 1, 2, 3, '0'),
('1001', 1, 2, 5, '0'),
('1001', 1, 3, 1, '0'),
('1001', 1, 3, 2, '0'),
('1001', 1, 3, 3, '0'),
('1001', 1, 3, 5, '0'),
('1001', 1, 4, 1, '0'),
('1001', 1, 4, 2, '0'),
('1001', 1, 4, 3, '0'),
('1001', 1, 5, 1, '0'),
('1001', 1, 5, 3, '0'),
('1001', 1, 5, 4, '0'),
('1001', 1, 5, 5, '0'),
('1002', 1, 1, 1, '0'),
('1002', 1, 1, 2, '0'),
('1002', 1, 1, 3, '0'),
('1002', 1, 1, 4, '0'),
('1002', 1, 1, 5, '0'),
('1002', 1, 2, 3, '0'),
('1002', 1, 2, 4, '0'),
('1002', 1, 2, 5, '0'),
('1002', 1, 3, 2, '0'),
('1002', 1, 3, 4, '0'),
('1002', 1, 3, 5, '0'),
('1002', 1, 4, 1, '0'),
('1002', 1, 4, 3, '0'),
('1002', 1, 4, 4, '0'),
('1002', 1, 4, 5, '0'),
('1002', 1, 5, 2, '0'),
('1002', 1, 5, 3, '0'),
('1002', 1, 5, 4, '0'),
('1002', 1, 5, 5, '0'),
('1003', 1, 1, 1, '0'),
('1003', 1, 1, 2, '0'),
('1003', 1, 1, 3, '0'),
('1003', 1, 1, 4, '0'),
('1003', 1, 1, 5, '0'),
('1003', 1, 2, 1, '0'),
('1003', 1, 2, 2, '0'),
('1003', 1, 2, 3, '0'),
('1003', 1, 2, 4, '0'),
('1003', 1, 2, 5, '0'),
('1003', 1, 3, 1, '0'),
('1003', 1, 3, 2, '0'),
('1003', 1, 3, 3, '0'),
('1003', 1, 3, 4, '0'),
('1003', 1, 3, 5, '0'),
('1003', 1, 4, 1, '0'),
('1003', 1, 4, 2, '0'),
('1003', 1, 4, 3, '0'),
('1003', 1, 4, 4, '0'),
('1003', 1, 4, 5, '0'),
('1003', 1, 5, 1, '0'),
('1003', 1, 5, 2, '0'),
('1003', 1, 5, 3, '0'),
('1003', 1, 5, 4, '0'),
('1003', 1, 5, 5, '0'),
('1009', 1, 1, 1, '0'),
('1009', 1, 1, 2, '0'),
('1009', 1, 1, 3, '0'),
('1009', 1, 1, 4, '0'),
('1009', 1, 1, 5, '0'),
('1009', 1, 2, 1, '0'),
('1009', 1, 2, 2, '0'),
('1009', 1, 2, 3, '0'),
('1009', 1, 2, 4, '0'),
('1009', 1, 2, 5, '0'),
('1009', 1, 3, 1, '0'),
('1009', 1, 3, 2, '0'),
('1009', 1, 3, 3, '0'),
('1009', 1, 3, 4, '0'),
('1009', 1, 3, 5, '0'),
('1009', 1, 4, 1, '0'),
('1009', 1, 4, 2, '0'),
('1009', 1, 4, 3, '0'),
('1009', 1, 4, 4, '0'),
('1009', 1, 4, 5, '0'),
('1009', 1, 5, 1, '0'),
('1009', 1, 5, 2, '0'),
('1009', 1, 5, 3, '0'),
('1009', 1, 5, 4, '0'),
('1009', 1, 5, 5, '0'),
('123', 1, 1, 1, '0'),
('123', 1, 1, 2, '0'),
('123', 1, 1, 3, '0'),
('123', 1, 1, 4, '0'),
('123', 1, 1, 5, '0'),
('123', 1, 2, 1, '0'),
('123', 1, 2, 2, '0'),
('123', 1, 2, 3, '0'),
('123', 1, 2, 4, '0'),
('123', 1, 2, 5, '0'),
('123', 1, 3, 1, '0'),
('123', 1, 3, 2, '0'),
('123', 1, 3, 3, '0'),
('123', 1, 3, 4, '0'),
('123', 1, 3, 5, '0'),
('123', 1, 4, 1, '0'),
('123', 1, 4, 2, '0'),
('123', 1, 4, 3, '0'),
('123', 1, 4, 4, '0'),
('123', 1, 4, 5, '0'),
('123', 1, 5, 1, '0'),
('123', 1, 5, 2, '0'),
('123', 1, 5, 3, '0'),
('123', 1, 5, 4, '0'),
('123', 1, 5, 5, '0'),
('901', 1, 1, 1, '0'),
('901', 1, 1, 2, '0'),
('901', 1, 1, 3, '0'),
('901', 1, 1, 4, '0'),
('901', 1, 1, 5, '0'),
('901', 1, 2, 1, '0'),
('901', 1, 2, 2, '0'),
('901', 1, 2, 3, '0'),
('901', 1, 2, 4, '0'),
('901', 1, 2, 5, '0'),
('901', 1, 3, 1, '0'),
('901', 1, 3, 2, '0'),
('901', 1, 3, 3, '0'),
('901', 1, 3, 4, '0'),
('901', 1, 3, 5, '0'),
('901', 1, 4, 1, '0'),
('901', 1, 4, 2, '0'),
('901', 1, 4, 3, '0'),
('901', 1, 4, 4, '0'),
('901', 1, 4, 5, '0'),
('901', 1, 5, 1, '0'),
('901', 1, 5, 2, '0'),
('901', 1, 5, 3, '0'),
('901', 1, 5, 4, '0'),
('901', 1, 5, 5, '0'),
('1001', 31, 1, 1, '7777'),
('1001', 31, 2, 1, '7777'),
('1001', 31, 3, 4, '7777'),
('1001', 31, 4, 4, '7777'),
('1001', 31, 5, 2, '7777'),
('1002', 31, 2, 1, '9921'),
('1002', 31, 3, 1, '7777'),
('1002', 31, 3, 3, '7777'),
('1002', 31, 5, 1, '7777'),
('1001', 32, 2, 2, '7777'),
('1001', 32, 2, 4, '7777'),
('1001', 32, 4, 5, '7777'),
('1002', 32, 2, 2, '321'),
('1002', 33, 4, 2, '7777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldatoscontacto`
--

CREATE TABLE `TblDatosContacto` (
  `DatConDocumento` varchar(11) NOT NULL,
  `DatConDireccion` varchar(50) DEFAULT NULL,
  `DatConTelefono` varchar(20) DEFAULT NULL,
  `DatConCorreo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldia`
--

CREATE TABLE `TblDia` (
  `DiaCodigo` int(11) NOT NULL,
  `DiaNombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbldia`
--

INSERT INTO `TblDia` (`DiaCodigo`, `DiaNombre`) VALUES
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIERCOLES'),
(4, 'JUEVES'),
(5, 'VIERNES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgrado`
--

CREATE TABLE `TblGrado` (
  `GraCodigo` int(11) NOT NULL,
  `GraNombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblgrado`
--

INSERT INTO `TblGrado` (`GraCodigo`, `GraNombre`) VALUES
(5, 'DECIMO'),
(7, 'DEFAULT'),
(4, 'NOVENO'),
(3, 'OCTAVO'),
(6, 'ONCE'),
(2, 'SEPTIMO'),
(1, 'SEXTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhora`
--

CREATE TABLE `TblHora` (
  `HorCodigo` int(11) NOT NULL,
  `HorDescripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblhora`
--

INSERT INTO `TblHora` (`HorCodigo`, `HorDescripcion`) VALUES
(1, '7am a 8am'),
(2, '8am a 9am'),
(3, '9am a 10am'),
(4, '10am a 11am'),
(5, '11am a 12am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllogros`
--

CREATE TABLE `TblLogros` (
  `LogCodigo` int(11) NOT NULL,
  `LogMateria` int(11) DEFAULT NULL,
  `LogDescripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbllogros`
--

INSERT INTO `TblLogros` (`LogCodigo`, `LogMateria`, `LogDescripcion`) VALUES
(17, 29, 'Aprender y utilizar las TIC'),
(18, 29, 'APRENDER GUIA BASICA USO LINUX'),
(19, 31, 'APRENDER C#'),
(20, 31, 'APRENDER SQL'),
(21, 31, 'APRENDER HTML'),
(22, 31, 'APRENDER C++'),
(23, 31, 'APRENDER JAVASCRIPT'),
(24, 31, 'APRENDER JAVA'),
(25, 31, 'APRENDER IA'),
(26, 31, 'APRENDER ANDROID STUDIO'),
(27, 33, 'puch'),
(28, 31, 'APRENDER AJAX'),
(29, 31, 'APRENDER KALI LINUX'),
(30, 31, 'APRENDER KALI LINUX'),
(31, 31, 'As'),
(32, 34, 'LEER 100 CAPS'),
(33, 34, 'LEER 100 CAPS'),
(34, 34, 'asd'),
(35, 34, 'LEER 100 CAPS'),
(36, 31, 'asd'),
(37, 31, 'asd'),
(38, 31, 'asdf'),
(39, 31, 'asdf'),
(40, 31, 'asd'),
(41, 31, 'asds'),
(42, 31, 'asdsdf'),
(43, 33, 'd'),
(44, 33, 'd'),
(45, 31, 'asd'),
(46, 31, 'asd'),
(47, 31, ''),
(48, 31, ''),
(49, 32, 'asds'),
(50, 31, 'aas'),
(51, 31, 'asd'),
(52, 37, 'asd'),
(53, 37, 'asd'),
(54, 31, 'asdf'),
(55, 30, 'ASDSFGW'),
(56, 34, 'x'),
(57, 38, 'FGH'),
(58, 38, 'to be'),
(59, 38, 'to be'),
(60, 38, 'TOBE'),
(61, 38, 'TOBE'),
(62, 38, 'tobe'),
(63, 38, 'asd'),
(64, 38, 'asd'),
(65, 38, 'asd'),
(66, 38, 'sadsfd'),
(67, 38, 'sadsfd'),
(68, 38, 'sadsfd'),
(69, 38, 'sad'),
(70, 38, 'sad'),
(71, 38, 'adsd'),
(72, 38, 'adsd'),
(73, 38, 'asdf'),
(74, 38, 'ads'),
(75, 38, 'sadsfd'),
(76, 38, 'sadsfd'),
(77, 38, 'sadsfd'),
(78, 38, 'sadsfd'),
(79, 38, 'ads'),
(80, 38, 'ads'),
(81, 38, 'assd'),
(82, 38, 'assd'),
(83, 38, 'assd'),
(84, 38, 'assd'),
(85, 38, 'asd'),
(86, 38, 'asd'),
(87, 38, 'asd'),
(88, 38, 'adsdf'),
(89, 38, 'adsdf'),
(90, 38, 'asd'),
(91, 38, 'ADSFD'),
(92, 38, 'ADSFD'),
(93, 38, 'asd'),
(94, 38, ''),
(95, 37, 'assd'),
(96, 37, 'assd'),
(97, 37, 'sdfg'),
(98, 37, 'sdfg'),
(99, 37, 'assd'),
(100, 37, 'assd'),
(101, 37, 'asd'),
(102, 37, 'asd'),
(103, 37, 'asd'),
(104, 37, 'asd'),
(105, 37, 'asd'),
(106, 37, 'as'),
(107, 37, 'as'),
(108, 37, 'sad'),
(109, 37, 'uuu'),
(110, 37, 'uuu'),
(111, 37, 'as'),
(112, 37, 'as'),
(113, 37, 'asd'),
(114, 37, 'asd'),
(115, 37, 'as'),
(116, 37, 'as'),
(117, 37, 'as'),
(118, 37, 'as'),
(119, 37, 'as'),
(120, 37, 'alfin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllogrosperiodo`
--

CREATE TABLE `TblLogrosPeriodo` (
  `LogPerCodigoLogro` int(11) NOT NULL,
  `LogPerNombrePeriodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbllogrosperiodo`
--

INSERT INTO `TblLogrosPeriodo` (`LogPerCodigoLogro`, `LogPerNombrePeriodo`) VALUES
(17, 'II PERIODO'),
(18, 'III PERIODO'),
(19, 'I PERIODO'),
(22, 'I PERIODO'),
(25, 'I PERIODO'),
(26, 'I PERIODO'),
(27, 'III PERIODO'),
(30, 'IV PERIODO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmateria`
--

CREATE TABLE `TblMateria` (
  `MatCodigo` int(11) NOT NULL,
  `MatNombre` varchar(50) DEFAULT NULL,
  `MatGrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmateria`
--

INSERT INTO `TblMateria` (`MatCodigo`, `MatNombre`, `MatGrado`) VALUES
(1, 'LIBRE', NULL),
(29, 'TECNOLOGIA', 6),
(30, 'SOCIALES', 6),
(31, 'TECNOLOGIA', 5),
(32, 'INGLES', 5),
(33, 'p', 5),
(34, 'CASTELLANO', 5),
(35, 'FISICA', 5),
(36, 'J', 6),
(37, 'CASTELLANO', 1),
(38, 'INGLES', 1),
(39, 'CIENCIAS', 6),
(40, 'as', 6),
(41, 'TECNOLOGIA II', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmatricula`
--

CREATE TABLE `TblMatricula` (
  `MatrCodigo` int(11) NOT NULL,
  `MatrFecha` date DEFAULT NULL,
  `MatrCurso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmatricula`
--

INSERT INTO `TblMatricula` (`MatrCodigo`, `MatrFecha`, `MatrCurso`) VALUES
(8, '2020-02-03', '0'),
(15, '2020-02-24', '1001'),
(16, '2020-02-24', '1002'),
(17, '2020-02-27', '1'),
(18, '2020-03-04', '123'),
(19, '2020-03-04', '901'),
(20, '2020-03-05', '1003'),
(21, '2020-03-09', '1009');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmatricula_tblpersona`
--

CREATE TABLE `TblMatricula_TblPersona` (
  `PerMatrPerDocumento` varchar(11) NOT NULL,
  `PerMatrMatrCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmatricula_tblpersona`
--

INSERT INTO `TblMatricula_TblPersona` (`PerMatrPerDocumento`, `PerMatrMatrCodigo`) VALUES
('1233', 15),
('9901', 16),
('9902', 15);

--
-- Disparadores `tblmatricula_tblpersona`
--
DELIMITER $$
CREATE TRIGGER `aumentar_cupo` BEFORE DELETE ON `tblmatricula_tblpersona` FOR EACH ROW begin
SET @curso=(SELECT MatrCurso FROM TblMatricula WHERE MatrCodigo=old.PerMatrMatrCodigo);
SET @nomGrado=(SELECT GraNombre FROM TblGrado INNER JOIN TblCurso ON GraCodigo=CurCodGrado WHERE  CurNombre=@curso);
UPDATE TblCurso SET CurCupo=CurCupo+1 WHERE CurNombre=@curso;
INSERT INTO TblAuditar_TblMatricula (AMatrDocumento,AMatrCurso,AMatrGradoNombre,AMatrFecha)VALUES
(old.PerMatrPerDocumento,@curso,@nomGrado,NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `descontar_cupo` BEFORE INSERT ON `tblmatricula_tblpersona` FOR EACH ROW begin
SET @curso=(SELECT MatrCurso FROM TblMatricula WHERE MatrCodigo=new.PerMatrMatrCodigo);
UPDATE TblCurso SET CurCupo=CurCupo-1 WHERE CurNombre=@curso;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblperiodoacademico`
--

CREATE TABLE `TblPeriodoAcademico` (
  `PerAcaNombre` varchar(50) NOT NULL,
  `PerAcaFechaInicio` date NOT NULL,
  `PerAcaFechaFin` date NOT NULL,
  `PerAcaYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblperiodoacademico`
--

INSERT INTO `TblPeriodoAcademico` (`PerAcaNombre`, `PerAcaFechaInicio`, `PerAcaFechaFin`, `PerAcaYear`) VALUES
('I PERIODO', '2020-02-21', '2020-04-02', 2020),
('II PERIODO', '2020-04-02', '2020-05-02', 2020),
('III PERIODO', '2020-05-21', '2020-06-02', 2020),
('IV PERIODO', '2020-06-21', '2020-07-02', 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpersona`
--

CREATE TABLE `TblPersona` (
  `PerUsuario` int(11) DEFAULT NULL,
  `PerTipoDocumento` varchar(30) DEFAULT NULL,
  `PerDocumento` varchar(11) NOT NULL,
  `PerNombre` varchar(50) DEFAULT NULL,
  `PerApellido` varchar(50) DEFAULT NULL,
  `PerRh` char(2) DEFAULT NULL,
  `PerFechaNacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblpersona`
--

INSERT INTO `TblPersona` (`PerUsuario`, `PerTipoDocumento`, `PerDocumento`, `PerNombre`, `PerApellido`, `PerRh`, `PerFechaNacimiento`) VALUES
(1, 'CC', '0', 'DEFAULT', 'DEFAULT', 'O+', '2019-01-01'),
(2, 'CC', '1073526983', 'Yonathan', 'Montilla', 'O+', '1999-04-04'),
(3, 'CC', '1233', 'Gabriel', 'perez', 'O+', '2019-12-11'),
(14, 'CC', '135', 'puchi', 'puchosa', 'O+', '1949-01-01'),
(4, 'CC', '321', 'pedro', 'alvarez', 'O+', '1234-05-04'),
(5, 'CC', '7777', 'Sebastian ', 'Aldana Martinez', 'O+', '1989-02-19'),
(10, 'CC', '9901', 'Esteban', 'Nieto', 'O+', '1949-01-01'),
(11, 'CC', '9902', 'Carlos', 'Castellanos', 'O+', '1949-01-01'),
(12, 'CC', '9903', 'Julian', 'Florez', 'O+', '1949-01-01'),
(9, 'CC', '9904', 'andres', 'benavidez', 'O+', '1949-01-01'),
(13, 'CC', '9910', 'esteban camilo', 'florez', 'O+', '2020-02-19'),
(8, 'CC', '9921', 'esteban', 'chavez', 'O+', '1949-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpqr`
--

CREATE TABLE `TblPqr` (
  `PqrId` int(11) NOT NULL,
  `PqrAsunto` varchar(200) NOT NULL,
  `PqrDescripcion` text NOT NULL,
  `PqrUsuario` int(11) DEFAULT NULL,
  `PqrAdmi` varchar(100) DEFAULT NULL,
  `PqrTipo` enum('Peticion','Queja','Reclamo') NOT NULL,
  `PqrFechaEnviado` date NOT NULL,
  `PqrRespuesta` text DEFAULT NULL,
  `PqrFechaRespuesta` date DEFAULT NULL,
  `PqrEstado` enum('En Espera','Resuelto') NOT NULL,
  `PqrLeido` enum('Si','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblpqr`
--

INSERT INTO `TblPqr` (`PqrId`, `PqrAsunto`, `PqrDescripcion`, `PqrUsuario`, `PqrAdmi`, `PqrTipo`, `PqrFechaEnviado`, `PqrRespuesta`, `PqrFechaRespuesta`, `PqrEstado`, `PqrLeido`) VALUES
(1, 'prueba', 'buenas noches', 2, '2', 'Peticion', '2020-02-25', 'ESTA RESUELTO', '2020-02-17', 'Resuelto', 'Si'),
(2, 'prueba2', 'buenas noches', 2, '2', 'Peticion', '2020-02-25', 'Esta es mi respuesta warthex', '2020-02-25', 'Resuelto', 'Si'),
(3, 'soy  profesor', 'hoal s', 5, '2', 'Queja', '2020-02-25', 'Ya se resolvio todo', '2020-02-25', 'Resuelto', 'Si'),
(4, 'soy  profesor', 'hoal s', 5, NULL, 'Queja', '2020-02-25', NULL, NULL, 'En Espera', 'No'),
(5, 'soy  profesor', 'hoal s', 5, NULL, 'Queja', '2020-02-25', NULL, NULL, 'En Espera', 'No'),
(6, 'Alumno', 'algo', 3, NULL, 'Peticion', '2020-02-25', NULL, NULL, 'En Espera', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE `TblRol` (
  `RolId` int(11) NOT NULL,
  `RolTipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblrol`
--

INSERT INTO `TblRol` (`RolId`, `RolTipo`) VALUES
(1, 'PROFESOR'),
(2, 'ALUMNO'),
(3, 'ACUDIENTE'),
(4, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `TblUsuario` (
  `UsuCodigo` int(11) NOT NULL,
  `UsuNombre` varchar(50) DEFAULT NULL,
  `UsuClave` longblob DEFAULT NULL,
  `UsuEstado` varchar(50) DEFAULT NULL,
  `UsuFoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `TblUsuario` (`UsuCodigo`, `UsuNombre`, `UsuClave`, `UsuEstado`, `UsuFoto`) VALUES
(1, 'DEFAULT', 0x3336344643303443343841374531423132424430434246443741323836333833, 'activo', 'default.png'),
(2, 'warthex', 0x3139463443463144323330374538304334433432373734433644373241424630, 'activo', 'default.png'),
(3, 'est', 0x3134313939443037433037314338443546303142423039354643464635334139, 'activo', 'default.png'),
(4, 'proo', 0x3630383636343146323337393534354543393734433634463433424130343439, 'activo', 'default.png'),
(5, 'pro', 0x3242444542323138394544383844314242324338344141434645343645353831, 'activo', 'default.png'),
(8, 'warthex2', 0x3943433632363132363444433038434630343835373636363434393232393241, 'activo', 'default.png'),
(9, 'warthex3', 0x4137334144443445373441384332464333414637384232303538443543314537, 'activo', 'default.png'),
(10, 'alum1', 0x3631463836413435433131453241303230384533434143374230433034364441, 'activo', 'default.png'),
(11, 'alum2', 0x3231304239463245353735333530304239424437364541413133323939333435, 'activo', 'default.png'),
(12, 'alum3', 0x3230464543433146323845343839433341304343453034414439313746384530, 'activo', 'default.png'),
(13, 'estudiante', 0x3636313637354432413942463638303145434530363134464137434233443843, 'activo', 'default.png'),
(14, 'puchu', 0x3431463745433432353646443944424143383734384634453239353638444537, 'activo', 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario_tblrol`
--

CREATE TABLE `TblUsuario_TblRol` (
  `URolId` int(11) NOT NULL,
  `URUsuCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuario_tblrol`
--

INSERT INTO `TblUsuario_TblRol` (`URolId`, `URUsuCodigo`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 8),
(1, 9),
(2, 3),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(4, 2),
(4, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblanuncio`
--
ALTER TABLE `TblAnuncio`
  ADD PRIMARY KEY (`AnuCodigo`),
  ADD KEY `FK_Anuncio_Curso` (`AnuCurso`);

--
-- Indices de la tabla `tblauditar_tblmatricula`
--
ALTER TABLE `TblAuditar_TblMatricula`
  ADD PRIMARY KEY (`AMatrCodigo`);

--
-- Indices de la tabla `tblcalificacion`
--
ALTER TABLE `TblCalificacion`
  ADD PRIMARY KEY (`CalCodigoUsuario`,`CalCodigoLogro`),
  ADD KEY `FK_Logros_calificacion` (`CalCodigoLogro`);

--
-- Indices de la tabla `tblcomentario`
--
ALTER TABLE `TblComentario`
  ADD PRIMARY KEY (`ComId`);

--
-- Indices de la tabla `tblcurso`
--
ALTER TABLE `TblCurso`
  ADD PRIMARY KEY (`CurNombre`),
  ADD UNIQUE KEY `CurNombre` (`CurNombre`),
  ADD KEY `FK_Curso_grado` (`CurCodGrado`);

--
-- Indices de la tabla `tblcurso_tblmateria`
--
ALTER TABLE `TblCurso_TblMateria`
  ADD PRIMARY KEY (`CM_CurNombre`,`CM_DiaCodigo`,`CM_HorCodigo`,`CM_DocProfesor`),
  ADD KEY `FK_CM_Materia` (`CM_MatCodigo`),
  ADD KEY `FK_CM_Dia` (`CM_DiaCodigo`),
  ADD KEY `FK_CM_Hora` (`CM_HorCodigo`),
  ADD KEY `FK_CM_Persona` (`CM_DocProfesor`);

--
-- Indices de la tabla `tbldatoscontacto`
--
ALTER TABLE `TblDatosContacto`
  ADD PRIMARY KEY (`DatConDocumento`);

--
-- Indices de la tabla `tbldia`
--
ALTER TABLE `TblDia`
  ADD PRIMARY KEY (`DiaCodigo`);

--
-- Indices de la tabla `tblgrado`
--
ALTER TABLE `TblGrado`
  ADD PRIMARY KEY (`GraCodigo`),
  ADD UNIQUE KEY `GraNombre` (`GraNombre`);

--
-- Indices de la tabla `tblhora`
--
ALTER TABLE `TblHora`
  ADD PRIMARY KEY (`HorCodigo`);

--
-- Indices de la tabla `tbllogros`
--
ALTER TABLE `TblLogros`
  ADD PRIMARY KEY (`LogCodigo`),
  ADD KEY `FK_LM_Materia` (`LogMateria`);

--
-- Indices de la tabla `tbllogrosperiodo`
--
ALTER TABLE `tblLogrosperiodo`
  ADD PRIMARY KEY (`LogPerCodigoLogro`,`LogPerNombrePeriodo`),
  ADD UNIQUE KEY `LogPerCodigoLogro` (`LogPerCodigoLogro`),
  ADD KEY `FK_PeriodoA_LogPer` (`LogPerNombrePeriodo`);

--
-- Indices de la tabla `tblmateria`
--
ALTER TABLE `tblmateria`
  ADD PRIMARY KEY (`MatCodigo`),
  ADD KEY `FK_Materia_Grado` (`MatGrado`);

--
-- Indices de la tabla `tblmatricula`
--
ALTER TABLE `tblmatricula`
  ADD PRIMARY KEY (`MatrCodigo`),
  ADD KEY `FK_Curso_Matricula` (`MatrCurso`);

--
-- Indices de la tabla `tblmatricula_tblpersona`
--
ALTER TABLE `tblmatricula_tblpersona`
  ADD PRIMARY KEY (`PerMatrPerDocumento`,`PerMatrMatrCodigo`),
  ADD KEY `FK_MP_Matricula` (`PerMatrMatrCodigo`);

--
-- Indices de la tabla `tblperiodoacademico`
--
ALTER TABLE `tblperiodoacademico`
  ADD PRIMARY KEY (`PerAcaNombre`,`PerAcaFechaInicio`,`PerAcaFechaFin`,`PerAcaYear`);

--
-- Indices de la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  ADD PRIMARY KEY (`PerDocumento`),
  ADD KEY `FK_Usuario_Persona` (`PerUsuario`);

--
-- Indices de la tabla `tblpqr`
--
ALTER TABLE `tblpqr`
  ADD PRIMARY KEY (`PqrId`),
  ADD KEY `fk_PqrUsuario` (`PqrUsuario`);

--
-- Indices de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD PRIMARY KEY (`RolId`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`UsuCodigo`),
  ADD UNIQUE KEY `UsuNombre` (`UsuNombre`);

--
-- Indices de la tabla `tblusuario_tblrol`
--
ALTER TABLE `tblusuario_tblrol`
  ADD PRIMARY KEY (`URolId`,`URUsuCodigo`),
  ADD KEY `FK_Usuario_UsuarioRol` (`URUsuCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblanuncio`
--
ALTER TABLE `tblanuncio`
  MODIFY `AnuCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblauditar_tblmatricula`
--
ALTER TABLE `tblauditar_tblmatricula`
  MODIFY `AMatrCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tblcomentario`
--
ALTER TABLE `tblcomentario`
  MODIFY `ComId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbldia`
--
ALTER TABLE `tbldia`
  MODIFY `DiaCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblgrado`
--
ALTER TABLE `tblgrado`
  MODIFY `GraCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblhora`
--
ALTER TABLE `tblhora`
  MODIFY `HorCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbllogros`
--
ALTER TABLE `tbllogros`
  MODIFY `LogCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `tblmateria`
--
ALTER TABLE `tblmateria`
  MODIFY `MatCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblmatricula`
--
ALTER TABLE `tblmatricula`
  MODIFY `MatrCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tblpqr`
--
ALTER TABLE `tblpqr`
  MODIFY `PqrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  MODIFY `RolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `UsuCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblanuncio`
--
ALTER TABLE `tblanuncio`
  ADD CONSTRAINT `FK_Anuncio_Curso` FOREIGN KEY (`AnuCurso`) REFERENCES `tblcurso` (`CurNombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblcalificacion`
--
ALTER TABLE `tblcalificacion`
  ADD CONSTRAINT `FK_Logros_calificacion` FOREIGN KEY (`CalCodigoLogro`) REFERENCES `tbllogros` (`LogCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuario_calificacion` FOREIGN KEY (`CalCodigoUsuario`) REFERENCES `tblusuario` (`UsuCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblcurso`
--
ALTER TABLE `tblcurso`
  ADD CONSTRAINT `FK_Curso_grado` FOREIGN KEY (`CurCodGrado`) REFERENCES `tblgrado` (`GraCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblcurso_tblmateria`
--
ALTER TABLE `tblcurso_tblmateria`
  ADD CONSTRAINT `FK_CM_Curso` FOREIGN KEY (`CM_CurNombre`) REFERENCES `tblcurso` (`CurNombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CM_Dia` FOREIGN KEY (`CM_DiaCodigo`) REFERENCES `tbldia` (`DiaCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CM_Hora` FOREIGN KEY (`CM_HorCodigo`) REFERENCES `tblhora` (`HorCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CM_Materia` FOREIGN KEY (`CM_MatCodigo`) REFERENCES `tblmateria` (`MatCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CM_Persona` FOREIGN KEY (`CM_DocProfesor`) REFERENCES `tblpersona` (`PerDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbldatoscontacto`
--
ALTER TABLE `tbldatoscontacto`
  ADD CONSTRAINT `FK_Persona_DatosContacto` FOREIGN KEY (`DatConDocumento`) REFERENCES `tblpersona` (`PerDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbllogros`
--
ALTER TABLE `tbllogros`
  ADD CONSTRAINT `FK_LM_Materia` FOREIGN KEY (`LogMateria`) REFERENCES `tblmateria` (`MatCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbllogrosperiodo`
--
ALTER TABLE `tbllogrosperiodo`
  ADD CONSTRAINT `FK_Logro_LogPer` FOREIGN KEY (`LogPerCodigoLogro`) REFERENCES `tbllogros` (`LogCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PeriodoA_LogPer` FOREIGN KEY (`LogPerNombrePeriodo`) REFERENCES `tblperiodoacademico` (`PerAcaNombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblmateria`
--
ALTER TABLE `tblmateria`
  ADD CONSTRAINT `FK_Materia_Grado` FOREIGN KEY (`MatGrado`) REFERENCES `tblgrado` (`GraCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblmatricula`
--
ALTER TABLE `tblmatricula`
  ADD CONSTRAINT `FK_Curso_Matricula` FOREIGN KEY (`MatrCurso`) REFERENCES `tblcurso` (`CurNombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblmatricula_tblpersona`
--
ALTER TABLE `tblmatricula_tblpersona`
  ADD CONSTRAINT `FK_MP_Matricula` FOREIGN KEY (`PerMatrMatrCodigo`) REFERENCES `tblmatricula` (`MatrCodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MP_Persona` FOREIGN KEY (`PerMatrPerDocumento`) REFERENCES `tblpersona` (`PerDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblpersona`
--
ALTER TABLE `tblpersona`
  ADD CONSTRAINT `FK_Usuario_Persona` FOREIGN KEY (`PerUsuario`) REFERENCES `tblusuario` (`UsuCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblpqr`
--
ALTER TABLE `tblpqr`
  ADD CONSTRAINT `fk_PqrUsuario` FOREIGN KEY (`PqrUsuario`) REFERENCES `tblusuario` (`UsuCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblusuario_tblrol`
--
ALTER TABLE `tblusuario_tblrol`
  ADD CONSTRAINT `FK_Rol_UsuarioRol` FOREIGN KEY (`URolId`) REFERENCES `tblrol` (`RolId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Usuario_UsuarioRol` FOREIGN KEY (`URUsuCodigo`) REFERENCES `tblusuario` (`UsuCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
