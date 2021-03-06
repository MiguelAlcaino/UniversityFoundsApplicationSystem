<h1>Resumen de recursos del proyecto</h1>
<table class="bordeada" style="width: 100%;">
<thead>
	<tr>
		<th>Item</th>
        <th>Semestre 1</th>
        <th>Semestre 2</th>
        <th>Total</th>
	</tr>
</thead>
<tbody>
<?php $suma_recursos = 0?>
<?php $suma_semestre1 = 0?>
<?php $suma_semestre2 = 0?>
<?php foreach($postulacion->getRecursos() as $k => $recurso):?>
	<tr>
	 <th><?php echo $recurso ?></th>
     <?php $numero_recurso = 1?>
     <?php foreach($recurso->getDetallesRecurso() as $detalle_recurso): ?>
        <?php
        if($numero_recurso == 1){
            $suma_semestre1 = $suma_semestre1 + $detalle_recurso->getMonto();
        }else{
            $suma_semestre2 = $suma_semestre2 + $detalle_recurso->getMonto();
        }
        $numero_recurso++;
        ?>
        <td>$<?php echo $detalle_recurso->getMonto()?></td>
     <?php endforeach;?>
     <td>$<?php echo $recurso->getTotal()?></td>
	</tr>
    <?php $suma_recursos = $suma_recursos + $recurso->getTotal()?>
<?php endforeach;?>
    <tr>
        <th >Total</th>
        <td>$<?php echo $suma_semestre1?></td>
        <td>$<?php echo $suma_semestre2?></td>
        <td>$<?php echo $suma_recursos?></td>
    </tr>
</tbody>
</table>

<?php $array_gastos = array();?>
    <?php foreach($postulacion->getRecursos() as $recurso):?>
        <?php foreach($recurso->getDetallesRecurso() as $detalle_recurso): ?>
          <?php if($recurso->getItemConcurso()->getItem()->getAcronimo() == 'gastos_operacion'):?>
            <?php if($detalle_recurso->getPeriodo() == 1):?>
              <?php foreach($detalle_recurso->getDetallesRecursoGastosOperacion() as $det_gastos_operacion):?>
                <?php $array_gastos[1][$det_gastos_operacion->getTipoDeGasto()] = $det_gastos_operacion->getMonto()?>
              <?php endforeach;?>
            <?php else:?>
              <?php foreach($detalle_recurso->getDetallesRecursoGastosOperacion() as $det_gastos_operacion):?>
                <?php $array_gastos[2][$det_gastos_operacion->getTipoDeGasto()] = $det_gastos_operacion->getMonto()?>
              <?php endforeach;?>
            <?php endif;?>
          <?php endif;?>
        <?php endforeach;?>
    <?php endforeach;?>
<h2>Detalle de los gastos de operación</h2>
<table class="bordeada" style="width: 100%;">
  <thead>
    <tr>
      <th>Tipo de Gasto</th>
      <th>Semestre 1</th>
      <th>Semestre 2</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Insumos computacionales</th>
      <td>$<?php echo $array_gastos[1][1]?></td>
      <td>$<?php echo $array_gastos[2][1]?></td>
    </tr>
    <tr>
      <th>Reactivos e insumos de laboratorio</th>
      <td>$<?php echo $array_gastos[1][2]?></td>
      <td>$<?php echo $array_gastos[2][2]?></td>
    </tr>
    <tr>
      <th>Libros y artículos de librería</th>
      <td>$<?php echo $array_gastos[1][3]?></td>
      <td>$<?php echo $array_gastos[2][3]?></td>
    </tr>
    <?php if($postulacion->getConcurso()->getAcronimo() == 'di_sello_valorico' ):?>
    <tr>
      <th>Actividades de difusión</th>
      <td>$<?php echo $array_gastos[1][4]?></td>
      <td>$<?php echo $array_gastos[2][4]?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th>Otros</th>
      <td>$<?php echo $array_gastos[1][5]?></td>
      <td>$<?php echo $array_gastos[2][5]?></td>
    </tr>
  </tbody>
</table>
