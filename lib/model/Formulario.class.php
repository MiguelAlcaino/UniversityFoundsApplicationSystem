<?php 
class Formulario{
	static private $array_concursos = array(
		'formulario_standar' => array(
			1 => array( // Identificación
				1 => array('titulo')),
			2 => array( // Formulación
				1 => array('resumen'),
				2 => array('problema_solucion', 'estado_del_arte', 'hipotesis', 'objetivos', 'resultados', 'metodologia', 'bibliografia'),
				3 => array('trabajo_adelantado')),
			3 => array(
				1 => 'prueba'))
	);
}