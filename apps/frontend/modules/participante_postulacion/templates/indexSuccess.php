<h1>Participante postulacions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Persona concurso</th>
      <th>Tipo participante</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($participante_postulacions as $participante_postulacion): ?>
    <tr>
      <td><a href="<?php echo url_for('participante_postulacion/edit?id='.$participante_postulacion->getId()) ?>"><?php echo $participante_postulacion->getId() ?></a></td>
      <td><?php echo $participante_postulacion->getPersonaId() ?></td>
      <td><?php echo $participante_postulacion->getPersonaConcursoId() ?></td>
      <td><?php echo $participante_postulacion->getTipoParticipante() ?></td>
      <td><?php echo $participante_postulacion->getCreatedAt() ?></td>
      <td><?php echo $participante_postulacion->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('participante_postulacion/new') ?>">New</a>
