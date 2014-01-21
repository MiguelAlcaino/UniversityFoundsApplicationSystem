<?php

/**
 * RespuestaAlternativa form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RespuestaAlternativaForm extends BaseRespuestaAlternativaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['sesion_encuesta_id']);
    
    $pregunta = $this->getOption('pregunta');
    $textos_aternativas = array();

    foreach($pregunta->getAlternativas() as $key => $alternativa){
	      $textos_alternativas[$alternativa->getId()] = $alternativa->getTextoAlternativa();
	    }
    
    $this->widgetSchema['alternativa_id'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'choices'  => $textos_alternativas,
          'label' => $pregunta->getTextoPregunta()
        ));
  }
}
