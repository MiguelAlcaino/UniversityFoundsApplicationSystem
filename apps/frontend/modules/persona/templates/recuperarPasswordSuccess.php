<h1>Recuperación de contraseña</h1>
<?php if ($sf_user->hasFlash('error')): ?>
	<div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
<?php endif ?>
<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice"><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></div>
<?php endif ?>
<fieldset >
<form action="<?php echo url_for('persona/recuperarPassword')?>" method="post">

<table style="text-align: left; font-size: 11px">
    <tbody>
        <tr>
            <th>
            <?php echo $form['email']->renderLabel()?>
            <?php echo $form['email']->renderError()?>
            </th>
            <td><?php echo $form['email']?></td>
        </tr>
        <tr>
        <td colspan="2">Un enlace será enviado a su correo para reestablecer la contraseña.</td>
        </tr>
        
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><?php echo $form->renderHiddenFields()?>
<input type="submit" name="save_password_form" value="Recuperar contraseña"/> <?php echo link_to('[Volver]','persona/login')?></td>
      </tr>
    </tfoot>
</table>


</form>

