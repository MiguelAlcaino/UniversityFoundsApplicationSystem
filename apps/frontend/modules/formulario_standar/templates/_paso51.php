<table>
	<tr>
		<td align="left">
		<strong>Leyenda:</strong><br />	
		 <?php echo image_tag('ok')?><i> El item se encuentra completado.</i><br />
		 <?php echo image_tag('cancel')?><i> El item no ha sido completado. No le permitirá enviar la postulación.</i> <br />
		 <?php echo image_tag('error')?><i> El item no necesita ser completado para enviar la postulaci&oacute;n. Tenga en cuenta que esto denota la no solicitud de dicho item.</i> <br />
		 <?php echo image_tag('delete_icon')?><i> El item no cuenta con una justificación. No le permitirá enviar la postulación.</i>
		</td>
	</tr>
  <tr>
    <td align="left">
    <ul>
	<li><strong>Identificaci&oacute;n</strong></li>
		<ul>
			<li><?php echo $form->getObject()->getTitulo() ? image_tag('ok') : image_tag('cancel')?> T&iacute;tulo del proyecto</li>
		</ul>
		<?php $archivos = $form->getObject()->getArchivosPostulacion()?>
		<br />
	<li><strong>Formulaci&oacute;n</strong></li>
	<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_artes'):?>
	  <ul>
	    <li><?php echo $form['archivos']['resumen']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Resumen</li>
	    <li><?php echo $form['archivos']['objetivos']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Objetivos</li>
	    <li><?php echo $form['archivos']['marco_teorico']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Estado del arte</li>
	    <li><?php echo $form['archivos']['impacto']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Impacto</li>
	    <li><?php echo $form['archivos']['definicion_publico_objetivo']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Definición del público objetivo</li>
	    <li><?php echo $form['archivos']['resultados']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Resultados esperados</li>
	    <li><?php echo $form['archivos']['plan_de_trabajo']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Plan de trabajo </li>
	    <li><?php echo $form['archivos']['trabajo_adelantado']['ruta']->getValue() ? image_tag('ok') : image_tag('error')?> Trabajo adelantado </li>
	  </ul>
	<?php else:?>
	
		<ul>
			<li><?php echo $form['archivos']['resumen']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Resumen</li>
			<li><?php echo $form['archivos']['definicion_problema_y_solucion']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Definici&oacute;n del problema y soluci&oacute;n</li>
			<li><?php echo $form['archivos']['marco_teorico']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Marco Te&oacute;rico</li>
			<li><?php echo $form['archivos']['bibliografia']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Bibliograf&iacute;a</li>
			<li><?php echo $form['archivos']['hipotesis']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Hipotesis</li>
			<li><?php echo $form['archivos']['objetivos']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Objetivos</li>
			<li><?php echo $form['archivos']['metodologia']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Metodolg&iacute;a </li>
			<li><?php echo $form['archivos']['plan_de_trabajo']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Plan de trabajo </li>
			<li><?php echo $form['archivos']['resultados']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Resultados</li>
			<li><?php echo $form['archivos']['trabajo_adelantado']['ruta']->getValue() ? image_tag('ok') : image_tag('error')?> Trabajo adelantado </li>
		</ul>
	<?php endif;?>
	<?php $suma = 0;?>
	<?php foreach($form->getObject()->getRecursos() as $recurso):?>
	  <?php $suma = $suma + $recurso->getTotal(); ?>
	<?php endforeach;?>
	<br />
	<li><strong>Recursos</strong>. Total solicitado: $<?php echo number_format($suma,0,'','.')?></li>
		<ul>
            <?php foreach($form->getObject()->getRecursos() as $recurso):?>
            	<?php $archivo_recurso = $recurso->getArchivosRecurso()?>
                <li>
                <?php if($recurso->getItemConcurso()->getItem()->getAcronimo() == 'gastos_operacion'):?>
                  <?php 
                    if($recurso->getTotal() != 0 && $archivo_recurso[0]->getRuta()){
                      echo image_tag('ok');
                    }else{
                      if(!$archivo_recurso[0]->getRuta() && $recurso->getTotal() != 0){
                        echo image_tag('delete_icon');
                      }else{
                        echo image_tag('error');
                      }
                      
                      
                      }?>
                  <?php echo $recurso.'. Sin max.'?>: $<?php echo $recurso->getTotal()?>
                <?php else:?>
                   <?php 
                    if($archivo_recurso[0]->getRuta() && $recurso->getTotal() != 0){
                      if($recurso->excedePorcentaje()){
                        echo image_tag('cancel');
                      }else{
                        echo image_tag('ok');
                      }
                      
                    }else{
                      if($recurso->getTotal() == 0 && !$archivo_recurso[0]->getRuta()){
                        echo image_tag('error');
                      }else{
                        if(!$archivo_recurso[0]->getRuta()){
                          echo image_tag('delete_icon');
                        }else{
                          echo image_tag('cancel');
                        }
                      }
                      
                    }?> 
                    <?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral' && $recurso->getItemConcurso()->getItem()->getAcronimo() == 'viajes_y_viaticos'):?>
                      <?php echo $recurso.'. Max. '.$recurso->getItemConcurso()->getPorcentajeMaximo().'% aprox.'?>: $<?php echo number_format($recurso->getTotal(),0,'','.')?>
                    <?php else:?>
                      <?php echo $recurso.'. Max. '.$recurso->getItemConcurso()->getPorcentajeMaximo().'%'?>: $<?php echo number_format($recurso->getTotal(),0,'','.')?>
                    <?php endif;?>
                  <?php if($recurso->excedePorcentaje()):?>
                    <span style="font-size: x-small; color: red">Este item excede su porcentaje máximo del total solicitado.</span>
                  <?php endif;?>
                <?php endif;?>
                </li>
            <?php endforeach;?>
		</ul>
		<br />
	<li><strong>Anexos</strong></li>
		<ul>
		  <?php if($form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4 || $form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 3):?>
			<li><?php echo $form['archivos']['carta_compromiso']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Carta de compromiso</li>
            <li><?php echo $form['archivos']['carta_respaldo_ua']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Carta de respaldo de la Unidad Acad&eacute;mica</li>
          
            <?php if($form->getObject()->getPersona()->getTipoProfesor()->getNumeroTipo() == 4): ?>
                <li><?php echo $form['archivos']['certificado_titulo']['ruta']->getValue() ? image_tag('ok') : image_tag('cancel')?> Certificado de t&iacute;tulo de max. grado acad&eacute;mico</li>
            <?php endif;?>
          <?php endif;?>
            <li><?php echo $form['archivos']['evaluadores_sugeridos']['ruta']->getValue() ? image_tag('ok') : image_tag('error')?> Evaluadores sugeridos</li>
            <li><?php echo $form['archivos']['evaluadores_con_conflictos']['ruta']->getValue() ? image_tag('ok') : image_tag('error')?> Evaluadores con conflictos de intereses</li>
		</ul>
	</ul>
    </td>
  </tr>
</table>

