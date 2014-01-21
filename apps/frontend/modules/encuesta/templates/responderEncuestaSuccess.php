<h1>Encuesta: <?php echo $encuesta->getNombre()?></h1>

<?php if($encuesta->getEstaPublicada()):?>
<form action="<?php echo url_for('encuesta/create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<table class="tabla_encuesta">
<tbody>

<?php $contador = 1;?>
<?php echo $form->renderHiddenFields()?>
<?php foreach($form['preguntas'] as $key => $pregunta):?>
  <tr>
    <th><?php echo $contador?>- <?php echo $pregunta['alternativa_id']->renderLabel()?></th>
  </tr>
  <tr>
    <td><?php echo $pregunta['alternativa_id']->render()?></td>
  </tr>
  <?php $contador++?>
<?php endforeach;?>
<?php //echo $form?>
</tbody>
</table>

<input type="submit" value="Enviar respuestas"/>
</form>
<?php else:?>
<div class="flash_notice">Estimado Profesor.<br /> Esta encuesta ya no se encuentra disponible.</div>
<?php endif;?>
