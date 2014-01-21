<?php

/**
 * DivulgacionDePersona form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DivulgacionDePersonaForm extends BaseDivulgacionDePersonaForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
  	$this->widgetSchema['persona_id'] = new sfWidgetFormInputHidden();
  	
  	$this->widgetSchema['texto_divulgacion']->setLabel('Datos de la divulgaci&oacute;n');
  	$this->widgetSchema['texto_divulgacion']->setAttribute('size',100);
  }
}
