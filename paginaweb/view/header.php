<!DOCTYPE html>
<html lang="en">
<head>
	<!--<title>Home</title>-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->

	<!-- Alertify CSS -->
	<link rel="stylesheet" href="../vendor/recursos-nuevos/plugins/alertifyjs/css/alertify.min.css">
  <!-- Alertify theme default -->
  	<link rel="stylesheet" href="../vendor/recursos-nuevos/plugins/alertifyjs/css/themes/default.min.css" />
<!--===============================================================================================-->
</head>


<!--<style>
	.submenu{
	position: absolute;
	background: #333333;
	width: 120%;
	visibility: hidden;
	opacity: 0;
	transition: opacity 1.5s;
	}
	.submenu li a{
	display: block;
	padding: 15px;
	color: #fff;
	font-family: 'Open sans';
	text-decoration: none;
}
</style>-->

<body class="animsition">
	
	<!-- Header -->
	<header class="header-v2">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="inicio.php" class="logo">
						<img src="../images/icons/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a style="font-size:18px; font-family: 'Poppins-SemiBold';" href="inicio.php">INICIO</a>
							</li>

							<li>
								<a style="font-size:18px; font-family: 'Poppins-SemiBold';" href="reserva.php">RESERVA</a>
							</li>

							<li>
								<a style="font-size:18px; font-family: 'Poppins-SemiBold';" href="alquiler.php">ALQUILER</a>
							</li>

							<li>
								<a style="font-size:18px; font-family: 'Poppins-SemiBold';" href="contacto.php">CONTACTO</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<!--<div class="icon-header-item">
							<button onclick="location.href='../inicio.php'"><i class="fa fa-sign-in">Ingresar</i></button>
							<button onclick="location.href='login.php'"><i class="fa fa-sign-in">Ingresar</i></button>
						</div>-->
						<div class="main-menu">
							<li>
								<a style="font-size:18px" style="align-center" href=""><strong>GO TO EN LÍNEA</strong><i class="p-l-10 fa fa-cog"></i></a>
									<ul class="sub-menu">
										<li>
											<a style="font-size:18px" href="login.php">
												<i class="fa fa-sign-in"></i>
												<strong>
													Ingresar
												</strong>
											</a>
										</li>
										<li>
											<a style="font-size:18px" href="registro.php">
												<i class="fa fa-registered"></i>
												<strong>
													Registro
												</strong>
											</a>
										</li>
									</ul>
							</li>							
						</div>
					</div>
				
					<!---->
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="inicio.php"><img src="../images/icons/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item">
					<!--<button onclick="location.href='../inicio.php'"><i class="fa fa-sign-in"></i></button>-->
					<button onclick="location.href='login.php'"><i class="fa fa-sign-in"></i></button>
				</div>
			</div>

			<!-- Icon header 
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item">
					<button onclick="location.href='registro.php'"><i class="fa fa-registered"></i></button>
				</div>
			</div>-->

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="inicio.php">Inicio</a>
				</li>

				<li>
					<a href="reserva.php">Reserva</a>
				</li>

				<li>
					<a href="alquiler.php">Alquiler</a>
				</li>				

				<li>
					<a href="contacto.php">Contacto</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="../images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	

