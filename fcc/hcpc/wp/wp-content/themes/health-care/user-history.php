<?php 
  /* template Name: User History */
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
		<div class="article-content">
			<?php 
				$status=custom_check_membership(); //  check login user status  
				if(isset($status)){  
					echo $status;
				}
			else{	
			?>
				<div class="history-list">
					<?php
					$crnt_user_id=get_current_user_id();
					$subscribe_users_info=get_user_meta($crnt_user_id,'subscribe_users_info',true);
					if($subscribe_users_info){
					?>
						<table>
							<tr>
								<th>Transaction Date</th>
								<th>Transaction Id</th>
								<th>Payment</th>
								<th>Card Number</th>
								<th>Card Expiration</th>
							</tr>
							<?php
							foreach ($subscribe_users_info as $subscribe_user_info) {
								$subscribe_id=!empty($subscribe_user_info['Subscription_Id']) ? $subscribe_user_info['Subscription_Id']:NULL ;
								$trans_arrys=display_transaction_list($subscribe_id);
								if($trans_arrys){ 
									foreach ($trans_arrys as $trans_arry_inner) {
										foreach ($trans_arry_inner as $trans_arry){
											echo '<tr>';
											$date=explode('T', $trans_arry->created_at);
											echo '<td>'.$date[0] .'</td>';
											echo '<td>'. $trans_arry->id.'</td>';
											$payment=$trans_arry->amount_in_cents/100;
											echo '<td> $'.$payment .'</td>';
											echo '<td>'. $trans_arry->card_number.'</td>';
											echo '<td>'. $trans_arry->card_expiration.'</td>';
											echo '</tr>';
										}  
									} 
								}
							} ?>
						</table>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>