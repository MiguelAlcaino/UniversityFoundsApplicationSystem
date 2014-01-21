<?php

/**
 * Pregunta form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PreguntaForm extends BasePreguntaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['encuesta_id']);
    $this->widgetSchema['texto_pregunta']->setAttribute('size',40);
  }
}
