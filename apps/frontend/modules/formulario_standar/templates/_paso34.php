<fieldset>
<legend>Viajes</legend>
<table class="tabla_recurso">
<thead>
	<tr>
	<th>Meses</th>
	<?php for($i=0; $i<2; $i++):?>
		<th>Semestre <?php echo ($i+1)?></th>
	<?php endfor;?>
	</tr>
</thead>
<tbody>
<tr>
<th>Viajes nacionales e internacionales (en pesos)</th>
<?php echo $form['recursos']['viajes_y_viaticos']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['viajes_y_viaticos']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="3"><?php if($form['recursos']['viajes_y_viaticos']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['viajes_y_viaticos']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="3">
<div class="archivos_patrones"> Formato:
<?php switch($form->getObject()->getConcurso()->getAcronimo()){
  case 'di_pia':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_pia/Viajes_PIA.doc')); 
    break;
  case 'di_regular':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_regular/Viajes_DI_Regular.doc')); 
    break;
  case 'di_iniciacion':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_iniciacion/Viajes_iniciacion.doc')); 
    break;
}?>
</div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['viajes_y_viaticos']['archivo_recurso']['ruta']?><?php echo $form['recursos']['viajes_y_viaticos']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>
<tr>
	<td colspan="3"> </td>
</tr>
</tbody>
</table>
</fieldset>
