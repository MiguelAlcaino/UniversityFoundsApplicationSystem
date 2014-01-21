<h1>Persona externas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Rut</th>
      <th>Dv</th>
      <th>Nombre</th>
      <th>Apellido1</th>
      <th>Apellido2</th>
      <th>Nombre universidad</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($persona_externas as $persona_externa): ?>
    <tr>
      <td><a href="<?php echo url_for('persona_externa/edit?id='.$persona_externa->getId()) ?>"><?php echo $persona_externa->getId() ?></a></td>
      <td><?php echo $persona_externa->getRut() ?></td>
      <td><?php echo $persona_externa->getDv() ?></td>
      <td><?php echo $persona_externa->getNombre() ?></td>
      <td><?php echo $persona_externa->getApellido1() ?></td>
      <td><?php echo $persona_externa->getApellido2() ?></td>
      <td><?php echo $persona_externa->getNombreUniversidad() ?></td>
      <td><?php echo $persona_externa->getTelefono() ?></td>
      <td><?php echo $persona_externa->getEmail() ?></td>
      <td><?php echo $persona_externa->getCreatedAt() ?></td>
      <td><?php echo $persona_externa->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('persona_externa/new') ?>">New</a>
