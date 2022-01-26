<?php
session_start(); 
require_once "../modelos/Detallebicicleta.php";

$detallebicicleta =new Detallebicicleta();

$id_bicicleta =isset($_POST["id_bicicleta"])? limpiarCadena($_POST["id_bicicleta"]):"";
$marca=isset($_POST["marca"])? limpiarCadena($_POST["marca"]):"";
$modelo=isset($_POST["modelo"])? limpiarCadena($_POST["modelo"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
$ganancia=isset($_POST["ganancia"])? limpiarCadena($_POST["ganancia"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$id_estado=isset($_POST["id_estado"])? limpiarCadena($_POST["id_estado"]):"";
$estado_bicicleta=isset($_POST["estado_bicicleta"])? limpiarCadena($_POST["estado_bicicleta"]):"";

switch ($_GET["op"]) {
    case 'listardetalles':
        $rspta=$detallebicicleta->listardetalles();
        //Vamos a declarar un array
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>$reg->id_bicicleta,
                "1"=>$reg->marca,
                "2"=>$reg->modelo,
                "3"=>$reg->color,
                "4"=>$reg->imagen,
                );
        }
        $results = array(
            //"sEcho"=>1, //Información para el datatables
            //"iTotalRecords"=>count($data), //enviamos el total registros al datatable
            //"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            //"aaData"=>
            $data
            );
        echo json_encode($results);
        break;
}


