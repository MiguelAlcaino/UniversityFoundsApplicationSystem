<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('divulgacion_de_persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '') : (isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : '')  )) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <span class="ayuda_formulacion">
  	Agregue datos relevantes de las charlas, congresos, etc. en las cuales usted haya sido expositor.
  </span>
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
        <th><?php echo $form['texto_divulgacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['texto_divulgacion']->renderError() ?>
          <?php echo $form['texto_divulgacion'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  
</form>
