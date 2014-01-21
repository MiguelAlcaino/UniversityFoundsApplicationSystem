<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php slot('calcular_nota', 'onload="calcularNota()"')?>
<?php slot('tooltip')?>
<script>
        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
    </script>
<?php end_slot()?>

<script languaje="javascript">
  var concurso_porcentaje_productividad = <?php echo $form->getObject()->getPersonaConcurso()->getConcurso()->getPorcentajeProductividad()?>;
  var concurso_porcentaje_formulacion = <?php echo $form->getObject()->getPersonaConcurso()->getConcurso()->getPorcentajeFormulacion()?>;
  var porcentajes_productividad = {
  <?php $i=0?>
    <?php foreach($form->getObject()->getPersonaConcurso()->getConcurso()->getPorcentajesProductividad() as $porcentaje_productividad_concurso):?>
      <?php echo $porcentaje_productividad_concurso->getTipoProductividad()?> : <?php echo $porcentaje_productividad_concurso->getPorcentaje()?>,<?php echo "\n"?>
<?php endforeach?>
  
  };
  
  var porcentajes_formulacion = {
  <?php $i=0;?>
  <?php foreach($form->getObject()->getPersonaConcurso()->getConcurso()->getConcursoTipoArchivos() as $concurso_tipo_archivo):?>
    <?php foreach($concurso_tipo_archivo->getPorcentajesEvaluacion() as $porcentaje_evaluacion):?>
      <?php if($concurso_tipo_archivo->getTipoArchivo()->getAcronimo() == 'definicion_problema_y_solucion'):?>
        definicion_problema_y_solucion_<?php echo $i?> : <?php echo $porcentaje_evaluacion->getPorcentajeEvaluacion()?><?php $i++?>,<?php echo "\n"?>
      <?php else:?>
        <?php echo $concurso_tipo_archivo->getTipoArchivo()->getAcronimo()?> : <?php echo $porcentaje_evaluacion->getPorcentajeEvaluacion()?>,<?php echo "\n"?>
      <?php endif;?>
    <?php endforeach;?>
  <?php endforeach;?>};
  
  function calcularNota(){
    var nota_productividad =
    <?php foreach($form->getObject()->getPersonaConcurso()->getConcurso()->getPorcentajesProductividad() as $porcentaje_productividad_concurso):?>
        parseInt(document.getElementById('evaluacion_notas_productividad_<?php echo $porcentaje_productividad_concurso->getTipoProductividad()?>_nota').value)*(porcentajes_productividad['<?php echo $porcentaje_productividad_concurso->getTipoProductividad()?>']/100)+
    <?php endforeach?>0;
    //alert(parseInt(nota_productividad));
    //evaluacion_notas_archivos_postulacion_definicion_problema_y_solucion_1_nota
  <?php $i=0;?>
  var nota_formulacion =
  <?php foreach($form->getObject()->getPersonaConcurso()->getConcurso()->getConcursoTipoArchivos() as $concurso_tipo_archivo):?>
    <?php foreach($concurso_tipo_archivo->getPorcentajesEvaluacion() as $porcentaje_evaluacion):?>
      <?php if($concurso_tipo_archivo->getTipoArchivo()->getAcronimo() == 'definicion_problema_y_solucion'):?>
        parseInt(document.getElementById('evaluacion_notas_archivos_postulacion_definicion_problema_y_solucion_<?php echo $i?>_nota').value)*(porcentajes_formulacion['definicion_problema_y_solucion_<?php echo $i?>']/100)+<?php $i++?>
      <?php else:?>
        parseInt(document.getElementById('evaluacion_notas_archivos_postulacion_<?php echo $concurso_tipo_archivo->getTipoArchivo()->getAcronimo()?>_nota').value)*(porcentajes_formulacion['<?php echo $concurso_tipo_archivo->getTipoArchivo()->getAcronimo()?>']/100)+
      <?php endif;?>
    <?php endforeach;?>
  <?php endforeach;?>0;

    var campo_nota = document.getElementById('evaluacion_nota');
    campo_nota.value = parseInt(nota_productividad*(concurso_porcentaje_productividad/100) + nota_formulacion*(concurso_porcentaje_formulacion/100));
  }

