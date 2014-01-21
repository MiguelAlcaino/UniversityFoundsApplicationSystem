<fieldset class="archivo">
<legend>Resumen</legend>
<?php $archivos= $form->getObject()->getArchivosPostulacion();?>
<?php //include_partial('formulario_standar/documento_subido_descargable', array('archivos' => $form->getObject()->getArchivosPostulacion(), 'indice' => 0))?>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'resumen'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Resumen'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['resumen']['ruta']->render()?> <?php echo $form['archivos']['resumen']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
