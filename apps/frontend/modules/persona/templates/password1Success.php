<h1>Registro de Contrase&ntilde;a</h1>
<?php if ($sf_user->hasFlash('error')): ?>
	<div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
<?php endif ?>
<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice"><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></div>
<?php endif ?>
<form action="<?php echo url_for('persona/password1')?>" method="post">
<table>
    <tbody>
        <tr>
            <th>
            <?php echo $form['rut']->renderLabel()?>
            <?php echo $form['rut']->renderError()?>
            </th>
            <td><?php echo $form['rut']?>-<?php echo $form['dv']?></td>
        </tr>
        <tr>
            <th>
            <?php echo $form['email']->renderLabel()?>
            <?php echo $form['email']->renderError()?>
            </th>
            <td><?php echo $form['email']?></td>
        </tr>
        <tr>
            <th>
            <?php echo $form['telefono']->renderLabel()?>
            <?php echo $form['telefono']->renderError()?>
            </th>
            <td><?php echo $form['telefono']?></td>
        </tr>
    </tbody>
</table>
<div>
<?php echo $form->renderHiddenFields()?>
<input type="submit" name="save_password_form" value="Guardar datos"/>
</div>
</form>