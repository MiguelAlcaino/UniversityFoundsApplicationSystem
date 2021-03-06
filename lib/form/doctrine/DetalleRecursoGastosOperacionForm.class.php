<?php

/**
 * DetalleRecursoGastosOperacion form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DetalleRecursoGastosOperacionForm extends BaseDetalleRecursoGastosOperacionForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['tipo_de_gasto'], $this['detalle_recurso_id']);
    
    $this->widgetSchema['monto']->setAttribute('onChange','sumarGastosOperacion(this,'.$this->getObject()->getDetalleRecurso()->getPeriodo().')');
    $this->widgetSchema['monto']->setAttribute('size','7');
  }
}
