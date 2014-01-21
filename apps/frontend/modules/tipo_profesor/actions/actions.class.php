<?php

/**
 * tipo_profesor actions.
 *
 * @package    postulacion_interna
 * @subpackage tipo_profesor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tipo_profesorActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->tipo_profesors = Doctrine_Core::getTable('TipoProfesor')
//       ->createQuery('a')
//       ->execute();
//   }

//   public function executeNew(sfWebRequest $request)
//   {
//     $this->form = new TipoProfesorForm();
//   }

//   public function executeCreate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST));

//     $this->form = new TipoProfesorForm();

//     $this->processForm($request, $this->form);

//     $this->setTemplate('new');
//   }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $this->forward404Unless($tipo_profesor = Doctrine_Core::getTable('TipoProfesor')->find(array($request->getParameter('id'))), sprintf('Object tipo_profesor does not exist (%s).', $request->getParameter('id')));
//     $this->form = new TipoProfesorForm($tipo_profesor);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($tipo_profesor = Doctrine_Core::getTable('TipoProfesor')->find(array($request->getParameter('id'))), sprintf('Object tipo_profesor does not exist (%s).', $request->getParameter('id')));
//     $this->form = new TipoProfesorForm($tipo_profesor);

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

//   public function executeDelete(sfWebRequest $request)
//   {
//     $request->checkCSRFProtection();

//     $this->forward404Unless($tipo_profesor = Doctrine_Core::getTable('TipoProfesor')->find(array($request->getParameter('id'))), sprintf('Object tipo_profesor does not exist (%s).', $request->getParameter('id')));
//     $tipo_profesor->delete();

//     $this->redirect('tipo_profesor/index');
//   }

//   protected function processForm(sfWebRequest $request, sfForm $form)
//   {
//     $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
//     if ($form->isValid())
//     {
//       $tipo_profesor = $form->save();

//       $this->redirect('tipo_profesor/edit?id='.$tipo_profesor->getId());
//     }
//   }
}
