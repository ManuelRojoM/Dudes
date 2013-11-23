<?php
	header('Content-Type: text/html; charset=utf-8');
	$mainjson = "";
	$app_id = "536609326429099";
	$app_secret = "748e58cf54e5bf4f81117911c6ae69ed"; 
	$my_url = "http://localhost:8888/index.php";
	$access_token = "CAACEdEose0cBADw2ib68j6XDggRPTiGKg8GZBppsApRxlJeyRLEiB4ttrXP2xZC2JZAtOFcYDgMqkZB0O3G5QMxf3vvuMgekjqAeUuRGBICWnIn2TmSZC1mHBX30c0CsEKzMMARZAtdfM15qoseQJKUJsuMqqqy7AkLYcRSDZBxlzI4gZAs3FpArhl1TDlKaGAvsSMRKVXXp1gZDZD";
	$code = $_REQUEST["code"];
	$pics = array();
	$links = array();
	$posts = array();
	// If we get a code, it means that we have re-authed the user 
	//and can get a valid access_token. 
	if (isset($code)) {
		$token_url="https://graph.facebook.com/oauth/access_token?client_id="
		. $app_id . "&redirect_uri=" . urlencode($my_url) 
			. "&client_secret=" . $app_secret 
				. "&code=" . $code . "&display=popup";
		$response = file_get_contents($token_url);
		$params = null;
		parse_str($response, $params);
		$access_token = $params['access_token'];
	}

	//Attempt to query the graph:
	$graph_url = "https://graph.facebook.com/me?"
	. "access_token=" . $access_token;
	$response = curl_get_file_contents($graph_url);
  	$decoded_response = json_decode($response);
	//Check for errors 
	if ($decoded_response->error) {
		//check to see if this is an oAuth error:
			if ($decoded_response->error->type== "OAuthException"){
				// Retrieving a valid access token. 
				$dialog_url= "https://www.facebook.com/dialog/oauth?"
				. "client_id=" . $app_id 
					. "&redirect_uri=" . urlencode($my_url);
				echo("<script> top.location.href='" . $dialog_url 
					. "'</script>");
			}
			else {
			}
		} 
		else {
			$json = file_get_contents('https://graph.facebook.com/losdudesmx/posts?limit=14&access_token='.$access_token);
			$mainjson = json_decode(utf8_decode($json));
			$contador = 0;
			foreach ($mainjson->data as $data) {
							$message = $data->message;
							$picture = $data->picture;
							$linktemp = $data->link;

							$linkposarr = $data->actions;
							$secar = $linkposarr[0];
							foreach ($linkposarr as $linkpos){
								if($contador++ % 2 == 0)
									$posts[] = $linkpos->link;
							}

							$findme   = 'http%3A'; // http: no https :3
							$pos = strpos($picture, $findme);
							$newpic = substr($picture, $pos);
							$pics[] = urldecode($newpic);
							$links[] = urldecode($linktemp);
						}

		}
		function curl_get_file_contents($URL) {
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $URL);
			$contents = curl_exec($c);
			$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
			curl_close($c);
			if ($contents) return $contents;
			else return FALSE;
		}
		echo '<!DOCTYPE html>
<html lang= "es">
	<head>
		<title>Los Dudes</title>
		<meta charset="UTF-8">
		<!--[if lt IE 9]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.css"/>    
		<link rel="stylesheet" href="css/default.css"/> 
		<link rel="stylesheet" href="css/behaviour.css"/>  
		<link rel="stylesheet" href="css/widget.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/flexnav.css" />
		<link rel="stylesheet" href="css/flexslider.css"/>
		<link rel="stylesheet" href="css/flexslidercarousel.css"/>
		<link rel="stylesheet" href="css/flexsliderblog.css"/>
		<link rel="stylesheet" href="css/flexsliderfolio.css"/>
		<link rel="stylesheet" href="css/responsive.css"/>  
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/jquery.minicolors.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/jquery.jscrollpane.css" type="text/css" media="screen" />
		<link href="http://fonts.googleapis.com/css?family=Roboto+Slab:300,100,400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,100,400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,300,200,100italic,400italic" rel="stylesheet" type="text/css">
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
	</head>
<body>
	
<header class="clearfix wrappFix">
	<div class="wrapper">
		<div class="container-fluid" id="home">
			<div class="row-fluid">
				<div class="main-content ">
				</div>
			</div>
		</div>
	</div>  
</header>   

<div class="clearfix nav bg-trans"> 
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="main-content "> 
					<div class="span5">
						<div class="col">
							<div class="main-logo logo-bdr">
								<div class="logo">
									<img src="img/logo.png" alt="logo">
								</div>
							</div><!--end mainlogo-->
						</div>
					</div>  
					<nav class="main-nav">
						<div class="menu-button pull-right clearfix">
							<button type="button" class="btn btn-navbar clearfix" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<ul data-breakpoint="800" class="flexnav clearfix" id="nav">
							<li  class="current"><a href="#home" class="color-100">Inicio <span>Bienvenidos</span></a></li>
							<li><a href="#portfolio" class="color-100">Portfolio <span>Nuestro Trabajo</span></a></li>
							<li><a href="#about" class="color-100">Acerca De<span>Personal</span></a></li>
							<li><a href="#blog" class="color-100">Blog<span>Noticias</span></a></li>
							<li><a href="#contact" class="color-100">Contacto<span>Saludanos</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-flex">
	<div class="flexslider relative">
		<ul class="slides clearfix">
			<li class="relative">	
				<!--<img data-src="img/dekstop.jpg" alt="sitename" />-->
				<img src="img/3.jpg" alt="sitename" />
				<div class="flex-caption clearfix">
					<div class="main-caption clearfix">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="main-content clearfix">
									<div class="span12">
										<div class="col">
											<div class="caption-wrapp">
												<div class="slide-one">											
													<h1 class="color-2 bg-1"><span class="slide-icon bullseye bg-old"></span>Comprometidos con nuestro Objetivo</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon wrench bg-old"></span>Conocimiento y uso de multiples plataformas</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon pie-chart bg-old"></span>Productos de calidad e innovadores</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon tag-detail bg-old"></span>Diseño único</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon map-detail bg-old"></span>Tiempos y costos competitivos</h1>
												</div>
											</div>
										</div>
									</div> <!-- end span -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="relative">
				<!--<img data-src="img/desktop.jpg" alt="sitename" />-->
				<img src="img/6.jpg" alt="sitename" />
				<div class="flex-caption clearfix">
					<div class="main-caption clearfix">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="main-content">
									<div class="span12">
										<div class="col">
											<div class="caption-wrapp">
												<div class="slide-new clearfix">
													<h1 class="color-2">Los Dudes</h1>
													<div class="line-center"></div>
													<p class="color-1">
