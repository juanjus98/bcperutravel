<?php
/**
 * Website
 * Desarrollado por Juan Julio Sandoval Layza <juanjus98@gmail.com>
 */
$website_info = $this->website_info;
/*echo "<pre>";
print_r($website_info);
echo "</pre>";*/
$direccion = $website_info['direccion'];
$telefono_1 = $website_info['telefono_1'];
$telefono_2 = $website_info['telefono_2'];
$email_1 = $website_info['email_1'];
$email_2 = $website_info['email_2'];
$skype_user = 'skype:'.$website_info['skype'].'?call';
$facebook_messenger = 'https://m.me/' . $website_info['messenger']; //Messenger facebook
$whatsapp_messenger = 'https://api.whatsapp.com/send?phone=' . $telefono_2;
$url_facebook = 'https://www.facebook.com/' . $website_info['url_facebook'];
$url_twitter = 'https://twitter.com/' . $website_info['url_twitter'];
$url_youtube = 'https://www.youtube.com/user/' . $website_info['url_youtube'];
/**
 * Preparar tags en header
 */
$tag_title = str_replace(array('\r\n', '\r', '\n'), " ",strip_tags($head_info['title']));
$tag_description = $head_info['description'];
$tag_keywords = str_replace(array('\r\n', '\r', '\n'), " ",strip_tags($head_info['keywords']));
$tag_url = base_url() . uri_string();
$tag_image = $head_info['image'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title><?php echo $retVal = (@$template['title'] != 'Inicio') ? @$template['title'] . ' - ' : ''; ?> <?php echo $tag_title; ?></title>
	<meta name="description" content="<?php echo $tag_description; ?>" />
	<meta name="author" content="<?php echo base64_decode("d2ViQXB1LmNvbQ=="); ?>" />
	<meta name="keywords" content="<?php echo strip_tags($head_info['keywords']); ?>" />
	<meta name="robots" content="index, follow" />
	<!--Para facebook-->
	<meta property="og:title" content="<?php echo $tag_title; ?>" />
	<meta property="og:description" content="<?php echo $tag_description; ?>" />
	<meta property="og:url" content="<?php echo $tag_url; ?>" />
	<meta property="og:image" content="<?php echo $tag_image; ?>" />
	
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" />

	<link rel="stylesheet" type="text/css" href="assets/plugins/progressively/progressively.min.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<link rel="apple-touch-icon" sizes="57x57" href="assets/icons/apple-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="60x60" href="assets/icons/apple-icon-60x60.png" />
<link rel="apple-touch-icon" sizes="72x72" href="assets/icons/apple-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="assets/icons/apple-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="assets/icons/apple-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="assets/icons/apple-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="assets/icons/apple-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="assets/icons/apple-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-icon-180x180.png" />
<link rel="icon" type="image/png" sizes="192x192" href="assets/icons/android-icon-192x192.png" />
<link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="96x96" href="assets/icons/favicon-96x96.png" />
<link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png" />
<link rel="manifest" href="assets/icons/manifest.json" />
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="assets/icons/favicon.ico" type="image/x-icon" />
<link rel="icon" href="assets/icons/favicon.ico" type="image/x-icon" />
<script type="text/javascript">var base_url='<?php echo base_url();?>';</script>

<script src="assets/plugins/jquery/jquery-3.1.1.min.js" type="text/javascript"></script>

<!-- lightslider-->
<link href="assets/plugins/lightslider/css/lightslider.min.css" rel="stylesheet"/>
<script src="assets/plugins/lightslider/js/lightslider.min.js"></script>
<!-- //lightslider-->

<!-- wow.js-->
<script src="assets/js/wow.min.js" type="text/javascript"></script>
<!-- //wow.js-->
<!-- progressively.min.js-->
<script src="assets/plugins/progressively/progressively.min.js" type="text/javascript"></script>
<!-- //progressively.min.js-->

<!-- Chosen-->
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<!-- //Chosen-->

<!-- Bootstrap datepicker-->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<!-- //Bootstrap datepicker-->

<!-- assets/plugins/typeahead.jquery.js-->
<link rel="stylesheet" type="text/css" href="assets/plugins/typehead/jquery.typeahead.css" />
<script src="assets/plugins/typehead/jquery.typeahead.js"></script>

<link rel="stylesheet" type="text/css" href="assets/css/style.min.css" />

</head>
<body>
	<div id="header_1">
		<header class="">
			<div id="top_line">
				<div class="container bg-pattern-1">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<ul class="nav nav-pills nav-topline">
								<li role="presentation"><a href="tel://+512630012"><i class="fa fa-phone" aria-hidden="true"></i>+51 263 0012</a></li>
								<li role="presentation"><a href="#" class="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i>+51 981 001 581</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-6 hidden-xs">
							<ul class="nav nav-pills nav-topline pull-right">
								<li role="presentation"><a href="#">Nosotros</a></li>
								<li role="presentation"><a href="#">Blog</a></li>
								<li role="presentation"><a href="#">Contáctenos</a></li>
							</ul>
						</div>
					</div>
					<!-- End row -->
				</div>
				<!-- End container-->
			</div>
			<!-- End top line-->
			<!-- navbar-->
			<div class="wa-menu">
				<nav class="navbar navbar-website navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle x collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar top-bar"></span>
								<span class="icon-bar middle-bar"></span>
								<span class="icon-bar bottom-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo base_url();?>">
								<img src="assets/images/logo.png" alt="">
							</a>
						</div>
						<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right navbar-nav-wa">
								<li class="active"><a href="#">Inicio</a></li>
								<li><a href="#">Paquetes Turísticos</a></li>
								<li><a href="#">Promociones</a></li>
								<li><a href="#">Tickets</a></li>
								<li><a href="#">Año Nuevo</a></li>
							</ul>
						</div>
						<!--/.nav-collapse -->
					</div>
					<!--/.container-fluid -->
				</nav>
			</div>
			<!-- //navbar-->
		</header>
		<!-- End Header -->
	</div>
	<!-- //header_1-->
	<?php echo @$template['body']; ?>
	<!-- Footer-->

	<div class="container container-respaldados">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4>Respaldados por:</h4>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<?php
				$respaldados = array(
					array(
						'titulo' => 'Ministerio de Comercio Exterior y Turimo',
						'imagen' => 'assets/images/logo_mincetur.jpg'
					),
					array(
						'titulo' => 'Ministerio de Comercio Exterior y Turimo',
						'imagen' => 'assets/images/visa.png'
					),
					array(
						'titulo' => 'Ministerio de Comercio Exterior y Turimo',
						'imagen' => 'assets/images/visa.png'
					),
					array(
						'titulo' => 'Ministerio de Comercio Exterior y Turimo',
						'imagen' => 'assets/images/visa.png'
					),
				);
				foreach ($respaldados as $key => $value) {
					?>
					<div class="logo-item">
						<img src="<?php echo $value['imagen'];?>" title="<?php echo $value['titulo'];?>">
					</div>
					<?php
				}
				?>				
			</div>
		</div>
	</div>

	<footer>
		<section class="nb-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="footer-single">
							<div class="footer-title"><h2>Información de Contácto</h2></div>
							<address>
								<strong>Oficina:</strong> <?php echo $retVal = (!empty($direccion)) ? $direccion : '' ; ?> <br>
								<i class="fa fa-phone"></i> <?php echo $retVal = (!empty($telefono_1)) ? $telefono_1 : '' ; ?> <br>
								<i class="fa fa-whatsapp"></i> <?php echo $retVal = (!empty($telefono_2)) ? $telefono_2 : '' ; ?><br>
								<i class="fa fa-envelope"></i> <?php echo $retVal = (!empty($email_1)) ? $email_1 : '' ; ?><br>
							</address> 
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="footer-single useful-links">
							<div class="footer-title"><h2>Tours Destacados</h2></div>
							<ul class="list-unstyled">
								<li><a href="#">Home <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">About Us <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Services <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Portfolio <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Pricing <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Contact Us <i class="fa fa-angle-right pull-right"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="footer-single useful-links">
							<div class="footer-title"><h2>Estadia</h2></div>
							<ul class="list-unstyled">
								<li><a href="#">Home <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">About Us <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Services <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Portfolio <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Pricing <i class="fa fa-angle-right pull-right"></i></a></li>
								<li><a href="#">Contact Us <i class="fa fa-angle-right pull-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer>
	<!-- //Footer-->
	<!-- JavaScript-->
	<script src="assets/plugins/bootstrap.min.js" type="text/javascript"></script>

	<script src="assets/js/website.min.js" type="text/javascript"></script>
	<!-- JavaScript-->


	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700|Lobster" rel="stylesheet">
</body>
</html>
