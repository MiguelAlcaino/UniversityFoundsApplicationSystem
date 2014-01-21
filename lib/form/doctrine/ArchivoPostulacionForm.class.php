<?php

/**
 * ArchivoPostulacion form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArchivoPostulacionForm extends BaseArchivoPostulacionForm
{
  public function configure()
  {
  	unset($this['id_tipo_archivo'], $this['id_persona_concurso'], $this['created_at'], $this['updated_at'], $this['id_tipo_archivo']);
  	
  	$this->widgetSchema['ruta'] = new sfWidgetFormInputFile();
    
  	
  	
  }
}
