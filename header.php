<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel='stylesheet' href=" <?php echo get_stylesheet_uri(); ?> " />

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon">

	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.hoverintent.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.slideamonjaro.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/chc.js"></script>

	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-37a39305-71e1-b1f3-a75e-581b1b741cc3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<div class="container">
		<div class="gutter cf">
			<div id="logo">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logochc.png" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>"/></a>
			</div>

			<div id="utility">
				<div id="contact">
					<span><strong>New York City</strong> 917 305 7700 • 50 Broadway</span><span><strong>Ft. Lauderdale</strong> 954 601 1930 • 2900 W Cypress Creek Rd</span>
					<?php get_search_form(); ?>
					<a href="#" class="donate">Donate Now!</a>
				</div>
				<?php
				$walker = new Menu_With_Description;
				$defaults = array(
					'theme_location'  => 'main-nav',
					'menu'            => 'main-nav',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => 'main',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => $walker
				);

				wp_nav_menu( $defaults );
				?>
			</div>
		</div>
	</div>
</header>
<div id="megamenuCont">
	<div class="container">
		<div class="gutter cf">
			<div id="first" class="onethird floatleft">
				<div class="gutter">

				</div>
			</div>
			<div id="second" class="onethird floatleft">
				<div class="gutter">

				</div>
			</div>
			<div id="third" class="onethird floatleft">
				<div class="gutter">

				</div>
			</div>
		</div>
	</div>
</div>