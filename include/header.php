<?php 
require 'functions.php';

if(!isset($sessionInclude))
	require 'session.php'; 

?><!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> 
	<html class="no-js"> <!--<![endif]-->
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
		<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
		<meta name="author" content="FREEHTML5.CO" />

		<!-- 
		//////////////////////////////////////////////////////

		FREE HTML5 TEMPLATE 
		DESIGNED & DEVELOPED by FREEHTML5.CO

		Website:    http://freehtml5.co/
		Email:      info@freehtml5.co
		Twitter:    http://twitter.com/fh5co
		Facebook:     https://www.facebook.com/fh5co

		//////////////////////////////////////////////////////
		-->

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="favicon.ico">

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Superfish -->
		<link rel="stylesheet" href="css/superfish.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
		<!-- CS Select -->
		<link rel="stylesheet" href="css/cs-select.css">
		<link rel="stylesheet" href="css/cs-skin-border.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="chat/chat.css"/>

    	<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css" type="text/css" rel="stylesheet" />

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.rating {
				direction: rtl;
			}
			.rating a {
				color: #dedede;
				text-decoration: none;
				font-size: 2em;
				transition: color .4s;
			}
			.rating a.shine {color: #1c1c1c;}
			.rating.notable a:hover,
			.rating.notable a:focus,
			.rating.notable a:hover ~ a,
			.rating.notable a:focus ~ a, 
			.rating.notable a.shine {
				color: #1c1c1c;
				cursor: pointer;
			}

			.case-studies-summary h4{color:#dedede;}

			.searchResult{
				display: none;
				background : #dedede;
				border : 1px solid #cbcbcb;
				padding: 0;
				width: 300px;
				margin : 5px auto;
			}
			.searchResult li{list-style: none;}
			.searchResult li:hover{background:white;}
		</style>
	</head>
	<body>
		<div id="fh5co-wrapper">
			<div id="fh5co-page">
			<header id="fh5co-header-section" class="sticky-banner" style="size: 20px">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Groupe A</a>
					<a class="navbar-brand" href="index.php#Nos Offres">Nos Offres</a>
					<a class="navbar-brand" href="index.php#BonPlan">Bon Plans</a>
					<a class="navbar-brand" href="index.php#Client">Avis</a>
					<a class="navbar-brand" href="index.php#Contact">Contact</a>
					<a class="navbar-brand" href="recherche.php">Recherche</a>
				</div>
				<?php if(!isset($user)) : ?>
				<form id="signin" class="navbar-form navbar-right" role="form" method="POST" action="login.php">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">                                        
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">                                        
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					<a href="creerCompte.php" class="btn btn-primary">Créer un compte</a>
				</form>
				<?php else : ?>
					<div class="navbar-header navbar-right">						
						<span>Bonjour <?= $user['nom'].' '.$user['prenom']; ?></span>
						<br>
						<a href="logout.php">Se déconnecter</a>
					</div>
				<?php endif; ?>
			</header>