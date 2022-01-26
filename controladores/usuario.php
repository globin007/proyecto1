<?php
error_reporting(E_ALL);
session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$id_usuario=isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
$nombres=isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
$apepaterno=isset($_POST["apepaterno"])? limpiarCadena($_POST["apepaterno"]):"";
$apematerno=isset($_POST["apematerno"])? limpiarCadena($_POST["apematerno"]):"";
$dni=isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$celular=isset($_POST["celular"])? limpiarCadena($_POST["celular"]):"";
$permisos=$_POST["permisos"];



switch ($_GET["op"]){

	case 'listar':
		$rspta = $usuario->listar();
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->id_usuario,
				"1"=>($reg->estado)?'<div class="btn-group"><button class="btn btn-xs btn-sm btn-warning" onclick="mostrar('.$reg->id_usuario.')"><i class="fa fa-edit"></i></button>'.
					'<button class="btn btn-sm btn-xs btn-danger" onclick="desactivar('.$reg->id_usuario.')"><i class="fa fa-user"></i></button>':
					'<div class="btn-group"><button class="btn btn-xs btn-sm btn-warning" onclick="mostrar('.$reg->id_usuario.')"><i class="fa fa-edit"></i></button>'.
					'<button class="btn btn-xs btn-success" onclick="activar('.$reg->id_usuario.')"><i class="fa fa-user"></i></button></div>',
 				"2"=>"$reg->nombres $reg->apepaterno $reg->apematerno",
 				"3"=>$reg->celular,
 				"4"=>$reg->dni,
 				"5"=>$reg->tipo,
				"6"=>($reg->estado)?'<span class="badge badge-success">Activado</span>':
					'<span class="badge badge-danger">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case 'mostrar':
		$rspta=$usuario->mostrar($id_usuario);
 		echo json_encode($rspta);
	break;

	case 'guardaryeditar':	
		$password=md5($dni);
		if (empty($id_usuario)){
			$rspta=$usuario->insertar($login,$password,$nombres,$apepaterno,$apematerno,$dni,$tipo,$celular,$permisos);
			if($rspta){
				$data["condicion"] = 1;
				$data["mensaje"] = "Usuario registrado";
			}
			else{
				$data["condicion"] = 2;
				$data["mensaje"] = "Usuario no registrado";
			}

			echo json_encode($data);	
		}
		else {
			$rspta=$usuario->editar($id_usuario,$login,$password,$nombres,$apepaterno,$apematerno,$dni,$tipo,$celular,$permisos);
			if($rspta){
				$data["condicion"] = 1;
				$data["mensaje"] = "Usuario actualizado";

				// $permisos=$usuario->permisos($id_usuario);

				// unset($_SESSION['Permisos']);
				// unset($_SESSION['listapermisos']);

				// while ($permiso = $permisos->fetch_object()){
				// 	$lista_permisos[$permiso->categoria]["icono"] = $permiso->iconoc;
				// 	$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["nombre"] = $permiso->permiso;
				// 	$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["url"] = $permiso->url;
				// 	$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["icono"] = $permiso->iconop;
				// 	$_SESSION['listapermisos'][$permiso->permiso]=1;
				// }

				// $_SESSION['Permisos'] = $lista_permisos;
			}
			else{
				$data["condicion"] = 2;
				$data["mensaje"] = "Usuario no actualizado";
			}
			echo json_encode($data);	
		}
	break;

	case 'desactivar':
		$rspta=$usuario->desactivar($id_usuario);
		if($rspta){
			$data["condicion"] = 1;
			$data["mensaje"] = "Usuario Desactivado";
		}
		else{
			$data["condicion"] = 2;
			$data["mensaje"] = "Usuario no se pudo desactivar";
		}
		echo json_encode($data);	
	break;

	case 'activar':
		$rspta=$usuario->activar($id_usuario);
		if($rspta){
			$data["condicion"] = 1;
			$data["mensaje"] = "Usuario Activado";
		}
		else{
			$data["condicion"] = 2;
			$data["mensaje"] = "Usuario no se pudo activar";
		}
		echo json_encode($data);	
	break;

	case 'verificar':
		$login=$_POST['login'];
		$password=$_POST['password'];
		$password=md5($password);

		$rspta=$usuario->verificar($login, $password);
		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
			//VARIABLES DE SESION
	        $_SESSION['id_usuario']=$fetch->id_usuario;
			$_SESSION['nombres']=$fetch->nombres;
			$_SESSION['apepaterno']=$fetch->apepaterno;
			$_SESSION['apematerno']=$fetch->apematerno;
			$_SESSION['login']=$fetch->login;
			$_SESSION['password']=$fetch->password;
			$_SESSION['tipo']=$fetch->tipo;
		}
		
		if($_SESSION['tipo']=="administrador")
		{
			$_SESSION['Usuarios']=1;
			$_SESSION['Alumnos']=1;
			$_SESSION['Cursos']=1;
		}

		$permisos=$usuario->permisos($fetch->id_usuario);

		while ($permiso = $permisos->fetch_object()){
					$lista_permisos[$permiso->categoria]["icono"] = $permiso->iconoc;
					$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["nombre"] = $permiso->permiso;
					$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["url"] = $permiso->url;
					$lista_permisos[$permiso->categoria]["detalle"][$permiso->permiso]["icono"] = $permiso->iconop;
					$_SESSION[$permiso->permiso]=1;
			}

		$_SESSION['Permisos'] = $lista_permisos;
	

		echo json_encode($fetch);
		
	break;

	case "checkpermisos":
 
        $listado_permisos = $usuario->listarpermisos();
		$marcados  = $usuario->permisos($id_usuario);
		$valores=array();
		$html = '';

		//almacenar los detalles de la reserva
		while ($det = $marcados->fetch_object()) {
			array_push($valores, $det->id_permiso);
		}

		while ($permiso = $listado_permisos->fetch_object()){
					$lista_permisos[$permiso->categoria][$permiso->id_permiso]["nombre"] = $permiso->permiso;
					$lista_permisos[$permiso->categoria][$permiso->id_permiso]["id"] = $permiso->id_permiso;
			}
		
		//mostramos la lista de bicicletas las reservas
		foreach ($lista_permisos as $key => $row) {

			$html .= '<div class="col-md-6">
                    	<div class="form-group mx-2">	
						<h7>'.$key.' ▼</h7>';
						foreach ($row as $key => $reg) {
							$sw = in_array($reg["id"], $valores)?'checked':'';
							$html .='<div class="custom-control custom-checkbox">		
										<input class="custom-control-input custom-control-input-success custom-control-input-outline" type="checkbox" id="customCheckbox'.$reg["id"].'" name="permisos[]" value ="'.$reg["id"].'"'.$sw.'>
										<label for="customCheckbox'.$reg["id"].'" class="custom-control-label">'.$reg["nombre"].'</label>
									</div>';
						}
			$html .=	'</div>
                  	</div>';
		}
		echo $html;
		//echo var_dump($lista_permisos);
    break;

	case 'validarDNI':
        
        if($dni){
            if(strlen($dni)==8){
                $rspta=$usuario->validarDNI($dni);
                if($rspta == $dni){
					$obj["mensaje"] = "DNI ya registrado"; 
					$obj["color"] = "red";
                }
                else{
					//$datos = file_get_contents("https://api.reniec.cloud/dni/".$dni);
					$datos = file_get_contents("https://api.apis.net.pe/v1/dni?numero=".$dni);
					if($datos){
						$obj["mensaje"] = "Disponible";
						$obj["color"] = "green";
						$obj["datos"] = $datos;
					}
					else{
						$obj["mensaje"] = "No Disponible"; 
						$obj["color"] = "red"; 
						$obj["datos"] = $datos;
					}
                }
            }
            else{
				$obj["mensaje"] = "Minimo 8 caracteres";  
				$obj["color"] = "red";
                
            }
        }
        else{
            $obj["mensaje"] = "Minimo 8 caracteres";
			$obj["color"] = "red";
		}
		//$obj["mensaje"] = $rspta;
		echo json_encode($obj);
        
    break;

	case 'salir': 
        session_unset();
        session_destroy();
        header("Location: ../index.php");
	break;

	case 'selectCliente':
	
		$rspta = $usuario->listarC();

		while ($reg = $rspta->fetch_object())
				{
				echo '<option value=' . $reg->id_usuario . '>' . $reg->nombres . '</option>';
				}
	break;

}