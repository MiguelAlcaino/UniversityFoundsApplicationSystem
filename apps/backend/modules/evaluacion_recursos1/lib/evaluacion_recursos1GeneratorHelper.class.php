<?php

/**
 * evaluacion_recursos1 module helper.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_recursos1
 * @author     Miguel Alcaino
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_recursos1GeneratorHelper extends BaseEvaluacion_recursos1GeneratorHelper
{
  public function linkToEnviarEvaluacion($object, $params)
  {
    return '<li class="sf_admin_action_enviar_evaluacion"> <input onclick="if(confirm(\'Esta seguro de que desea enviar la evaluación?.\nTenga en cuenta que no podra volver a modificarla.\')) return true; else return false;" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="enviar_evaluacion" /></li>';
  }
}
