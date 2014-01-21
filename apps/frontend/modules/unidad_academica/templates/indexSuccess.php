<h1>Unidad academicas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($unidad_academicas as $unidad_academica): ?>
    <tr>
      <td><a href="<?php echo url_for('unidad_academica/edit?id='.$unidad_academica->getId()) ?>"><?php echo $unidad_academica->getId() ?></a></td>
      <td><?php echo $unidad_academica->getNombre() ?></td>
      <td><?php echo $unidad_academica->getCreatedAt() ?></td>
      <td><?php echo $unidad_academica->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('unidad_academica/new') ?>">New</a>
