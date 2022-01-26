<?php
//echo 'hola';

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

//die();
//var_dump($_GET["op"]);   

switch ($_GET["op"]){
	
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

			}
			else{
				$data["condicion"] = 2;
				$data["mensaje"] = "Usuario no actualizado";
			}
			echo json_encode($data);	
		}
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
	
	case 'validarDNI':
		var_dump($_GET["op"]); 
		$dni='21871525';  
        if($dni){
            if(strlen($dni)==8){
                $rspta=$usuario->validarDNI($dni);
				var_dump($rspta);
				die();
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
		//$obj["mensaje"] = $dni;
		//echo json_encode($obj);
		var_dump($obj);
        
    break;

	case 'prueba':
		$obj["mensaje"] = 'prueba';
		echo json_encode($obj);
	break;
	
}