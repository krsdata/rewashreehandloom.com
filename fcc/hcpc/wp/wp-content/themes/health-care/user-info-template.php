<?php 
/* Template Name: User Info */
?>
<?php 
get_header();
?>
<div id="pageBody">
	<div class="row printformat">
		<div class="col-sm-12">
			<?php 
			if(isset($_GET['user_id'])){
				$user_id = $_GET['user_id'];
				$first_name = get_user_meta($user_id,'first_name',true);
				$last_name = get_user_meta($user_id,'last_name',true);
				$user_profession = get_user_meta($user_id,'user_profession',true);
				$user_infos = get_userdata( $user_id );
				// echo '<pre>';
				// print_r($user_infos);
				// echo '</pre>';
				if(!empty($user_infos)){
					echo '<div class="user-info">';
						echo '<p id="user-id-'.$user_id.'"><strong>Name:</strong> '.$first_name.' '.$last_name.'</p>';
						echo '<p><strong>Email:</strong> '.$user_infos->user_email.'</p>';
						echo '<p><strong>Registration Number:</strong> '.$user_infos->user_login.'</p>';
						echo '<p><strong>Profession:</strong> '.$user_profession.'</p>';
						
				    echo '</div>';		
				}
			}
			?>
        </div>
	</div>
</div>
<?php 
get_footer();
?>