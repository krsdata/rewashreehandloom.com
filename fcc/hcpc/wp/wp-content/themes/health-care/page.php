<?php get_header(); ?>
<div id="pageBody">
	<div class="row">
		<div class="col-sm-12">
                           <?php
               echo do_shortcode( '[breadcrumb]' ); // breadcrum 
            ?>
			<?php if(is_page('my-account')){
				
				if(isset($_SESSION['registration-error-msg'])){
					echo '<h4>'.$_SESSION['registration-error-msg'].'</h4>';
					unset($_SESSION['registration-error-msg']);
				}
			} ?>
			<?php
				if(have_posts()) :
					while(have_posts()) :
						 the_post();
						the_content();
				    endwhile;
			    else :
					echo wpautop( 'Sorry, no posts were found.' );
				endif;
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>