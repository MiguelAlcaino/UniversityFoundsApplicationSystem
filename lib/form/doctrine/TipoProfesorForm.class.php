<?php

/**
 * TipoProfesor form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoProfesorForm extends BaseTipoProfesorForm
{
  public function configure()
  {
  	unset($this['created_at'], $this['updated_at']);
  }
}
