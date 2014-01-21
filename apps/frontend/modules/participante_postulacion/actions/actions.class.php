<?php

/**
 * participante_postulacion actions.
 *
 * @package    postulacion_interna
 * @subpackage participante_postulacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class participante_postulacionActions extends sfActions
{
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->participante_postulacions = Doctrine_Core::getTable('ParticipantePostulacion')
//       ->createQuery('a')
//       ->execute();
//   }

//   public function executeNew(sfWebRequest $request)
//   {
//     $this->form = new ParticipantePostulacionForm();
//   }

//   public function executeCreate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST));

//     $this->form = new ParticipantePostulacionForm();

//     $this->processForm($request, $this->form);

//     $this->setTemplate('new');
//   }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $this->forward404Unless($participante_postulacion = Doctrine_Core::getTable('ParticipantePostulacion')->find(array($request->getParameter('id'))), sprintf('Object participante_postulacion does not exist (%s).', $request->getParameter('id')));
//     $this->form = new ParticipantePostulacionForm($participante_postulacion);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($participante_postulacion = Doctrine_Core::getTable('ParticipantePostulacion')->find(array($request->getParameter('id'))), sprintf('Object participante_postulacion does not exist (%s).', $request->getParameter('id')));
//     $this->form = new ParticipantePostulacionForm($participante_postulacion);

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($participante_postulacion = Doctrine_Core::getTable('ParticipantePostulacion')->find(array($request->getParameter('id'))), sprintf('Object participante_postulacion does not exist (%s).', $request->getParameter('id')));
    $this->forward404Unless($postulacion=Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion')));
    $participante_postulacion->delete();

    $this->getUser()->setFlash("error", "El investigador ha sido eliminado correctamente.");
      $this->redirect('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $participante_postulacion = $form->save();

      $this->redirect('participante_postulacion/edit?id='.$participante_postulacion->getId());
    }
  }
}
