<script languaje="javascript">
function sumarGastosOperacion(campo, periodo){
if(campo.value == ''){
  campo.value = "0";
}
<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_sello_valorico'):?>
valor_para_sumar = parseInt(campo.value);
suma_total = 0;
for(i=0;i<5;i++){
    campo_monto_i=document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_'+periodo+'_detalles_gastos_operacion_detalle_recurso_gasto_operacion_'+(i+1)+'_monto');
    //alert(campo_monto_i.id);
    suma_total = suma_total + parseInt(campo_monto_i.value);
  
}
campo_monto_detalle_recurso = document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_'+periodo+'_monto');
campo_monto_detalle_recurso.value = suma_total;
<?php else:?>
valor_para_sumar = parseInt(campo.value);
suma_total = 0;
for(i=0;i<5;i++){
  if((i+1) != 4){
    campo_monto_i=document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_'+periodo+'_detalles_gastos_operacion_detalle_recurso_gasto_operacion_'+(i+1)+'_monto');
    suma_total = suma_total + parseInt(campo_monto_i.value);
  }
}
campo_monto_detalle_recurso = document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_'+periodo+'_monto');
respaldo_valor_detalle_recurso = campo_monto_detalle_recurso.value;
campo_monto_detalle_recurso.value = suma_total;
<?php endif;?>

gasto_op1 = document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_1_monto');
gasto_op2 = document.getElementById('persona_concurso_recursos_gastos_operacion_detalles_recurso_detalle_recurso_2_monto');
<?php $suma_otros_recursos = 0;?>
<?php foreach($form->getObject()->getRecursos() as $recurso):?>
  <?php foreach($recurso->getDetallesRecurso() as $detalle_recurso):?>
    <?php if($recurso->getItemConcurso()->getItem()->getAcronimo() != 'gastos_operacion'):?>
      <?php $suma_otros_recursos = $suma_otros_recursos + $detalle_recurso->getMonto()?>
    <?php endif;?>
  <?php endforeach;?>
<?php endforeach;?>
gastos_op_total = parseInt(gasto_op1.value) + parseInt(gasto_op2.value);
if(gastos_op_total > (<?php echo ($form->getObject()->getConcurso()->getMontoMaximo() - $suma_otros_recursos)?>)){
  alert('Ha excedido el monto. La suma de los montos de sus recursos es de $'+(<?php echo $suma_otros_recursos?>+gastos_op_total)+', el presupuesto máximo de este concurso es de $'+<?php echo $form->getObject()->getConcurso()->getMontoMaximo()?>+'. Disminuya algún item presentado en este recurso para proceder.');
  campo.value = '0';
  campo_monto_detalle_recurso.value = respaldo_valor_detalle_recurso;
}
//alert(<?php echo $suma_otros_recursos?>);

}

