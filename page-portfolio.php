<?php
/**
 * Template Name: page-portfolio
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package currentmonkey
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-portfolio">

		<?php
          $loop = new WP_Query(array('post_type' => 'jobs',
          'posts_per_page' => 36,
          'orderby'=>'date',
           'order'=>'DESC',
          ));
     ?>
     <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
     <?php    
          $custom = get_post_custom($post->ID);
          $screenshot_url = $custom["screenshot_url"][0];
          $website_url = $custom["website_url"][0];
     ?>
             
          <div class="module-portfolio">
          <h3 class="module-header"><?php the_title(); ?></h3>
          <a href="<?=$website_url?>"><?php the_post_thumbnail(); ?> </a>
          <?php the_content(); ?>
          </div>
          

<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