Somos un equipo profesional, capacitado, entrenado y con experiencia en el diseño y desarrollo de aplicaciones. Nuestras mamás dicen que somos geniales.. 
	</p>
													<a href="#contact" class="btn bg-1">¡CONTRATAR AHORA!</a>
												</div>
											</div>
										</div>
									</div> <!-- end span -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="relative">
				<!--<img data-src="img/dekstop.jpg" alt="sitename" />-->
				<img src="img/2.jpg" alt="sitename" />
				<div class="flex-caption clearfix">
					<div class="main-caption clearfix">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="main-content">
									<div class="span8">
										<div class="col">
											<div class="caption-wrapp">
												<div class="slide-three">
													<h1 class="captionBg color-2">Desarrollos a tu medida</h1>
													<p class="captionBg2 color-2 sub">No importa nada <br>tienes una idea, nosotros la pasamos al mundo digital.</p>
													<p class="captionBg color-2">Por imposible que parezca tu idea, dinos, nosotros nos encargaremos de todo lo demás.</p>
												</div>				
											</div>
										</div>
									</div> <!-- end span -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="relative">
				<!--<img data-src="img/dekstop.jpg" alt="sitename" />-->
				<img src="img/4.jpg" alt="sitename" />
				<div class="flex-caption clearfix">
					<div class="main-caption clearfix">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="main-content">
									<div class="span12">
										<div class="col">
											<div class="caption-wrapp">
												<div class="slide-one">											
													<h1 class="color-2 bg-1"><span class="slide-icon bullseye bg-old"></span>Comprometidos con nuestro Objetivo</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon wrench bg-old"></span>Conocimiento y uso de multiples plataformas</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon pie-chart bg-old"></span>Productos de calidad e innovadores</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon tag-detail bg-old"></span>Diseño único</h1>
													<h1 class="color-2 bg-1"><span class="slide-icon map-detail bg-old"></span>Tiempos y costos competitivos</h1>
												</div>
											</div>
										</div>
									</div> <!-- end span -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="relative">
				<!--<img data-src="img/dekstop.jpg" alt="sitename" />-->
				<img src="img/7.jpg" alt="sitename" />
				<div class="flex-caption clearfix">
					<div class="main-caption clearfix">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="main-content">
									<div class="span12">
										<div class="col">
											<div class="caption-wrapp">
												<div class="slide-new clearfix">
													<h1 class="color-2">Los Dudes</h1>
													<div class="line-center"></div>
													<p class="color-1">
Somos un equipo profesional, capacitado, entrenado y con experiencia en el diseño y desarrollo de aplicaciones. Nuestras mamás dicen que somos geniales.. 
	</p>
													<a href="#contact" class="btn bg-1">¡CONTRATAR AHORA!</a>
												</div>
											</div>
										</div>
									</div> <!-- end span -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<section class="bg-1">
	<div class="wrapper">
		<div class="container-fluid section">
			<div class="row-fluid">
				<div class="main-content">
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="https://www.facebook.com/losdudesmx" target="_blank"><div class="service-feature icon-feature-a"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Facebook</h3>
								</div>
							</div>
						</div>
					</div><!-- end span -->
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="https://twitter.com/LosDudes" target="_blank"><div class="service-feature icon-feature-b"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Twitter</h3>
								</div>
							</div>
						</div>
					</div><!-- end span -->
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="https://www.facebook.com/losdudesmx" target="_blank"><div class="service-feature icon-feature-c"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Google +</h3>
								</div>
							</div>
						</div>
					</div><!-- end span -->
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="http://forrst.com/people/LosDudes" target="_blank"><div class="service-feature icon-feature-d"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Forrst</h3>
								</div>
							</div>
						</div>
					</div><!-- end span --> 
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="http://www.behance.net/losdudes" target="_blank"><div class="service-feature icon-feature-e"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Behance</h3>
								</div>
							</div>
						</div>
					</div><!-- end span -->
					<div class="span4">
						<div class="col">
							<div class="feature">
								<a href="http://losdudesmx.deviantart.com/" target="_blank"><div class="service-feature icon-feature-f"></div></a>
								<div class="feature-text">
									<h3 class="color-2">Devian Art</h3>
								</div>
							</div>
						</div>
					</div><!-- end span -->
				</div>
			</div>
		</div>
	</div>
