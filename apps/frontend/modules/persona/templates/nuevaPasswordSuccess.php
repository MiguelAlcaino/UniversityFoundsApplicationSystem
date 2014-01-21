<h1>Registro de nueva contraseña</h1>
<?php if ($sf_user->hasFlash('error')): ?>
	<div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
<?php endif ?>
<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice"><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></div>
<?php endif ?>
<fieldset >
<form action="<?php echo url_for('@nueva_password?persona_id='.$persona->getId().'&token_recuperar_password='.$persona->getTokenRecuperarPassword())?>" method="post">

<table style="text-align: left; font-size: 11px">
    <tbody>
        <tr>
            <th>
            <?php echo $form['password']->renderLabel()?>
            <?php echo $form['password']->renderError()?>
            </th>
            <td><?php echo $form['password']?></td>
        </tr>
        <tr>
        <th>
          <?php echo $form['password2']->renderLabel()?>
          <?php echo $form['password2']->renderError()?>
        </th>
        <td><?php echo $form['password2']?></td>
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

