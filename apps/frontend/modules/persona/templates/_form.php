<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $persona = $form->getObject()?>

<?php echo link_to('TERMINAR CURRICULIM', (isset($postulacion) ? 'postular/'.$postulacion->getId().'?etapa=6&paso=1' : 'persona/seleccionConcurso'))?>

<form action="<?php echo url_for('persona/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '').(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php echo $form->renderHiddenFields(false) ?>
	<fieldset>
		<legend>Antecedentes Personales</legend>
			<fieldset>
				<legend>Datos B&aacute;sicos</legend>
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Tipo de profesor</th>
        <td><?php echo $persona->getTipoProfesor()?></td>
      </tr>
      <tr>
        <th>Unidad Acad&eacute;mica</th>
        <td><?php echo $persona->getUnidadAcademica()?>
        </td>
      </tr>
      <tr>
        <th>Rut</th>
        <td><?php echo $persona->getRut()?>-<?php echo $persona->getDv()?></td>
      </tr>
      <tr>
        <th>Nombre</th>
        <td><?php echo $persona->getNombre()?></td>
      </tr>
      <tr>
        <th>Apellido Paterno</th>
        <td><?php echo $persona->getApellido1()?></td>
      </tr>
      <tr>
        <th>Apellido Materno</th>
        <td><?php echo $persona->getApellido2()?></td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  	</fieldset>
  </fieldset>
  <fieldset>
  	<legend>Producci&oacute;n y otros antecedentes</legend>
  	<fieldset>
  		<legend>Proyectos </legend>
  		<fieldset>
  			<legend>Proyectos FONDECYT <?php echo link_to('[Agregar Proyecto]','proyecto_de_persona/new?tipo_proyecto=1'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '')  )?></legend>
                        <table>
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
  				<?php foreach($form->getObject()->getProyectosSegunTipo(1) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        <td><?php echo link_to('Editar','proyecto_de_persona/edit?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                                        	<br/>
                                        	<?php echo link_to('Eliminar', 'proyecto_de_persona/delete?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                                        </td>
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		</fieldset>
  		<fieldset>
  			<legend>Otros Proyectos Externos (Nacionales e Internacionales) <?php echo link_to('[Agregar Proyecto]','proyecto_de_persona/new?tipo_proyecto=2'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?></legend>
                        <table>
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
  				<?php foreach($form->getObject()->getProyectosSegunTipo(2) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        <td><?php echo link_to('Editar','proyecto_de_persona/edit?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                                        	<br/>
                                        	<?php echo link_to('Eliminar', 'proyecto_de_persona/delete?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                                        </td>
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		</fieldset>
  		<fieldset>
  			<legend>Proyectos internos <?php echo link_to('[Agregar Proyecto]','proyecto_de_persona/new?tipo_proyecto=3'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?></legend>
                        <table>
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
  				<?php foreach($form->getObject()->getProyectosSegunTipo(3) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        <td><?php echo link_to('[Editar]','proyecto_de_persona/edit?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                                        <br/>
                                        	<?php echo link_to('Eliminar', 'proyecto_de_persona/delete?id='.$proyecto->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                                        </td>
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		</fieldset>
  	</fieldset>
  	<fieldset>
  		<legend>Publicaciones <?php echo link_to('[Agregar ISI WoS]','publicacion_de_persona/new?tipo_publicacion=1'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?> <?php echo link_to('[Agregar SciELO]','publicacion_de_persona/new?tipo_publicacion=2'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?> <?php echo link_to('[Agregar no ISI ni SciELO]', 'publicacion_de_persona/new?tipo_publicacion=3'.(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?></legend>
                <table>
                    <thead>
                        <th>Tipo</th>
                        <th>Revista</th>
                        <th>T&iacute;tulo</th>
                        <th>A&ntilde;o</th>
                        <th>Volumen</th>
                        <th>N&uacute;mero</th>
                        <th>Opciones</th>
                    </thead>
                    <?php foreach($form->getObject()->getPublicaciones() as $publicacion):?>
                        <tr>
                            <td><?php echo $publicacion->getTipoPublicacion()?></td>
                            <?php switch($publicacion->getTipoPublicacion()){
                            	case 'ISI WoS':
                            		$tipo_publicacion = 1;
                            		break;
                            	case 'SciELO':
                            		$tipo_publicacion = 2;
                            		break;
                            	default:
                            		$tipo_publicacion = 3;
                            		break;
                            }?>
                            <td><?php echo $publicacion->getNombreRevista()?></td>
                            <td><?php echo substr($publicacion->getTituloPublicacion(),0,50).'.-'?></td>
                            <td><?php echo $publicacion->getAnio()?></td>
                            <td><?php echo $publicacion->getVolumen()?></td>
                            <td><?php echo $publicacion->getNumero()?></td>
                            <td><?php echo link_to('[Editar]','publicacion_de_persona/edit?id='.$publicacion->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : '').'&tipo_publicacion='.$tipo_publicacion)?>
                            <br/>
                                <?php echo link_to('Eliminar', 'publicacion_de_persona/delete?id='.$publicacion->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
  	</fieldset>
  	<fieldset>
  		<legend>Libros <?php echo link_to('[Agregar Libro]','libro_de_persona/new'.(isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : ''))?></legend>
        <table>
                    <thead>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>A&ntilde;o</th>
                        <th>Opciones</th>
                    </thead>
                    <?php foreach($form->getObject()->getLibros() as $libro):?>
                       <tr>
                            <td><?php echo $libro->getNombre()?></td>
                            <td><?php echo $libro->getEditorial()?></td>
                            <td><?php echo $libro->getAnio()?></td>
                            <td><?php echo link_to('[Editar]','libro_de_persona/edit?id='.$libro->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                            <br/>
                                <?php echo link_to('Eliminar', 'libro_de_persona/delete?id='.$libro->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
  	</fieldset>
  	<fieldset>
  		<legend>Capitulos de libro <?php echo link_to('[Agregar Capitulo de libro]','capitulo_libro_de_persona/new'.(isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : ''))?></legend>
        <table>
                    <thead>
                        <th>Nombre de Capitulo</th>
                        <th>Nombre de Libro</th>
                        <th>Editorial</th>
                        <th>A&ntilde;o</th>
                        <th>Opciones</th>
                    </thead>
                    <?php foreach($form->getObject()->getCapitulosDeLibros() as $capitulo_de_libro):?>
                       <tr>
                            <td><?php echo $capitulo_de_libro->getNombreCapitulo()?></td>
                            <td><?php echo $capitulo_de_libro->getNombreLibro()?></td>
                            <td><?php echo $capitulo_de_libro->getEditorial()?></td>
                            <td><?php echo $capitulo_de_libro->getAnio()?></td>
                            <td><?php echo link_to('[Editar]','capitulo_libro_de_persona/edit?id='.$capitulo_de_libro->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                            <br/>
                                <?php echo link_to('[Eliminar]', 'capitulo_libro_de_persona/delete?id='.$capitulo_de_libro->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
  	</fieldset>
  	<fieldset>
  		<legend>Divulgaci&oacute;n (Congresos, charlas, etc...) <?php echo link_to('[Agregar Divulgaci&oacute;n]','divulgacion_de_persona/new'.(isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : ''))?></legend>
  			<table>
                    <thead>
                    	<tr>
                        <th>Datos divulgaci&oacute;n</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php foreach($form->getObject()->getDivulgaciones() as $divulgacion):?>
                       <tr>
                            <td><?php echo $divulgacion->getTextoDivulgacion()?></td>
                            <td><?php echo link_to('[Editar]','divulgacion_de_persona/edit?id='.$divulgacion->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                            <br/>
                                <?php echo link_to('[Eliminar]', 'divulgacion_de_persona/delete?id='.$divulgacion->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
  	</fieldset>
  	<fieldset>
  		<legend>Obras del creador (v&aacute;lido solo para proyectos "Creaci&oacute;n art&iacute;stica") <?php echo link_to('[Agregar Obra]','obra_de_persona/new'.(isset($postulacion) ? '?id_postulacion='.$postulacion->getId() : ''))?></legend>
  			<table>
                    <thead>
                    	<tr>
                        <th>Datos de la obra</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php foreach($form->getObject()->getObras() as $obra):?>
                       <tr>
                            <td><?php echo $obra->getTextoObra()?></td>
                            <td><?php echo link_to('[Editar]','obra_de_persona/edit?id='.$obra->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''))?>
                            <br/>
                                <?php echo link_to('[Eliminar]', 'obra_de_persona/delete?id='.$obra->getId().(isset($postulacion) ? '&id_postulacion='.$postulacion->getId() : ''), array('method' => 'delete', 'confirm' => '\¿Est\u00e1 seguro de querer eliminarlo?')) ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </table>
  	</fieldset>
  </fieldset>
    <div>
        <input type="submit" value="Guardar CV" />
    </div>
        
</form>
