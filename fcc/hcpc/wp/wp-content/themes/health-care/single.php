<?php 
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
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
            <?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
		            <div class="post" id="post-<?php the_ID(); ?>">
					  	<div class="single_post_wrap">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<?php  
							$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); 
							if(!empty($featured_image)){
								echo $featured_image = '<div class="featured-image-shadow-box quote_featured_img"> <a href="'.get_permalink().'" title="'.get_the_title().'"> <img src="'.$featured_image[0].'" width="'.$featured_image[1].'" height="'.$featured_image[2].'" alt="'.get_the_title().'" /> </a> </div>';
							}			
							?>
							<div class="post_inner_wrap clearfix">
						        <div class="entry">
									<?php the_content(); ?>
							</div>
						        <!-- skepost -->
							</div>
				 			<div class="navigation"> 
								<?php previous_post_link( __('<span class="nav-previous"><i class="fa fa-angle-left"></i> %link</span>','theme-opt')); ?>
								<?php next_post_link( __('<span class="nav-next">%link <i class="fa fa-angle-right"></i></span>','theme-opt')); ?> 
							</div>
							<div class="clearfix"></div>
							<div class="comments-template">
								<?php comments_template( '', true ); ?>
							</div>
						</div>
					</div>
				<!-- post -->
				<?php endwhile; ?>
			<?php else :  ?>
			<div class="post">
				<h2><?php _e('Not Found','theme-opt'); ?></h2>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>