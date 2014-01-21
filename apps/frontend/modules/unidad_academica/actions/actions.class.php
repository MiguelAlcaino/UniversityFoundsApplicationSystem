<?php

/**
 * unidad_academica actions.
 *
 * @package    postulacion_interna
 * @subpackage unidad_academica
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class unidad_academicaActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->unidad_academicas = Doctrine_Core::getTable('UnidadAcademica')
//       ->createQuery('a')
//       ->execute();
//   }

//   public function executeNew(sfWebRequest $request)
//   {
//     $this->form = new UnidadAcademicaForm();
//   }

//   public function executeCreate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST));

//     $this->form = new UnidadAcademicaForm();

//     $this->processForm($request, $this->form);

//     $this->setTemplate('new');
//   }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $this->forward404Unless($unidad_academica = Doctrine_Core::getTable('UnidadAcademica')->find(array($request->getParameter('id'))), sprintf('Object unidad_academica does not exist (%s).', $request->getParameter('id')));
//     $this->form = new UnidadAcademicaForm($unidad_academica);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($unidad_academica = Doctrine_Core::getTable('UnidadAcademica')->find(array($request->getParameter('id'))), sprintf('Object unidad_academica does not exist (%s).', $request->getParameter('id')));
//     $this->form = new UnidadAcademicaForm($unidad_academica);

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

//   public function executeDelete(sfWebRequest $request)
//   {
//     $request->checkCSRFProtection();

//     $this->forward404Unless($unidad_academica = Doctrine_Core::getTable('UnidadAcademica')->find(array($request->getParameter('id'))), sprintf('Object unidad_academica does not exist (%s).', $request->getParameter('id')));
//     $unidad_academica->delete();

//     $this->redirect('unidad_academica/index');
//   }

//   protected function processForm(sfWebRequest $request, sfForm $form)
//   {
//     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//     if ($form->isValid())
//     {
//       $unidad_academica = $form->save();

//       $this->redirect('unidad_academica/edit?id='.$unidad_academica->getId());
//     }
//   }
}