function sumarGastosOperacion(id_recurso, periodo){
  var campo_1 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_ajustes_detalles_recursos_gastos_operacion_1_monto_aprobado');
  var campo_2 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_ajustes_detalles_recursos_gastos_operacion_2_monto_aprobado');
  var campo_3 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_ajustes_detalles_recursos_gastos_operacion_3_monto_aprobado');
  var campo_4 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_ajustes_detalles_recursos_gastos_operacion_4_monto_aprobado');
  var campo_5 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_ajustes_detalles_recursos_gastos_operacion_5_monto_aprobado');
  var suma = 0;
  if(campo_4 == null){
    suma = parseInt(campo_1.value)+parseInt(campo_2.value)+parseInt(campo_3.value)+parseInt(campo_5.value);
  }else{
    suma = parseInt(campo_1.value)+parseInt(campo_2.value)+parseInt(campo_3.value)+parseInt(campo_4.value)+parseInt(campo_5.value);
  }
  var monto_total_go_periodo = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_'+periodo+'_monto_aprobado');
  monto_total_go_periodo.value = suma;
  
  var campo_total_go = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_monto_aprobado');
  var go_1 =document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_1_monto_aprobado');
  var go_2 =document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_2_monto_aprobado');
  
  campo_total_go.value = parseInt(go_1.value) + parseInt(go_2.value);
}

function sumarRecurso(id_recurso){
  //evaluacion_ajustes_recursos_2_ajustes_detalles_recursos_1_monto_aprobado
  var periodo1 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_1_monto_aprobado');
  var periodo2 = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_ajustes_detalles_recursos_2_monto_aprobado');
  var total_recurso = document.getElementById('evaluacion_ajustes_recursos_'+id_recurso+'_monto_aprobado');
  
  total_recurso.value = parseInt(periodo1.value) + parseInt(periodo2.value);
}

function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
} 