</section>
<section class="relative">
	<div class="wrapper">
		<div class="container-fluid section" id="portfolio">
			<div class="row-fluid">
				<div class="main-content">
					<div class="span6">
						<div class="col">
							<h2 class="color-99"><span class="color-3">Nuestro</span> Trabajo</h2>
							<p>Todos nuestros proyectos los atendemos de una forma personal y como un verdadero reto a desarrollar. Nuestra meta es que cada dude que llegue a nosotros con un proyecto, salga con una sonrisa. Aquí una muestra de lo que amamos hacer.</p>
						</div>
					</div><!--end span-->
					<div class="span6">
						<div class="col">
							<ul id="filterOptions" class="clearfix">
								<li class="current"><a class="all color1" href="#">Todos</a></li>
								<li><a class="graphicdesign color1" href="#" >Diseño Grafico</a></li>
								<li><a class="webdesign color1" href="#">Diseño Web</a></li> 
								<li><a class="logodesign color1" href="#">Diseño de Logos</a></li>
								<li><a class="development color1" href="#">Desarrollo</a></li>
							</ul>
						</div>
					</div><!--end span-->
				</div>
			</div>
		</div>
	</div>
	<div class="folioWrapp ">
		<ul class="container_folio clearfix">
			<li class="item span3" data-id="id-1" data-type="development logodesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[0].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[0].'" target="_blank" class="gui4-icon icons-src"></a>
								</div>
								<div class="icons-view-link">
									<a target="_blank" href="'.$posts[0].'" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-2" data-type="graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[1].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[1].'"  target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a target="_blank" href="'.$posts[1].'" role="button" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-3" data-type="webdesign">		  
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[2].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[2].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[2].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
					   
			</li><!--end span-->
			<li class="item span3" data-id="id-4" data-type="logodesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[3].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[3].'"  target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[3].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-5" data-type="development">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[4].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[4].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[4].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-6" data-type="webdesign graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[5].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[5].'"  target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[5].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-7" data-type="graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[6].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[6].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[6].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-8" data-type="webdesign graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[7].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[7].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[7].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-9" data-type="logodesign graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[8].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[8].'" target="_blank"  class=" gui4-icon icons-src"></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[8].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-10" data-type="develpoment graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[9].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[9].'" target="_blank"  class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$links[9].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-11" data-type="graphicdesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[10].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[10].'" target="_blank"  class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[10].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-12" data-type="logodesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[11].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[11].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[11].'" target= "_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-13" data-type="logodesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[12].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[12].'" target="_blank" class=" gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[12].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
			<li class="item span3" data-id="id-14" data-type="logodesign">
				<div class="folio-img relative">
					<div  class="hcaption clearfix relative">
						<img class = "postim" src="'.$pics[13].'" alt="sitename"/>
						<div class="overlay myToggle" >
							<div class="iconFolioWrapp">
								<div class="icons-view-see">
									<a href="'.$links[13].'" target="_blank" class="gui4-icon icons-src" ></a>
								</div>
								<div class="icons-view-link">
									<a href="'.$posts[13].'" target="_blank" role="button" data-toggle="modal" data-gal="prettyPhoto" class="data-folio gui4-icon icons-link"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li><!--end span-->
		</ul>
	</div>
	<div id="gallery-controls">
		<a href="#" id="gallery-prev"></a>
		<a href="#" id="gallery-next"></a>
	</div>
