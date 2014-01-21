<?php

/**
 * PersonaConcurso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    postulacion_interna
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PersonaConcurso extends BasePersonaConcurso
{
  public function getConvenio(){
    return Doctrine_Core::getTable('ConvenioDesempenoPostulacion')->findOneByPersonaConcursoId($this->getId());
  }

  public function getEvaluacionRecursos(){
    return Doctrine_Core::getTable('Evaluacion')->findOneByPersonaConcursoIdAndEstado($this->getId(), 3); // Las evaluaciones con estado 3 son las de recursos
  }
  
  public function getSexoDirector(){
    return $this->getPersona()->getSexo();
  }
  
  public function getEvaluacionFinal(){
    return Doctrine_Core::getTable('Evaluacion')->findOneByPersonaConcursoIdAndEstado($this->getId(), 4); // Las evaluaciones con estado 4 son als
  }
  
  public function getEvaluacionesConEstado($estado){
    return Doctrine_Core::getTable('Evaluacion')->findByPersonaConcursoIdAndEstado($this->getId(), $estado);
  }
  
  public function getEvaluacionByPersonaSistemaId($persona_id){
    return Doctrine_Core::getTable('Evaluacion')->findOneByPersonaConcursoIdAndPersonaSistemaId($this->getId(), $persona_id);
  }  
  
	public function __toString(){
		return $this->getConcurso()->getNombreConcurso();
	}
	
	public function getPersona(){
		$persona_concurso_con_director = Doctrine_Core::getTable('PersonaConcurso')->getDirector($this->getId());
		
		return $persona_concurso_con_director->getPersona();
	}
	
	public function getUnidadAcademicaDirector(){
	  return $this->getPersona()->getUnidadAcademica();
	}
	
	public function getTipoProfesorDirector(){
	  return $this->getPersona()->getTipoProfesor();
	}
	
/*	
	public function getPersonas(){
	  return Doctrine_Core::getTable('ParticipatePostulacion')
            ->createQuery('a')
            ->leftJoin('a.ParticipantePostulacion p')
            ->where('p.persona_concurso_id = ?',array($this->getId()))
            ->execute();
	}
	*/
	public function contarParticipantesPorTipoParticipante($tipo_participante){
		$contador = 0;
		foreach($this->getParticipantesPostulacion() as $participante_postulacion){
			if($participante_postulacion->getTipoParticipante() == $tipo_participante){
				$contador++;
			}
		}
		return $contador;
	}
	
	public function existeParticipanteEnPostulacion(Persona $persona){
		$existe = false;
		foreach($this->getParticipantesPostulacion() as $participante_postulacion){
			if($participante_postulacion->getPersonaId() == $persona->getId()){
				$existe = true;
			}
		}
		
		return $existe;
	}
  
  public function superaMaximoPersonasUnidadAcademica(UnidadAcademica $unidad_academica){
    $contador = 0;
    foreach($this->getParticipantesPostulacion() as $participante){
      if($participante->getPersona()->getUnidadAcademica() == $unidad_academica){
        $contador++;
      }
    }
    if($contador >= 2){
      return true;
    }else{
      return false;
    }
  }
  
  public function getEvaluacionesEnviadas(){
    return Doctrine_Core::getTable('PersonaConcurso')->getEvaluacionesEnviadas($this->getId());
  }
  
  public function getNotaFinal(){
    if($evaluacion = Doctrine_Core::getTable('Evaluacion')->findOneByEstadoAndPersonaConcursoId(4, $this->getId())){
      return $evaluacion->getNota();
    }else{
      return 0;
    }
  }
}