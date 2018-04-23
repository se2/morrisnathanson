<?php get_header(); ?>

<div class="page-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title">Gallery</h1>
      </div>
		</div>
	</div>

	<div class="gallery-container">
		<div class="grid-container">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php $current_post_id = get_the_ID(); ?>
      <div class="grid-x gallery-single-info">
        <div class="cell small-12 medium-7 gallery-single-info--img" style="text-align:center;">
          <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="cell small-12 medium-3 gallery-single-info--meta">
          <h4 class="gallery-single-title"><?php the_title(); ?></h4>
          <h5 class="gallery-single-field-title">Details</h5>
          <?php the_content(); ?>
          <h5 class="gallery-single-field-title">Medium</h5>
          <p><?php the_field('gallery_medium'); ?></p>
          <h5 class="gallery-single-field-title">Year</h5>
          <p><?php the_field('gallery_year'); ?></p>
          <h5 class="gallery-single-field-title">Size</h5>
          <p><?php the_field('gallery_size'); ?></p>
          <p><?php the_field('gallery_status'); ?></p>
        </div>
      </div>
      <?php endwhile; endif; ?>
			<div class="grid-x gallery-single-related">
        <div class="cell small-12 medium-12 related-posts">You May Also Like:</div>
				<div class="cell small-12 medium-9 related-posts--grid">
          <div class="grid-x galleries-wrapper">
            <?php
              $current_terms = get_the_terms($current_post_id, 'gallery-category');
              $gallery_query = new WP_Query(
                array(
                  'post_type'       => 'gallery',
                  'posts_per_page'  => 3,
                  'orderby'         => 'post_date',
                  'order'           => 'DESC',
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'gallery-category',
                        'field' => 'id',
                        'terms' => $current_terms[0]->term_id
                    )
                  )
                )
              );
              if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
                <div class="gallery-item cell small-6 medium-4 large-4">
                  <a href="<?php the_permalink(); ?>">
                    <div class="gallery-bg">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                  </a>
                  <a href="<?php the_permalink(); ?>" class="gallery-name">
                    <?php the_title(); ?>
                  </a>
                  <div class="gallery-info">
                    <p><?php the_field('gallery_medium'); ?></p>
                    <p><?php the_field('gallery_year'); ?></p>
                  </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="page-sidebar page-sidebar__yellow">
    <ul class="terms-list">
      <a href="<?php echo get_site_url(); ?>/gallery" class="gallery-all">All artwork</a>
      <?php
        $terms = get_terms(
          array(
            'taxonomy' => 'gallery-category',
            'hide_empty' => false,
            'order' => 'DESC'
        ) );
        foreach ($terms as $key => $term) :
          $selected = ($current_terms[0]->term_id == $term->term_id) ? 'term-active__red' : '';
        ?>
        <li class="term-item <?php echo $selected; ?>">
          <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
    <select class="terms-select" onchange="location = this.value">
      <option value="<?php echo get_site_url(); ?>/gallery">All artwork</option>
      <?php
        foreach ($terms as $key => $term):
          $selected = ($current_terms[0]->term_id == $term->term_id) ? 'selected' : '';
      ?>
      <option value="<?php echo get_term_link($term); ?>" <?php echo $selected; ?>>
        <?php echo $term->name; ?>
      </option>
      <?php endforeach; ?>
    </select>
	</div>
</div>

<?php get_footer(); ?>
