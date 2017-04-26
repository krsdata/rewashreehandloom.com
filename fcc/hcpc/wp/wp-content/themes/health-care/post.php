<?php get_header(); ?>
<!-- #Container Area -->
<div id="pageBody">
	<div class="row printformat">
		<div class="col-sm-3">
			<?php if ( is_active_sidebar( 'left-sidebare' ) ) :
					 dynamic_sidebar('left-sidebare'); 
		 	endif; ?>
		</div>
		<div class="col-sm-9 page-content">
             <?php
               echo do_shortcode( '[breadcrumb]' ); // breadcrum 
            ?>
			<?php if(is_category()) { ?>
			<h1 class="page-title r">
				<?php printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</h1>
			<?php } elseif(is_author()) { ?>
			<?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			<h1 class="page-title author">
				<?php echo "Author Archives: "; echo $curauth->display_name;  ?>
			</h1>
			<?php } elseif(is_archive()) { ?>
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'twentyten' ); ?>
				<?php endif; ?>
			</h1>
			<?php } elseif(is_tag()) { ?>
			<h1 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date('F Y') ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date('Y') ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'twentyten' ); ?>
				<?php endif; ?>
			</h1>
			<?php } elseif(is_search()) { ?>
			<h1 class="page-title">
				<?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
			<?php } ?>
			
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php $thumbnail_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

			<div id="post_<?php the_ID(); ?>" class="post">
				<h2 class="entry-title">
					<a class="page-content-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
				</h2>
				<div class="entry">
					<?php

					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
					if(!empty($featured_image)){
						echo $featured_image = '<div class="featured-image-shadow-box quote_featured_img"> <a href="'.get_permalink().'" title="'.get_the_title().'"> <img src="'.$featured_image[0].'" width="'.$featured_image[1].'" height="'.$featured_image[2].'" alt="'.get_the_title().'" /> </a> </div>';
					}			
					
					get_template_part('inc/meta','section'); 

					the_excerpt();
					link_pages('<p><strong>Pages:</strong> ', '</p>', 'number');
					?>
					
				</div>
				
				<div class="comments-template">
					<?php comments_template(); ?>
				</div>
			</div>

			<?php endwhile; ?>

			<div class="next_prev_navigation">
				<div class="next_posts_link left_align"><?php next_posts_link('&larr; Older Posts', ''); ?></div>
				<div class="previous_posts_link right_align"><?php previous_posts_link('Newer Posta &rarr;'); ?></div>				
			</div>

			<?php else : ?>
			<div class="post"><h2><?php _e('Apologies but the page you requested could not be found!'); ?></h2></div>
			<?php endif; ?>
		</div> 
	</div> 
</div>
<?php get_footer(); ?>