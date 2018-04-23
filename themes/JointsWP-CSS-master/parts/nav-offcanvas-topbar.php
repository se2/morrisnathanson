<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="grid-container top-bar-container">
	<div class="top-bar pos-rel" id="top-bar-menu">
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
		<div class="title-bar hamburger-menu show-for-small-only" data-toggle="off-canvas" data-hide-for="medium">
			<button class="menu-icon" type="button" data-toggle></button>
		</div>
		<div class="top-bar-right top-bar-abs">
			<ul class="menu secondary-menu">
				<li>
					<a href="#" data-open="studio-general-modal">Contact</a>
				</li>
				<li>
					<a href="<?php echo get_site_url(); ?>/cart"><span class="shopping-label">Shopping Cart</span><span class="icon-bag"></span></a>
				</li>
			</ul>
		</div>
	</div>
</div>