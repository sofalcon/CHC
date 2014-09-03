<?php /* Template Name: Landing */
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
				<?php $grids = get_field('grid');
					$i = 1;
					echo "<div class='landing-row'>";
					foreach($grids as $grid){
						if($grid['url']){ echo '<a class="gridlink" href="'.$grid['url'].'">'; } ?>

						<div class="landing-grid <?php echo cycle('left','right'); ?>">
							<div class="grid-show">
								<?php
									  	$id = $grid['image'];
									   	$img = wp_get_attachment_url($id);

												echo '<img src= "' . $img . '" /> ';
										 ?>
							</div>
							<h5><?php echo $grid['title']; ?></h5>
							<p><?php echo $grid['caption']; ?></p>
						</div>
						<?php if($grid['url']){ echo '</a>'; } ?>
				<?php if($i % 2 == 0){echo '</div><div class="landing-row">';} $i++; }
				echo "</div>"; ?>
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