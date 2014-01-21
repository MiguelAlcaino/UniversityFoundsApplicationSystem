<?php $archivos = $form->getObject()->getArchivosPostulacion();?>
<fieldset class="archivo">
<legend>Carta de compromiso</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'carta_compromiso'))?>
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/Carta_compromiso.doc')) ?> </div>
<br />
<label>Seleccione  el documento PDF (*): </label><?php echo $form['archivos']['carta_compromiso']['ruta']?><?php echo $form['archivos']['carta_compromiso']->renderHiddenFields(false)?>
</fieldset>
<fieldset class="archivo">
<legend>Carta de respaldo de la Unidad Ac&aacute;demica</legend>
<?php include_partial('formulario_standar/documento_subido_descargable', array('form' => $form, 'indice' => 'carta_respaldo_ua'))?>
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/Carta_respaldo_ua.doc')) ?> </div>
<br />
<label>Seleccione  el documento PDF (*): </label><?php echo $form['archivos']['carta_respaldo_ua']['ruta']?><?php echo $form['archivos']['carta_respaldo_ua']->renderHiddenFields(false)?>
</fieldset>
