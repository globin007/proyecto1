<?php
require 'header.php';
date_default_timezone_set('America/Lima');
//include("registrar.php");

?>

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  	<!-- Toastr -->
  	<link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    
 	<title>
        Registro
	</title>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
            Registro
		</h2>
	</section>	


<!-- <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md"> -->


	<!-- Content page -->
	<section class="bg0 p-t-10 p-b-10">
		<div class="container">
			<div class="flex-tr">
				<div class="size-219 bor20 p-lr-301 p-t-55 p-b-301 p-lr-15-lg w-full-md">
					<form name="formulario" id="formulario" method="post" class="form-contacto">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            INGRESE SUS DATOS
                        </h4>

						<div class="flex-w">
							<strong><p class="mtext-104 p-l-10" style="color:black">DNI</p></strong>
							<span class="p-l-220" id="validacion"></span>
						</div>
                                               
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="dni" name="dni" placeholder="DNI" required>
							<img class="how-pos4 pointer-none" src="../images/icons/dni.png" alt="ICON">
						</div>

                        <strong><p class="mtext-104 p-l-10" style="color:black">Nombres</p></strong>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input type="hidden" name="id_usuario" id="id_usuario">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="nombres" name="nombres" placeholder="Nombres" required readonly>
							<img class="how-pos4 pointer-none" src="../images/icons/nombre.png" alt="ICON">
						</div>

                        <strong><p class="mtext-104 p-l-10" style="color:black">Apellido Paterno</p></strong>

                        <div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="apepaterno" name="apepaterno" placeholder="Apellido Paterno" required readonly>
							<img class="how-pos4 pointer-none" src="../images/icons/nombre.png" alt="ICON">
						</div>

                        <strong><p class="mtext-104 p-l-10" style="color:black">Apellido Materno</p></strong>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="apematerno" name="apematerno" placeholder="Apellido Materno" required readonly>
							<img class="how-pos4 pointer-none" src="../images/icons/nombre.png" alt="ICON">
						</div>

                        <strong><p class="mtext-104 p-l-10" style="color:black">Tipo</p></strong>

						<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
							<select class="js-select2" name="tipo" id="tipo">
								<option selected disabled hidden>-Seleccione Tipo-</option>
								<option value="cliente">Cliente</option>
								<option value="proveedor">Proveedor</option>
							</select>
							<div class="dropDownSelect2"></div>
						</div>
						
                        <strong><p class="mtext-104 p-l-10" style="color:black">Celular</p></strong>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="celular" placeholder="Celular" required>
							<img class="how-pos4 pointer-none" src="../images/icons/celular.png" alt="ICON">
						</div>
					
                        <br>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" id="btnGuardar">
							Registrarse
						</button>
                        
                        
					</form>
				</div>

				
			</div>
		</div>
	</section>	

<?php
		require 'footer.php';
?>

<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- Back to top -->

<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../vendor/recursos-nuevos/plugins/alertifyjs/js/alertify.min.js"></script> 
	<script src="../vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>
	<script src="../js/registro.js"></script>
	<script src="../js/apireniec.js"></script>
	
	
</body>
</html>

