<?php

/**
 * evaluacion module helper.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion
 * @author     Miguel Alcaino
 * @version    SVN: $Id: helper.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacionGeneratorHelper extends BaseEvaluacionGeneratorHelper
{
  public function linkToEvaluaro($object, $params)
  {
    return '<li class="sf_admin_action_evaluaro">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object).'</li>';
  } 
}
