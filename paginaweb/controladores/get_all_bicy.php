<?php
include('../../config/conexion.php');
$response = new stdClass();

//$datos=array();
$datos=[];
$i=0;

/*$sql="SELECT b.id_bicicleta, b.marca, b.modelo, b.color, b.ganancia, e.descripcion as 'estado', e.id_estado, b.imagen FROM bicicleta b INNER JOIN estado_bicicleta e ON b.id_estado = e.id_estado " ;*/
$sql="SELECT b.id_bicicleta, b.marca, b.modelo, b.color, b.ganancia, e.descripcion as 'estado', e.id_estado, b.imagen FROM bicicleta b INNER JOIN estado_bicicleta e ON b.id_estado = e.id_estado" ;
$result=mysqli_query($conexion,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->id_bicicleta=$row['id_bicicleta'];
	$obj->marca=$row['marca'];
	$obj->modelo=$row['modelo'];
	$obj->color=$row['color'];
	$obj->ganancia=$row['ganancia'];
	$obj->estado=$row['estado'];
	$obj->id_estado=$row['id_estado'];
	$obj->imagen=$row['imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);
