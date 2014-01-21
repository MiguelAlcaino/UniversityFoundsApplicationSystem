<?php

/**
 * ConcursoTipoArchivo form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConcursoTipoArchivoForm extends BaseConcursoTipoArchivoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $this->validatorSchema['porcentaje_evaluacion'] = new sfValidatorAnd(
      array(
        $this->validatorSchema['porcentaje_evaluacion'],
        new sfValidatorInteger(
          array(
            'max' => 100,
            'min' => 0
          )
        )
      )
    );
  }
}
