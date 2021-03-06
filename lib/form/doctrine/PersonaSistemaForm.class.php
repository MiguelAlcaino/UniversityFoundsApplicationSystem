<?php

/**
 * PersonaSistema form.
 *
 * @package    postulacion_interna
 * @subpackage form
 * @author     Miguel Alcaino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonaSistemaForm extends BasePersonaSistemaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['token_recuperar_password']);
    $this->widgetSchema['perfil'] = new sfWidgetFormChoice(array(
  	'expanded' => true,
    'choices' => array(
      '1' => 'Administrador', 
      '2' => 'Evaluador',
      '3' => 'Evaluador final')
    )
    );
  }
}
