<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>
	<h1>Bienvenue a la page des Ateliers</h1>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
            /* Start the Loop */
            
            $args = array(
                "category_name" => "Atelier",
                "posts_per_page" => 16, 
                "orderby" => "post_name",
                "order" => "ASC"
            );
           
            $query1 = new WP_Query( $args );
            while ( $query1->have_posts() ) :
                $query1->the_post();
                echo '<h3>' . $i++ . '.' . get_the_title() . '___' . '<span class="ateliers_num">' . get_post_field('post_name') . '</span>' . '___' . '<span class="ateliers_auteur">' . get_the_author_meta('display_name', $post->post_author) . '</span>' . '</h3>';
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
