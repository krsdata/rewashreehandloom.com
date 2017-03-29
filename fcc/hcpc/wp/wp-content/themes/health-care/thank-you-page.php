<?php 
  /* template Name:Thank You */
?>
<?php get_header(); ?>
<?php 
	if(get_field('_banner_image'))
		$banner_img_src=get_field('_banner_image');
	else
		$banner_img_src=get_bloginfo('template_url').'/images/Driving.jpg';
	if(get_field('_page_title_'))
		$page_title=get_field('_page_title_');
	/*else
		$page_title=get_the_title();	*/

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
			if(have_posts()) :
				while(have_posts()) :
					 the_post();
					the_content();
			    endwhile;
		    else :
				echo wpautop( 'Sorry, no posts were found.' );
			endif;
			?>
			<?php 
				/* get value from query string */
				$customer_id=$_GET['customer_id'];
				$product_id=$_GET['product_id'];
				$signup_payment_id=$_GET['signup_payment_id'];
				$signup_revenue=$_GET['signup_revenue'];
				$subscription_id=$_GET['subscription_id'];

				/* get session data */
				session_start();
				if(isset($_SESSION["vehicle-id"])){
					$vehicle_id=$_SESSION["vehicle-id"];
					echo $vehicle_id;
				}
			   
				$user_meta=array('Customer_Id'=>$customer_id,'Product_ID'=>$product_id,'Signup_Payment_Id'=>$signup_payment_id,'Signup_Revenue'=>$signup_revenue,'Subscription_Id'=>$subscription_id,'Vehicle_Id'=>$vehicle_id);
				
				unset($_SESSION["vehicle-id"]);
				
				/* add subscription user meta */
				$crnt_user_id=get_current_user_id();
				$subscribe_users_info=get_user_meta(get_current_user_id(),'subscribe_users_info',true); 
				if($signup_payment_id){
					if($subscribe_users_info){
						$subscribe_users_info[] = $user_meta;
						update_user_meta($crnt_user_id,'subscribe_users_info',$subscribe_users_info);
					}
					else{
						$new_array=array();
						$new_array[] = $user_meta;
						update_user_meta($crnt_user_id,'subscribe_users_info',$new_array);
					}
				}
				/* add subscription user status meta */
				if(($user_meta['Signup_Payment_Id'])!=''){
					update_user_meta($crnt_user_id,'subscribe_user_status','active');
				}
				/* add payment id meta */
				update_user_meta($crnt_user_id,'plan_id',$signup_payment_id);
			?>
			<ul class="button align-center">
				<li><a href="<?php echo get_site_url(); ?>/dashboard">Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/history">History</a></li>
			</ul>
			<?php 
				/* send mail to admin */
				if($user_meta['Signup_Payment_Id']!=''){
					$crnt_user=wp_get_current_user();
					$to ='techspark551@gmail.com';
		            $subject = 'New User Subscription';
		            $sender = 'techspark551@gmail.com';
           	        $headers.= 'MIME-Version: 1.0' . "\r\n";
		            $headers.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		            $headers.= "X-Mailer: PHP \r\n";
		            $headers.= 'From: '.$sender.' ' . "\r\n";
		            $message = '<div>
	            			<h3>User: '.$crnt_user->user_login.' has been subscribed</h3>
							<table border="1px solid #000" cellpadding="10" style="border-collapse: collapse;text-align: center;">
							<tr style="font-size: 18px;background-color:#C8AE79;text-align:center;color:#fff">
							<th colspan="2">
							<p>
							<strong>Subscriber Information</strong>
							</p>
							</th>
							</tr>
							<tbody style="color:#000;">
							<tr><td>User Name</td><td>'.$crnt_user->user_login.'</td></tr>
							<tr><td>Subscription Id</td><td>'. $user_meta['Subscription_Id'].'</td>
							</tr>
							<tr><td>Transaction Id</td><td>'. $user_meta['Signup_Payment_Id'].'</td></tr>
							<tr><td>Product Id</td><td>'.$user_meta['Product_ID'].'</td></tr>
							<tr><td>Payment</td><td>$'.($user_meta['Signup_Revenue']).'</td></tr>
							</tbody>
							</table>
							</div>';
		            $mail=wp_mail( $to, $subject, $message, $headers );
		            echo '<meta http-equiv="refresh" content="3; url='.get_site_url().'/summary">';
		        }
		            
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>