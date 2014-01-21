<?php

/**
 * Convocatoria form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConvocatoriaForm extends BaseConvocatoriaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['fecha_firma_convenio'] = new sfWidgetFormI18nDateTime(array('culture' => 'es'));
    $this->widgetSchema['fecha_termino_convenio'] = new sfWidgetFormI18nDateTime(array('culture' => 'es'));
  }
}
