<?php

/**
 * Alternativa form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlternativaForm extends BaseAlternativaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['pregunta_id']);
    
    //$this->widgetSchema['texto_aternativa']->setAttribute();
    
  }
}