function validadorRecursos(campo, acronimo_item, monto_max_item, periodo){
  if(campo.value == ''){
    campo.value = "0";
  }
  respaldo_valor_campo = campo.value;
  <?php $suma_otros_recursos = 0;?>
  var array_recursos = new Array();
  <?php foreach($form->getObject()->getRecursos() as $recurso):?>
    array_recursos['<?php echo $recurso->getItemConcurso()->getItem()->getAcronimo()?>'] = new Array();
    <?php foreach($recurso->getDetallesRecurso() as $detalle_recurso):?>
      <?php $suma_otros_recursos = $suma_otros_recursos + $detalle_recurso->getMonto()?>
      array_recursos['<?php echo $recurso->getItemConcurso()->getItem()->getAcronimo()?>'][<?php echo $detalle_recurso->getPeriodo()?>] = <?php echo $detalle_recurso->getMonto()?>; 
    <?php endforeach;?>
  <?php endforeach;?>
  if(acronimo_item == 'alumno_ayudante' || acronimo_item == 'personal_tecnico_y_apoyo'){
    detalle_recurso_1 = document.getElementById('persona_concurso_recursos_alumno_ayudante_detalles_recurso_detalle_recurso_1_monto');
    detalle_recurso_2 = document.getElementById('persona_concurso_recursos_alumno_ayudante_detalles_recurso_detalle_recurso_2_monto');
    detalle_recurso_3 = document.getElementById('persona_concurso_recursos_personal_tecnico_y_apoyo_detalles_recurso_detalle_recurso_1_monto');
    detalle_recurso_4 = document.getElementById('persona_concurso_recursos_personal_tecnico_y_apoyo_detalles_recurso_detalle_recurso_2_monto');
    suma_detalle_recursos = parseInt(detalle_recurso_1.value) + parseInt(detalle_recurso_2.value) + parseInt(detalle_recurso_3.value) + parseInt(detalle_recurso_4.value);
  }else{
    detalle_recurso_1 = document.getElementById('persona_concurso_recursos_'+acronimo_item+'_detalles_recurso_detalle_recurso_1_monto');
    detalle_recurso_2 = document.getElementById('persona_concurso_recursos_'+acronimo_item+'_detalles_recurso_detalle_recurso_2_monto');
    suma_detalle_recursos = parseInt(detalle_recurso_1.value) + parseInt(detalle_recurso_2.value);
  }
  //alert(detalle_recurso_1.value);
  
  //suma= <?php echo $suma_otros_recursos?> - suma_detalle_recursos;
  suma = 0;
  for(var i in array_recursos){
    //alert(array_recursos[i]);
    if(i != acronimo_item){
      suma = suma + array_recursos[i][1] + array_recursos[i][2];
    }
  }
  detalle_recurso_1 = document.getElementById('persona_concurso_recursos_'+acronimo_item+'_detalles_recurso_detalle_recurso_1_monto');
  detalle_recurso_2 = document.getElementById('persona_concurso_recursos_'+acronimo_item+'_detalles_recurso_detalle_recurso_2_monto');
  suma_detalles = parseInt(detalle_recurso_1.value) + parseInt(detalle_recurso_2.value);
  //alert(suma);
  if((suma + suma_detalles) > <?php echo $form->getObject()->getConcurso()->getMontoMaximo()?>){
    campo.value = '0';
    alert('La suma de sus items es $'+(suma + suma_detalles)+'. Este monto excede el máximo del presupuesto otorgado por este concurso, que corresponde a $'+<?php echo $form->getObject()->getConcurso()->getMontoMaximo()?>+'. Modifique los montos de sus items para poder proceder.');
  }else{
    if( suma_detalles >  monto_max_item){
      campo.value = '0';
      alert('Ha excedido el monto máximo para este item, que corresponde a $'+monto_max_item);
    }
  }
}
</script>
<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_pia'):?>
<?php if($form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 1):?>
	    <?php $tipo_pia = '(Iniciación)';?>  
	  <?php else:?>
	    <?php $tipo_pia = '(Regular)';?>  
	  <?php endif;?> 
	  <h1><?php echo $form->getObject()->getConcurso().' '.$tipo_pia?></h1>
  <?php else:?>  
