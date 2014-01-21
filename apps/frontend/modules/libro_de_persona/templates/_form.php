<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('libro_de_persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '' ) : ( isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : '' ))) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('persona/edit?id='.$sf_user->getAttribute('id_persona').(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '')) ?>">Volver al CV</a>
          
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['editorial']->renderLabel() ?></th>
        <td>
          <?php echo $form['editorial']->renderError() ?>
          <?php echo $form['editorial'] ?>
        </td>
      </tr>
      <tr>
        <th>A&ntilde;o</th>
        <td>
          <?php echo $form['anio']->renderError() ?>
          <?php echo $form['anio'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