</section>
<section class="bg-team">
	<div class="wrapper">
		<div class="container-fluid section" id="about">
			<div class="row-fluid">
				<div class="main-content">
					<div class="span6">
						<div class="col">
							<h2 class="color-2 h-shadow "><span class="color-100">Nuestro</span> Equipo</h2>
							<p class="color-2 h-shadow">Somos un equipo profesional, capacitado, entrenado y con experiencia en el diseño y desarrollo de aplicaciones móviles y web. Nuestras mamás dicen que somos geniales.</p>
						</div>
					</div> <!-- end span -->
					<div class="clearfix"></div>
					<div class="span3">
						<div class="col">
							<div class="teamDet clearfix">
								<img src="img/t1.jpg" alt="t1">
							</div>
							<div class="teamDet-Desc">
								<h4><b>Carlo Ivan Bautista</b></h4>
								<h5><b>Diseñador Industrial y Grafico</b></h5>
								<p>Genio multifuncional en el diseño industrial y gráfico, plástico, metafísico, místico-mágico, cuántico-imaginario, maestría en buena vibra y doctorado en cheverés. Para lo que se ofrezca y aquí su servilleta.</p>
								<ul class="social-team clearfix">
									<li><a href="http://www.facebook.com/zonal.groove" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" ><span class="social_fb-color social_bcolor"></span></a></li>
									<li><a href="http://twitter.com/zonalcarlo" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><span class="social_tweet-color social_bcolor"></span></a></li>
									<li><a href="http://gplus.to/Zonalcarlo" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gplus" target="_blank"><span class="social_gplus-color social_bcolor"></span></a></li>
								</ul>
							</div>
						</div>
					</div> <!-- end span -->
					<div class="span3">
						<div class="col">
							<div class="teamDet clearfix">
								<img src="img/t2.jpg" alt="t1">                                    
							</div>
							<div class="teamDet-Desc">
								<h4><b>Miguel Angel Del Monte</b></h4>
								<h5><b>Computer Scientist</b></h5>
								<p>Desarrollador por profesión y geek por convicción, músico y amante del source code de la vida y de las apps móviles, soy tan honrado que el día que encontré un empleo.. lo devolví.</p>
								<ul class="social-team clearfix">
									<li><a href="http://www.facebook.com/nu11co01" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" target="_blank"><span class="social_fb-color social_bcolor"></span></a></li>
									<li><a href="http://twitter.com/nullcool" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter" target="_blank"><span class="social_tweet-color social_bcolor"></span></a></li>
									<li><a href="http://gplus.to/nullcool" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gplus" target="_blank"><span class="social_gplus-color social_bcolor"></span></a></li>
								</ul>
							</div>
						</div>
					</div> <!-- end span -->
					<div class="span3">
						<div class="col">
							<div class="teamDet clearfix">
								<img src="img/t3.jpg" alt="t1">
							</div>
							<div class="teamDet-Desc">
								<h4><b>Manuel Rojo</b></h4>
								<h5><b>Desarrollador</b></h5>
								<p>Amante de las nuevas tecnologías, gamer, desarrollador, filosofo, mago, payaso y todas esas cosas que te hacen interesante.Programando desde tiempos inmemoriables... *Programar cita con psicologo.</p>
								<ul class="social-team clearfix">
									<li><a href="https://www.facebook.com/Manuel.RojoM" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" target="_blank"><span class="social_fb-color social_bcolor"></span></a></li>
									<li><a href="#" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><span class="social_tweet-color social_bcolor"></span></a></li>
									<li><a href="http://gplus.to/ManuelRojo" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gplus" target="_blank"><span class="social_gplus-color social_bcolor"></span></a></li>
								</ul>
							</div>
						</div>
					</div> <!-- end span -->
					<div class="span3">
						<div class="col">
							<div class="teamDet clearfix">
								<img src="http://placehold.it/252x191" alt="t1">
							</div>
							<div class="teamDet-Desc">
								<h4>Luis Carlos Tovar</h4>
								<h5>Desarrollador</h5>
								<p>Ingeniero en sistemas, amante de las ciencias computacionales. Enemigo de las matemáticas, Para mi la creatividad, honestidad, compromiso y lógica son las cualidades que definen a un ser humano ejemplar.</p>
								<ul class="social-team clearfix">
									<li><a href="https://www.facebook.com/LuisCarlosTovar17" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" target="_blank"><span class="social_fb-color social_bcolor"></span></a></li>
									<li><a href="http://gplus.to/LuisCarlosTovar17" data-tip="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gplus" target="_blank"><span class="social_gplus-color social_bcolor"></span></a></li>
								</ul>
							</div>
						</div>
					</div> <!-- end span -->
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="main-content">
					<div class="span6">
						<div class="col">
							<h2><span class="color-1">Nuestras</span> Habilidades</h2>
							<p>Dicen que las habilidades se aprenden con el tiempo... Y si, es cierto, es por eso que nuestras habilidades las hemos desarrollado durante una excelente experiencia en diversos proyectos.</p>
						</div>
					</div><!--end span-->
					<div class="clearfix"></div>
					<div class="span6">
						<div class="col">
							<div class="accordion_builder2 clearfix">
								<h3 class="color-1">¿Por qué todo esto?</h3>
								<div id="accordion-container2" class="clearfix"> 
									<div class="accordion-header2 years13 bg-slav">
										<p class="color-1">2013</p>
									</div>	
									<div class="accordion-content"> 
										<img src="img/story-img.jpg" alt="about">
										<p class="color-5">Somos cuatro dudes que por azares del destino decidimos tomar ventajas de nuestras habilidades y ya que no podiamos ser X-MEN elegimos crear un grupo de desarrollo web y móvil, ofreciendo la mejor calidad en servicio potencializando la visión de nuestros clientes.
											<br>
											<br>
											Imaginate si logramos hacer esta pagina ebrios, lo que podriamos hacer sobrios.
										</p> 
										<div style="clear:both;"></div>
									</div> 
								</div>
							</div>	
						</div>
					</div> <!-- end span -->
					<div class="span6">
						<div class="col">
							<div class="feature-skill">
								<h3 class="color-1">Habilidades</h3>
								<div class="skill">
									<div class="meter relative">
										<span style="width: 90%" class="bg-1 relative"><label class="left color-2"><span class="bold">HTML/CSS 90%</span></label></span>
                                        <!--<label class="right color-7">90%</label>-->
				</div>
				<div class="meter relative">
					<span style="width: 95%" class="bg-1 relative"><label class="left color-2"><span class="bold">Diseño Web 95%</span></label></span>
                                        <!--<label class="right color-7">75%</label>-->
				</div>
				<div class="meter relative">
					<span style="width: 80%" class="bg-1 relative"><label class="left color-2"><span class="bold">Fotografía  80%</span></label></span>
                                        <!--<label class="right color-7">65%</label>-->
				</div>
				<div class="meter relative">
					<span style="width: 90%" class="bg-1 relative"><label class="left color-2"><span class="bold">Apps Moviles 90%</span></label></span>
                                        <!--<label class="right color-7">85%</label>-->
				</div>
				<div class="meter relative">
					<span style="width: 95%" class="bg-1 relative"><label class="left color-2"><span class="bold">Aplicaciones Web 95%</span></label></span>
                                        <!--<label class="right color-7">85%</label>-->
				</div>
			</div>
		</div>
	</div>
