<?php

/**
 * ProyectoDePersona form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProyectoDePersonaForm extends BaseProyectoDePersonaForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
  	
  	$this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
  	$this->widgetSchema['tipo_proyecto'] = new sfWidgetFormInputHidden();
    
    $choices = array(1 => 'Investigador principal',
                     2 => 'Co-investigador');
    
    $this->widgetSchema['tipo_participacion'] = new sfWidgetFormChoice(array(
      'expanded' => true,
      'choices'  => $choices,
      'renderer_class' => 'MyRenderer'
        ));
  }
}
