<?php

/**
 * tesista actions.
 *
 * @package    postulacion_interna
 * @subpackage tesista
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tesistaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->tesistas = Doctrine_Core::getTable('Tesista')
//       ->createQuery('a')
//       ->execute();
//   }

  public function executeNew(sfWebRequest $request)
  {
  	
  	$this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    $this->postulacion = $postulacion;
    if($this->getUser()->getAttribute('id_persona') == $this->postulacion->getPersona()->getId()){
  		$this->form = new TesistaForm();
    }else{
    	$this->redirect('persona/logout');
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
    $this->form = new TesistaForm();

    $this->processForm($request, $this->form, $this->postulacion);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tesista = Doctrine_Core::getTable('Tesista')->find(array($request->getParameter('id'))), sprintf('Object tesista does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    if($this->getUser()->getAttribute('id_persona') == $this->postulacion->getPersona()->getId()){
    	$this->form = new TesistaForm($tesista);
    }else{
    	$this->redirect('persona/logout');
    }
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tesista = Doctrine_Core::getTable('Tesista')->find(array($request->getParameter('id'))), sprintf('Object tesista does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($this->postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    
    if($this->postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $this->form = new TesistaForm($tesista);

    $this->processForm($request, $this->form, $this->postulacion);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tesista = Doctrine_Core::getTable('Tesista')->find(array($request->getParameter('id'))), sprintf('Object tesista does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    
    if($postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
	$postulacion->setTesistaId(null);
	$postulacion->save();
	$tesista->delete();
    $this->getUser()->setFlash("error", "El tesista ha sido eliminado correctamente.");
    $this->redirect('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1');
    
  }

  protected function processForm(sfWebRequest $request, sfForm $form, PersonaConcurso $postulacion)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tesista = $form->save();
		
      $postulacion->setTesista($tesista);
      $postulacion->save();
      
      $this->getUser()->setFlash("error", "El tesista ha sido agregado/guardado correctamente.");
      $this->redirect('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1');
    }
  }
}
