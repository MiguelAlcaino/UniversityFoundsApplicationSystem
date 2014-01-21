<?php

/**
 * evaluacion_final1 module helper.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_final1
 * @author     Miguel Alcaino
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_final1GeneratorHelper extends BaseEvaluacion_final1GeneratorHelper
{
  public function linkToAprobar($object, $params)
  {
    return '<li class="sf_admin_action_aprobarn"> <input style="font-size: 48px; background-color: green;" onclick="if(confirm(\'Esta seguro de que desea aprobar la evaluación?.\nTenga en cuenta que no podra volver a modificarla.\')) return true; else return false;" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="aprobar" /></li>';
  }
  
  public function linkToReprobar($object, $params)
  {
    return '<li class="sf_admin_action_reprobar"> <input style="font-size: 48px; background-color: red;" onclick="if(confirm(\'Esta seguro de que desea reprobar la postulación?.\nTenga en cuenta que no podra volver a modificarla.\')) return true; else return false;" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="reprobar" /></li>';
  }
}
