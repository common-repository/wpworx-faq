<?php
	/*	
	*	WP faq xtreem Plugin Option File
	*/
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
function ADV_WFAQ_register_settings() {
   add_option( 'ADV_WFAQ_option_name', 'This is my option value.');
   register_setting( 'ADV_WFAQ_options_group', 'ADV_WFAQ_option_name', 'ADV_WFAQ_callback' );
}
add_action( 'admin_init', 'ADV_WFAQ_register_settings' );

// Add plugin submenu
function ADV_WFAQ_register_options_page() {
	global $submenu;
 add_submenu_page( 'edit.php?post_type=worxfaq','Wpworx FAQ Dashboard', 'Dashboard', 'edit_posts', 'WFAQ_dashboard', 'ADV_WFAQ_dashboard');
  add_submenu_page( 'edit.php?post_type=worxfaq','Wpworx FAQ Settings', 'Settings', 'edit_posts', 'worxFaq', 'ADV_WFAQ_options_page');

}
add_action('admin_menu', 'ADV_WFAQ_register_options_page');


// top bar navigation
function ADV_WFAQ_Top_Bar($Called = "No") {
	global $pagenow, $post;
	if ($Called != "Yes" and (!isset($_GET['post_type']) or $_GET['post_type'] != "worxfaq") and (!is_object($post) or $post->post_type != 'worxfaq' )) {return;}
	 ?>
	 <div class="dashborad-main-section">
	 	<div class="banner-outer">
		 	<div class="page-heading">Wpworx FAQ'S</div>
		 	<div class="dashborad-banner">
		 		<div class="banner-content">
		 			<h2>Wpworx FAQ’s</h2>
		 			<p>Create, Reuse, Customize and Control your FAQs - Fully and Easily</p>
		 		</div>
		 		<div class="faq-img">
			 		<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/faq-img.png'; ?>">
		 		</div>
				<img class="banner-img" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/dashboard-banner-img.jpg'; ?>">
			</div>
			<div class="xtreem_faq_Menu clearfix">
				<div class="custom-nav-tab clearfix">
					<ul class="clearfix">
						<li>
							<a id="Dashboard_Menu" href='edit.php?post_type=worxfaq&page=WFAQ_dashboard' class="MenuTab <?php if (isset($_GET['post_type']) and  $_GET['page'] == 'WFAQ_dashboard') {echo 'nav-tab-active';}?>"><?php _e("Dashboard", 'wpworx-faq'); ?></a>
						</li>

						<li>
							<a id="FAQs_Menu" href='edit.php?post_type=worxfaq' class="MenuTab <?php if (isset($_GET['post_type']) and $_GET['post_type'] == 'worxfaq' and $pagenow == 'edit.php' and $_GET['page'] != 'worxFaq' and  $_GET['page'] != 'WFAQ_dashboard') {echo 'nav-tab-active';}?>"><?php _e("All FAQs", 'wpworx-faq'); ?></a>
						</li>
						<li>
							<a id="Add_New_Menu" href='post-new.php?post_type=worxfaq' class="MenuTab <?php if (isset($_GET['post_type']) and $_GET['post_type'] == 'worxfaq' and $pagenow == 'post-new.php') {echo 'nav-tab-active';}?>"><?php _e("Add New", 'wpworx-faq'); ?></a>
						</li>
						<li>
							<a id="FAQ_Categories_Menu" href='edit-tags.php?taxonomy=wpwfaq&post_type=worxfaq' class="MenuTab <?php if (isset($_GET['post_type']) and $_GET['post_type'] == 'worxfaq' and $pagenow == 'edit-tags.php' and $_GET['taxonomy'] == "wpwfaq") {echo 'nav-tab-active';}?>"><?php _e("FAQ Categories", 'wpworx-faq'); ?></a>
						</li>
						<li>
							<a id="Options_Menu" href='edit.php?post_type=worxfaq&page=worxFaq' class="MenuTab <?php if (isset($_GET['post_type']) and $_GET['page'] == 'worxFaq') {echo 'nav-tab-active';}?>"><?php _e("Settings", 'wpworx-faq'); ?></a>
						</li>
					</ul>

					<div class="remainder-outer">
						<div class="remainder">
							<ul>
								<li><?php _e('Reminder','wpworx-faq'); ?></li>
								<li><?php _e('Your FAQ shortcode is','wpworx-faq' ); ?> <span class="shortcode">[worxfaq]</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	 	</div>

<?php }
add_action('admin_notices', 'ADV_WFAQ_Top_Bar');

// display setting options here
 function ADV_WFAQ_options_page()
{
	include_once('display_options.php');
} 

add_action( 'admin_enqueue_scripts', 'ADV_WFAQ_Color_Picker' );
function ADV_WFAQ_Color_Picker( $hook ) {
    if( is_admin() ) { 
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 
    }
}

function ADV_WFAQ_dashboard(){
	include_once('dashboard.php');
}
?>