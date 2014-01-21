<?php

/**
 * ArchivoDePersona form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArchivoDePersonaForm extends BaseArchivoDePersonaForm
{
  public function configure()
  {
    unset($this['persona_id'], $this['created_at'], $this['updated_at']);
    $this->widgetSchema['ruta'] = new sfWidgetFormInputFile();
    $this->widgetSchema['tipo_archivo'] = new sfWidgetFormInputHidden();
    
    $this->setValidator('ruta', new sfValidatorFile(
	  	array(
			'mime_types' => array('application/pdf', 'application/x-pdf'), //you can set your own of course
			'path' => sfConfig::get('app_path_subida_cv_pnj')
		)

	  ));
      
      $this->validatorSchema['ruta']->setMessage('invalid', 'El archivo debe ser un pdf.');
      $this->validatorSchema['ruta']->setMessage('required', 'Debe seleccionar un archivo.');
      
      $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
  }
}
