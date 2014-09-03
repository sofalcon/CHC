<div id="fixedsidebar">
	<div class="titleCont">
		<?php
		$walker = new Menu_With_Description;
		$defaults = array(
			'theme_location'  => 'main-nav',
			'menu'            => 'main-nav',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => '',
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
		wp_nav_menu( $defaults ); ?>
	</div>
		<?php
		$defaults = array(
			'theme_location'  => 'main-nav',
			'menu'            => 'main-nav',
			'container'       => 'div',
			'container_class' => 'menu',
			'container_id'    => 'sidebar-menu',
			'menu_class'      => 'nav',
			'menu_id'         => 'sidebar-nav',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		wp_nav_menu( $defaults ); ?>
	<div id="sidebarContent" class="quote">
		<?php the_field('sidebar'); ?>
	</div>
</div>