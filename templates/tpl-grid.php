<?php /* Template Name: Grid */
get_header(); ?>
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
<div id="content" class="<?php the_field('color'); ?>-theme">
	<div class="container cf">
		<div id="contentPrimary">
			<div class="gutter cf">
				<div class="titleCont">
					<h1><?php the_title(); ?></h1>
				</div>
				<div id="grid-intro">
					<?php the_field('intro'); ?>
				</div>
				<h5><?php the_field('secondary_header'); ?></h5>
				<div id="grid-container">
					<?php $grids = get_field('grid');
						  foreach($grids as $grid){ ?>
						  <div class="grid-cell <?php echo cycle('grid-one','grid-two','grid-three','grid-four'); ?>">
						  		<div class="grid-img">
						  			<?php if($grid['url']){echo '<a href="'.$grid['url'].'">';}?>
						  				<?php echo wp_get_attachment_image($grid['image'], array(140,140)); ?>
						  			<?php if($grid['url']){echo '</a>';}?>
						  		</div>
						  		<div class="grid-caption">
						  			<?php echo $grid['caption']; ?>
						  		</div>
						  </div>
					<?php } ?>
				</div>
				<?php the_content(); ?>
			</div>
		</div>

		<div id="contentSecondary">
			<div class="gutter">
				<?php get_template_part( 'partials/page', 'sidebar' ); ?>
			</div>
		</div>
	</div>
	<div class="colorbar"></div>
</div>
<?php } } ?>
<?php get_footer(); ?>