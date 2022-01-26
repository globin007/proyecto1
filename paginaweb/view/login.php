<?php
require 'header.php';

?>

    <title>
        Iniciar Sesión
	</title>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-150" style="background-image: url('../images/loginport2.jpg');">
		<!--<h2 class="ltext-105 cl0 txt-center">
			Iniciar Sesión
		</h2>-->
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-10 p-b-10">
		<div class="container">
			<div class="flex-tr">
				<div class="size-219 bor20 p-lr-301 p-t-55 p-b-301 p-lr-15-lg w-full-md">
					<form method="post" id="frmAcceso">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Login
                        </h4>
                        
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="login" placeholder="Usuario" required>
							<img class="how-pos4 pointer-none" src="../images/icons/usuario.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" id="password" placeholder="Contraseña" required>
							<img class="how-pos4 pointer-none" src="../images/icons/password.png" alt="ICON">
						</div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Ingresar
						</button>
                        <br>
                        <p>
                            <strong><a class="mtext-104" style="color:black" href="registro.php">Regístrese como nuevo cliente</a></strong>
                        </p>
					</form>
				</div>

				
			</div>
		</div>
	</section>	

<?php
		require 'footer.php';
?>

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
	<script type="text/javascript" src="../js/login.js"></script>


</body>
</html>