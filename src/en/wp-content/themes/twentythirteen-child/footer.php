<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		</div><!-- #main -->
	</div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div id="alapalkki">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'ala-menu' ) ); ?>
			
			<div style="clear: both;">
				<hr />
				<div id="ala-main">
					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('ala-main')) : else : endif; ?>
					<?php
						$pos = strpos($_SERVER['REQUEST_URI'], "/en/");
						if ($pos === false) {
					?>

							<div class="infoteksti">
								Portaali on osa Sitran <a href="https://www.sitra.fi/hankkeet/isaacus-esituotantohankkeet/#mista-on-kyse" target="_blank" /><strong>ISAACUS-hankekokonaisuutta</strong></a>.<br>
								<a href="http://fmas.narc.fi/hytedata/etusivu/tietoa-portaalista/" target="_blank" /><strong>Tietoa portaalista &raquo;</strong></a>
							</div>
					<?php
						} else {
					?>
							<a href="http://fmas.narc.fi/hytedata/en/about-the-portal/" class="infoteksti"><strong>About the portal</strong></a>
					<?php
					}
					?>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->

	<?php wp_footer(); ?>
</body>
</html>