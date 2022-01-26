<?php
    include("../../config/conexion.php");
    date_default_timezone_set('America/Lima');

    if(isset($_POST['register'])){
        if(strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['celular']) >=1 && strlen($_POST['msg']) >= 1){
            $name=trim($_POST['nombre']);
            $correo=trim($_POST['correo']);
            $celular=trim($_POST['celular']);
            $msg=trim($_POST['msg']);
            $fechareg=date("d-m-y H:i:s");
            $sql="INSERT INTO contacto(nombre,correo,celular,msg,fecha_reg) VALUES ('$name','$correo','$celular','$msg','$fechareg')";
            $result=mysqli_query($conexion,$sql);
            if($result){
                ?>
                    <span style="font-size: 15px; font-family:Poppins-Medium" class="alert alert-primary">¡Se envió correctamente su mensaje!</span>
                <?php
            }else{
                ?>
                <!--<h3 class="bad">¡Ups ha ocurrido un error!</h3>-->
                <?php
            }
        }   
    }
    

?>