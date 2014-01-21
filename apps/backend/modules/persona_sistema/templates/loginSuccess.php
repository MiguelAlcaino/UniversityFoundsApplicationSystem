<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice"><strong><?php echo html_entity_decode($sf_user->getFlash('notice')) ?></strong></div>
<?php endif ?>
<?php if ($sf_user->hasFlash('error')): ?>
	<div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
<?php endif ?>
<form action="<?php echo url_for('persona_sistema/login') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<table class="centrado">
	<tr>
		<th>
            <?php echo $form['rut']->renderLabel()?>
            <?php echo $form['rut']->renderError()?><?php echo $form['dv']->renderError() ?>
        </th>
		<td>
			<?php echo $form['rut']?>-<?php echo $form['dv']?>
		</td>
	</tr>
    <tr>
		<th><?php echo $form['password']->renderLabel()?><?php echo $form['password']->renderError()?></th>
		<td>
			<?php echo $form['password']?>
			
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" value="Ingresar" /><br /><?php echo link_to('[Recuperar contraseña]','persona/recuperarPassword')?></td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>	
	
</table>

<?php echo $form->renderHiddenFields() ?>
</form>
