<?php

require_once 'Excel/reader.php';

$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('fichero.xls');

//Establecemos las cabeceras para un archivo xls
header('Content-type: application/vnd.ms-excel');
		header("Content-Disposition: attachment; filename=excelenphp.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		
//Y mostramos los datos en forma de tabla
echo("<table>");
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
	echo("<tr>");
	for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo("<td>".$data->sheets[0]['cells'][$i][$j] ."</td>");
	}
	echo("</tr>");
	
}
echo("</table>");