<?php 
echo get_header();
?>
<div id="content-wrapper">
    <?php 
        
    /* search form filter */
    //echo $_SERVER['QUERY_STRING'];
    if(isset($_GET['search_profession']) && isset($_GET['search_registration']) && isset($_GET['search_option'])){
        if(isset($_GET['reg_srearch_button'])){
            global $wpdb;
            $search_profession = $_GET['search_profession'];
            $search_registration = $_GET['search_registration'];
            $search_option = $_GET['search_option'];
           // echo $search_option ;
            if($search_option == 'surnameRadioButton'){
                $sql = "SELECT u.ID, u.user_email
                    FROM $wpdb->users u
                    LEFT JOIN $wpdb->usermeta m1 ON u.ID = m1.user_id 
                    LEFT JOIN $wpdb->usermeta m2 ON  u.ID = m2.user_id 
                    WHERE m1.meta_key = 'user_profession'
                    AND m1.meta_value = '$search_profession' AND m2.meta_key = 'last_name'
                    AND m2.meta_value = '$search_registration'
                    ORDER BY u.user_registered";
                   // echo  $sql;
            }
            else{
                $sql = "SELECT u.ID, u.ID, u.user_email
                    FROM $wpdb->users u
                    INNER JOIN $wpdb->usermeta m ON m.user_id = u.ID
                    WHERE (m.meta_key = 'user_profession'
                    AND m.meta_value = '$search_profession') AND (u.user_login = '$search_registration') 
                    ORDER BY u.user_registered";
            }
            $results = $wpdb->get_results($sql) ;
            echo '<pre>';
            print_r($result);
            if(count($results)>0 && !empty($results)){
                echo '<div class="inner-wrapper"><ul>';
                foreach( $results as $result ) {
                    echo '<li><a target="_blank" href="'.get_site_url().'/user-information?user_id='.$result->ID.'">'.$result->user_email.'</a></li>';
                }
                echo '</ul></div>';
            }else{
                echo '<h4 class="align-center">Data is not available for these keywords</h4>';
            }
        }  
    }else{  
    ?>
    <div id="check-form" data-state="off" class="form--check-the-register full-bleed ">
        <div class="grid">
            <form method="GET" action="" name="search-filter"> 
                <div class="grid__item  one-whole  lap-and-up-one-fifth">
                    <h2 class="section-heading  push-half--bottom">Check the Register</h2>
                </div>
                <div class="grid__item  one-whole  lap-and-up-three-fifths">
                   <ul class="form-fields  grid">
                        <li class="grid__item   lap-and-up-one-half">
                            <label for="searchProfession" class="visuallyhidden">Profession</label>
                            <select name="search_profession" id="searchProfession">
                                <option value="">Choose a profession</option>
                                <?php 
                                $terms = get_terms( array('taxonomy' => 'profession_cat',
                                    'hide_empty' => false) );
                                                                foreach($terms as $term){
                                      echo '<option value="'.$term->name.'">'.$term->name.'</option>';
                                }               
                    
                                ?>
                                <option value="AS">Arts therapist</option>
                            </select>
                        </li><!--
                        --><li class="grid__item  lap-and-up-one-half">
                            <label for="searchRegistration" class="visuallyhidden">Search by surname or registration number</label>
                            <input name="search_registration" id="searchRegistration" class="text-input" placeholder="Search..." type="text">
                        </li><!--
                        --><li class="grid__item  one-whole">
                            <label> <span>by</span> surname <input id="surnameRadioButton" name="search_option" value="surnameRadioButton" checked="checked" type="radio"></label>
                            <label> <span>or</span> registration number <input id="registerationRadioButton" name="search_option" value="registrationRadioButton" type="radio"></label>
                        </li>
                    </ul>
                </div>
                <div class="grid__item  one-whole  lap-and-up-one-fifth">
                   <input name="reg_srearch_button" value="Search" id="RegSearchButton" class="btn  btn--primary  push--bottom" type="submit">
                    <a href="<?php echo get_site_url(); ?>/check-the-register/">Need assistance?</a>
                </div>
            </form>
        </div>
    </div>
            <div class="inner-wrapper">
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
                                wp_reset_query();
                            }
                            echo '</div>';
                        ?>
                    </div>
                    <div class="col-sm-4"><?php if ( is_active_sidebar( 'right-sidebar' ) ) :
                     dynamic_sidebar('right-sidebar'); 
            endif; ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<?php 
 echo get_footer();
?>