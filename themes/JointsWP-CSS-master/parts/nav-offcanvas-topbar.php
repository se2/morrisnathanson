<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="grid-container top-bar-container">
	<div class="top-bar" id="top-bar-menu">
		<div class="top-bar-left float-left">
			<ul class="menu">
				<li><a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo(); ?>" class="menu-logo">
				</li>
			</ul>
		</div>
		<div class="top-bar-right show-for-medium menu-wrapper">
			<?php joints_top_nav(); ?>
		</div>
		<div class="top-bar-right top-bar-abs">
			<ul class="menu secondary-menu">
				<li>
					<a href="#" data-open="studio-general-modal">Contact</a>
				</li>
				<li>
					<a href="/cart">Shopping Cart<span class="icon-bag"></span></a>
				</li>
			</ul>
		</div>
		<!-- <div class="top-bar-right float-right show-for-small-only">
			<ul class="menu">
				<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
			</ul>
		</div> -->
	</div>
</div>