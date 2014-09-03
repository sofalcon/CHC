<?php get_header();
if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
<div id="modal">
	<div id="modal-box">
		<div class="gutter">
			<div id="modalClose">X</div>
			<div id="modal-content">
				<?php dynamic_sidebar('modal-box'); ?>
			</div>
		</div>
	</div>
	<div id="modal-overlay">

	</div>
</div>
<div id="contentContainer">
	<div class="container">
		<div id="homeContent" class="clearfix">
			<div id="welcome" class="clearfix">
				<div class="gutter">
					<?php the_field('welcome'); ?>
				</div>
			</div>
			<a href="<?php the_field('left_cta_link'); ?>">
				<div id="welcome-callout">
					<div class="gutter">
						<?php the_field('left_cta'); ?>
					</div>
				</div>
			</a>
		</div>
		<div id="rightCallout">
			<a href="<?php the_field('right_cta_link'); ?>"><?php the_field('right_cta'); ?><img src="<?php bloginfo('template_directory'); ?>/img/calloutArrow.png" /></a>
		</div>
	</div>

	<div id="slideContainer">
		<div id="slides">
			<?php $slides = get_field('slides');
				foreach($slides as $slide){
					if($slide['select'] == 'photo'){ ?>
						<div class="slide photo" style="background-image:url(<?php echo $slide['photography']; ?>);"></div>
			<?php	}else{ ?>
						<div class="slide <?php echo $slide['color']; ?>">
							<div class="container">
								<div class="slide-data">
									<div class="slide-statement">
										<?php echo $slide['branded_statement']; ?>
									</div>
									<div class="slide-cta">
										<img src="<?php echo $slide['icon']; ?>" class="slide-cta-img" />
										<a href="<?php echo $slide['call_to_action_link']; ?>"><?php echo $slide['call_to_action']; ?> »</a>
									</div>
								</div>
							</div>
						</div>
			<?php	}
				}
			?>
		</div>
	</div>


</div>

<?php } } get_footer(); ?>