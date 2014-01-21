<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('proyecto_de_persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '') : (isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : '')  )) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('persona/edit?id='.$sf_user->getAttribute('id_persona').(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '')) ?>">Volver al CV</a>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
      	<th><?php echo $form['fuente']->renderLabel()?></th>
      	<td><?php echo $form['fuente']->renderError() ?>
        <?php if($form['tipo_proyecto']->getValue() == 1 || $form['tipo_proyecto']->getValue() == 3):?>
        
        <?php echo $form['fuente']->render(array('readonly'=> 'readonly')) ?>
        <?php else:?>
          <?php echo $form['fuente']?>
        <?php endif;?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tipo_participacion']->renderLabel() ?></th>
        <td align="left" >
          <?php echo $form['tipo_participacion']->renderError() ?>
          <?php echo $form['tipo_participacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['concurso']->renderLabel() ?></th>
        <td>
          <?php echo $form['concurso']->renderError() ?>
          <?php echo $form['concurso'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['codigo']->renderLabel() ?></th>
        <td>
          <?php echo $form['codigo']->renderError() ?>
          <?php echo $form['codigo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['titulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['titulo']->renderError() ?>
          <?php echo $form['titulo'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