</script>
<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@evaluacion_evaluacion_recursos1') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    <?php $j = 0; $array_evaluaciones = array();?>
    <?php foreach($form->getObject()->getPersonaConcurso()->getEvaluacionesConEstado(2) as $evaluacion):?>
      <?php $array_evaluaciones[$j] = $evaluacion?>
      <?php $j++?>
    <?php endforeach?>
    
    <fieldset id="sf_fieldset_none">
      <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_notas_productividad" >
      <div>
      <label for="evaluacion_notas_productividad">Postulación en PDF</label>
        <div class="content">
          <?php echo link_to(image_tag('pdf.gif').' DESCARGAR DOCUMENTO',public_path('uploads/postulaciones_pdf/'.$form->getObject()->getPersonaConcurso()->getRutaPdfPostulacion() ))?>
        </div>
        </div>
      </div>
      <div class="sf_admin_form_row" >
      <div>
      <label>Recomiendan adjudicación</label>
        <div class="content">
          <table>
            <tbody>
          <?php foreach($array_evaluaciones as $evaluacion):?>
            <tr>
            <?php if($evaluacion->getRecomiendoAdjudicacion()):?>
              <td><?php echo $evaluacion->getPersonaSistema()->getNombre().' '.$evaluacion->getPersonaSistema()->getApellido1()?></td>
              <td><?php echo image_tag('ok')?> Sí recomienda adjudicación</td>
            <?php else:?>
              <td><?php echo $evaluacion->getPersonaSistema()->getNombre().' '.$evaluacion->getPersonaSistema()->getApellido1()?></td>
              <td><?php echo image_tag('cancel')?> No recomienda adjudicación</td>
            <?php endif;?>
            </tr>
          <?php endforeach;?>
            </tbody>
          </table>
        </div>
        </div>
      </div>

      
      
      <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_ajustes_recursos" >
      <div>
      <label for="evaluacion_ajustes_recursos">Ajuste de recursos</label>
        <div class="content">
          <table>
            <thead>
              <tr>
                <th>Item</th>
                <th>Monto solicitado</th>
                <th>Semestre 1</th>
                <th>Semestre 2</th>
                <th>Monto ajustado</th>
                <th>Comentario</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($form['ajustes_recursos'] as $i => $field_ajuste_recurso):?>
              <?php //foreach($form->getEmbeddedForm('ajustes_recursos')->getEmbeddedForms() as $field_ajuste_recurso):?>
              <?php if($form->getObject()->getRecursoById($i)->getItemConcurso()->getItem()->getAcronimo() == 'gastos_operacion'):?>
                
                <?php foreach($field_ajuste_recurso['ajustes_detalles_recursos'][1]['ajustes_detalles_recursos_gastos_operacion'] as $k =>  $field_ajuste_gasto_operacion):?>
                  <tr>
                    <td>
                      <?php switch($k){
                        case 1:
                          echo "G.O. Insumos computacionales";
                          break;
                        case 2:
                          echo "G.O. Reactivos e insumos de laboratorio";
                          break;
                        case 3:
                          echo "G.O. Libros y artículos de librería";
                          break;
                        case 4:
                          echo "G.O. Actividades de difusión";
                          break;
                        case 5:
                          echo "G.O. Otros";
                          break;
                      }?>
                    </td>
                    <td></td>
                    <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][1]['ajustes_detalles_recursos_gastos_operacion'][$k]['monto_aprobado']?></td>
                    <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][2]['ajustes_detalles_recursos_gastos_operacion'][$k]['monto_aprobado']?></td>
                  </tr>
                <?php endforeach;?>
                <tr>
                  <th>Gastos de Operación</th>
                  <td>$<?php echo number_format($form->getObject()->getRecursoById($i)->getTotal(),0,'','.')?></td>
                  <?php foreach($array_evaluaciones as $evaluacion):?>
                    
                  <?php endforeach?>
                  <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": $".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getAjusteDetalleRecursoByPeriodo(1)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                  <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][1]['monto_aprobado']->renderError()?>
                  <?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][1]['monto_aprobado']->render(array('readonly'=>'readonly', 'title' => $texto_title))?></td>
                  <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": $".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getAjusteDetalleRecursoByPeriodo(2)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                  <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][2]['monto_aprobado']->renderError()?>
                  <?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][2]['monto_aprobado']->render(array('readonly'=>'readonly', 'title' => $texto_title))?></td>
                  <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": ".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                  <td><?php echo $field_ajuste_recurso['monto_aprobado']->renderError()?>
                  <?php echo $field_ajuste_recurso['monto_aprobado']->render(array('readonly'=>'readonly', 'title'=> $texto_title))?></td>
                  <?php $texto_title = ''?>
                  <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": ".$evaluacion->getAjusteRecursoByRecursoId($i)->getComentario()."<br />"?>
                <?php endforeach?>
                  
                  <td><?php echo $field_ajuste_recurso['comentario']->render(array('title'=>$texto_title))?></td>
                  <?php $archivo_postulacion = $form->getObject()->getRecursoById($i)->getArchivosRecurso()?>
                  <td><?php echo link_to(image_tag('pdf.gif').' Descargar Justificación', public_path('/uploads/pdfs/'.$archivo_postulacion[0]->getRuta()))?></td>
                </tr>
              <?php else:?>
              <tr>
                <th><?php echo $form->getObject()->getRecursoById($i)?></th>
                <td>$<?php echo number_format($form->getObject()->getRecursoById($i)->getTotal(),0,'','.')?></td>
                <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": $".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getAjusteDetalleRecursoByPeriodo(1)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                
                <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][1]['monto_aprobado']->renderError()?>
                <?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][1]['monto_aprobado']->render(array('onchange'=>'sumarRecurso('.$i.')', 'title' => $texto_title))?></td>
                <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": $".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getAjusteDetalleRecursoByPeriodo(2)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                <td><?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][2]['monto_aprobado']->renderError()?>
                <?php echo $field_ajuste_recurso['ajustes_detalles_recursos'][2]['monto_aprobado']->render(array('onchange'=>'sumarRecurso('.$i.')', 'title' => $texto_title))?></td>
                
                <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": ".number_format($evaluacion->getAjusteRecursoByRecursoId($i)->getMontoAprobado(),0,'','.')."<br />"?>
                <?php endforeach?>
                <td><?php echo $field_ajuste_recurso['monto_aprobado']->renderError()?>
                <?php echo $field_ajuste_recurso['monto_aprobado']->render(array('readonly'=>'readonly', 'title' => $texto_title))?></td>
                
                <?php $texto_title = ''?>
                <?php foreach($array_evaluaciones as $evaluacion):?>
                  <?php $texto_title .= $evaluacion->getPersonaSistema()->getNombre()." ".$evaluacion->getPersonaSistema()->getApellido1().": ".$evaluacion->getAjusteRecursoByRecursoId($i)->getComentario()."<br />"?>
                <?php endforeach?>
                
                <td><?php echo $field_ajuste_recurso['comentario']->render(array('title'=>$texto_title))?></td>
                <?php $archivo_postulacion = $form->getObject()->getRecursoById($i)->getArchivosRecurso()?>
                <td><?php echo link_to(image_tag('pdf.gif').' Descargar Justificación', public_path('/uploads/pdfs/'.$archivo_postulacion[0]->getRuta()))?></td>
              </tr>
              <?php endif;?>
              <?php endforeach?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
      
      <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_comentario" >
        <div>
        <label for="evaluacion_comentario">Comentarios</label>
          <div class="content">
            <table>
              <tbody>
                <tr>
                  
                  <td><?php echo $form['comentario']->renderError()?>
                  <?php echo $form['comentario']->render()?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </fieldset>
  
    <?php include_partial('evaluacion_recursos1/form_actions', array('evaluacion' => $evaluacion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
