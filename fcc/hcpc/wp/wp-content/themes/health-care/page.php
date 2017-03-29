<?php get_header(); ?>

<div id="content-area">
	<div class="container">
		<div class="article-content">
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