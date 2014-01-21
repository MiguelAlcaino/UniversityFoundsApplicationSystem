<fieldset>
<legend>Alumno ayudante</legend>
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
<th>Alumno ayudante (en pesos)</th>
<?php echo $form['recursos']['alumno_ayudante']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['alumno_ayudante']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="3"><?php if($form['recursos']['alumno_ayudante']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['alumno_ayudante']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="3">
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_sello/Alumno_ayudante_sello_valorico.doc')) ?> </div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['alumno_ayudante']['archivo_recurso']['ruta']?><?php echo $form['recursos']['alumno_ayudante']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>
<tr>
	<td colspan="3"></td>
</tr>
</tbody>
</table>
</fieldset>

<fieldset>
<legend>Personal T&eacute;cnico y/o de apoyo (en pesos)</legend>
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
<th>Personal T&eacute;cnico y/o de apoyo (en pesos)</th>
<?php echo $form['recursos']['personal_tecnico_y_apoyo']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['personal_tecnico_y_apoyo']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="3"><?php if($form['recursos']['personal_tecnico_y_apoyo']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['personal_tecnico_y_apoyo']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="3">
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_sello/Personal_tecnico_sello_valorico.doc')) ?> </div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['personal_tecnico_y_apoyo']['archivo_recurso']['ruta']?><?php echo $form['recursos']['personal_tecnico_y_apoyo']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>
<tr>
	<td colspan="3"></td>
</tr>
</tbody>
</table>
</fieldset>
