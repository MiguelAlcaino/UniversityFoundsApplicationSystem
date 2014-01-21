<h1>Persona concursos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Concurso</th>
      <th>Fecha envio</th>
      <th>Estado</th>
      <th>Titulo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($persona_concursos as $persona_concurso): ?>
    <tr>
      <td><a href="<?php echo url_for('postulacion/edit?id='.$persona_concurso->getId()) ?>"><?php echo $persona_concurso->getId() ?></a></td>
      <td><?php echo $persona_concurso->getPersonaId() ?></td>
      <td><?php echo $persona_concurso->getConcursoId() ?></td>
      <td><?php echo $persona_concurso->getFechaEnvio() ?></td>
      <td><?php echo $persona_concurso->getEstado() ?></td>
      <td><?php echo $persona_concurso->getTitulo() ?></td>
      <td><?php echo $persona_concurso->getCreatedAt() ?></td>
      <td><?php echo $persona_concurso->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('postulacion/new') ?>">New</a>
