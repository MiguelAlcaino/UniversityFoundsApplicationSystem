<h1>Curriculum</h1>
<table>
  <tbody>
    <tr>
      <th>Tipo profesor:</th>
      <td><?php echo $persona->getTipoProfesor() ?></td>
    </tr>
    <tr>
      <th>Unidad academica:</th>
      <td><?php echo $persona->getUnidadAcademica() ?></td>
    </tr>
    <tr>
      <th>Rut:</th>
      <td><?php echo $persona->getRut() ?>-<?php echo $persona->getDv() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $persona->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido Paterno:</th>
      <td><?php echo $persona->getApellido1() ?></td>
    </tr>
    <tr>
      <th>Apellido Materno:</th>
      <td><?php echo $persona->getApellido2() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $persona->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $persona->getEmail() ?></td>
    </tr>
  </tbody>
</table>
  		
<h3>Proyectos FONDECYT</h3>
                        <table class="bordeada" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    
                                </tr>
                            </thead>
  				<?php foreach($persona->getProyectosSegunTipo(1) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		
  
<h3>Otros Proyectos Externos (Nacionales e Internacionales) </h3>
                        <table class="bordeada" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    
                                </tr>
                            </thead>
  				<?php foreach($persona->getProyectosSegunTipo(2) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		

  			<h3>Proyectos internos</h3>
                        <table class="bordeada" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Fuente</th>
                                    <th>Concurso</th>
                                    <th>Participaci&oacute;n</th>
                                    <th>C&oacute;digo</th>
                                    <th>T&iacute;tulo</th>
                                    
                                </tr>
                            </thead>
  				<?php foreach($persona->getProyectosSegunTipo(3) as $proyecto):?>
                                    <tr>
                                        <td><?php echo $proyecto->getFuente()?></td>
                                        <td><?php echo $proyecto->getConcurso()?></td>
                                        <td><?php echo ($proyecto->getTipoParticipacion() == 1) ? 'Investigador principal' : 'Co-investigador'?></td>
                                        <td><?php echo $proyecto->getCodigo()?></td>
                                        <td><?php echo $proyecto->getTitulo()?></td>
                                        
                                    </tr>
  				<?php endforeach;?>
  			</table>
  		
  	
<h3>Publicaciones</h3>
                <table class="bordeada" style="width: 100%;">
                    <thead>
                        <tr>
                        <th>Tipo</th>
                        <th>Revista</th>
                        <th>T&iacute;tulo</th>
                        <th>A&ntilde;o</th>
                        <th>Volumen</th>
                        <th>N&uacute;mero</th>
                        </tr>
                    </thead>
                    <?php foreach($persona->getPublicaciones() as $publicacion):?>
                        <tr>
                            <td><?php echo $publicacion->getTipoPublicacion()?></td>
                            <td><?php echo $publicacion->getNombreRevista()?></td>
                            <td><?php echo substr($publicacion->getTituloPublicacion(),0,50).'.-'?></td>
                            <td><?php echo $publicacion->getAnio()?></td>
                            <td><?php echo $publicacion->getVolumen()?></td>
                            <td><?php echo $publicacion->getNumero()?></td>
                            
                        </tr>
                    <?php endforeach;?>
                </table>

<h3>Libros</h3>
        <table class="bordeada" style="width: 100%;">
                    <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>A&ntilde;o</th>
                        </tr>
                    </thead>
                    <?php foreach($persona->getLibros() as $libro):?>
                       <tr>
                            <td><?php echo $libro->getNombre()?></td>
                            <td><?php echo $libro->getEditorial()?></td>
                            <td><?php echo $libro->getAnio()?></td>
                            
                        </tr>
                    <?php endforeach;?>
                </table>

<h3>Capitulos de libro</h3>
        <table class="bordeada" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Nombre de Capitulo</th>
                        <th>Nombre de Libro</th>
                        <th>Editorial</th>
                        <th>A&ntilde;o</th>
                    </tr>
                    </thead>
                    <?php foreach($persona->getCapitulosDeLibros() as $capitulo_de_libro):?>
                       <tr>
                            <td><?php echo $capitulo_de_libro->getNombreCapitulo()?></td>
                            <td><?php echo $capitulo_de_libro->getNombreLibro()?></td>
                            <td><?php echo $capitulo_de_libro->getEditorial()?></td>
                            <td><?php echo $capitulo_de_libro->getAnio()?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
                

<h3>Divulgaci&oacute;n (Congresos, charlas, etc...)</h3>
  		<table class="bordeada" style="width: 100%;">
                    <thead>
                    	<tr>
                        <th>Datos divulgaci&oacute;n</th>
                        </tr>
                    </thead>
                    <?php foreach($persona->getDivulgaciones() as $divulgacion):?>
                       <tr>
                            <td><?php echo $divulgacion->getTextoDivulgacion()?></td>
                        </tr>
                    <?php endforeach;?>
                </table>


<h3>Obras del creador</h3>
  		<table class="bordeada" style="width: 100%;">
           <thead>
           <tr>
              <th>Datos de la obra</th>
              </tr>
            </thead>
                    <?php foreach($persona->getObras() as $obra):?>
                       <tr>
                            <td><?php echo $obra->getTextoObra()?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
