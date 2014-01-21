<?php use_helper('I18N', 'Date') ?>
<?php include_partial('persona/assets') ?>
<table>
<tbody>
<tr>
<th>Nombre:</th><td><?php echo $persona->getNombre()?> <?php echo $persona->getApellido1()?> <?php echo $persona->getApellido2()?></td>
</tr>
<tr>
<th>Tipo profesor:</th><td><?php echo $persona->getTipoProfesor()?></td>
</tr>
</tbody>
</table>
</div>
<div class="concursos" id="postulaciones_en_curso">
<span><strong>Postulaciones en curso</strong> <br /></span>
<ul>
<?php foreach($postulaciones_en_curso as $postulacion_en_curso):?>
	<li><?php echo link_to($postulacion_en_curso, 'postular/'.$postulacion_en_curso->getId().'?etapa=1&paso=1');?> <?php echo link_to('[Anular]', 'postulacion/delete?id='.$postulacion_en_curso->getId(), array('method' => 'delete', 'confirm' => 'Esta seguro de anular la postulacion. Esto eliminara todos los datos asociados a ella?')) ?></li>
<?php endforeach;?>
</ul>
</div>
<div class="concursos" id="postulaciones_disponibles">
<span><strong>Postulaciones disponibles</strong></span>
<ul >
<?php foreach($concursos_disponibles as $concurso_v):?>
	<li><?php echo link_to($concurso_v->getNombreConcurso(), 'persona/inicializarPostulacion/?acronimo='.$concurso_v->getAcronimo())?></li>
<?php endforeach;?>
</ul>
</div>
<div class="concursos" id="postulaciones_enviadas">
<span><strong>Postulaciones enviadas</strong></span>
<ul >
<?php foreach($postulaciones_enviadas as $postulacion_enviada):?>
	<li><?php echo $postulacion_enviada->getConcurso()?> <?php echo link_to('[Ver PDF]',public_path('uploads/postulaciones_pdf/'.$postulacion_enviada->getRutaPdfPostulacion()))?></li>
<?php endforeach;?>
</ul>
