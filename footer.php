<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package urbanfashion
 */



?>

	</div><!-- #content -->


	<!--=======SCROLL TO TOP========-->

    <div class="scrollTop-parent">
        <div id="scrollTop">
            <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
        </div>
    </div>


	<footer id="colophon" class="site-footer">

		<?php if( !is_404() && is_active_sidebar('urbanfashion_footer') || is_active_sidebar('urbanfashion_footer_right') ) : ?>
			<div class="footer-top">
				<div class="container">
					<div class="footer-bottom-left-content">
						<div class="row">	
							<?php dynamic_sidebar('urbanfashion_footer'); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		
	</footer><!-- #colophon -->  


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
