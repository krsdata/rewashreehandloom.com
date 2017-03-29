<?php 
  /* template Name: Vehicle */
?>
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
			<h1 class="page-title"><?php  echo $page_title;?></h1>
			<?php if(get_field('_page_sub_title')) 
			 	echo '<p class="page-sub-title">'.get_field('_page_sub_title').'</p>';
			 ?>	
		</div>
	</div>
</div>
<?php $crnt_user_id=get_current_user_id(); ?>
<div id="content-area">
	<div class="container">
		<div class="article-content">
			<?php 
			$status=custom_check_membership(); //  check login user status  
			if(isset($status)){  
				echo $status;
			}
			else{	
			?>
				<?php 
				$args = array('post_type' => 'vehicle','posts_per_page' => -1,'author'=>get_current_user_id(),'post_status' => array('publish', 'pending', 'draft', 'auto-draft'));
				$loop = new WP_Query( $args );
				if($loop->have_posts()){ ?>
					<div class="vehicle-list" id="post-<?php the_ID(); ?>">
						<table>
							<tr>
								<th>Year</th>
								<th>Make</th>
								<th>Model</th>
								<th>Vehicle Status</th>
								<th>Plan/Claim</th>
							</tr>
							<?php 
							while($loop->have_posts()){
							    $loop->the_post();
								$year=get_post_meta( get_the_ID(), '_select_year', true );
								$make=get_post_meta( get_the_ID(), '_select_make', true   );
								$model=get_post_meta( get_the_ID(), '_select_model', true   );
								?>	
								<tr>
									<td><?php  echo $year; ?></td>
									<td><?php  echo $make; ?></td>
									<td><?php  echo $model; ?></td>
									<?php 
										if( get_post_status(get_the_Id())=='publish' ){
											$post_status='Approved';
											session_start();
											$_SESSION["vehicle-id"]=get_the_ID(); /* set session*/

											$subscribe_users_info=get_user_meta(get_current_user_id(),'subscribe_users_info',true); /* get user meta */
											if(empty($subscribe_users_info)){
												$vehicle_plan='<li><a href="'.get_site_url().'/dashboard?Vehicle-Id='.get_the_ID().'">Take Plan</a></li>';
											}
											else{
												$args = array(
											    'author' => get_current_user_id(), 
											    'post_type' => 'claim',
											    'post_status' => array('publish', 'pending', 'draft', 'auto-draft'),
												    'meta_query' => array(
												        array(
												            'key' => '_vehicle_id',
												            'value' =>get_the_Id(),
												            'compare' => 'LIKE'
												        )
												    )
										    	);
												$current_user_posts = get_posts( $args );
												if(empty($current_user_posts))
													$vehicle_plan='<li><a href="'.get_site_url().'/claim-detail?Vehicle-Id='.get_the_ID().'">Add Claim</a></li>';
												else
													$vehicle_plan= '<li><a href="'.get_site_url().'/claims">View Claim</a></li>';
											}
										}
										else{
											$post_status='Pending';
											$vehicle_plan='NA';
										}
									?>
									<td><?php echo $post_status; ?></td>
									<td class="claim-form-td">
										<?php 
											$args = array(
											    'author' => get_current_user_id(), 
											    'post_type' => 'claim',
											    'post_status' => array('publish', 'pending', 'draft', 'auto-draft'),
												    'meta_query' => array(
												        array(
												            'key' => '_vehicle_id',
												            'value' =>get_the_Id(),
												            'compare' => 'LIKE'
												        )
												    )
										    	);
										$current_user_posts = get_posts( $args );			
										?>
										<div class="claim-form">
										 	<ul>
										 		<?php echo $vehicle_plan; ?>
										 	</ul>
										</div>
										<?php } ?>
									</td>
								</tr>
					 	</table>
					</div>	 
				<?php }
				else{
					wp_redirect(home_url().'/vehicle-detail');
					//echo '<h2 class="align-center">There is no vehicle found</h2>';
				}
			} ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>