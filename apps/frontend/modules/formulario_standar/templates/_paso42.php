<?php $archivos = $form->getObject()->getArchivosPostulacion();?>
<fieldset class="archivo">
<legend>Evaluadores sugeridos</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'evaluadores_sugeridos'))?>
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/Evaluadores_sugeridos.doc')) ?> </div>
<br />
<label>Seleccione  el documento PDF: </label><?php echo $form['archivos']['evaluadores_sugeridos']['ruta']?><?php echo $form['archivos']['evaluadores_sugeridos']->renderHiddenFields(false)?>
</fieldset>
<fieldset class="archivo">
<legend>Evaluadores con conflictos de intereses</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'evaluadores_con_conflictos'))?>
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/Evaluadores_con_conflicto.doc')) ?> </div>
<br />
<label>Seleccione  el documento PDF: </label><?php echo $form['archivos']['evaluadores_con_conflictos']['ruta']?></label><?php echo $form['archivos']['evaluadores_con_conflictos']->renderHiddenFields(false)?>
</fieldset>