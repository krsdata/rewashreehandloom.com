<?php 
echo get_header();
?>
<div id="content-wrapper">
	<div class="inner-wrapper">
		<div id="check-form" data-state="off" class="form--check-the-register full-bleed ">
            <div class="grid">
                <div class="grid__item  one-whole  lap-and-up-one-fifth">
                    <h2 class="section-heading  push-half--bottom">Check the Register</h2>
                </div>
                <div class="grid__item  one-whole  lap-and-up-three-fifths">
                    <ul class="form-fields	grid">
	                    <li class="grid__item	lap-and-up-one-half">
		                    <label for="searchProfession" class="visuallyhidden">Profession</label>
		                    <select name="ctl00$searchProfession" id="ctl00_searchProfession">
								<option value="">Choose a profession</option>
								<option value="AS">Arts therapist</option>
								<option value="BS">Biomedical scientist</option>
								<option value="CH">Chiropodist / podiatrist</option>
								<option value="CS">Clinical scientist</option>
								<option value="DT">Dietitian</option>
								<option value="HAD">Hearing aid dispenser</option>
								<option value="OT">Occupational therapist</option>
								<option value="ODP">Operating department practitioner</option>
								<option value="OR">Orthoptist</option>
								<option value="PA">Paramedic</option>
								<option value="PH">Physiotherapist</option>
								<option value="PYL">Practitioner psychologist</option>
								<option value="PO">Prosthetist / orthotist</option>
								<option value="RA">Radiographer</option>
								<option value="SW">Social worker in England</option>
								<option value="SL">Speech and language therapist</option>
							</select>
	                    </li><!--
	                    --><li class="grid__item  lap-and-up-one-half">
		                    <label for="searchRegistration" class="visuallyhidden">Search by surname or registration number</label>
		                    <input name="searchRegistration" id="searchRegistration" class="text-input" placeholder="Search..." type="text">
	                    </li><!--
	                    --><li class="grid__item  one-whole">
		                    <label> <span>by</span> surname <input id="ctl00_surnameRadioButton" name="ctl00$searchOption" value="surnameRadioButton" checked="checked" type="radio"></label>
		                    <label> <span>or</span> registration number <input id="ctl00_registrationRadioButton" name="ctl00$searchOption" value="registrationRadioButton" type="radio"></label>
	                    </li>
                    </ul>
                    </div>
                    <div class="grid__item  one-whole  lap-and-up-one-fifth">
                       <input name="ctl00$RegSearchButton" value="Search" onclick="return goSearch('ctl00$searchOption', 'searchRegistration', 'ctl00_searchProfession');" id="ctl00_RegSearchButton" class="btn  btn--primary  push--bottom" type="submit">
	                    <a href="/check/">Need assistance?</a>
                    </div>
                </div>
            </div>
    	
		<div class="row home-section">
			<div class="col-sm-3">
				<?php if ( is_active_sidebar( 'left-sidebare' ) ) :
					 dynamic_sidebar('left-sidebare'); 
			 	endif; ?>
			</div>
			<div class="col-sm-9">
				<h1> Regulating health, psychological and social work professionals</h1>
				<p style="text-align: left;">We are a regulator, and we were set up to protect the public. <a href="../aboutus/">Find out more</a>.</p>
				<div class="row">
					<div class="col-sm-8">
						<?php 
							$args = array(
							'post_type' => 'media_and_events',
							'tax_query' => array(
							    array(
							    'taxonomy' => 'media_events_cat',
							    'field' => 'id',
							    'terms' => 4
							     )
							  )
							);
					$the_queryy = new WP_Query( $args );
					
					//print_r($the_queryy) ;
						echo '<div class="media-gallery row">';
						if ( $the_queryy->have_posts() ) {
								while ( $the_queryy->have_posts() ) {
									$the_queryy->the_post();
									if(get_the_ID()==48||get_the_ID()==50){
										echo '<div class="media-wrap col-sm-6">';
											
											if (has_post_thumbnail( get_the_ID())){
									        	$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID(),'thumbnail') );
		 										// '<figure class="media__figure"><img src="'.$feat_image_url.'" alt="SW renewal Dec" /></figure>';
		 									}
		 									echo '<a class="media" href="'.get_permalink(get_the_ID()).'"><figure class="media__figure"><img src="'.$feat_image_url.'" alt="SW renewal Dec" /></figure><div class="media__body"><h2 class="media__heading">'.get_the_title().'</h2><p>'.get_the_excerpt().'</p></div><div class="media__actions"><span class="link">Read more</span></div></a>';
										echo '</div>';
									}
								}
							}
							echo '</div>';
						?>
					</div>
					<div class="col-sm-4"><?php if ( is_active_sidebar( 'right-sidebare' ) ) :
					 dynamic_sidebar('right-sidebare'); 
			 	endif; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
 echo get_footer();
?>