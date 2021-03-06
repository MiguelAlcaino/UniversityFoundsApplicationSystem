<?php

/**
 * Tesista form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TesistaForm extends BaseTesistaForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
  	
  	$this->widgetSchema['rut'] = new sfWidgetFormInput(array(),
			array('size'=> 8));
  	$this->widgetSchema['dv'] = new sfWidgetFormInput(array(),
			array('size'=> 1));
  	
  	$this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
        'expanded' => true,
        'choices'  => array('M'=>'Masculino', 'F'=>'Femenino'),
      ));
  	
  	$this->widgetSchema['ruta_notas'] = new sfWidgetFormInputFile();
  	$this->widgetSchema['ruta_notas']->setLabel('Calificaciones del estudiante');
  	$this->widgetSchema['apellido1']->setLabel('Apellido Paterno');
  	$this->widgetSchema['apellido2']->setLabel('Apellido Materno');
  	
  	$this->setValidator('ruta_notas', new sfValidatorFile(
  	array(
  				'mime_types' => array('application/pdf', 'application/x-pdf'), //you can set your own of course
  				'path' => sfConfig::get('app_path_subida_archivos'),
  				'required' => false
  	)
  	
  	));
  	
  	$this->validatorSchema['email'] = new sfValidatorAnd(array(
    $this->validatorSchema['email'],
    new sfValidatorEmail(),
  		));
  	
  }
}
