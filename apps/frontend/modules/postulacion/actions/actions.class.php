<?php

/**
 * postulacion actions.
 *
 * @package    postulacion_interna
 * @subpackage postulacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postulacionActions extends sfActions
{
    
    public function executeEnviarPostulacion(sfWebRequest $request){
        $this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
        
        if($this->postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
        	$this->redirect('persona/logout');
        }
        
        if($this->postulacion->getPersona()->getPassword() == md5($request->getParameter('comprueba_password'))){
            $this->postulacion->setEstado(2);
            $fecha = date('Y-m-d H-i-s');
            $this->postulacion->setFechaEnvio($fecha);
            $this->postulacion->save();
            
            $message = $this->getMailer()->compose();
            $message->setSubject('Postulacion enviada - '.$this->postulacion->getConcurso());
            
            $message->setTo($this->postulacion->getPersona()->getEmail());
            //$message->setTo('miguel.alcaino@ogb.cl');
            $message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
            $html = $this->getPartial('postulacion/finaliza_postulacion_email');
            $message->setBody($html, 'text/html');
            //$message->attach(Swift_Attachment::fromPath('/home/sfprojects/io_terquim/web/uploads/ordenes_de_compra/orden_de_compra_'.$orden_compra->getId().'.pdf'));
            $this->getMailer()->send($message);
            
            $this->guardarPostulacion($this->postulacion);
            
            $message = $this->getMailer()->compose();
            $message->setSubject('Nueva postulacion - '.$this->postulacion->getConcurso().' - '.$this->postulacion->getPersona()->getNombre().' '.$this->postulacion->getPersona()->getApellido1() );
            $array_send_to = array('dii.informacion@ucv.cl','dii.investigacion@ucv.cl');
            $message->setTo($array_send_to);
            $message->setFrom(array(sfConfig::get('app_email_sistema') => 'Sistema de postulacion DI'));
            $html = $this->getPartial('postulacion/envio_postulacion_di_mail', array('postulacion' => $this->postulacion));
            $message->setBody($html, 'text/html');
            $message->attach(Swift_Attachment::fromPath(sfConfig::get('app_path_subida_postulaciones').'/'.$this->postulacion->getRutaPdfPostulacion() ));
            $this->getMailer()->send($message);
            
            $this->getUser()->setFlash('notice','Su postulaci&oacute;n ha sido enviada exitosamente. Ya no podr&aacute; ser modificada.');
            $this->redirect('persona/seleccionConcurso');
        }else{
            $this->getUser()->setFlash('error','La contrase&ntilde;a es inv&aacute;lida. Intentelo nuevamente.');
            $this->redirect('postulacion/confirmarPassword?id_postulacion='.$this->postulacion->getId());
        }
    }
    
    public function executeConfirmarPassword(sfWebRequest $request){
        $this->postulacion = Doctrine_Core::getTable('PersonaConcurso')->find($request->getParameter('id_postulacion'));
        if($this->postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
        	$this->redirect('persona/logout');
        }
    }
    
//   public function executeIndex(sfWebRequest $request)
//   {
//     $this->persona_concursos = Doctrine_Core::getTable('PersonaConcurso')
//       ->createQuery('a')
//       ->execute();
//   }
  
  public function executeCrearPDF(sfWebRequest $request){
        $postulacion = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id_postulacion')));
        
        if($postulacion->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
        	$this->redirect('persona/logout');
        }
        
  	    $array_pdfs = array();
           sfConfig::set('sf_web_debug', false);	
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
	  	require_once(sfConfig::get('app_path_lib')."/dompdf/dompdf_config.inc.php");
//	  	
        $html = get_partial('header_pdf');
	  	$html .= get_partial('titulo_proyecto_pdf', array('postulacion'=>$postulacion));
        $html .= get_partial('footer_pdf');
//        
//        
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
        $dompdf->set_paper("a4");
		$dompdf->render();
//		//$dompdf->stream("Postulacion");
      file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/primera_hoja_'.$postulacion->getId().'.pdf', $dompdf->output());
        $array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/primera_hoja_'.$postulacion->getId().'.pdf';
        //$this->redirect('postular/'.$postulacion->getId().'?etapa=5&paso=2');
      
    foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
        $html = get_partial('header_pdf');
	  	$html .= get_partial('curriculum_pdf', array('persona'=>$participante_postulacion->getPersona()));
        $html .= get_partial('footer_pdf');    
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
        $dompdf->set_paper("a4");
		$dompdf->render();
      file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculum_'.$postulacion->getId().$participante_postulacion->getPersona()->getId().'.pdf', $dompdf->output());
        $array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculum_'.$postulacion->getId().$participante_postulacion->getPersona()->getId().'.pdf';
    }

    if(count($postulacion->getPersonasExternas())>0){ // Carga personas externas en caso de que la postulacion cuente con ellas
    	$html = get_partial('header_pdf');
    	$html .= get_partial('curriculum_externo_pdf', array('personas_externas'=>$postulacion->getPersonasExternas() ));
    	$html .= get_partial('footer_pdf');
    	$dompdf = new DOMPDF();
    	$dompdf->load_html($html);
    	$dompdf->set_paper("a4");
    	$dompdf->render();
    	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculums_externos'.$postulacion->getId().'.pdf', $dompdf->output());
    	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculums_externos'.$postulacion->getId().'.pdf';
    }
    
    if($postulacion->getTesistaId()){ // Si es que la postulacion tiene tesista
    	$html = get_partial('header_pdf');
    	$html .= get_partial('curriculum_tesista_pdf', array('persona'=>$postulacion->getTesista() ));
    	$html .= get_partial('footer_pdf');
    	$dompdf = new DOMPDF();
    	$dompdf->load_html($html);
    	$dompdf->set_paper("a4");
    	$dompdf->render();
    	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculum_tesista'.$postulacion->getId().$postulacion->getTesistaId().'.pdf', $dompdf->output());
    	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculum_tesista'.$postulacion->getId().$postulacion->getTesistaId().'.pdf';
    	
    	if($postulacion->getTesista()->getRutaNotas()){
    		$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$postulacion->getTesista()->getRutaNotas();
    	}
    }
      
    foreach($postulacion->getArchivosPostulacion() as $archivo){
 		if($archivo->getRuta()){
  			$bandera = 1;
  			$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$archivo->getRuta();
  		}
	}
    
    $html = get_partial('header_pdf');
	  	$html .= get_partial('resumen_recursos_pdf', array('postulacion'=> $postulacion));
        $html .= get_partial('footer_pdf');    
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
        $dompdf->set_paper("a4");
		$dompdf->render();
      file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/resumen_recursos_'.$postulacion->getId().'.pdf', $dompdf->output());
        $array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/resumen_recursos_'.$postulacion->getId().'.pdf';
      
        foreach($postulacion->getRecursos() as $recurso){
        	foreach($recurso->getArchivosRecurso() as $archivo_recurso){
        		if($archivo_recurso->getRuta()){
        			$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$archivo_recurso->getRuta();
        		}
        	}
        }
        //$this->redirect('postular/'.$postulacion->getId().'?etapa=5&paso=2');
        //$pdf->addPDF(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'.pdf');
        
        //$fpdf = new FPDF();
//        $fpdf->AddPage();
//        $fpdf->SetFont('Arial','B',16);
//        $fpdf->Cell(40,10,'�Hola, Mundo!');
//        $fpdf->Output(sfConfig::get('app_path_subida_postulaciones').'/postulacion_1.pdf','F');
$pdf = new concat_pdf();
//$pdf->setFiles(array(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'.pdf',sfConfig::get('app_path_subida_postulaciones').'/postulacion_2.pdf',sfConfig::get('app_path_subida_postulaciones').'/115UCV1104 - FINAL.pdf'));
$pdf->setFiles($array_pdfs);
$pdf->concat();
//$pdf->Output(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'_'.$postulacion->getPersona()->getApellido1().'.pdf','F');
$pdf->Output('postulacion.pdf','D');
        //$this->redirect('postular/'.$postulacion->getId().'?etapa=5&paso=2');
       // $pdf = new PDFMerger();
    //$pdf->addPDF(sfConfig::get('app_path_subida_postulaciones').'\postulacion_1.pdf');
    //$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'/postulacion_1.pdf');
//  	$pdf->merge('download');
      //$bandera = 0;
  	//foreach($postulacion->getArchivosPostulacion() as $archivo){
// 		if($archivo->getRuta()){
//  			$bandera = 1;
//  			$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'/'.$archivo->getRuta());
//  		}
//  		//$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'/'.$archivo->getRuta());
//	
// 	}
    
////   	$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'\Resumen.pdf');
////   	$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'\Resumen.pdf');
//  	if($bandera == 1){
//  		$pdf->merge('download');
//  	}else{
//  		$pdf->addPDF(sfConfig::get('app_path_subida_archivos').'\Resumen.pdf');
//  		$pdf->merge('download');
//  	}

  }
  
  protected function guardarPostulacion(PersonaConcurso $postulacion){
  	$array_pdfs = array();
  	sfConfig::set('sf_web_debug', false);
  	sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
  	require_once(sfConfig::get('app_path_lib')."/dompdf/dompdf_config.inc.php");
  	//
  	$html = get_partial('header_pdf');
  		  	$html .= get_partial('titulo_proyecto_pdf', array('postulacion'=>$postulacion));
  	$html .= get_partial('footer_pdf');
  	//
  	//        
  	$dompdf = new DOMPDF();
  	$dompdf->load_html($html);
  	$dompdf->set_paper("a4");
  	$dompdf->render();
  	//		//$dompdf->stream("Postulacion");
  	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/primera_hoja_'.$postulacion->getId().'.pdf', $dompdf->output());
  	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/primera_hoja_'.$postulacion->getId().'.pdf';
  	        //$this->redirect('postular/'.$postulacion->getId().'?etapa=5&paso=2');
  	
  	foreach($postulacion->getParticipantesPostulacion() as $participante_postulacion){
  	$html = get_partial('header_pdf');
  	$html .= get_partial('curriculum_pdf', array('persona'=>$participante_postulacion->getPersona()));
  	        $html .= get_partial('footer_pdf');    
  	$dompdf = new DOMPDF();
  	$dompdf->load_html($html);
  	        $dompdf->set_paper("a4");
  	$dompdf->render();
  	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculum_'.$postulacion->getId().$participante_postulacion->getPersona()->getId().'.pdf', $dompdf->output());
  	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculum_'.$postulacion->getId().$participante_postulacion->getPersona()->getId().'.pdf';
  	    }
  	
  	    if(count($postulacion->getPersonasExternas())>0){ 
  	// Carga personas externas en caso de que la postulacion cuente con ellas
  	$html = get_partial('header_pdf');
  		$html .= get_partial('curriculum_externo_pdf', array('personas_externas'=>$postulacion->getPersonasExternas() ));
  	    	$html .= get_partial('footer_pdf');
  	    	$dompdf = new DOMPDF();
  	$dompdf->load_html($html);
  	$dompdf->set_paper("a4");
  	    	$dompdf->render();
  	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculums_externos'.$postulacion->getId().'.pdf', $dompdf->output());
  	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculums_externos'.$postulacion->getId().'.pdf';
  	}
  	
  	if($postulacion->getTesistaId()){
  	// Si es que la postulacion tiene tesista
  	    	$html = get_partial('header_pdf');
  	$html .= get_partial('curriculum_tesista_pdf', array('persona'=>$postulacion->getTesista() ));
  		$html .= get_partial('footer_pdf');
  	$dompdf = new DOMPDF();
  	    	$dompdf->load_html($html);
  	    	$dompdf->set_paper("a4");
  	$dompdf->render();
  	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/curriculum_tesista'.$postulacion->getId().$postulacion->getTesistaId().'.pdf', $dompdf->output());
  	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/curriculum_tesista'.$postulacion->getId().$postulacion->getTesistaId().'.pdf';
  	 
  	if($postulacion->getTesista()->getRutaNotas()){
  	    		$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$postulacion->getTesista()->getRutaNotas();
  	}
  	}
  	
  	foreach($postulacion->getArchivosPostulacion() as $archivo){
  	if($archivo->getRuta()){
  	  			$bandera = 1;
  	  			$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$archivo->getRuta();
  	}
  	}
  	
  	$html = get_partial('header_pdf');
  	$html .= get_partial('resumen_recursos_pdf', array('postulacion'=> $postulacion));
  	$html .= get_partial('footer_pdf');
  	$dompdf = new DOMPDF();
  	$dompdf->load_html($html);
  	$dompdf->set_paper("a4");
  	$dompdf->render();
  	file_put_contents(sfConfig::get('app_path_subida_postulaciones').'/resumen_recursos_'.$postulacion->getId().'.pdf', $dompdf->output());
  	$array_pdfs[] = sfConfig::get('app_path_subida_postulaciones').'/resumen_recursos_'.$postulacion->getId().'.pdf';
  	
  	foreach($postulacion->getRecursos() as $recurso){
  	        	foreach($recurso->getArchivosRecurso() as $archivo_recurso){
  	if($archivo_recurso->getRuta()){
  	        			$array_pdfs[] = sfConfig::get('app_path_subida_archivos').'/'.$archivo_recurso->getRuta();
  	}
  	}
  	}
  	//$this->redirect('postular/'.$postulacion->getId().'?etapa=5&paso=2');
  	//$pdf->addPDF(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'.pdf');
  	
  	//$fpdf = new FPDF();
  	//        $fpdf->AddPage();
  	//        $fpdf->SetFont('Arial','B',16);
  	//        $fpdf->Cell(40,10,'�Hola, Mundo!');
  	//        $fpdf->Output(sfConfig::get('app_path_subida_postulaciones').'/postulacion_1.pdf','F');
  	$pdf = new concat_pdf();
  	//$pdf->setFiles(array(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'.pdf',sfConfig::get('app_path_subida_postulaciones').'/postulacion_2.pdf',sfConfig::get('app_path_subida_postulaciones').'/115UCV1104 - FINAL.pdf'));
  	$pdf->setFiles($array_pdfs);
  	$pdf->concat();
  	$pdf->Output(sfConfig::get('app_path_subida_postulaciones').'/postulacion_'.$postulacion->getId().'_'.$postulacion->getConcurso().'_'.$postulacion->getPersona()->getApellido1().'.pdf','F');
  	$postulacion->setRutaPdfPostulacion('postulacion_'.$postulacion->getId().'_'.$postulacion->getConcurso().'_'.$postulacion->getPersona()->getApellido1().'.pdf');
  	$postulacion->save();
  	//$pdf->Output('postulacion.pdf','D');
  }

//   public function executeNew(sfWebRequest $request)
//   {
//     $this->form = new PersonaConcursoForm();
//   }

//   public function executeCreate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST));

//     $this->form = new PersonaConcursoForm();

//     $this->processForm($request, $this->form);

//     $this->setTemplate('new');
//   }

//   public function executeEdit(sfWebRequest $request)
//   {
//     $this->forward404Unless($persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id'))), sprintf('Object persona_concurso does not exist (%s).', $request->getParameter('id')));
//     $this->form = new PersonaConcursoForm($persona_concurso);
//   }

//   public function executeUpdate(sfWebRequest $request)
//   {
//     $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
//     $this->forward404Unless($persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id'))), sprintf('Object persona_concurso does not exist (%s).', $request->getParameter('id')));
//     $this->form = new PersonaConcursoForm($persona_concurso);

//     $this->processForm($request, $this->form);

//     $this->setTemplate('edit');
//   }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($persona_concurso = Doctrine_Core::getTable('PersonaConcurso')->find(array($request->getParameter('id'))), sprintf('Object persona_concurso does not exist (%s).', $request->getParameter('id')));
    
    if($persona_concurso->getPersona()->getid() != $this->getUser()->getAttribute('id_persona')){
    	$this->redirect('persona/logout');
    }
    
    $persona_concurso->delete();
    $this->getUser()->setFlash("error", "La postulaci&oacute;n ha sido anulada satisfactoriamente.");
    $this->redirect('persona/seleccionConcurso');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $persona_concurso = $form->save();

      $this->redirect('postular/'.$persona_concurso->getConcurso()->getAcronimo());
    }
  }
}
