<?php if ($sf_user->hasFlash('error')): ?>
  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>
<div><?php echo link_to('Volver a la postulaci&oacute;n','postular/'.$postulacion->getId().'?etapa=6&paso=1')?></div>
<br />
<form method="post" action="<?php echo url_for('persona/buscarPersona?id_postulacion='.$postulacion->getId().'&tipo_participante='.$tipo_participante)?>">
	<input type="hidden" name="buscar_persona[id_postulacion]" value="<?php echo $postulacion->getId()?>" />
	<label>Nombre</label> <input type="text" name="buscar_persona[nombre]" /> <br />
	<label>Apellido Paterno</label><input type="text" name="buscar_persona[apellido1]" /><br />
	<label>Apellido Materno</label><input type="text" name="buscar_persona[apellido2]" /><br />
	<input type="submit" name="buscar" value="Buscar" />
</form>
<?php if(count($personas) == 0):?>
 
<?php else: ?>
	<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
            <th>Tipo de profesor</th>
			<th>Unidad Acad&eacute;mica</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($personas as $persona):?>
		<tr>
			<td><?php echo $persona->getNombre()?></td>
			<td><?php echo $persona->getApellido1()?></td>
			<td><?php echo $persona->getApellido2()?></td>
            <td><?php echo $persona->getTipoProfesor()?></td>
			<td><?php echo $persona->getUnidadAcademica()?></td>
			<td>	
			
				<?php if($postulacion->getConcurso()->getAcronimo() == 'di_sello_valorico'):?>
					<?php if($tipo_participante == 2):?>
					<?php echo link_to('Agregar director alterno','persona/agregarMailParticipante?id_postulacion='.$postulacion->getId().'&id_persona='.$persona->getId().'&tipo_participante='.$tipo_participante)?>
					<?php else:?>
						<?php if($tipo_participante == 3):?>
							<?php echo link_to('Agregar Co-Investigador','persona/agregarMailParticipante?id_postulacion='.$postulacion->getId().'&id_persona='.$persona->getId().'&tipo_participante='.$tipo_participante)?>
						<?php endif; ?>
					<?php endif;?>
				<?php else:?>
					<?php if($postulacion->getConcurso()->getAcronimo() == 'di_pia'):?>
						<?php if($tipo_participante == 3):?>
							<?php echo link_to('Agregar Co-Investigador','persona/agregarMailParticipante?id_postulacion='.$postulacion->getId().'&id_persona='.$persona->getId().'&tipo_participante='.$tipo_participante)?>
						<?php endif; ?>
					<?php else:?>
					
					<?php endif;?>
				<?php endif;?>
			
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
	</table>
<?php endif; ?>
