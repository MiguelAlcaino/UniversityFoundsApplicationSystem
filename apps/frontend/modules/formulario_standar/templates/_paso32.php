<fieldset>
<legend>Gastos de operaci&oacute;n</legend>
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
  <th>Insumos Computacionales</th>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_1']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_1']->renderHiddenFields(false)?></td>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_1']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_1']->renderHiddenFields(false)?>
  </td>
</tr>
<tr>
  <th>Reactivos e insumos de laboratorio</th>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_2']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_2']->renderHiddenFields(false)?></td>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_2']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_2']->renderHiddenFields(false)?>
  </td>
</tr>
<tr>
  <th>Libros y artículos de librería</th>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_3']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_3']->renderHiddenFields(false)?></td>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_3']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_3']->renderHiddenFields(false)?>
  </td>
</tr>
<tr>
  <th>Otros</th>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_5']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_1']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_5']->renderHiddenFields(false)?></td>
  <td><?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_5']['monto']?>
  <?php echo $form['recursos']['gastos_operacion']['detalles_recurso']['detalle_recurso_2']['detalles_gastos_operacion']['detalle_recurso_gasto_operacion_5']->renderHiddenFields(false)?>
  </td>
</tr>
<tr>
<th>Total Gastos de operaci&oacute;n (en pesos)</th>
<?php echo $form['recursos']['gastos_operacion']->renderHiddenFields(false)?>
<?php foreach($form['recursos']['gastos_operacion']['detalles_recurso'] as $detalle_recurso_form):?>
		<?php echo $detalle_recurso_form->renderHiddenFields(false)?>
	<td><?php echo $detalle_recurso_form['monto']->render(array('readonly'=>'readonly'))?></td>
<?php endforeach;?>
</tr>
<tr>
<td colspan="3"><?php if($form['recursos']['gastos_operacion']['archivo_recurso']['ruta']->getValue()):?>
<?php echo link_to(image_tag('pdf.gif').' Documento PDF subido', public_path('uploads/pdfs/'.$form['recursos']['gastos_operacion']['archivo_recurso']['ruta']->getValue()),'target = "_blank"')?>
	
<?php endif;?></td>
</tr>
<tr>
<td colspan="3">
<div class="archivos_patrones"> Formato: 
<?php switch($form->getObject()->getConcurso()->getAcronimo()){
  case 'di_pia':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_pia/Gastos_operacion _PIA.doc')); 
    break;
  case 'di_regular':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_regular/Gastos_operacion _DI_Regular.doc')); 
    break;
  case 'di_iniciacion':
    echo link_to(image_tag('word.gif').'Documento Word', public_path('archivo_patron/di_iniciacion/Gastos_operacion _iniciacion.doc')); 
    break;
}?>
</div>
<br />
<label>Justificaci&oacute;n de recursos en PDF(*): </label><?php echo $form['recursos']['gastos_operacion']['archivo_recurso']['ruta']?><?php echo $form['recursos']['gastos_operacion']['archivo_recurso']->renderHiddenFields(false) ?></td>
</tr>
<tr>
	<td colspan="3">
		
	</td>
</tr>
</tbody>
</table>
</fieldset>
