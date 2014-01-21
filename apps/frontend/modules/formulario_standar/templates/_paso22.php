<?php $archivos = $form->getObject()->getArchivosPostulacion();?>
<fieldset class="archivo">
<legend>Definici&oacute;n del problema y soluci&oacute;n</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'definicion_problema_y_solucion'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Definicion_problema_solucion'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['definicion_problema_y_solucion']['ruta']?> <?php echo $form['archivos']['definicion_problema_y_solucion']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
<fieldset class="archivo">
<legend>Marco Te&oacute;rico</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'marco_teorico'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Marco_teorico'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['marco_teorico']['ruta']?> <?php echo $form['archivos']['marco_teorico']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
<fieldset class="archivo">
<legend>Bibliograf&iacute;a</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'bibliografia'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Bibliografia'))?>

<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['bibliografia']['ruta']?> <?php echo $form['archivos']['bibliografia']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion"></span>
</fieldset>
<fieldset class="archivo">
<legend>Hip&oacute;tesis</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'hipotesis'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Hipotesis'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['hipotesis']['ruta']?> <?php echo $form['archivos']['hipotesis']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
<fieldset class="archivo">
<legend>Objetivos</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'objetivos'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Objetivos'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['objetivos']['ruta']?> <?php echo $form['archivos']['objetivos']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
<fieldset class="archivo">
<legend>Metodolog&iacute;a</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'metodologia'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Metodologia'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['metodologia']['ruta']?> <?php echo $form['archivos']['metodologia']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>

<fieldset class="archivo">
<legend>Plan de trabajo</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'plan_de_trabajo'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Plan_de_trabajo'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['plan_de_trabajo']['ruta']?> <?php echo $form['archivos']['plan_de_trabajo']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion"></span>
</fieldset>

<fieldset class="archivo">
<legend>Resultados</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'resultados'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Resultados'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['resultados']['ruta']?> <?php echo $form['archivos']['resultados']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>
