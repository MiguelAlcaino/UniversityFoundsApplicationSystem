<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $encuesta->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $encuesta->getNombre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $encuesta->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $encuesta->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('encuesta/edit?id='.$encuesta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('encuesta/index') ?>">List</a>
