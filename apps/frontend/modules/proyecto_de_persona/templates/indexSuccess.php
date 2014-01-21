<h1>Proyecto de personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Fuente</th>
      <th>Codigo</th>
      <th>Titulo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($proyecto_de_personas as $proyecto_de_persona): ?>
    <tr>
      <td><a href="<?php echo url_for('proyecto_de_persona/edit?id='.$proyecto_de_persona->getId()) ?>"><?php echo $proyecto_de_persona->getId() ?></a></td>
      <td><?php echo $proyecto_de_persona->getPersonaId() ?></td>
      <td><?php echo $proyecto_de_persona->getFuente() ?></td>
      <td><?php echo $proyecto_de_persona->getCodigo() ?></td>
      <td><?php echo $proyecto_de_persona->getTitulo() ?></td>
      <td><?php echo $proyecto_de_persona->getCreatedAt() ?></td>
      <td><?php echo $proyecto_de_persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('proyecto_de_persona/new') ?>">New</a>
