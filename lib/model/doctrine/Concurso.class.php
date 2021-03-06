<?php

/**
 * Concurso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Concurso extends BaseConcurso
{
	public function __toString(){
		return $this->getNombreConcurso();
	}
  
  public function getPostulacionesAprobadas(){
    
    $array_postulaciones_aprobadas = array();
    foreach($this->getPostulaciones() as $postulacion){
      if($postulacion->getEstaAprobado()){
        $array_postulaciones_aprobadas[] = $postulacion;
      }
    }
    
    return $array_postulaciones_aprobadas;
  }
  
}
