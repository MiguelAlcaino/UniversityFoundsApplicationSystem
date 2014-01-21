<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('persona_externa/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '?id_postulacion='.$postulacion->getId())) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@postular?id_postulacion='.$postulacion->getId().'&etapa=6&paso=1') ?>">Volver a la postulaci&oacute;n</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'persona_externa/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Agregar investigador externo" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['rut']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut']->renderError() ?>
          <?php echo $form['rut'] ?>-<?php echo $form['dv'] ?>
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
        <th><?php echo $form['nombre_universidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_universidad']->renderError() ?>
          <?php echo $form['nombre_universidad'] ?>
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
        <th><?php echo $form['jerarquia']->renderLabel() ?></th>
        <td>
          <?php echo $form['jerarquia']->renderError() ?>
          <?php echo $form['jerarquia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['compromiso_contractual_con_la_universidad']->renderLabel() ?></th>
        <td>
          <?php echo $form['compromiso_contractual_con_la_universidad']->renderError() ?>
          <?php echo $form['compromiso_contractual_con_la_universidad'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
