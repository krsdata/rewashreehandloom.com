<?php 
  /* template Name:Vehicel Detail */
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
		<div class="article-content align-center">
			<div class="margin-btm-30">
				<?php 
					session_start();
					if(isset($_SESSION["vehicle-success-msg"])){ // show successfull submitted form msg 
						echo $_SESSION["vehicle-success-msg"];
						echo '<h2 class="align-center">Please wait while we are redirecting.....</h2>';
						unset($_SESSION["vehicle-success-msg"]);
					    echo '<meta http-equiv="refresh" content="3; url='.get_site_url().'/vehicles">';
					}
					/*if(isset($_SESSION["vehicle-error-msg"])){  // show error msg when submit another form without take a new plan 
						echo $_SESSION["vehicle-error-msg"];
						unset($_SESSION["vehicle-error-msg"]);
					}*/
				?>
				<div class="vehicle-form completed-repair-form">
					<h1 class="align-center">Vehicle form</h1>
					<form id="vehicle-form"  name="vehicle-form" action="" method="POST" enctype="multipart/form-data" multiple="multiple">
						<div class="row">
							<?php 
								$user_info = get_userdata( $crnt_user_id);
							    $user_email= $user_info->user_email;
								$first_name = $user_info->first_name;
							    $last_name = $user_info->last_name;

							?>
							<div class="col-sm-6 col-xs-12">
								<p><input id="mileage" type="text" placeholder="Mileage" 
								name="_mileage" data-validation="required" data-validation-error-msg-required="This field is required"></p>
							</div>
							<div class="col-sm-6 col-xs-12">
								<select id="select-year" data-validation="required" data-validation-error-msg-required="This field is required" name="_select_year">
									<option value="">Select Year...</option>
									<?php 
									for($i=1991;$i<= date("Y");$i++){
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
									?>
								</select>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<select id="select-make" style="background:#fff;" placeholder="Select Make" name="_select_make"  disabled="disabled">
									<option value="" >Select Make... </option>
									<?php 
										/* call vehicle api */
										$ch = curl_init();
									    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
									    curl_setopt($ch, CURLOPT_URL, 'https://api.edmunds.com/api/vehicle/v2/makes?fmt=json&api_key=hd8h89hhn5upfs3qes6dz9cf&view=full');
									    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
									    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
									    $data = curl_exec($ch);
									    curl_close($ch);
									    $datas=json_decode($data);
										foreach ($datas as $data_inner) {
									    	foreach ($data_inner as $data) {
									    		echo '<option value="'.$data->name.'">'.$data->name. '</option>';
									    	}
									    										    	
									    }
									?>
								</select>
							</div>
							<div class="col-sm-6 col-xs-12" style="position: relative;">
								<div id="loader"></div>
								<select id="select-model" style="background:#fff;" name="_select_model" data-validation="required" data-validation-error-msg-required="This field is required"  disabled="disabled">
								<option value="" >Select Model... </option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">
								<p><input id="first-name" type="text" placeholder="First Name" name="_first_name" data-validation="required" 
								data-validation-error-msg-required="This field is required" value="<?php echo $first_name; ?>"></p>
							</div>
							<div class="col-sm-6 col-xs-12">
								<p><input id="last-name" type="text" placeholder="Last Name" name="_last_name" value=
								"<?php echo $last_name; ?>"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">							
								<p><input id="email-address" type="text" placeholder="Email Address" name="_email_address"  data-validation="required email" 
								data-validation-error-msg-required="You did not enter a e-mail"
								data-validation-error-msg-email="You did not enter a valid e-mail" value="<?php echo $user_email; ?>"> </p>
							</div>
							<div class="col-sm-6 col-xs-12">
								<p><input id="zip-code" type="text" placeholder="Zip Code" name="_zip_code" data-validation="required" data-validation-error-msg-required="Please enter Zip code"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-12">	
								<p><input id="primary-phone" type="text" placeholder="Primary Phone" name="_primary_phone" data-validation="required" data-validation-error-msg-required="This field is required"></p>
							</div>
							<div class="col-sm-6 col-xs-12">
								<p><input id="alternate-phone" type="text" placeholder="Alternate Phone" name="_alternate_phone"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-xs-12">	
								<p><input id="vin-no" type="text" placeholder="VIN ( Vehicle Identification Number )" name="vin_number" data-validation="required" data-validation-error-msg-required="This field is required"></p>
							</div>
						</div>
						<div class="row" style="text-align: left;">
							<div class="col-sm-6 col-xs-12">	
								<label>Does your vehicle have more than 200k miles?</label>
								<p><label for="yes">Yes</label><input id="yes" type="radio" name="vehicle_miles" value="Yes" >
  									<label for="no" style="margin-left: 27px;">No</label><input id="no" type="radio" name="vehicle_miles" value="No" > 
								</p>
							</div>
							<div class="col-sm-6 col-xs-12">	
								<label> Is your car currently running?</label>
								<p><label for="yes">Yes</label><input id="yes" type="radio" name="currently_running" value="Yes" >
  									<label for="no" style="margin-left: 27px;">No</label><input id="no" type="radio" name="currently_running" value="No" > 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-xs-12">
								<p>
									<input id="datepicker" type="text" placeholder="Enter the date when your vehicle was registered*" name="vehicle_registered_date" data-validation="required" data-validation-error-msg-required="This field is required" ></p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12 ">
								<p style="text-align: left;">
									<label for="upload-invoice">Invoice<sup>*</sup> </label>
									<input id="upload-invoice"  type="file" data-validation="required" data-validation-error-msg-required="This field is required" name="upload_file" /></p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-xs-12 align-center">	
							<?php
								$subscribe_plan_id=get_user_meta($crnt_user_id,'plan_id',true);
								echo '<input name="plan_id" type="hidden" value="'.$subscribe_plan_id.'"/>';
							
							?>	
							<p><input type="submit" name="vehicle-submit" value="Add Vehicle"></p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>