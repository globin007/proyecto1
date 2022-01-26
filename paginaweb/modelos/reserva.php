<?php

require "../../config/conexion.php";

class Reserva
{
    //Implementamos nuestro constructor
	public function __construct()
	{

	}

    public function listar()
    {
        $sql="SELECT b.id_bicicleta, b.marca, b.modelo, b.color, b.ganancia, e.descripcion as 'estado', e.id_estado, b.imagen FROM bicicleta b INNER JOIN estado_bicicleta e ON b.id_estado = e.id_estado" ;
		$bicicletas = ejecutarConsulta($sql);	
		return $bicicletas;	
    }
}