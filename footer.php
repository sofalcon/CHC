<footer>
	<div class="container">
		<div class="gutter">
			<?php
			$defaults = array(
				'theme_location'  => 'social-nav',
				'menu'            => 'social-nav',
				'container'       => 'div',
				'container_class' => '',
				'container_id'    => 'social',
				'menu_class'      => 'menu',
				'menu_id'         => 'social-nav',
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


			<?php
				$defaults = array(
					'theme_location'  => 'utility-nav',
					'menu'            => 'utility-nav',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => 'fNav',
					'menu_class'      => 'menu',
					'menu_id'         => 'footer-nav',
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
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>