<?php get_header(); ?>
<?php 
	if(get_field('_banner_image'))
		$banner_img_src=get_field('_banner_image');
	else
		$banner_img_src=get_bloginfo('template_url').'/images/Driving.jpg';
	if(get_field('_page_title_'))
		$page_title=get_field('_page_title_');
?>
<div id="banner-wrap">
	<div class="banner-bg" style="background-image:url('<?php echo $banner_img_src; ?>')">
		<div class="container banner-text">
			<h1 class="page-title">Error Page</h1>
			<?php if(get_field('_page_sub_title')) 
			 	echo '<p class="page-sub-title">'.get_field('_page_sub_title').'</p>';
			 ?>	
		</div>
	</div>
</div>
<!-- #Container Area -->
<div id="content-area">
	<div class="container">
		<div class="article-content">
			
			<div class="post-404 post">
				<h2 class="entry-title align-center"> <?php _e('Apologies but the page you requested could not be found!'); ?> </h2>
				<div class="entry entry_not_found"></div>
			</div>
		</div>
	</div>
</div>
<!-- #Container Area -->

<?php get_footer(); ?>