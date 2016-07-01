<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Steph_Gaudreau
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<span class="copyright">Copyright &copy; Stephanie Gaudreau<span class="sg"> | </span>Steph Gaudreau&reg; 2011 - <?php echo date('Y'); ?></span></div><div class="mumbo-jumbo"><span class="terms"><a href="/legal-terms-of-use"> Terms of Use</a></span> | <span class="terms"><a href="/privacy-policy"> Privacy Policy</a></span></div>
		<div class"made-by"><?php printf( esc_html__( 'Hand Built by %2$s.', 'stephgaudreau' ), 'stephgaudreau', '<a href="http://glasgowshipyard.com" rel="designer">Glasgow Shipyard</a>' ); ?></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>