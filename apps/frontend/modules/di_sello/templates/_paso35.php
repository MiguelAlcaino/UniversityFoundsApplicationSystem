<fieldset>
<legend>Inscripciones a congresos u otros eventos de difusi&oacute;n</legend>
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
<th>Inscripciones a congresos u otros eventos de difusi&oacute;n (en pesos)</th>
<?php echo $form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="10"><?php if($form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="10">
<div class="archivos_patrones"> Formato: <?php echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_sello/Congresos_u_otros_eventos_de_difusion_sello_valorico.doc')) ?> </div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']['archivo_recurso']['ruta']?><?php echo $form['recursos']['inscripciones_a_congresos_u_otros_eventos_de_difusion']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>

</tbody>
</table>
</fieldset>
