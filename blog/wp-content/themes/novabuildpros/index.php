<?php get_header(); // Loads the header.php template. ?>

<?php tha_content_before(); ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php tha_content_top(); ?>

	<div class="row">
		<?php
		//side bar in detail pages
		if (is_singular()) 
		{
			$box_width="col-md-8";
		}else{	
		    		
			$box_width="col-md-12 col-sm-12";
		}
		?>
		<div class="entry-wrapper <?php echo $box_width; ?>">

			<?php if ( ! is_front_page()) : // If Not viewing on Frontpage ?>

				<?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?>

			<?php endif; // End check for Not viewing on Frontpage. ?>
			

			<?php if ( ! is_front_page() && hybrid_is_plural() ) : // If viewing a multi-post page ?>

				<?php locate_template( array( 'template-parts/archive-header.php' ), true ); // Loads the template-parts/archive-header.php template. ?>

			<?php endif; // End check for multi-post page. ?>

			<?php if ( have_posts() ) : // Checks if any posts were found. ?>
				
				<?php tha_content_while_before(); ?>

				<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

					<?php the_post(); // Loads the post data. ?>

					<?php tha_entry_before(); ?>

						<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>
					
					<?php tha_entry_after(); ?>

					<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

						<?php comments_template( '', true ); // Loads the comments.php template. ?>

					<?php endif; // End check for single post. ?>

				<?php endwhile; // End found posts loop. ?>

				<?php tha_content_while_after(); ?>
				
				<!-- Pagination for older / newer post -->

				<?php locate_template( array( 'template-parts/loop-nav.php' ), true ); // Loads the template-parts/loop-nav.php template. ?>
		
			<?php else : // If no posts were found. ?>

				<?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

			<?php endif; // End check for posts. ?>
		</div>

		<?php 
		if (is_singular()) 
		{
		hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. 
		}?>
		<!-- /.entry-wrapper -->
	</div>

	<?php tha_content_bottom(); ?>
</main><!-- #content -->

<?php tha_content_after(); ?>

<?php get_footer(); // Loads the footer.php template. ?>