<?php
/**
 * Plugin Name: Social Tracker
 * Plugin URI: http://www.click2check.net/wordpress-plugins/social-tracker-wordpress-plugin
 * Description: Track your website's social and SEO ranking daily data to know your sites growth.
 * Version: 1.2
 * Author: Bhagirath
 * Author URI: http://click2check.net
 * License: GPL2
 */

add_action('admin_menu', 'social_tracker_menu');
add_action('admin_enqueue_scripts', 'social_tracker_admin_enqueue_scripts');


function social_tracker_get_plugin_data() {
    // pull only these vars
    $default_headers = array(
        'Name' => 'Plugin Name',
        'PluginURI' => 'Plugin URI',
        'Description' => 'Description',
    );

    $plugin_data = get_file_data(__FILE__, $default_headers, 'plugin');

    $url = $plugin_data['PluginURI'];
    $name = $plugin_data['Name'];

    $data['name'] = $name;
    $data['url'] = $url;

    $data = array_merge($data, $plugin_data);

    return $data;
}

function social_tracker_admin_enqueue_scripts($current_page = '')
{
		if (strpos($current_page, 'social_tracker') === false) {
			return ;
		}
		
		

		wp_register_style('social_tracker', plugins_url("/css/main.css", __FILE__), false,
				filemtime( plugin_dir_path( __FILE__ ) . "/css/main.css" ) );
				
		wp_enqueue_style('social_tracker');

		wp_register_style('social_tracker_bootstrap', plugins_url("/css/bootstrap.min.css", __FILE__), false,
				filemtime( plugin_dir_path( __FILE__ ) . "/css/bootstrap.min.css" ) );
				
		wp_enqueue_style('social_tracker_bootstrap');
		
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'social_tracker', plugins_url("/js/main.js", __FILE__), array('jquery', ),
				filemtime( plugin_dir_path( __FILE__ ) . "/js/main.js" ), true);
		wp_enqueue_script( 'social_tracker' );
		
		wp_register_script( 'social_tracker_bootstrap', plugins_url("/js/bootstrap.min.js", __FILE__), array('jquery', ),
				filemtime( plugin_dir_path( __FILE__ ) . "/js/bootstrap.min.js" ), true);
		wp_enqueue_script( 'social_tracker_bootstrap' );
}


function social_tracker_menu() {
	// Add the new admin menu and page and save the returned hook suffix
	$hook_suffix = add_options_page('Social Tracker Option', 'Social Tracker', 'manage_options', 'social_tracker', 'social_tracker_option');
	// Use the hook suffix to compose the hook and register an action executed when plugin's options page is loaded
	//add_action( 'load-' . $hook_suffix , 'my_load_function' );
}


function social_tracker_option() {
$message ="";
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	?>
	
<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2>Social Tracker.</h2>
<div id="poststuff">

            <div id="post-body" class="metabox-holder columns-2">
                <!-- main content -->
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <div class="postbox">
                            <h3><span>Your Social Tracking data</span></h3>
<div class="inside">
<?php 
$url = site_url();
?>
 <iframe src="http://www.click2check.net/click2checklight?url=<?php echo $url;?>" style="width: 100%;height: 500px"></iframe>


</div> <!-- .inside -->

                        </div> <!-- .postbox -->
 
<div class="postbox">
                            <?php
                                $plugin_data = social_tracker_get_plugin_data();

                                $app_link = urlencode($plugin_data['PluginURI']);
                                $app_title = urlencode($plugin_data['Name']);
                                $app_descr = urlencode($plugin_data['Description']);
                                ?>
                                <h3>Share</h3>
                                <p>
                                    <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="padding: 0px 20px 10px;">
                                    <a class="addthis_button_facebook" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_twitter" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_google_plusone" g:plusone:count="false" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_linkedin" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_email" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_myspace" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_google" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_digg" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_delicious" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_stumbleupon" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_tumblr" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_favorites" addthis:url="<?php echo $app_link ?>" addthis:title="<?php echo $app_title ?>" addthis:description="<?php echo $app_descr ?>"></a>
                                    <a class="addthis_button_compact"></a>
                                </div>
                                <!-- The JS code is in the footer -->

                                <script type="text/javascript">
                                    var addthis_config = {"data_track_clickback": true};
                                    var addthis_share = {
                                        templates: {twitter: 'Check out {{title}} #WordPress #plugin at {{lurl}} (via @orbisius)'}
                                    }
                                </script>
                                <!-- AddThis Button START part2 -->
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=lordspace"></script>
                                <!-- AddThis Button END part2 -->
                        </div> <!-- .postbox -->
                        <div class="postbox">
						<h3>Our Other Plugins</h3>
						<div class="list-group">
							 <?php include plugin_dir_path( __FILE__ ) . "/class/our_plugins.php" ?>
							</div>
						</div>
                    </div> <!-- .meta-box-sortables .ui-sortable -->

                </div> <!-- post-body-content -->
  <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container">

                    <div class="meta-box-sortables">

                        <div class="postbox">
                            <h3><span>Hire Us</span></h3>
                            <div class="inside">
								We are expert Wordpress Developer.
                                Hire us to create a plugin/web/mobile application for your business.
                                <br/><a href="https://www.odesk.com/users/~0148a552598c563ebb"
                                   title="If you want a custom web/mobile app/plugin developed contact us. This opens in a new window/tab"
                                    class="btn btn-primary" target="_blank">Hire me on O'Desk</a>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->

                        <div class="postbox">
                            <h3><span>Follow Us On FaceBook</span></h3>
                            <div class="inside">
                                  <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fclick2check.net&amp;width=250&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=161074614043987" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:290px;" allowTransparency="true"></iframe>
                            </div> <!-- .inside -->
                        </div> <!-- .postbox -->

                        <div class="postbox">
						<h3><span>Follow Us On Google Plus</span></h3>
                            <div class="inside">
                              <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 280px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 232px;" tabindex="0" vspace="0" width="100%" id="I0_1393700337193" name="I0_1393700337193" src="https://apis.google.com/_/im/_/widget/render/plus/followers?usegapi=1&amp;bsv=o&amp;action=followers&amp;height=250&amp;source=blogger%3Ablog%3Afollowers&amp;width=280&amp;origin=http%3A%2F%2Fwww.click2check.net&amp;url=https%3A%2F%2Fplus.google.com%2F115313279456959924671&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_GB.wyNTvg-ZoSU.O%2Fm%3D__features__%2Fam%3DIQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAItRSTP1urva78IJIHxeksZE6kSRRrxiwQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1393700337193&amp;parent=http%3A%2F%2Fwww.click2check.net&amp;pfname=&amp;rpctoken=99993975" data-gapiattached="true" title="+1"></iframe>
                            </div>
                        </div> <!-- .postbox -->


                        <div class="postbox"> <!-- quick-contact -->
                            
                            <h3><span>Quick Help or Suggestion</span></h3>
                            <div class="inside">
                                <div>
                                    Your questions and suggestions are most welcome! if you have any question than feel free to contact us.
                                        <a href="<?php echo $plugin_data['PluginURI'];?>"
                                   title="<?php echo $plugin_data['Name'];?>"
                                    class="btn btn-primary" target="_blank">Contact Us Now</a>
                                </div>
                            </div> <!-- .inside -->
                         </div> <!-- .postbox --> <!-- /quick-contact -->

                    </div> <!-- .meta-box-sortables -->

                </div> <!-- #postbox-container-1 .postbox-container -->

            </div> <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">
        </div> <!-- #poststuff -->

</div>
<?php 
}?>