<article id="post-<?php the_ID(); ?>" <?php post_class( 'editable' ); ?>>

	<header>

		<?php get_template_part( 'partials/page-title' ); ?>
		<?php get_template_part( 'partials/meta', get_post_type() ); ?>

	</header>

	<div class="post__content wysiwyg">
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

	<?php edit_post_link( 'Edit' ); ?>

</article><!-- #post-## -->
