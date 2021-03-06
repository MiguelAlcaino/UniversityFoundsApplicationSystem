<?php

/**
 * Concurso form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ConcursoForm extends BaseConcursoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['acronimo'] = new sfWidgetFormChoice(array(
      'choices' => array(
        'di_regular' => 'di_regular',
        'di_iniciacion' => 'di_iniciacion',
        'di_artes' => 'di_artes',
        'di_sello_valorico' => 'di_sello_valorico',
        'di_pia' => 'di_pia',
        'di_apoyo_tesis_doctoral' => 'di_apoyo_tesis_doctoral'
        )
    ));
  }
}
