<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="footer" role="contentinfo">
		<?php 
			if ( is_active_sidebar( 'sidebar-footer' ) )
			{
				echo '<ul class="footer-widgets">';
				dynamic_sidebar( 'sidebar-footer' ); 
				echo '</ul>';
			}
		?>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>