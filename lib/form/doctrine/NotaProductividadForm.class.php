<?php

/**
 * NotaProductividad form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotaProductividadForm extends BaseNotaProductividadForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['porcentaje_productividad_concurso_id'], $this['evaluacion_id'] );
    
    $this->widgetSchema['nota']->setAttribute('size',3);
    $this->widgetSchema['nota']->setAttribute('onchange', 'calcularNota()');
    
    $this->validatorSchema['nota'] = new sfValidatorInteger(
      array(
        'min' => 0,
        'max' => 100
      )
    );
    
    
  }
}