</div> <!-- end span -->
</div>
</div>
</div>
</div>
</section>
<section class="bg-blog">
	<div class="wrapper">
        <div class="container-fluid section" id="blog">
            <div class="row-fluid">
                <div class="main-content">
                        <div class="span6">
                            <div class="col">
                                <h2 class="color-2 h-shadow"><span class="color-100">El</span> Blog</h2>
                                <p class="color-2 h-shadow">Algunas veces nos gusta escribir, por lo tanto aquí puedes enterarte de todo lo que nos apasiona, así como novedades con la pagina y nuestros proyectos.</p>
                            </div>
                            
                        </div><!--end span-->
                            <div class="span6">
                            <div class="col clearfix">
                                <div class="pagination pull-right">
                                  <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li class="active">
                                      <a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#">Next</a></li>
                                  </ul>
                                </div>
                            </div>
                        </div><!--end span-->
                        <div class="clearfix"></div>
                        <div class="span6">
                                <div class="col">
                                <div class="blog-post clearfix">
                                    <div class="blog-img relative">
                                        <img src="img/img-blog-a.jpg" alt="sitename"/>
                                        <ul class="img-attr">
                                            <li class="bg-1"><div><small class="date color-2">28<br><span>JUN</span></small></div></li>
                                            <li class="bg-3"><div><span class="attr-black userBlog-icon"><span class="adm color-2">ADMIN</span></span></div></li>
                                            
                                            <li class="bg-1"><div><span class="attr-black comment-icon color-1"><small class="cmt-val">12</small></span></div></li>
                                            <li class="bg-3"><div><span class="attr-black videoBlog-icon"></span></div></li>
                                            <li class="bg-1"><div><a href="img/fullscreen/default.jpg" data-rel="prettyPhoto[gallery2]"><span class="gui4-icon icons-link"></span></a></div></li>
                                        </ul>
                                    </div>
                                
                                   <h5><a href="#myModalF" data-rel="single-blog.html" class="data-load color-1" role="button" data-toggle="modal">Titulo</a></h5>
                                 <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem bibendumuctor, nisi elit consequat ipsum, nec agitis sem nibh id elit. Duis id elit. Duis psum elit.Duis psum velit.Duis psum velit.</p>
                               <a class="data-load color-1 pull-right" href="#myModalF" role="button" data-toggle="modal"><small>Readmore</small></a>
                                </div>
                                </div>
                        </div><!--end span-->
                         <div class="span6">
                                <div class="col">
                                <div class="blog-post clearfix">
                                    <div class="blog-img relative">
                                        <img src="img/img-blog-b.jpg" alt="sitename"/>
                                       <ul class="img-attr">
                                            <li class="bg-1"><div><small class="date color-2">28<br><span>JUN</span></small></div></li>
                                            <li class="bg-3"><div><span class="attr-black userBlog-icon"><span class="adm color-2">ADMIN</span></span></div></li>
                                            
                                            <li class="bg-1"><div><span class="attr-black comment-icon color-1"><small class="cmt-val">12</small></span></div></li>
                                            <li class="bg-3"><div><span class="attr-black videoBlog-icon"></span></div></li>
                                             <li class="bg-1"><div><a href="img/fullscreen/default.jpg" data-rel="prettyPhoto[gallery2]"><span class="gui4-icon icons-link"></span></a></div></li>
                                        </ul>
                                    </div>
                                
                                  <h5><a href="#myModalF" data-rel="single-blog.html" class="data-load color-1" role="button" data-toggle="modal">Your Post Tittle </a></h5>
                                 <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem bibendumuctor, nisi elit consequat ipsum, nec agitis sem nibh id elit. Duis id elit. Duis psum elit.Duis psum velit.Duis psum velit.</p>
                              <a class="data-load color-1 pull-right"  href="#myModalF" role="button" data-toggle="modal"><small>Readmore</small></a>
                                </div>
                                </div>
                        </div><!--end span-->
                         <div class="span6">
                                <div class="col">
                                <div class="blog-post clearfix">
                                    <div class="blog-img relative">
                                        <img src="img/img-blog-c.jpg" alt="sitename"/>
                                        <ul class="img-attr">
                                            <li class="bg-1"><div><small class="date color-2">28<br><span>JUN</span></small></div></li>
                                            <li class="bg-3"><div><span class="attr-black userBlog-icon"><span class="adm color-2">ADMIN</span></span></div></li>
                                            
                                            <li class="bg-1"><div><span class="attr-black comment-icon color-1"><small class="cmt-val">12</small></span></div></li>
                                            <li class="bg-3"><div><span class="attr-black videoBlog-icon"></span></div></li>
                                            <li class="bg-1"><div><a href="img/fullscreen/default.jpg" data-rel="prettyPhoto[gallery2]"><span class="gui4-icon icons-link"></span></a></div></li>
                                        </ul>
                                    </div>
                                
                                 <h5><a href="#myModalF" class="data-load color-1" role="button" data-toggle="modal">Your Post Tittle </a></h5>
                                 <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem bibendumuctor, nisi elit consequat ipsum, nec agitis sem nibh id elit. Duis id elit. Duis psum elit.Duis psum velit.Duis psum velit.</p>
                               <a class="data-load color-1 pull-right"  href="#myModalF" role="button" data-toggle="modal"><small>Readmore</small></a>
                                </div>
                                </div>
                        </div><!--end span-->
                         <div class="span6">
                                <div class="col">
                                <div class="blog-post clearfix">
                                    <div class="blog-img relative">
                                        <img src="img/img-blog-d.jpg" alt="sitename"/>
                                         <ul class="img-attr">
                                            <li class="bg-1"><div><small class="date color-2">28<br><span>JUN</span></small></div></li>
                                            <li class="bg-3"><div><span class="attr-black userBlog-icon"><span class="adm color-2">ADMIN</span></span></div></li>
                                            
                                            <li class="bg-1"><div><span class="attr-black comment-icon color-1"><small class="cmt-val">12</small></span></div></li>
                                            <li class="bg-3"><div><span class="attr-black videoBlog-icon"></span></div></li>
                                             <li class="bg-1"><div><a href="img/fullscreen/default.jpg" data-rel="prettyPhoto[gallery2]"><span class="gui4-icon icons-link"></span></a></div></li>
                                        </ul>
                                    </div>
                                
                                   <h5><a href="#myModalF" class="data-load color-1" role="button" data-toggle="modal">Your Post Tittle </a></h5>
                                 <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem bibendumuctor, nisi elit consequat ipsum, nec agitis sem nibh id elit. Duis id elit. Duis psum elit.Duis psum velit.Duis psum velit.</p>
                              <a class="data-load color-1 pull-right" href="#myModalF" role="button" data-toggle="modal"><small>Readmore</small></a>
                                </div>
                                </div>
                        </div><!--end span-->
