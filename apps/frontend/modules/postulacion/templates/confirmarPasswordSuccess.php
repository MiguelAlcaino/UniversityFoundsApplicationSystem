<?php if ($sf_user->hasFlash('error')): ?>
				  <div class="flash_error"><?php echo html_entity_decode($sf_user->getFlash('error')) ?></div>
				<?php endif ?>
<form action="<?php echo url_for('postulacion/enviarPostulacion')?>" method="post">
<input type="hidden" name="id_postulacion" value="<?php echo $postulacion->getId()?>" />
<div>
 <h3>Para enviar la postulaci&oacute;n debe confirmar su contrase&ntilde;a.</h3>
</div>
<label>Confirmar contrase&ntilde;a</label> <input type="password" name="comprueba_password" />
<br />
<br />
<div><input type="submit" name="enviar_postulacion" value="Enviar postulaci&oacute;n" /></div>
</form>