<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="utf-8">

	<title><?php wp_title(''); ?></title>

	<!-- Google Chrome Frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<!-- mobile meta -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- icons & favicons -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

	<!-- Drop Google Analytics here -->
	<!-- end analytics -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

</head>

<body <?php body_class(); ?>>
	<div id="fb-root"></div>
<script>
 window.fbAsyncInit = function() {
        FB.init({
          appId      : '248754798657889',
          xfbml      : true,
          version    : 'v2.0'
        });
      };

(function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
</script>

<div class="off-canvas-wrap">
	<div class="inner-wrap">
		<div id="container">

			<header class="header" role="banner">


				<div id="inner-header" class="row">
					<div class="full-width header-image">

					 <?php  get_template_part( 'partials/nav', 'offcanvas' ); ?>

					 <?php // get_template_part( 'partials/nav', 'topbar' ); ?>

					 <?php // get_template_part( 'partials/nav', 'offcanvas-sidebar' ); ?>

					<!-- You only need to use one of the above navigations.
						 Offcanvas-sidebar adds a sidebar to a "right" offcanavas menus. -->

				</div> <!-- end #inner-header -->
			</div>
			</header> <!-- end header -->
