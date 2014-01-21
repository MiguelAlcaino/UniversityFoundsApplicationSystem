<tr>
  <th><?php echo $pregunta->renderLabel()?></th>
  <td><?php echo $pregunta['texto_pregunta']?><?php echo $pregunta['id']?></td>
</tr>
<tr>
  <th></th>
  <td>
    <table>
    <tbody id="contenedor_alternativas_<?php echo $counter_preguntas?>">
    <?php $counter_alternativas = 0?>
    <?php foreach($pregunta['alternativas'] as $name_alternativa => $alternativa):?>
      <?php include_partial('alternativa_field', array(
        'form' => $form,
        'alternativa' => $alternativa,
        'alternativas' => $pregunta['alternativas'],
        'counter_alternativas' => $counter_alternativas
      ))?>
      <?php $counter_alternativas++?>
    <?php endforeach;?>
    
    </tbody>
    <tfoot>
    <tr>
      <td colspan="2"><button type="button" id="add_alternativa_<?php echo $counter_preguntas?>">Agregar alternativa</button></td>
    </tr>
    </tfoot>
    </table>
  </td>
</tr>
<script type="text/javascript">

var cnt_<?php echo $counter_preguntas?> = <?php print_r($pregunta['alternativas']->count())?>;

function addAlternativa<?php echo $counter_preguntas?>(num){
  var r = jQuery.ajax({
    type: 'GET',
    url: '<?php echo url_for('encuesta/addAlternativaForm')?>'+'<?php echo ($form->getObject()->isNew() ? '':'?id_encuesta='.$form->getObject()->getId()).($form->getObject()->isNew() ? '?num=':'&num=') ?>'+num+'&num_pregunta=<?php echo $counter_preguntas?>',
    async: false
    }).responseText;
    return r;
}

$().ready(function() {
  $('button#add_alternativa_<?php echo $counter_preguntas?>').click(function() {
    $("#contenedor_alternativas_<?php echo $counter_preguntas?>").append(addAlternativa<?php echo $counter_preguntas?>(cnt_<?php echo $counter_preguntas?>));
    //$("#contenedor_alternativas_<?php echo $counter_preguntas?>").append('<tr><td colspan="2">hola</td></tr>');
    cnt_<?php echo $counter_preguntas?> = cnt_<?php echo $counter_preguntas?> + 1;
  });
});
</script>
