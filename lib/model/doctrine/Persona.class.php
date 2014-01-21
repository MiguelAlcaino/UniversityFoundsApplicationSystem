<?php

/**
 * Persona
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Persona extends BasePersona
{ 
    
    public function __toString(){
        return $this->getNombre().' '.$this->getApellido1().' '.$this->getApellido2();
    }
    
    public function getPublicacionesISIValidadas(){
      return Doctrine_Core::getTable('Persona')->getPublicacionesISIValidadasDesdeAnio($this->getId(), date('Y')-5);
    }
    
    public function getPublicacionesScielo(){
      return Doctrine_Core::getTable('Persona')->getPublicacionesScieloDesdeAnio($this->getId(), date('Y')-5);
    }
    
    public function getProyectosFondecytValidados(){
      return Doctrine_Core::getTable('Persona')->getProyectosValidadosDesdeAnio($this->getId(), date('Y')-5);
    }
    
    public function getPostulacionesDondeSoy($tipo_participante){
        $postulaciones = array();
        
        $hoy = date("Y-m-d H:i:s");
    $hoy_date = strtotime($hoy);
        
        foreach($this->getPersonaConcursos() as $postulacion){
                foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
                    if($participante_postulacion->getPersonaId() == $this->getId() && $participante_postulacion->getTipoParticipante() == $tipo_participante){
                      // CODIGO AGREGADO QUE VALIDA LA VIGENCIA DE UN CONCURSO 2.0
                      if(strtotime($postulacion->getConcurso()->getInicioPostulacion()) <= $hoy_date && strtotime($postulacion->getConcurso()->getTerminoPostulacion()) >= $hoy_date ){
                        $postulaciones[] = $postulacion;
                        }
                    }
                }
                
            }
        return $postulaciones;
    }
    /**
  public function getPostulacionesDisponibles(){
    foreach($this->getConcursos() as $concurso){
      
    }
  }
    **/
  //Metodo obsoleto se debe actualizar con la tabla de restricciones
  //SE DEBE SOBREEESCRIBIR CON EL METODO DE ARRIBA QUE NO TENDRÁ ARGUMENTOS, SI NO QUE CAPTURARA LOS DATOS DEL OBJETO MISMO.
	public function getPostulacionesDisponibles($nombre_array_concursos){
		
		$concursos_todos = Doctrine_Core::getTable('Concurso')->createQuery('a')->execute();
		
		$hoy = date("Y-m-d H:i:s");
    $hoy_date = strtotime($hoy);
		$concursos = array();
		foreach($concursos_todos as $c){ // quitar los concursos que no se encuentran vigentes
		   // CODIGO AGREGADO QUE VALIDA LA VIGENCIA DE UN CONCURSO
		   if(strtotime($c->getInicioPostulacion()) <= $hoy_date && strtotime($c->getTerminoPostulacion()) >= $hoy_date ){
		    $concursos[] = $c;
		   }
		}
		
		
		$concursos_para_profesor = sfConfig::get('app_'.$nombre_array_concursos);
		
		$postulaciones = array();
		
		//foreach($this->getPersonaConcursos() as $postulacion){
		  $di_tesis = array();
		foreach($this->getPostulacionesDondeSoy(1) as $postulacion){
			if($postulacion->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'){
			     $di_tesis[] = $postulacion->getConcurso();
			}
            
            $postulaciones[] = $postulacion->getConcurso();
            
			//echo $postulacion;
		}
		
		$concursos_validados = array();
		
		foreach($concursos as $concurso):
			if(array_key_exists($concurso->getAcronimo(), $concursos_para_profesor)):
				$concursos_validados[] = $concurso;
			endif;
		endforeach;
		
		//array_diff();
		
		//return $concursos_validados;
        //if(count($di_tesis) != 0 ){
//            return array_diff($concursos_validados, $postulaciones);
//        }else{
//            if(count($this->getPersonaConcursos())==0){
//                return array_diff($concursos_validados, $postulaciones);
//            }else{
//                return $di_tesis;
//            }
//            
//        }
        if(count($this->getPostulacionesDondeSoy(1))== 0){
            return $concursos_validados;
        }else{
            if(count($this->getPostulacionesDondeSoy(1))== 1){
                if($this->getTipoProfesor()->getNumeroTipo() == 4){
                    return array();
                }else{
                    if(count($di_tesis) != 0){
                        return array_diff($concursos_validados, $postulaciones);
                    }else{
                        return array(Doctrine_Core::getTable('Concurso')->findOneByAcronimo('di_apoyo_tesis_doctoral'));
                        
                    }
                }
            }else{
                if(count($this->getPostulacionesDondeSoy(1))== 2){
                    return array();
                }else{
                    return array();
                }
            }
        }
	}
	
	public function getPostulacionesEnCurso(){
		//return Doctrine_Core::getTable('Persona')->
	}
	
	public function inicializarPostulacion(Concurso $concurso){
		
		$postulacion = new PersonaConcurso();
		$postulacion->setConcurso($concurso);
		//$postulacion->setPersona($this);
		$postulacion->setEstado(1);
		$postulacion->save();
		
		$participante_postulacion = new ParticipantePostulacion();
		$participante_postulacion->setPersona($this);
		$participante_postulacion->setPersonaConcurso($postulacion);
		$participante_postulacion->setTipoParticipante(1); // 1 == Director del proyecto o en tesis doctoral: Patrocinador
		$participante_postulacion->save();
		
		//Tabla refClass creada para guardar los tipo_archivo de cada concurso, para V2.0
		foreach($postulacion->getConcurso()->getTipoArchivos() as $tipo_archivo){
		  $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo($tipo_archivo);
      $archivo_postulacion->save(); 
		}
		
		if($this->getTipoProfesor()->getNumeroTipo() == 4 ){
		  $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo(Doctrine_Core::getTable('TipoArchivo')->findOneByAcronimo('certificado_titulo'));
      $archivo_postulacion->save();
      
      $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo(Doctrine_Core::getTable('TipoArchivo')->findOneByAcronimo('carta_compromiso'));
      $archivo_postulacion->save();
      
      $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo(Doctrine_Core::getTable('TipoArchivo')->findOneByAcronimo('carta_respaldo_ua'));
      $archivo_postulacion->save();
		}
		if($this->getTipoProfesor()->getNumeroTipo() == 3 ){      
      $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo(Doctrine_Core::getTable('TipoArchivo')->findOneByAcronimo('carta_compromiso'));
      $archivo_postulacion->save();
      
      $archivo_postulacion = new ArchivoPostulacion();
      $archivo_postulacion->setPersonaConcurso($postulacion);
      $archivo_postulacion->setTipoArchivo(Doctrine_Core::getTable('TipoArchivo')->findOneByAcronimo('carta_respaldo_ua'));
      $archivo_postulacion->save();
		}
		// Procedimiento antiguo que utilizaba los ids de los tipo_archivo para asociarlos a la postulacion. Era inseguro, si es que cambiaban los IDs, o un concurso tiene distintos tipoos de documentos. V1.0
		/*
		if($concurso->getAcronimo() == 'di_artes'){
		  if($this->getTipoProfesor()->getNumeroTipo() == 4){
		    
		    
		  }else{
		    
		  }
		}else{
        if($this->getTipoProfesor()->getNumeroTipo() == 4){ // Si es un profesor no jerarquizado... se agrega el titulo de max grado academico
            for($i = 0; $i<15;$i++){
                $archivo_postulacion = new ArchivoPostulacion();
		        $archivo_postulacion->setPersonaConcurso($postulacion);
		        $archivo_postulacion->setIdTipoArchivo($i+1);
		        $archivo_postulacion->save();         
            }
        }else{
            for($i = 0; $i<14;$i++){ // numero de archivos asociados a la postulacion
			$archivo_postulacion = new ArchivoPostulacion();
			$archivo_postulacion->setPersonaConcurso($postulacion);
			$archivo_postulacion->setIdTipoArchivo($i+1);
			$archivo_postulacion->save();
		}
        }
		} */
		
		foreach($concurso->getItemConcurso() as $item_concurso){
			$recurso = new Recurso();
			$recurso->setPersonaConcurso($postulacion);
			$recurso->setItemConcursoId($item_concurso);
			$recurso->save();
			
			for($i=0; $i<2; $i++){ // numero de periodos del concurso
				$detalle_recurso = new DetalleRecurso();
				$detalle_recurso->setRecurso($recurso);
				$detalle_recurso->setPeriodo($i+1);
				$detalle_recurso->save();
				if($recurso->getItemConcurso()->getItem()->getAcronimo() == 'gastos_operacion'){
				  if($concurso->getAcronimo() == 'di_sello_valorico'){
				    for($j=0; $j<5;$j++){
				      $detalle_recurso_gasto_operacion = new DetalleRecursoGastosOperacion();
				      $detalle_recurso_gasto_operacion->setDetalleRecurso($detalle_recurso);
				      $detalle_recurso_gasto_operacion->setTipoDeGasto($j+1);
				      $detalle_recurso_gasto_operacion->save();
				    }
				  }else{
				    //Insumos computacionales
				    $detalle_recurso_gasto_operacion_1 = new DetalleRecursoGastosOperacion();
				    $detalle_recurso_gasto_operacion_1->setDetalleRecurso($detalle_recurso);
				    $detalle_recurso_gasto_operacion_1->setTipoDeGasto(1);
				    $detalle_recurso_gasto_operacion_1->save();
				    //Reactivos e insumos de laboratorio
				    $detalle_recurso_gasto_operacion_2 = new DetalleRecursoGastosOperacion();
				    $detalle_recurso_gasto_operacion_2->setDetalleRecurso($detalle_recurso);
				    $detalle_recurso_gasto_operacion_2->setTipoDeGasto(2);
				    $detalle_recurso_gasto_operacion_2->save();
				    //Libros y articulos de libreria
				    $detalle_recurso_gasto_operacion_3 = new DetalleRecursoGastosOperacion();
				    $detalle_recurso_gasto_operacion_3->setDetalleRecurso($detalle_recurso);
				    $detalle_recurso_gasto_operacion_3->setTipoDeGasto(3);
				    $detalle_recurso_gasto_operacion_3->save();
				    //Otros
				    $detalle_recurso_gasto_operacion_5 = new DetalleRecursoGastosOperacion();
				    $detalle_recurso_gasto_operacion_5->setDetalleRecurso($detalle_recurso);
				    $detalle_recurso_gasto_operacion_5->setTipoDeGasto(5);
				    $detalle_recurso_gasto_operacion_5->save();
				  }
				}
			}
			$archivo_recurso = new ArchivoRecurso();
			$archivo_recurso->setRecurso($recurso);
			$archivo_recurso->save();
		}
		return $postulacion;
	}
	
	public function getProyectosSegunTipo($tipo_proyecto){
		$proyectos = array();
		foreach($this->getProyectos() as $proyecto){
			if($tipo_proyecto == $proyecto->getTipoProyecto()){
				$proyectos[] = $proyecto;
			}
		}
		return $proyectos;
	}
    
    public function setPassword($v){
        if($v != ''){
            $this->_set('password',md5($v));
        }
    }
  public static function randomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
  {
	  $source = 'abcdefghijklmnopqrstuvwxyz';
	  if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  if($n==1) $source .= '1234567890';
	  if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
	  if($length>0){
		  $rstr = "";
		  $source = str_split($source,1);
		  for($i=1; $i<=$length; $i++){
			  mt_srand((double)microtime() * 1000000);
			  $num = mt_rand(1,count($source));
			  $rstr .= $source[$num-1];
		  }

	  }
	  return $rstr;
  }
}
