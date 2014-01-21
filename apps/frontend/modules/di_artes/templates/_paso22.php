<?php $archivos = $form->getObject()->getArchivosPostulacion();?>

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
<legend>Estado del arte</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'marco_teorico'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Marco_teorico'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['marco_teorico']['ruta']?> <?php echo $form['archivos']['marco_teorico']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>

<fieldset class="archivo">
<legend>Impacto</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'impacto'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Impacto'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['impacto']['ruta']?> <?php echo $form['archivos']['impacto']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>

<fieldset class="archivo">
<legend>Definición del público objetivo</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'definicion_publico_objetivo'))?>
<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Definicion_publico objetivo'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['definicion_publico_objetivo']['ruta']?> <?php echo $form['archivos']['definicion_publico_objetivo']->renderHiddenFields(false)?>
<br />
<span class="ayuda_formulacion">
</span>
</fieldset>

<fieldset class="archivo">
<legend>Resultados esperados</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'resultados'))?>

<?php include_partial('formulario_standar/patron_archivo_descargable', array('nombre_archivo' => 'Resultados'))?>
<label>Seleccione el documento PDF (*) </label><?php echo $form['archivos']['resultados']['ruta']?> <?php echo $form['archivos']['resultados']->renderHiddenFields(false)?>
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
