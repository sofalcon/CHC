<?php /* Template Name: Two Column */
get_header(); ?>
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
<div id="content" class="<?php the_field('color'); ?>-theme">
	<div class="container cf">
		<div id="contentPrimary">
			<div class="gutter cf">
				<div class="titleCont">
					<h1><?php the_title(); ?></h1>
				</div>
				<?php if(has_post_thumbnail()){
						echo "<div id='page-banner'>".the_post_thumbnail()."</div>";
					}
				?>
				<div class="onehalf floatleft">
					<?php the_content(); ?>
				</div>
				<div class="onehalf floatright">
					<?php the_field('second_column'); ?>
				</div>
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