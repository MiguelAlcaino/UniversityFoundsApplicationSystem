<?php

/**
 * DetalleRecurso form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DetalleRecursoForm extends BaseDetalleRecursoForm
{
  public function configure()
  {
  	unset($this['recurso_id'], $this['periodo'], $this['created_at'], $this['updated_at']);
  	
  	$this->widgetSchema['monto']->setAttribute('size', 7);
  	$this->widgetSchema['monto']->setAttribute('onChange','validadorRecursos(this, \''.$this->getObject()->getRecurso()->getItemConcurso()->getItem()->getAcronimo().'\','.$this->getObject()->getRecurso()->getItemConcurso()->getMontoMaximo().','.$this->getObject()->getPeriodo().')');
  }
}
