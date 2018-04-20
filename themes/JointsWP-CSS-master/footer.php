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
							<?php for ($i = 1; $i <= 6 ; $i++): ?>
								<div id="footer-sidebar<?php echo $i; ?>" class="footer-menu medium-2 large-2 cell">
									<?php if (is_active_sidebar('footer-sidebar-' . $i)) { dynamic_sidebar('footer-sidebar-' . $i); } ?>
								</div>
							<?php endfor; ?>
						</div>

						<div class="inner-footer grid-x">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> | <?php bloginfo('name'); ?>.</p>
						</div> <!-- end #inner-footer -->

					</div>

				</footer> <!-- end .footer -->

				<div class="reveal" id="studio-contact-modal" data-reveal>
					<?php echo do_shortcode('[contact-form-7 id="78" title="Schedule a Visit"]'); ?>
					<button class="close-button" data-close aria-label="Close modal" type="button">
						<span aria-hidden="true">&times;</span>
				  </button>
				</div>

				<div class="reveal" id="studio-general-modal" data-reveal>
					<?php echo do_shortcode('[contact-form-7 id="256" title="General Inquiry"]'); ?>
					<button class="close-button" data-close aria-label="Close modal" type="button">
						<span aria-hidden="true">&times;</span>
				  </button>
				</div>

				<div class="reveal" id="studio-purchase-modal" data-reveal>
					<?php echo do_shortcode('[contact-form-7 id="257" title="Purchase Interest"]'); ?>
					<button class="close-button" data-close aria-label="Close modal" type="button">
						<span aria-hidden="true">&times;</span>
				  </button>
				</div>

			</div>  <!-- end .off-canvas-content -->

		</div> <!-- end .off-canvas-wrapper -->

		<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->