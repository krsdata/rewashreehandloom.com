<?php 
  /* template Name:User Dashboard */
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
<div id="content-area">
	<div class="container">
		<div class="article-content align-center">
		<?php 
			$status=custom_check_membership(); //  check login user status  
			if(isset($status)){  
				echo $status;
			}
			else{
				$crnt_user_id=get_current_user_id();
				$subscribe_users_info=get_user_meta($crnt_user_id,'subscribe_users_info',true);
			?>
				<div class="row margin-btm-30">
					<div class="col-md-6 col-xs-12">
						<div class="account-info align-center">
							<table>
								<?php
									$user_info=get_userdata($crnt_user_id);
								?>
								<tr>
									<th colspan="2">Account Information</th>
								</tr>
								<tr>
									<td><strong>First Name</strong></td>
									<td><?php echo $user_info->first_name ?></td>
								</tr>
								<tr>
									<td><strong>Last Name</strong></td>
									<td><?php echo $user_info->last_name ?></td>
								</tr>
								<tr>
									<td><strong>Email</strong></td>
									<td><?php echo $user_info->user_email ?></td>
								</tr>
								<tr>
									<td><strong>Member Since</strong></td>
									<?php $user_registered_date=explode(' ',$user_info->user_registered);?>
									<td><?php echo $user_registered_date[0]; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="billing-info align-center">
							<?php 
							$crnt_user_id=get_current_user_id();
							$subscribe_users_info=get_user_meta($crnt_user_id,'subscribe_users_info',true);
							if($subscribe_users_info){ ?>
								<table>
									<tr>
										<th colspan="2">Billing Information</th>
									</tr>
									<?php 
									foreach ($subscribe_users_info as $subscribe_user_info) {
										$subscribe_id=!empty($subscribe_user_info['Subscription_Id']) ? $subscribe_user_info['Subscription_Id']:NULL ;
										$trans_arrys=display_transaction_list($subscribe_id);
										foreach ($trans_arrys as $trans_arry_inner) {
											foreach ($trans_arry_inner as $trans_arry){
												echo '<tr>';
													$date=explode('T', $trans_arry->created_at);
													$payment=$trans_arry->amount_in_cents/100;
													echo '<td><strong>Billing Info</strong></td>';
													echo '<td><div class="float-left">'.$date[0].'</div><div class="float-left">$'.$payment.'</div><div class="float-left">'.$trans_arry->card_number.'</div></td>';
												echo '</tr>';
											}
										}
									} ?>
								</table>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="row margin-btm-30">
					<?php if(!empty($subscribe_users_info)){ ?>
					<?php $args = array('author' => $current_user->ID, 'post_type'=> 'vehicle' );
						$current_user_posts = get_posts( $args ); 
						if(empty($current_user_posts))
							$col_sm_class="col-md-12";
						else
							$col_sm_class="col-md-8";
					?>
					<div class="<?php echo $col_sm_class;?> col-xs-12">
						<div class="product-plan-info align-center">
							<table>
								<tr>
									<th colspan="4">Subscription Information</th>
								</tr>
								<tr>
									<td><strong>Plan Name</strong></td>
									<td><strong>Plan  Price</strong></td>
									<td><strong>Plan Interval</strong></td>
									<td><strong>Plan Description</strong></td>
								</tr>
								<?php 
									foreach ($subscribe_users_info as $subscribe_user_info) {
										$product_id=!empty($subscribe_user_info['Product_ID']) ? $subscribe_user_info['Product_ID']:NULL ;
										$product_infos=show_product_plan($product_id);
										foreach ($product_infos as $product_info) {
											$product_plan_price=$product_info->price_in_cents/100;
											echo '<tr>';
											echo '<td>'.$product_info->name.'</td>';
											echo '<td> $'.$product_plan_price.'</td>';
											echo '<td>'.$product_info->interval.' '.$product_info->interval_unit.'</td>';
							
											echo '<td>'.$product_info->description.'</td>';
											echo '</tr>';
										}
									}
								
								?>
							</table>
						</div>
					</div>
					<?php } ?>
					<div class="col-md-4 col-xs-12">
						<div class="vehicle-info">
							<?php 
							$args = array('post_type' => 'vehicle','posts_per_page' => -1,'author'=>get_current_user_id());
							$loop = new WP_Query( $args );
							if($loop->have_posts()){ ?>
								<table>
								<tr><th colspan="3">Vehicle Information</th></tr>
									<tr>
										<td><strong>Year</strong></td>
										<td><strong>Make</strong></td>
										<td><strong>Model</strong></td>
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
										</tr>
									<?php } ?>		
								</table>
							<?php } ?>	
						</div>
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>