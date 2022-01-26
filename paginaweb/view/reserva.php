<?php
	
    require 'header.php';
	
?> 

<style>
	footer{
	background: #000;
	width: 100%;
}
.body-footer{
	width: 100%;
	max-width: 1200px;
	margin: 0 auto;
	padding: 20px 0;
}
.body-footer h5{
	margin: 0;
	color: #aaa;
}
.title-section{
	margin: 20px;
	padding: 10px 0; 
	font-size: 20px;
	color: #666;
	font-family: 'Sen', sans-serif;
}
.products-list{
	display: table;
	width: 100%;

}
.product-box{
	margin: 10px;
	display: inline-table;
	padding: 10px;
	width: calc(100%/4 - 20px);
}
.product-box a{
	text-decoration: none;
}
.product{
	width: 100%;
	border-radius: 10px;
	box-shadow: 0 0 8px 3px #ccc;
	background-color: #fff;
	font-family: 'Sen', sans-serif;
}
.product img{
	height: 20pc;
	width: 100%;
	border-radius: 10px 10px 0 0;
}
.detalles{
	background:#ccc;
	border-radius: 0 0 10px 10px;
}
.detail-title{
	padding: 5px;
	text-align: center;
	font-family: Poppins-Bold;
	font-size: 18px;
	color: #333;
	width: calc(100% - 10px);
	height: 35px;
}
.detail-description{
	text-align: center;
	font-size: 14px;
	font-family: Poppins-Medium;
	color: #333;
	padding: 5px;
	width: calc(100% - 10px);
	height: 34px;
}

@media(max-width: 850px){
	.product-box {
	    width: calc(100%/4 - 20px);
	}
}
@media(max-width: 700px){
	.product-box {
	    width: calc(100%/3 - 20px);
	}
	.options-place{
		width: 200px;
	}
	.search-place{
		width: calc(100% - 250px);
	}
}
@media(max-width: 500px){
	.product-box {
		margin: 10px;
	    width: calc(100% - 20px);
	}
	.options-place{
		display: none;
	}
	.menu-movil{
		display: block;
	}
	.logo-place{
		width: 100px;
		margin-top: 2px;
	}
	.search-place{
		width: calc(100% - 170px);
	}
	.menu-opciones {
	    right: 10px;
	}
	.content-page section{
		display: block;
	}
	.part2{
		width: calc(100% - 20px);
	}
	.part2 h2,.part2 h1,.part2 h3{
		margin: 0;
	}
	.part2 h2{
		font-size: 20px;
	}
	.part2 h1{
		font-size: 25px;
	}
	.part2 h1 span{
		font-size: 16px;
	}
	.part2 h4{
		font-size: 14px;
	}
	.pedido-img{
		width: 120px;
	}
	.pedido-detalle{
		width: calc(100% - 140px);
	}
	h3{
		margin: 10px 0;
	}
}
</style>

	<title>
		Reserva
	</title>

	<section class="bg0 p-t-23 p-b-140" >
		<div class="container">
			<div class="p-b-10">	
				<h3 style="color: #717fe0;" class="ltext-103 cl5">
					Bicicletas destacadas
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					
				</div>

				<!--<div class="flex-w flex-c-m m-tb-10">					
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div>
				</div>-->
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="txtnom" id="txtnom" placeholder="Buscar" onkeyup="busqueda();">
					</div>	
				</div>

				
			</div>

			<div class="main-content">
				<div class="content-page">
					<div class="products-list" id="space-list"></div>
				</div>
			</div>
		
	</section>	

	
<!--
	<div class="main-content">
		<div class="content-page">
			<div class="title-section">Productos destacados</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
-->   
    

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
	<script src="../js/reserva.js"></script>
	<!-- jQuery -->


</body>
</html>
