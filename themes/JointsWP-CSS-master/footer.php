<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 ?>

				<footer class="footer" role="contentinfo">

					<div class="grid-container">

						<div id="footer-sidebar" class="footer-links secondary grid-x">
							<div id="footer-sidebar1" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-1'); ?>
							</div>
							<div id="footer-sidebar2" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-2'); ?>
							</div>
							<div id="footer-sidebar3" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-3'); ?>
							</div>
							<div id="footer-sidebar4" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-4'); ?>
							</div>
							<div id="footer-sidebar5" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-5'); ?>
							</div>
							<div id="footer-sidebar6" class="footer-menu medium-2 large-2 cell">
								<?php dynamic_sidebar('footer-sidebar-6'); ?>
							</div>
						</div>

						<div class="inner-footer grid-x">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> | <?php bloginfo('name'); ?>.</p>
						</div> <!-- end #inner-footer -->

					</div>

				</footer> <!-- end .footer -->

			</div>  <!-- end .off-canvas-content -->

		</div> <!-- end .off-canvas-wrapper -->

		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->