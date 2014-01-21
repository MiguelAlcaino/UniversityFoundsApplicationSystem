<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo $form->getObject()->isNew() ? url_for('tesista/create?id_postulacion='.$postulacion->getId()) : url_for('tesista/update?id='.$form->getObject()->getId().'&id_postulacion='.$postulacion->getId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1') ?>">Volver a la postulaci&oacute;n</a>
          <input type="submit" value="<?php echo $form->getObject()->isNew() ? 'Agregar Alumno Tesista' : 'Guardar'?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['doctorado_acreditado_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['doctorado_acreditado_id']->renderError() ?>
          <?php echo $form['doctorado_acreditado_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rut']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut']->renderError() ?>
          <?php echo $form['rut'] ?>-<?php echo $form['dv']->renderError() ?><?php echo $form['dv'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido1']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido1']->renderError() ?>
          <?php echo $form['apellido1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido2']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido2']->renderError() ?>
          <?php echo $form['apellido2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ruta_notas']->renderLabel() ?></th>
        <td>
          <?php echo $form['ruta_notas']->renderError() ?>
          <?php echo $form['ruta_notas'] ?>
            <?php if($form['ruta_notas']->getValue()): ?>
                <br />
                <?php echo link_to('Ver documento con notas subido',public_path('uploads/pdfs/'.$form['ruta_notas']->getValue()))?>
            <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
