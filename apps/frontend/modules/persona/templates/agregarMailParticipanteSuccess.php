<div style="text-align: center;">
<form action="<?php echo url_for('persona/agregarMailParticipante?id_persona='.$id_investigador_agregado.'&tipo_participante='.$tipo_participante.'&id_postulacion='.$postulacion->getId())?>" method="post" >
<table>
	<tbody>
		<tr>
			<th>Email del investigador <?php echo $form['email']->renderError()?></th>
			<td><?php echo $form['email']?> <?php echo $form->renderHiddenFields(false)?></td>
		</tr>
		<tr>
			<td colspan="2"> <input type="submit" value="Agregar investigador y enviar email" name="save_and_send" /> </td>
		</tr>
	</tbody>
</table>
</form>
</div>