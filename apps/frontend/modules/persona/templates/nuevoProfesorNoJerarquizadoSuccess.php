<h1>Registro de profesor no jerarquizado</h1>
<form action="<?php echo url_for('persona/createPNJ')?>" method="post" enctype="multipart/form-data">
<?php echo $form->renderHiddenFields()?>
<table>
    <tbody>
        <tr>
            <th><?php echo $form['unidad_academica_id']->renderLabel() ?> (*)</th>
            <td><?php echo $form['unidad_academica_id']?> <?php echo $form['unidad_academica_id']->renderError()?></td>
        </tr>
        <tr>
            <th>
            <?php echo $form['rut']->renderLabel() ?> (*)
            <?php echo $form['rut']->renderError() ?>
            </th>
            <td><?php echo $form['rut']?> - <?php echo $form['dv']?></td>
        </tr>
        <tr>
            <th><?php echo $form['nombre']->renderLabel() ?> (*)  <?php echo $form['nombre']->renderError()?></th>
            <td><?php echo $form['nombre']?></td>
        </tr>
        <tr>
            <th><?php echo $form['apellido1']->renderLabel() ?> (*) <?php echo $form['apellido1']->renderError()?></th>
            <td><?php echo $form['apellido1']?></td>
        </tr>
        <tr>
            <th><?php echo $form['apellido2']->renderLabel() ?><?php echo $form['apellido2']->renderError()?></th>
            <td><?php echo $form['apellido2']?></td>
        </tr>
        <tr>
            <th><?php echo $form['telefono']->renderLabel() ?> (*)<?php echo $form['telefono']->renderError()?></th>
            <td><?php echo $form['telefono']?></td>
        </tr>
        <tr>
            <th><?php echo $form['email']->renderLabel() ?> (*) <?php echo $form['email']->renderError()?></th>
            <td><?php echo $form['email']?></td>
        </tr>
    </tbody>
</table>
<br />
<span class="ayuda_formulacion">
Para poder efectuar su(s) postulaci&oacute;n(es) usted deber&aacute; contar con su t&iacute;tulo de m&aacute;ximo grado acad&eacute;mico, carta de compromiso propia y carta de respaldo del Director de la Unidad Acad&eacute;mica. Los formatos de estos documentos deber&aacute;n ser descargados y posteriormente subidos en formato PDF en los anexos de esta(s) postulaci&oacute;n(es).
<br />
<strong>Declaro aceptar las condiciones de postulaci&oacute;n.</strong>
</span>
<div></div>
<div><input type="submit" value="Enviar curriculum" name="save_pnj" /></div>
</form>
