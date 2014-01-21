<?php

/**
 * SesionEncuesta form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SesionEncuestaForm extends BaseSesionEncuestaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['fecha_inicio_sesion']);
    
    $this->widgetSchema['encuesta_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
    
    $respuesta_aternativa = new RespuestaAlternativa();
	  $respuesta_aternativa->setSesionEncuesta($this->getObject());
    
    $preguntas_form = new sfForm();
	  
	  foreach($this->getObject()->getEncuesta()->getPreguntas() as $pregunta){
	    $textos_alternativas = array();
	    $preguntas_form->embedForm('pregunta_'.$pregunta->getId(), new RespuestaAlternativaForm($respuesta_aternativa, array('pregunta'=>$pregunta)));
    }
	  
	  $this->embedForm('preguntas',$preguntas_form);
  }
}
