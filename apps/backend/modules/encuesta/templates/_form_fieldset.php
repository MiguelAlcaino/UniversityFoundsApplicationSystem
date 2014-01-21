<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>"> 
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>

  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('encuesta/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>
  
  <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_preguntas<?php $form['preguntas']->hasError() and print ' errors' ?>">
    <?php echo $form['preguntas']->renderError() ?>
    <div>
      <?php echo $form['preguntas']->renderLabel('Preguntas') ?>
      
      <div class="content">
      
        <table>
          <tbody id="contenedor_preguntas">
          <?php $counter_preguntas = 1?>
          <?php foreach($form['preguntas'] as $name_pregunta => $pregunta):?>
            <?php include_partial('encuesta/pregunta_field', array(
              'pregunta'  =>  $pregunta,
              'form'      =>  $form,
              'counter_preguntas' => $counter_preguntas
              )) ?>
            <?php $counter_preguntas++?>
          <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"><button type="button" id="add_pregunta">Agregar pregunta</button></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</fieldset>

<script type="text/javascript">

var cnt = <?php print_r($form['preguntas']->count())?>;

function addPregunta(num){
  var r = jQuery.ajax({
    type: 'GET',
    url: '<?php echo url_for('encuesta/addPreguntaForm')?>'+'<?php echo ($form->getObject()->isNew() ? '':'?id_encuesta='.$form->getObject()->getId()).($form->getObject()->isNew() ? '?num=':'&num=') ?>'+num,
    async: false
    }).responseText;
    return r;
}

$().ready(function() {
  $('button#add_pregunta').click(function() {
    $("#contenedor_preguntas").append(addPregunta(cnt));
    //$("#contenedor_alternativas_<?php echo $counter_preguntas?>").append('<tr><td colspan="2">hola</td></tr>');
    cnt = cnt + 1;
  });
});
</script>

