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
			<h1 class="page-title"><?php  echo get_the_title(); ?></h1>
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
							
							<th>Vehicle</th>
							<th>Uploaded File</th>
							<th>Claim Status</th>
							<th>Edit Claim</th>
						</tr>
						<?php 
				
							if(have_posts()){
								while(have_posts()){
								    the_post();
									$vehicle_id=get_post_meta( get_the_ID(), '_vehicle_id', true );
									$vehicle_title=get_the_title($vehicle_id);
									$uploaded_file_id=get_post_meta( get_the_ID(), '_uploaded_file', true   );
								    $upload_file_url=wp_get_attachment_url( $uploaded_file_id );
								    $file_type=wp_check_filetype($upload_file_url);
							    	if($file_type['ext']=='pdf'){
							    		$file_fields='<a target="_blank" href="'.$upload_file_url.'"><img src="'.get_bloginfo('template_url').'/images/pdf-file-format-symbol.png" /></a>';
							    	}elseif( ($file_type['ext']=='doc') || ($file_type['ext']=='docx')){
							    		$file_fields='<a target="_blank"  href="'.$upload_file_url.'"><img src="'.get_bloginfo('template_url').'/images/doc-file-format-symbol.png" /></a>';
							    	}
							    	elseif( ($file_type['ext']=='jpg') || ($file_type['ext']=='png') || ($file_type['ext']=='gif') || ($file_type['ext']=='tif') || ($file_type['ext']=='jpeg') ){
							    		$img_src=wp_get_attachment_image_src( $uploaded_file_id, 'thumbnail', true);
							    		$file_fields='<a id="fancybox" href="'.$upload_file_url.'"><img src="'.$img_src[0].'"/></a>';
							    	}
							    	else{
							    		$file_fields='Not Available ';
							    	}
									?>	
									<tr>
										
										<td><?php  echo $vehicle_title; ?></td>
										<td><div class="vehicle-img"><?php echo $file_fields; ?></div></td>
										<?php 
											if( get_post_status(get_the_id())=='publish' ){
												$post_status='Approved';
												$post_edit='';
											}
											else{
												$post_status='Pending';
												$post_edit='<a href="'.get_site_url().'/claim-form/?edit-id='.get_the_ID().'">edit</a>';
											}
										?>
										<td><?php echo $post_status; ?></td>
										<td><?php echo $post_edit; ?></td>
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