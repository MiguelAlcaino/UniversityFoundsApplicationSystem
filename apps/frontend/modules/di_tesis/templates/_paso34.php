<fieldset>
<legend>Incripciones a congresos</legend>
<table class="tabla_recurso">
<thead>
	<tr>
	<th width="40%">Item</th>
	<?php for($i=0; $i<2; $i++):?>
		<th>Semestre <?php echo ($i+1)?></th>
	<?php endfor;?>
	</tr>
</thead>
<tbody>
<tr>
<th>Incripciones a congresos (en pesos)</th>
<?php echo $form['recursos']['inscripciones_a_congresos']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['inscripciones_a_congresos']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="10"><?php if($form['recursos']['inscripciones_a_congresos']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['inscripciones_a_congresos']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="10">
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_tesis/Congresos_viaje_e_inscripcion_Tesis_doctoral.doc')) ?> </div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['inscripciones_a_congresos']['archivo_recurso']['ruta']?><?php echo $form['recursos']['inscripciones_a_congresos']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>
<tr>
	<td colspan="3"></td>
</tr>
</tbody>
</table>
</fieldset>
