<?php 
	get_header();
?>
<?php if(get_field('_banner_image'))
		$banner_img_src=get_field('_banner_image');
	else
		$banner_img_src=get_bloginfo('template_url').'/images/Driving.jpg';
	if(get_field('_page_title_'))
		$page_title=get_field('_page_title_');
?>
<div id="banner-wrap">
	<div class="banner-bg" style="background-image:url('<?php echo $banner_img_src; ?>')">
		<div class="container banner-text">
			<h1 class="page-title"><?php echo get_the_title(); ?></h1>
			<?php if(get_field('_page_sub_title')) 
			 	echo '<p class="page-sub-title">'.get_field('_page_sub_title').'</p>';
			 ?>	
		</div>
	</div>
</div>
<div id="content-area">
	<div class="container">
		<div class="article-content">
			<div class="vehicle-list" id="post-<?php the_ID(); ?>">
				<table>
					<tr>
						<th>Year</th>
						<th>Make</th>
						<th>Model</th>
					</tr>
					<?php 
						if(have_posts()){
							while(have_posts()){
							    the_post();
								$year=get_post_meta( get_the_ID(), '_select_year', true );
								$make=get_post_meta( get_the_ID(), '_select_make', true   );
								$model=get_post_meta( get_the_ID(), '_select_model', true   );
								?>	
								<tr>
									<td><?php  echo $year; ?></td>
									<td><?php  echo $make; ?></td>
									<td><?php  echo $model; ?></td>
								</tr>
						 <?php }	 
						}
						?>
					
				</table>

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>