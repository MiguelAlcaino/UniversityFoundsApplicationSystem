<h1>Libro de personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Nombre</th>
      <th>Editorial</th>
      <th>Anio</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($libro_de_personas as $libro_de_persona): ?>
    <tr>
      <td><a href="<?php echo url_for('libro_de_persona/edit?id='.$libro_de_persona->getId()) ?>"><?php echo $libro_de_persona->getId() ?></a></td>
      <td><?php echo $libro_de_persona->getPersonaId() ?></td>
      <td><?php echo $libro_de_persona->getNombre() ?></td>
      <td><?php echo $libro_de_persona->getEditorial() ?></td>
      <td><?php echo $libro_de_persona->getAnio() ?></td>
      <td><?php echo $libro_de_persona->getCreatedAt() ?></td>
      <td><?php echo $libro_de_persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('libro_de_persona/new') ?>">New</a>
