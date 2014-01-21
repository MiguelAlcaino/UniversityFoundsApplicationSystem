<form action="<?php echo url_for('postulacion/confirmarPassword?id_postulacion='.$form->getObject()->getId())?>" method="post">
<?php echo link_to(image_tag('pdf.gif').' Ver borrador de la postulaci&oacute;n','postulacion/crearPDF?id_postulacion='.$form->getObject()->getId())?>
<br /><br />

<?php switch($form->getObject()->getConcurso()->getAcronimo()){
  case 'di_regular':
    include_partial('di_regular/compromisos', array('form' => $form));
    break;
  case 'di_artes':
    include_partial('di_artes/compromisos', array('form' => $form));
    break;
  case 'di_iniciacion':
    include_partial('di_iniciacion/compromisos', array('form' => $form));
    break;
  case 'di_sello_valorico':
    include_partial('di_sello/compromisos', array('form' => $form));
    break;
  case 'di_pia':
    include_partial('di_pia/compromisos', array('form' => $form));
    break;
  case 'di_apoyo_tesis_doctoral':
    include_partial('di_tesis/compromisos', array('form' => $form));
    break;
  }
?>
<?php if($form->validarPostulacion()):?>
<input type="submit" value="Aceptar compromisos y enviar Postulaci&oacute;n"  onclick="if(confirm('Esta seguro de que desea enviar la postulacion?.\nTenga en cuenta que no podra volver a modificarla.')) return true; else return false;"/>
<?php else:?>
	<div> Su postulaci&oacute;n a&uacute;n no pude ser enviada, ya que uno o m&aacute;s campos requeridos no han sido completados.</div>
<?php endif;?>
</form>
