<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Perenoel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- font css --> 
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<!--[if IE]>
     	<script src="js/html5shiv.js"></script>
    <![endif]-->
    
    <!-- main script --> 
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php 
	wp_body_open(); 
	if ( is_front_page()) {
		$divClass = 'home-page';
	} else {
		$divClass = 'gallery-page';
	}
?>
<div id="page" class="site <?php echo $divClass; ?>">

	<!-- header part --> 
	<?php 
	$header_logo = get_field('header_logo','option');
	?>
	<header>
		<div class="container">
            <div class="left">
                <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-full" src="<?php echo $header_logo['url']; ?>" alt="logo"></a>
            </div>
            <div class="right">
				<nav>
					<?php
					
						if (pll_current_language() == 'en') {
							$args = array(
								'menu'            =>'Header Menu',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => ''
							);
						} else if (pll_current_language() == 'fr') {
							$args = array(
								'menu'            =>'Header Menu FR',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => '',
								'menu_id'         => ''
							);
						} 
						wp_nav_menu($args);
					?>
				</nav>
				<nav>
					<?php
						$args = array(
							'menu'            =>'Languages Menu',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'btn',
							'menu_id'         => ''
						);
						wp_nav_menu($args);
					?>
				</nav>
            </div>
		</div>
	</header>
