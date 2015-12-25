<?php
/**
 * The template for Steph Gaudreau.
 *
 * @package Steph_Gaudreau
 */

get_header(); ?>

	<?php
		global $more;
	?>

	<div id="primary" class="content-area front">
		<main id="main" class="site-main" role="main">

			<section id="call-to-action"><!-- This is the header and call to action split -->
				<?php if ( get_header_image() ) : ?>
					<div class="header-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
						</a>
				<?php endif; // End header image check. ?>
				<div class="indent">
					<div class="front-left">
						<h2 class="section-title">Call to Action</h2>
					</div>
					<div class="front-right">
						Opt-in
					</div>
				</div>
				</div> <!-- header image closes -->
			</section>
			
			<section id="programs">
				<div class="indent clear">
					<?php 
					$query = new WP_Query( 'pagename=programs' );
					$programs_id = $query->queried_object->ID;
			
					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							$more = 0;
							echo '<h2 class="section-title">' . get_the_title() . '</h2>';
							echo '<div class="entry-content">';
							the_content('');
							echo '</div>';
						}
					}
			
					/* Restore original Post Data */
					wp_reset_postdata();
			
					$args = array(
						'post_type' => 'page',
						'post_parent' => $programs_id
					);
					$programs_query = new WP_Query( $args );
					
					// The Loop
					if ( $programs_query->have_posts() ) {
						
						echo '<ul class="programs-list">';
						while ( $programs_query->have_posts() ) {
							$programs_query->the_post();
							$more = 0;
							echo '<li class="clear">';
							echo '<a href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">';
							echo '<h3 class="programs-title">' . get_the_title() . '</h3>';
							echo '</a>';
							echo '<div class="programs-lede">';
							the_content();
							echo '</div>';
							echo '</li>';
						}
						echo '</ul>';
					}
			
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
				</div><!-- .indent -->
			</section>
			
			<section id="testimonials">
				<div class="indent clear">
					<?php 
					$args = array(
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'category_name' => 'testimonials'
					);
												
					$query = new WP_Query( $args );
					// The Loop
					if ( $query->have_posts() ) {
						echo '<ul class="testimonials">';
						while ( $query->have_posts() ) {
							$query->the_post();
							$more = 0;
							echo '<li class="clear">';
							echo '<figure class="testimonial-thumb">';
							the_post_thumbnail('testimonial-mug');
							echo '</figure>';
							echo '<aside class="testimonial-text">';
							echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
							echo '<div class="testimonial-excerpt">';
							the_content('');
							echo '</div>';
							echo '</aside>';
							echo '</li>';
						}
						echo '</ul>';
					}
			
					/* Restore original Post Data */
					wp_reset_postdata();
					?>
				</div><!-- .indent -->
			</section><!-- #testimonials -->			
			<section id="about-steph"><!-- About Steph -->
				<div class="indent">
					
					<?php 
						$query = new WP_Query( 'pagename=about-steph' );
					// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								echo '<h2 class="section-title">' . get_the_title() . '</h2>';
								echo '<div class="entry-content">';
								the_content();
								echo '</div>';
							}
						}
				
						/* Restore original Post Data */
						wp_reset_postdata();
					?>
				</div>
			</section>


					
					
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
