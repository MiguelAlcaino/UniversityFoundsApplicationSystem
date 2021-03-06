<?php

require_once dirname(__FILE__).'/../lib/proyectoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/proyectoGeneratorHelper.class.php';

/**
 * proyecto actions.
 *
 * @package    postulacion_interna
 * @subpackage proyecto
 * @author     Miguel Alcaino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectoActions extends autoProyectoActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }
    //Seteo de filtro de proyectos de una persona
    if($request->hasParameter('id_persona')){
      $this->setFilters(array('persona_id'=>$request->getParameter('id_persona')));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }
  
  public function executeBatchValidar_proyectos(sfWebRequest $request){
    $ids = $request->getParameter('ids');
 
    $q = Doctrine_Query::create()
      ->from('ProyectoDePersona p')
      ->whereIn('p.id', $ids);
    
    foreach ($q->execute() as $publicacion_de_persona)
    {
      $publicacion_de_persona->setEsValido(true);
      $publicacion_de_persona->save();
    }
    
    $this->getUser()->setFlash('notice', 'Los proyectos han sido editados con éxito');
    
    $this->redirect('proyecto/index');
  }
}
