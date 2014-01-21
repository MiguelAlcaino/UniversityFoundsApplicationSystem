
<br />
<table>
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
<?php foreach($form->getObject()->getRecursos() as $k => $recurso):?>
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
        <td>$<?php echo number_format($detalle_recurso->getMonto(),0,'','.') ?></td>
     <?php endforeach;?>
     <td>$<?php echo number_format($recurso->getTotal(),0,'','.')?></td>
	</tr>
    <?php $suma_recursos = $suma_recursos + $recurso->getTotal()?>
<?php endforeach;?>
    <tr>
        <th >Total</th>
        <td>$<?php echo number_format($suma_semestre1,0,'','.')?></td>
        <td>$<?php echo number_format($suma_semestre2,0,'','.')?></td>
        <td>$<?php echo number_format($suma_recursos,0,'','.')?></td>
    </tr>
</tbody>
</table>
