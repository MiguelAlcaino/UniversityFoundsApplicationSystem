<?php

/**
 * AjusteDetalleRecursoGastosOperacion form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AjusteDetalleRecursoGastosOperacionForm extends BaseAjusteDetalleRecursoGastosOperacionForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['detalle_recurso_gastos_operacion_id'], $this['ajuste_detalle_recurso_id']);
    
    $this->widgetSchema['monto_aprobado']->setAttribute('size',7);
    $this->widgetSchema['monto_aprobado']->setAttribute('onchange','sumarGastosOperacion('.$this->getObject()->getDetalleRecursoGastosOperacion()->getDetalleRecurso()->getRecurso()->getId().', '.$this->getObject()->getDetalleRecursoGastosOperacion()->getDetalleRecurso()->getPeriodo().')');
  }
}
