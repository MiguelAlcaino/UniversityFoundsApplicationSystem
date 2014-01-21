<?php $archivos = $form->getObject()->getArchivosPostulacion();?>
<fieldset class="archivo">
<legend>Trabajo adelantado</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'trabajo_adelantado'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Trabajo_adelantado'))?>
<label>Seleccione el documento PDF </label><?php echo $form['archivos']['trabajo_adelantado']['ruta']?> <?php echo $form['archivos']['trabajo_adelantado']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">

</span>
</fieldset>
