<table>
<thead>
	<tr>
		<th>Nombre completo</th>
		<th>Unidad acad&eacute;mica</th>
		<th>Tipo profesor</th>
		<th>Tipo participante</th>
		<th>Opciones</th>
	</tr>
</thead>
<tbody>
	
	<?php foreach($form->getObject()->getParticipantesPostulacion() as $participante_postulacion):?>
	<tr>
		<td><?php echo $participante_postulacion->getPersona()->getNombre()?> <?php echo $participante_postulacion->getPersona()->getApellido1()?> <?php echo $participante_postulacion->getPersona()->getApellido2()?></td>
		<td><?php echo $participante_postulacion->getPersona()->getUnidadAcademica()?></td>
		<td><?php echo $participante_postulacion->getPersona()->getTipoProfesor()?></td>
		<td>
		<?php switch($participante_postulacion->getTipoParticipante()){
				case 1:?>
				Director
				<?php break;?>
			<?php case 2:?>
				Director Alterno
			<?php break;?>
			<?php case 3:?>
				Co-Investigador
			<?php break; ?>
			<?php case 4:?>
				Alumno Tesista
			<?php break; ?>
		<?php }?>
		</td>
		<td>

		<?php if($participante_postulacion->getTipoParticipante() == 1):?>
			<?php echo link_to('Editar CV', 'persona/edit?id='.$participante_postulacion->getPersona()->getId().'&id_postulacion='.$form->getObject()->getId())?>
		<?php endif;?>
		<br />
		<?php if($participante_postulacion->getTipoParticipante() != 1):?>
			<?php echo link_to('Ver CV','persona/show?id='.$participante_postulacion->getPersonaId().'&id_postulacion='.$form->getObject()->getId())?> <br />
			<?php echo link_to('Eliminar', 'participante_postulacion/delete?id='.$participante_postulacion->getId().'&id_postulacion='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar al investigador de la postulacion?')) ?>
		<?php endif;?>
		</td>
	</tr>
	<?php endforeach;?>
	<?php if($form->getObject()->getConcurso()->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
		<?php if($form->getObject()->getTesistaId()):?>
		<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Programa de Doctorado</th>
				<th>Opciones</th>
			</tr>
		</thead>
			<tr>
				<td><?php echo $form->getObject()->getTesista()->getNombre()?> <?php echo $form->getObject()->getTesista()->getApellido1()?> <?php echo $form->getObject()->getTesista()->getApellido2()?></td>
				<td><?php echo $form->getObject()->getTesista()->getDoctoradoAcreditado()->getNombre()?></td>
				<td>
					<?php echo link_to('Editar','tesista/edit?id='.$form->getObject()->getTesista()->getId().'&id_postulacion='.$form->getObject()->getId())?> <br />
					<?php echo link_to('Eliminar', 'tesista/delete?id='.$form->getObject()->getTesista()->getId().'&id_postulacion='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar al investigador de la postulacion?')) ?>
				</td>
			</tr>
		</table>
		<?php endif;?>
	<?php endif;?>
	<?php if(count($form->getObject()->getParticipantesExternos())!= 0):?>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Universidad</th>
				<th>Tipo participante</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<?php foreach($form->getObject()->getParticipantesExternos() as $participante_externo):?>
			<tr>
				<td><?php echo $participante_externo->getPersonaExterna()->getNombre()?> <?php echo $participante_externo->getPersonaExterna()->getApellido1()?> <?php echo $participante_externo->getPersonaExterna()->getApellido2()?></td>
				<td><?php echo $participante_externo->getPersonaExterna()->getNombreUniversidad()?></td>
				<td>Co-Investigador</td>
				<td><?php echo link_to('Eliminar', 'persona_externa/delete?id='.$participante_externo->getId().'&id_postulacion='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar al investigador de la postulacion?')) ?></td>
			</tr>
		<?php endforeach;?>
	</table>
	<?php endif;?>
</tbody>
<tfoot>
	<tr><?php $concurso_de_postulacion = $form->getObject()->getConcurso() ?>
		<?php if($concurso_de_postulacion->getAcronimo() == 'di_apoyo_tesis_doctoral'):?>
			<?php if($form->getObject()->getTesistaId() == null ):?>
				<td colspan="5"> <?php echo link_to('Agregar alumno de doctorado acreditado','@agregar_tesista?id_postulacion='.$form->getObject()->getId())?></td>
			<?php endif;?>
		<?php else:?>
			<?php if($concurso_de_postulacion->getAcronimo() == 'di_sello_valorico'):?>
				<td colspan="4">
				<?php if($form->getObject()->contarParticipantesPorTipoParticipante(2) == 0):?>
					<?php echo link_to('Agregar Director Alterno','persona/buscarPersona?id_postulacion='.$form->getObject()->getId().'&tipo_participante=2')?></td>
				<?php endif;?>
				<td>
					<?php if( $form->getObject()->contarParticipantesPorTipoParticipante(3) < 3):?>
					<?php echo link_to('Agregar Co-Investigador','persona/buscarPersona?id_postulacion='.$form->getObject()->getId().'&tipo_participante=3')?>
					<?php endif;?>
				</td>
			<?php else:?>
				<?php if($concurso_de_postulacion->getAcronimo() == 'di_pia'):?>
					<?php if( ($form->getObject()->contarParticipantesPorTipoParticipante(3) + count($form->getObject()->getPersonasExternas()) ) <= 3 ):?>
						<?php if( count($form->getObject()->getPersonasExternas()) <=1 ):?>
						<td colspan="4"><?php echo link_to('Agregar co-investigador externo','@agregar_investigador_externo?id_postulacion='.$form->getObject()->getId())?></td>
						<?php endif;?>
						<?php if($form->getObject()->contarParticipantesPorTipoParticipante(3) <=3):?>
						<td><?php echo link_to('Agregar co-investigador interno', 'persona/buscarPersona?id_postulacion='.$form->getObject()->getId().'&tipo_participante=3')?></td>
						<?php endif;?>
					<?php endif;?>
				<?php endif;?>
			<?php endif;?>
		<?php endif;?>
	</tr>
</tfoot>
</table>