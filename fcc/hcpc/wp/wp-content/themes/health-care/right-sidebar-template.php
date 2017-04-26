<?php 
/* Template Name:  Right Sidebar */
?>
<?php 
get_header();
?>
<div id="pageBody">
	<div class="row printformat">
          <div class="col-sm-9 page-content">
<?php
echo do_shortcode( '[breadcrumb]' ); // breadcrum 
?>
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();
						the_content();
					endwhile;
				endif;
			?>
			<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
<div id="fb-root"></div>
<script>
                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            } (document, 'script', 'facebook-jssdk'));</script>
<!--google-->
<div class="g-plus" data-action="share" data-annotation="bubble">&gt;</div>
<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
                            window.___gcfg = { lang: 'en-GB' };

                            (function () {
                                var po = document.createElement('script');
                                po.type = 'text/javascript';
                                po.async = true;
                                po.src = 'https://apis.google.com/js/plusone.js';
                                var s = document.getElementsByTagName('script')[0];
                                s.parentNode.insertBefore(po, s);
                            })();
                        </script>
<!-- linked in -->
<script type="IN/Share" data-counter="right" data-showzero="true"></script><script src="//platform.linkedin.com/in.js" type="text/javascript">
                            lang: en_US                  
                        </script>
<!--twitter-->
<a class="twitter-share-button" href="https://twitter.com/share">Tweet</a>
<script>
                            !function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id; js.src = p + '://platform.twitter.com/widgets.js';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            } (document, 'script', 'twitter-wjs');
                        </script>

		</div>
		<div class="col-sm-3">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) :
					 dynamic_sidebar('right-sidebar'); 
		 	endif; ?>
		</div>
	</div>
</div>
<?php 
get_footer();
?>