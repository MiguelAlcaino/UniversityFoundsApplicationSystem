<h1>Obra de personas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Persona</th>
      <th>Texto obra</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($obra_de_personas as $obra_de_persona): ?>
    <tr>
      <td><a href="<?php echo url_for('obra_de_persona/edit?id='.$obra_de_persona->getId()) ?>"><?php echo $obra_de_persona->getId() ?></a></td>
      <td><?php echo $obra_de_persona->getPersonaId() ?></td>
      <td><?php echo $obra_de_persona->getTextoObra() ?></td>
      <td><?php echo $obra_de_persona->getCreatedAt() ?></td>
      <td><?php echo $obra_de_persona->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('obra_de_persona/new') ?>">New</a>