<h1><?php echo $form->getObject()->getConcurso()?></h1>
<?php endif;?>
<table class="centrado" id="contenido_postulacion">
	<thead id="tabs_etapas">
		<tr>
			<th class="<?php echo $etapa ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Identificaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=1&paso=1')?></th>
			<th class="<?php echo $etapa ==6 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Investigador', 'postular/'.$form->getObject()->getId().'?etapa=6&paso=1')?></th>
			<th class="<?php echo $etapa ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Formulaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=2&paso=1')?></th>
			<th class="<?php echo $etapa ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Recursos', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=1')?></th>
			<?php if($form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4 || $form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 3):?>
			<th class="<?php echo $etapa ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Anexos', 'postular/'.$form->getObject()->getId().'?etapa=4&paso=1')?></th>
			<?php else:?>
			<th class="<?php echo $etapa ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Anexos', 'postular/'.$form->getObject()->getId().'?etapa=4&paso=2')?></th>
			<?php endif;?>
			<th class="<?php echo $etapa ==5 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>" ><?php echo link_to('Revisi&oacute;n / Env&iacute;o', 'postular/'.$form->getObject()->getId().'?etapa=5&paso=1')?> </th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="6" id="contenido_etapa">
				<table class="centrado" id="tabs_pasos">
				<thead>
					<tr >
				<?php switch ($etapa){
					case 1: ?>
						<th width="100%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Identificaci&oacute;n del proyecto','postular/'.$form->getObject()->getId().'?etapa=1&paso=1')?></th>
						<?php break;?>
					<?php case 2: ?>
						<th width="33%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Resumen', 'postular/'.$form->getObject()->getId().'?etapa=2&paso=1')?></th>
						<th width="33%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Formulaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=2&paso=2')?></th>
						<th width="34%" class="<?php echo $paso ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 3: Trabajo adelantado', 'postular/'.$form->getObject()->getId().'?etapa=2&paso=3')?></th>
						<?php break;?>
					<?php case 3: ?>
						<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'): ?>
							<th width="25%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Resumen recursos', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=1')?></th>
						<?php else:?>
							<th width="20%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Resumen recursos', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=1')?></th>
						<?php endif;?>
						<?php if(($form->getObject()->getConcurso()->getAcronimo() == 'di_regular' || $form->getObject()->getConcurso()->getAcronimo() == 'di_iniciacion') || $form->getObject()->getConcurso()->getAcronimo() == 'di_pia'):?>
							<th width="20%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Gastos de Operaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=2')?></th>
							<th width="20%" class="<?php echo $paso ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 3: Personal', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=3')?></th>
							<th width="20%" class="<?php echo $paso ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 4: Viajes', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=4')?></th>
							<th width="20%" class="<?php echo $paso ==5 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 5: Incripciones a congresos', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=5')?></th>
						<?php else: ?>
							<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_artes'):?>
								<th width="20%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Gastos de Operaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=2')?></th>
								<th width="20%" class="<?php echo $paso ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 3: Personal', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=3')?></th>
								<th width="20%" class="<?php echo $paso ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 4: Viajes', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=4')?></th>
								<th width="20%" class="<?php echo $paso ==5 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 5: Incripciones a eventos de difusi&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=5')?></th>
							<?php else:?>
								<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'): ?>
									<th width="25%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Gastos de Operaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=2')?></th>
									<th width="25%" class="<?php echo $paso ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 3: Viajes', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=3')?></th>
									<th width="25%" class="<?php echo $paso ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 4: Incripciones a congresos', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=4')?></th>
									<?php else:?>
										<th width="20%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Gastos de Operaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=2')?></th>
										<th width="20%" class="<?php echo $paso ==3 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 3: Personal', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=3')?></th>
										<th width="20%" class="<?php echo $paso ==4 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 4: Viajes', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=4')?></th>
										<th width="20%" class="<?php echo $paso ==5 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 5: Incripciones a congresos u otros eventos de difusi&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=3&paso=5')?></th>
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
						<?php break; ?>
					<?php case 4:?>
					  <?php if($form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4 || $form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 3):?>
						<th width="50%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Anexos', 'postular/'.$form->getObject()->getId().'?etapa=4&paso=1')?></th>
						<th width="50%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Evaluadores', 'postular/'.$form->getObject()->getId().'?etapa=4&paso=2')?></th>
						<?php else:?>
						  <th width="50%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Evaluadores', 'postular/'.$form->getObject()->getId().'?etapa=4&paso=2')?></th>
						<?php endif;?>
						<?php break;?>
					<?php case 5:?>
						<th width="50%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Revisi&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=5&paso=1')?></th>
						<th width="50%" class="<?php echo $paso ==2 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 2: Enviar postulaci&oacute;n', 'postular/'.$form->getObject()->getId().'?etapa=5&paso=2')?></th>
						<?php break;?>
					<?php case 6:?>
						<th width="100%" class="<?php echo $paso ==1 ? 'pestana_etapa_seleccionada': 'pestana_etapa_no_seleccionada'?>"><?php echo link_to('Paso 1: Investigador(a) responsable','postular/'.$form->getObject()->getId().'?etapa=6&paso=1')?></th>
					<?php break; ?>
				<?php } ?>
					</tr>
				</thead>
				</table>
				<table class="centrado" id="contenido_paso">
				<tr>
				<td >
				<?php if($etapa == 2 || $etapa == 4):?>
					<fieldset style="text-align: left; font-size: 11px">Tenga en cuenta: Si adjunta un nuevo archivo, éste sobreescribirá al anterior.<br />
					 Los documentos debe ser subidos en formato PDF. Le recomendamos <a href="http://sourceforge.net/projects/pdfcreator/files/latest/download" target="_blank">PDFCreator</a> para "imprimir" sus documentos en PDF. <i><a href="http://www.vriea.ucv.cl/wp-content/uploads/2012/01/Manual-de-PDFCreator.pdf" target="_blank">M&aacute;s informaci&oacute;n.</a></i> </fieldset>
				<?php else:?>
					<?php if($etapa == 3 && $paso > 1):?>
					<fieldset  style="text-align: left; font-size: 11px">Tenga en cuenta: Si adjunta un nuevo archivo, éste sobreescribirá al anterior.<br />
					 Los documentos debe ser subidos en formato PDF. Le recomendamos <a href="http://sourceforge.net/projects/pdfcreator/files/latest/download" target="_blank">PDFCreator</a> para "imprimir" sus documentos en PDF. <i><a href="http://www.vriea.ucv.cl/wp-content/uploads/2012/01/Manual-de-PDFCreator.pdf" target="_blank">M&aacute;s informaci&oacute;n.</a></i> </fieldset>
					<?php endif;?>
				<?php endif;?>
				<?php if($etapa != 5 && $etapa != 6):?>
					<form action="<?php echo url_for('persona/updatePostulacion?id_postulacion='.$form->getObject()->getId().'&etapa='.$etapa.'&paso='.$paso)?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> >
					<?php if (!$form->getObject()->isNew()): ?>
						<?php echo $form->renderHiddenFields(false)?>
						<input type="hidden" name="sf_method" value="put" />
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($sf_user->hasFlash('error')): ?>
				  <div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
				<?php endif ?>
				<?php if ($sf_user->hasFlash('notice')): ?>
				  <div class="flash_notice"><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></div>
				<?php endif ?>
				<?php 	
					if($etapa == 3){
					  $suma_recursos = 0;
					  foreach($form->getObject()->getRecursos() as $recurso){
					    $suma_recursos = $suma_recursos + $recurso->getTotal();
					  }
					  echo "<h3>Presupuesto máximo para este concurso: $".number_format($form->getObject()->getConcurso()->getMontoMaximo(),0,'','.').".<br /> Presupuesto restante: $".number_format(($form->getObject()->getConcurso()->getMontoMaximo()-$suma_recursos),0,'','.')."</h3>";
    						if(($form->getObject()->getConcurso()->getAcronimo() == 'di_regular' || $form->getObject()->getConcurso()->getAcronimo() == 'di_iniciacion') || $form->getObject()->getConcurso()->getAcronimo() == 'di_pia'){
    							include_partial('formulario_standar/paso'.$etapa.$paso, array('form' => $form));
    						}else{
    							if($form->getObject()->getConcurso()->getAcronimo() == 'di_artes'){
    								include_partial('di_artes/paso'.$etapa.$paso, array('form' => $form));
    							}else{
    								if($form->getObject()->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'){
    									include_partial('di_tesis/paso'.$etapa.$paso, array('form' => $form));
    								}else{
    									include_partial('di_sello/paso'.$etapa.$paso, array('form' => $form));
    								}
    							}
    						}
					}else{
					   if( ($etapa == 4 && $paso == 1) && $persona->getTipoProfesor()->getNumeroTipo() == 4 ){
					       include_partial('formulario_standar/paso'.$etapa.$paso.'_pnj', array('form' => $form));
					   }else{
					    if($form->getObject()->getConcurso()->getAcronimo() == 'di_artes' && ($etapa == 2 && $paso == 2)){
					      include_partial('di_artes/paso'.$etapa.$paso, array('form' => $form));
					    }else{
					       include_partial('formulario_standar/paso'.$etapa.$paso, array('form' => $form));
					       }
					   }
					}
				?>
				<?php if(($etapa != 5 && $etapa != 6)):?>
				  <?php if($etapa == 3 && $paso == 1):?>
				    
				  <?php else:?>
				    <input type="submit" value="Guardar" <?php if($etapa == 3):?><?php endif;?> /> 
				  <?php endif;?>
				<?php endif;?>
				</form>
				</td>
				</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
