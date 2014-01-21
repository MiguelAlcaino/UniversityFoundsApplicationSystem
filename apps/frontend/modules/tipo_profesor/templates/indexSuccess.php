<h1>Tipo profesors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tipo_profesors as $tipo_profesor): ?>
    <tr>
      <td><a href="<?php echo url_for('tipo_profesor/edit?id='.$tipo_profesor->getId()) ?>"><?php echo $tipo_profesor->getId() ?></a></td>
      <td><?php echo $tipo_profesor->getTipo() ?></td>
      <td><?php echo $tipo_profesor->getCreatedAt() ?></td>
      <td><?php echo $tipo_profesor->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tipo_profesor/new') ?>">New</a>
