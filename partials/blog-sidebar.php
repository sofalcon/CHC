<div class="titleCont">
	<a href="<?php echo home_url('/blog'); ?>"><h1><?php echo get_field('title', 69); ?></h1></a>
	<span class="blog-description">
		<?php echo get_field('desc', 69); ?>
	</span>
	<a href="<?php echo home_url(); ?>feed/" id="blog-rss">
		Subscribe to our Blog &raquo;
	</a>
</div>
<div id="sidebarContent">
	<div id="blogSearch">
		<?php get_template_part( 'searchform', 'blog' ); ?>
	</div>
	<div id="blog-authors" class="cf">
		<h3 class="sidebar-title">Authors</h3>
		<div class="gutter">
			<?php $authors =  get_all_authors(8);
				foreach($authors as $author){
					$ava = get_avatar($author['ID'], 30); ?>
					<a href="<?php echo $author['posts_url']; ?>">
						<div class="author-entry">
							<div class="author-ava">
								<?php echo $ava; ?>
							</div>
							<div class="author-name">
								<?php echo $author['name']; ?>
							</div>
						</div>
					</a>
			<?php } ?>
		</div>
	</div>

	<?php dynamic_sidebar('blog-sidebar'); ?>
	<div id="blog-fb">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fchchearing&amp;width=260&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:260px; height:258px;" allowTransparency="true"></iframe>
	</div>

</div>