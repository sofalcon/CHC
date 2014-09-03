<?php get_header(); ?>

<div id="content" class="blog">
	<div class="container cf">
		<div id="contentPrimary">
			<div class="gutter">
				<div id="archive-query">
					<h1>All posts categorized: <span><?php single_cat_title(); ?></span></h1>
				</div>
				<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
				<div class="post-entry cf">
					<div class="post-heading cf">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<div class="post-meta">
							<div class="post-author">
								Posted by <em><?php the_author(); ?></em> on <?php echo the_time('M j, Y'); ?>
							</div>
							<div class="post-data">
								<?php the_category(','); ?> | <?php comments_number('No Comments', '1 Comment', '% Comments'); ?> | <span class='st_facebook' displayText='Facebook'></span><span class='st_twitter' displayText='Tweet'></span><span class='st_email' displayText='Email'></span>
							</div>
						</div>
					</div>
					<div class="post-excerpt">
						<?php if(has_post_thumbnail()){
							echo the_post_thumbnail(array(380,265));
						} ?>
						<?php the_excerpt(); ?>
						<span class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a></span>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>

		<div id="contentSecondary">
			<div class="gutter">
				<?php get_template_part( 'partials/blog', 'sidebar' ); ?>
			</div>
		</div>
	</div>
	<div class="colorbar"></div>
</div>

<?php get_footer(); ?>