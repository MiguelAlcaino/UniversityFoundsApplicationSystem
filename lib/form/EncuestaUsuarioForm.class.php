<?php

class EncuestaUsuarioForm extends sfForm{
	public function configure(){
	  parent::configure();

	  $encuesta = $this->getOption('encuesta');
	  $sesion = $this->getOption('sesion');
	  $respuesta_aternativa = new RespuestaAlternativa();
	  $respuesta_aternativa->setSesionEncuesta($sesion);

	  $preguntas_form = new sfForm();
	  
	  foreach($encuesta->getPreguntas() as $pregunta){
	    $textos_alternativas = array();
	    $preguntas_form->embedForm('pregunta_'.$pregunta->getId(), new RespuestaAlternativaForm($respuesta_aternativa, array('pregunta'=>$pregunta)));
    }
	  
	  $this->embedForm('preguntas',$preguntas_form);
	  $this->widgetSchema->setNameFormat('encuesta[%s]');
	}
}