<!-- =================================
Modal
====================================== -->


<div id="myModalF" class="modal hide fade " tabindex="-1" role="dialog" aria-hidden="true">
<!-- <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

</div>-->
<div class="modal-body ">
<div class="singleblog">
                <div class="span12">
                    <div class="col">
                        <div class="titleBlog">
                            <h1><span class="color-1">SINGLE</span> BLOG</h1>
                        </div>
                        
                    </div>
                     
                </div><!--end span-->
        <div class="clearfix"></div>
                <div class="span12">
                    <div class="col">
                           <div class="flexsliderblog relative clearfix" id="flex1">
                        
                                <ul class="slides">
                                    <li class="relative">	  
                                        <img src="img/blog-img.jpg" alt="sitename" />
                                    </li>
                                    <li class="relative">	  
                                        <img src="img/blog-img.jpg" alt="sitename" />
                                    </li>
                                    <li class="relative">	  
                                        <img src="img/blog-img.jpg" alt="sitename" />
                                    </li>
                                    <li class="relative">	  
                                        <img src="img/blog-img.jpg" alt="sitename" />
                                    </li>
                                </ul>
                              
                            </div>
                     </div>       
                </div><!--end span-->
                 <div class="span12">
                        <div class="col">
                               <ul class="meta-blog clearfix">
                                   <li><a href="#"><span class="icon-user"></span>Erict Fredict</a></li>
                                   <li><a href="#"><span class="icon-time"></span>4 Jan 2013</a></li>
                                   <li><a href="#"><span class="icon-comment"></span>16 Comments</a></li>
                                   <li><a href="#"><span class="icon-tag"></span>Computer Web</a></li>
                               </ul>
                                 <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem bibendumuctor, nisi elit consequat ipsum, nec agitis sem nibh id elit. Duis id elit. Duis psum elit.Duis psum velit.Duis psum velit. Lorem ipsum dolor sit amet, labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitationlamcout.Lorem ipsum dolor sit amet, labore et dolore magna aliqua. Ut enim ad minimquis nostrud exercitationlamcout.Lorem ipsum dolor sit amet, labore et dolore magna aliqua. 
                            </p>
                                
                                <div class="qoute">
                                   
                                    <p><span class="quoteSign">&rdquo;</span> Solidumque fluminaque caelo porrexerat figuras labore et dolore magna aliqua. Solidumque fluminaque caelo porrexerat solidumque fluminaque caelo porrexerat figuras ignotas praecipites tas praecipites solum illis nubibus solidumque fluminaque caelo porrexerat solidumque fluminaque caelo porrexerat figuras ignotas praecipitesas praecipites solum illis nubibus solidumque fluminaque caelo porrexerat.</p>
                            
                                </div>
                                <div style="clear:both;"></div>
                                <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Morbi accumsan ipsum velit. Duis sed odio sit amet .Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem quis bibendum auctor.</p>
                 </div>       
            </div><!--end span-->
               
            <div class="span12">
                <div class="col">
            
                <div id="comments" class="blog-comment relative clearfix">
                <ul class="meta-blog2 clearfix bg-1">
                <li><a href="#" class="color-2"><span class="icon-comment icon-white"></span>16 Comments</a></li>
                </ul>
                    <ol class="commentlist">
                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 " id="li-comment-1">
                            <div id="comment-1" class="cmnt_border clearfix" >
                                <div class="comment-author vcard pull-left">
                                <img alt="" src="img/gravatar.jpg" class="avatar-40 photo img-polaroid"/>
                                </div>			
                                <cite class="fn"><a href="#">Jhon Doe</a></cite> 
                                <ul class="comment-meta commentmetadata clearfix">
                                    <li>
                                        <a class="pull-left" href="http://localhost/spartan/?p=189#comment-1">March 16, 2013 at 6:15 pm </a>
                                    </li>
                                    <li>&nbsp;|&nbsp;</li>
                                    <li>
                                        <a class="comment-reply-link pull-left" href="#reply" onclick="return addComment.moveForm("comment-2", "2", "respond", "189")">Reply</a>		
                                    </li>
                                                    
                                </ul><!-- .comment-meta .commentmetadata -->	
                                
                                <div class="comment-body ">
                                    <p class="color-3">
                                    <span class="foux">Solidumque fluminaque caelo porrexerat figuras ignotas praecipites solum illis nubibus solidumque fluminaque caelo porrexerat solidumque fluminaque caelo porrexerat.</span> 
                                    </p>
                                </div>	
                            </div><!-- #comment-##  -->	
                            
                            <ol class="children clearfix">
                                <li class="comment odd alt depth-1" id="li-comment-2">
                                    <div id="comment-2" class="cmnt_border">
                                <div class="comment-author vcard pull-left">
                                <img alt="" src="img/gravatar2.jpg" class="avatar-40 photo img-polaroid"/>
                                </div>			
                                <cite class="fn"><a class="color-1" href="#">Jhon Doe</a></cite> 
                                <ul class="comment-meta commentmetadata clearfix">
                                    <li>
                                        <a class="color-3 pull-left" href="http://localhost/spartan/?p=189#comment-1">March 16, 2013 at 6:15 pm </a>
                                    </li>
                                    <li>&nbsp;|&nbsp;</li>
                                    <li>
                                        <a class="comment-reply-link pull-left" href="#reply" onclick="return addComment.moveForm("comment-2", "2", "respond", "189")">Reply</a>		
                                    </li>
                                                    
                                </ul><!-- .comment-meta .commentmetadata -->	
                                <div class="comment-body clearfix">
                                    <p class="color-3">
                                    <span class="foux">Solidumque fluminaque caelo porrexerat figuras ignotas praecipites solum illis nubibus solidumque porrexerat solidumque fluminaque caelo porrexerat.</span> 
                                    </p>
                                </div>	
                            </div><!-- #comment-##  -->	
                                </li>
                                
                            </ol>
                            <div style="clear:both;"></div>
                        </li><!-- end comment-list -->
                        
                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-2" id="li-comment-3">
                            <div id="comment-3" class="cmnt_border" >
                                <div class="comment-author vcard pull-left">
                                <img alt="" src="img/gravatar3.jpg" class="avatar-40 photo img-polaroid"/>
                                </div>			
                                <cite class="fn"><a class="color-1" href="#">Jhon Doe</a></cite> 
                                <ul class="comment-meta commentmetadata clearfix">
                                    <li>
                                        <a class="color-3 pull-left" href="http://localhost/spartan/?p=189#comment-1">March 16, 2013 at 6:15 pm </a>
                                    </li>
                                    <li>&nbsp;|&nbsp;</li>
                                    <li>
                                        <a class="comment-reply-link pull-left" href="#reply" onclick="return addComment.moveForm("comment-2", "2", "respond", "189")">Reply</a>		
                                    </li>
                                                    
                                </ul><!-- .comment-meta .commentmetadata -->	
                                <div class="comment-body ">
                                    <p class="color-3">
                                    <span class="foux">Solidumque fluminaque caelo porrexerat figuras ignotas praecipites solum illis nubibus solidumque fluminaque caelo porrexerat solidumque fluminaque caelo porrexerat.</span> 
                                    </p>
                                </div>	
                            </div><!-- #comment-##  -->	
                            
                        </li><!-- end comment-list -->
                        
                        
                        </ol>
                        <div class="reply-form" id="reply">
                           <h3 class="color-1">Reply To Jhon Doe</h3><a href="#comments" class="color-1 cancel">Cancel</a>
                           <div class="clearfix"></div>
                               <form action="#">
                                   <input type="text" name="name" placeholder="Name"/>
                                   <input type="email" name="email" placeholder="Email"/>
                                   <textarea name="comment" id="reply-comment" cols="30" rows="10"></textarea>
                               </form>
                          
                                <input type="submit" value="Send" class="pull-right" id="submit2"/>
                       </div>
                </div>
                <!-- end blog-comment -->
          </div>       
        </div><!--end span-->
             <div class="span12">
                <div class="col">
                         <div id="respond">
                        <h2 class="color-1">Escribe Un Comentario :D</h2>
                        
                        <form class="cmxform" id="commentForm" method="get" action="#">
                          <fieldset>
                            <!-- <legend>Please provide your name, email address (won"t be published) and a comment</legend> -->
                            <p>
                              
                              <input id="cnamePage" name="name" type="text" placeholder="Nombre" required/>
                            </p>
                            <p>
                            
                              <input id="cemailPage" type="email" name="email" placeholder="Email" required/>
                            </p>
                            <!-- <p>
                             
                              <input id="curl" type="url" name="url" placeholder="url"/>
                            </p> -->
                            <p>
                             
                              <textarea id="ccommentPage" name="comment" placeholder="Comentario" required></textarea>
                            </p>
                            <p>
                              <input id="submit" type="submit" value="Comenta"/>
                            </p>
                          </fieldset>
                        </form>
                        </div><!-- #respond -->
               </div>       
            </div><!--end span-->
            
                
              </div>
            </div><!--end body modal-->

<!-- <div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>-->
</div>



<!-- =================================
Modal
====================================== -->
                <div id="myModal" class="modal hide fade " tabindex="-1" role="dialog" aria-hidden="true">
                            
                            <div class="modal-body ">
                                 <div class="singlefolio">
                              <h1>EL <span class="color-1">DETALLE</span></h1>
                              <div class="container-folio">
                                 
                                    <div class="flexsliderfolio relative" id="flex2">
                                        
                                        <ul class="slides">
                                        <li class="relative">	  
                                            <img src="img/folio-img.jpg" alt="sitename" />
                                        </li>
                                        <li class="relative">	  
                                            <img src="img/folio-img.jpg" alt="sitename" />
                                        </li>
                                        <li class="relative">	  
                                            <img src="img/folio-img.jpg" alt="sitename" />
                                        </li>
                                        <li class="relative">	  
                                            <img src="img/folio-img.jpg" alt="sitename" />
                                        </li>
                                        </ul>
                                      
                                </div>
         
                                      </div>
                                       <div class="span4">
                                         
                                           <div class="description clearfix">
                                             <h2  class="color-1">Descripción del Proyecto</h2>
                                             
                                             <p>Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagitis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Duis sed odio sit amet nibh vulputate. </p>
                                                        
                                          </div>
                                           </div> <!-- end span -->
                                   <div class="span4">
                                      <div class="description clearfix">
                                         <h2  class="color-1">Servicios</h2>
                                        
                                         <ul class="service clearfix">
                                            <li><p class="color-3">Lorem est et dolorum fuga nisi elit consequat ipsum</p></li>
                                            <li><p class="color-3">Lorem est et dolorum fuga, et harum quidem vulputate.</li>
                                            <li><p class="color-3">Lorem est et dolorum fugat harum sed odio sit amet nibh.</p></li>
                                            <li><p class="color-3">Lorem est et dolorum fuga sagitis sem nibh id elit.</p></li>
                                            <li><p class="color-3">Duis sed odio sit amet nibh vulputate cursus.</p></li>
                                        </ul>
                                                        
                                      </div>
                                
                                    </div> <!-- end span -->
                                       
                                    <div class="span4">
                                      <div class="description clearfix">
                                         <h2  class="color-1">Detalles</h2>
                                        
                                         <ul class="clearfix">
                                            <li><p class="color-3"><span class="icon-user"></span><span class="foux">Doyok Finance</span></p></li>
                                            <li><p class="color-3"><span class="icon-time"></span><span class="foux">6 Juny 2013</span></p></li>
                                            <li><p class="color-3"><span class="icon-comment"></span><span class="foux">16 Comment</span></p></li>
                                            <li><p class="color-3"><span class="icon-tags"></span><span class="foux">Photography, Web Design, Css 5</span></p></li>
                                            <li><p class="color-3"><a href="#" class="link-page"><span class="icon-eye-open"></span><span class="foux">Visit Website</span></a></p></li>
                                        </ul>
                                            
                                      </div>
                                
                                    </div> <!-- end span -->
                                    
                                  </div>
                            </div>
                </div><!--end body modal-->
                </div>
            </div>
        </div>

	</div>
</section>
<section class="bg-color section-scnd">
	
	
</section>
<section class="bg-page2">
	<div class="wrapper">

        <div class="container-fluid section">
            <div class="row-fluid">
                <div class="main-content">
             
						<div class="testimonials clearfix">
						<h3 class="color-100 h-shadow">Lo que dicen de nuestros servicios</h3>
						
							 <div class="span4">
                                  <div class="col">
                                      <div class="testi-caption relative">
                                          <div class="testi-wrapp">
                                              <img src="img/avatar.jpg" alt="avatar" class="img-circle"/>
                                              <h4 class="color-1">Mbojowae</h4>
                                              <cite>CEO dynamic - <span class="color-1">Lorem ipsum</span></cite>
                                                <p class="color-2">Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagitis sem Aenean solicitudin.</p>
                                          </div>
                                      </div>
                                  </div>						 
							</div>
							 <div class="span4">
                                  <div class="col">
                                      <div class="testi-caption relative">
                                          <div class="testi-wrapp">
                                              <img src="img/avatar-1.jpg" alt="avatar" class="img-circle"/>
                                              <h4 class="color-1">Mbojowae</h4>
                                              <cite>CEO dynamic - <span class="color-1">Lorem ipsum</span></cite>
                                                <p class="color-2">Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagitis sem Aenean solicitudin.</p>
                                          </div>
                                      </div>
                                  </div>						 
							</div>
							 <div class="span4">
                                  <div class="col">
                                      <div class="testi-caption relative">
                                          <div class="testi-wrapp">
                                              <img src="img/avatar-2.jpg" alt="avatar" class="img-circle"/>
                                              <h4 class="color-1">Mbojowae</h4>
                                              <cite>CEO dynamic - <span class="color-1">Lorem ipsum</span></cite>
                                                <p class="color-2">Proin grovida niblh vel velit auctor aliquet. Aenean solicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagitis sem Aenean solicitudin.</p>
                                          </div>
                                      </div>
                                  </div>						 
							</div>

						
					</div>
                </div>
            </div>
        </div>

	</div>
</section>
<section class="relative">
	<div class="wrapper">
        <div class="container-fluid section" id="contact">
            <div class="row-fluid">
                <div class="main-content">
                <div class="span6">
                            <div class="col">
                                <h2 class="color-4"><span class="color-1">Animate</span> y Saludanos</h2>
                                <p class="color-4">Desde aquí nos puedes mandar tus comentarios, quejas, felicitaciones, mentadas y todo lo que se te ocurra.</p>
                            </div>
                            
                        </div><!--end span-->
                        <div class="clearfix"></div>
                     <div class="span4">
                    <div class="col">
                        <ul class="detail-contact clearfix ">
									<li class="clearfix"><span class="detail-icons detail-address"></span><p>Nglempong Sari , Mlati , Ngaglik ,Sleman , Yogyakarta</p></li>
									<li class="clearfix"><span class="detail-icons detail-phone"></span><p>+085729190959</p><p>+085729190959</p></li>
									<li class="clearfix"><span class="detail-icons detail-email"></span><p>info@dudes.mx</p><p>contacto@dudes.mx</p></li>
								</ul>
                    </div>
                </div><!--end span-->
               <div class="span8">
                   <div class="col clearfix">
							<div class="contactform" id="contactForm">
								<form action="#" class="clearfix cmxform" id="form-contact">
									
									<fieldset>
									<!-- <legend>Please provide your name, email address (won"t be published) and a comment</legend> -->
									<p>
									  
									  <input id="cname" name="name" type="text" placeholder="Nombre" required />
									</p>
									
									<p>
									
									  <input id="cemail" type="email" name="email" placeholder="Email" required />
									</p>
									<p>
									 
									 <textarea id="ccomment" name="comment" placeholder="Comentarios" class="contact-comment" required></textarea>
									</p>
									
									
									  <input id="submitPage" type="submit" value="Enviar Mensaje"/>
									 </fieldset>
								</form>
							</div>
						</div>          
                    </div><!--end span-->
                </div>
            </div>
        </div>
	</div>
<footer class="bg-5 relative">
     <div class="wrapper">
        <div class="container-fluid section">
            <div class="row-fluid">
                <div class="main-content">
                <p class="color-2"> <span class="color-1">&copy;</span> COPYRIGHT DESIGN BY <a href="#" class="color-1">DUDES.MX</a></p>
                </div>
            </div>
        </div>
	</div>
	<a href="#home" class="button-up bg-1" id="top"><span class="up-attr attr-black"></span><span class="top-txt">Arriba</span></a>
</footer>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.gomap-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/flexslide.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/gridcols.js"></script>
<script type="text/javascript" src="js/gomap.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/jquery.quicksand.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/prettyPhoto.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript" src="js/jquery.flexnav.js"></script>
<script type="text/javascript" src="js/doubletaptogo.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.minicolors.js"></script>
<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript">jQuery(".flexnav").flexNav({"animationSpeed": 150});</script>
</body>
</html>'
?>