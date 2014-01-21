<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('publicacion_de_persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().( isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '') : ( isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : '' )  ).'?tipo_publicacion='.$tipo_publicacion) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
        <th><?php echo $form['tipo_publicacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['tipo_publicacion']->renderError() ?>
            <?php if($tipo_publicacion != 3):?>
          <?php echo $form['tipo_publicacion']->render(array('readonly'=>'readonly')) ?>
            <?php else:?>
                <?php echo $form['tipo_publicacion']->render() ?>
            <?php endif;?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_revista']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_revista']->renderError() ?>
          <?php echo $form['nombre_revista'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['titulo_publicacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['titulo_publicacion']->renderError() ?>
          <?php echo $form['titulo_publicacion'] ?>
        </td>
      </tr>
      <tr>
        <th>A&ntilde;o</th>
        <td>
          <?php echo $form['anio']->renderError() ?>
          <?php echo $form['anio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['volumen']->renderLabel() ?></th>
        <td>
          <?php echo $form['volumen']->renderError() ?>
          <?php echo $form['volumen'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero']->renderError() ?>
          <?php echo $form['numero'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
