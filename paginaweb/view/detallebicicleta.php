<?php
	require 'header.php';
	session_start();
?>
	<title>
		Detalle
	</title>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="reserva.php" class="stext-109 cl8 hov-cl1 trans-04">
				Reservas
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="" class="stext-109 cl8 hov-cl1 trans-04">
				Detalles
			</a>

		</div>
	</div>
		
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3">						
							<div class="slick3 gallery-lb p-l-30" >
								<div style="border-radius:10px;" class="item-slick3" data-thumb="../images/product-detail-01.jpg">
									<div  class="wrap-pic-w pos-relative">
										<img  id="imagen" src="../images/product-detail-01.jpg" alt="IMG-PRODUCT">
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<ul class="p-r-50 p-t-5 p-lr-0-lg">
							<li style="text-align: center; font-weight: bold;" class="ltext-103 p-l-15 cl5">
								CARACTERÍSTICAS
							</li>
							<br>
							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									MARCA:
								</span>
								<span id="marca" class="stext-102 cl6 size-206">
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span  class="stext-102 cl3 size-205">
									MODELO:
								</span>	
								<span id="modelo" class="stext-102 cl6 size-206">
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									COLOR:
								</span>

								<span id="color" class="stext-102 cl6 size-206">
									Black, Blue, Grey, Green, Red, White
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									ACCESORIOS:
								</span>

								<span id="accesorios" class="stext-102 cl6 size-206">
								</span>
							</li>
						</ul>
					</div>

					<section style="padding-top: 30px;">
						<table class="col-md-12 p-t-40">
							<tr class="">
								<th class="pad-basic">
									<button href="#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-show-modal1" style="align-content: center;">
										Reservar
									</button>
								</th>
								<!--<th class="pad-basic">
									<button onclick="location.href='../index.php'" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Reservar
									</button>-->
								</th>
							</tr>
						</table>
					</section>

				<!--<section style="padding-top: 30px;">
						<table id="lista_reservas" class="col-md-12 p-t-40">
							<tr class="bg-light">
								<th class="pad-basic">Reserva</th>
								<th class="pad-basic">Hora Inicio</th>
								<th class="pad-basic">Hora Fin</th>
								<th class="pad-basic">Horas totales</th>
							</tr>
						</table>
					</section>-->

				</div>
					
			</div>

		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SERIE:
			</span>

			<span id="serie" class="stext-107 cl6 p-lr-25">
				Categories: Jacket, Men
			</span>
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

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="p-r-150 p-l-150 bg0 p-t-20 p-b-20 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="../images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div>					
					<div class="col-md-12 col-lg-15 p-b-30 p-l-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h2  class="mtext-105 cl2 js-name-detail p-b-14">
								Tener en cuenta que para realizar una reserva es necesario registrarse
							</h2>

							<!--<span id="id_bicicleta" class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>-->
							
							<!--  -->
							<div class="p-t-33">								
								<div class="p-b-10 p-l-40">
									<div class="size-204 flex-w flex-m respon6-next">										
										<!--<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Reservar
										</button>-->
										<button onclick="location.href='registro.php'" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											Registrarse
										</button>	
									</div>
								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
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
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/slick/slick.min.js"></script>
	<script src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
	

	<script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
		
	</script>

	<script src="../js/detallebicicleta.js"></script>


