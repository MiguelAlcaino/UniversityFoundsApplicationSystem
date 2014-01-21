<?php if($persona_concurso->getConvenio()):?>
  <?php echo link_to(image_tag('pdf.gif').' Descargar convenio', public_path('uploads/convenios/'.$persona_concurso->getCodigoNumerico().'.pdf'))?>
<?php else:?>
  No hay convenio
<?php endif;?>
