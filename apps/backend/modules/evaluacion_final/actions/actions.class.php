<?php

require_once dirname(__FILE__).'/../lib/evaluacion_finalGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/evaluacion_finalGeneratorHelper.class.php';

/**
 * evaluacion_final actions.
 *
 * @package    postulacion_interna
 * @subpackage evaluacion_final
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class evaluacion_finalActions extends autoEvaluacion_finalActions
{
  public function executeEvaluar(sfWebRequest $request){
    $this->redirect('evaluacion_final1/new?postulacion_id='.$request->getParameter('id'));
  }
}
