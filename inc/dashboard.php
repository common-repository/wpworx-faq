<?php  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly  
		global $pagenow;

  if($pagenow == "admin.php" && $_GET['page'] == "WFAQ_dashboard"){
 ?>
	 <div class="dashborad-main-section">
	 	<div class="banner-outer">
		 	<div class="page-heading">Wpworx FAQ'S</div>
		 	<div class="dashborad-banner">
		 		<div class="banner-content">
		 			<h2>Wpworx FAQ's</h2>
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
							<a id="Dashboard_Menu" href='edit.php?post_type=worxfaq&page=WFAQ_dashboard' class="MenuTab nav-tab-active"><?php _e("Dashboard", 'wpworx-faq'); ?></a>
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
								<li><?php _e('Your FAQ shortcode is','wpworx-faq' ); ?><span class="shortcode">[worxfaq]</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	 	</div>
<?php } ?>	 	
<div class="dashboard-mid-content">
	<div class="container">
		<div class="row-mid-content accordion-outer">
			<button class="accordion active"><?php _e('Get Support','wpworx-faq'); ?></button>
			<div class="panel" style="max-height: 296px;">
			  <ul class="get-support inline-ul clearfix">
			  	<li>
			  		<a href="https://www.youtube.com/watch?v=m3-y78UzLg8" target="_blank">
				  		<div class="get-support-outer">
				  			<div class="get-support-icon">
				  				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/support-icon-1.png'; ?>">
				  			</div>
				  			<div class="get-support-txt">
				  				<h2><?php _e('YouTube Tutorials','wpworx-faq'); ?></h2>
				  			</div>
				  		</div>
			  		</a>
			  	</li>
			  	<li>
			  		<a href="https://wordpress.org/plugins/wpworx-faq/" target="_blank">
				  		<div class="get-support-outer">
				  			<div class="get-support-icon">
				  				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/faq-icon.png'; ?>">
				  			</div>
				  			<div class="get-support-txt">
				  				<h2><?php _e('Plugin FAQs','wpworx-faq'); ?></h2>
				  			</div>
				  		</div>
			  		</a>
			  	</li>
			  	<li>
			  		<a href="https://wordpress.org/support/plugin/wpworx-faq" target="_blank">
				  		<div class="get-support-outer">
				  			<div class="get-support-icon">
				  				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/support-icon-3.png'; ?>">
				  			</div>
				  			<div class="get-support-txt">
				  				<h2><?php _e('Support Forum','wpworx-faq'); ?></h2>
				  			</div>
				  		</div>
			  		</a>
			  	</li>
			  	<li>
			  		<a href="http://wpworx.co/wpworx-faq-demo" target="_blank">
				  		<div class="get-support-outer">
				  			<div class="get-support-icon">
				  				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/support-icon-4.png'; ?>">
				  			</div>
				  			<div class="get-support-txt">
				  				<h2><?php _e('Documentation','wpworx-faq') ?></h2>
				  			</div>
				  		</div>
			  		</a>
			  	</li>
			  </ul>
			</div>
		</div>
		<div class="row-mid-content accordion-outer">
			<h2 class="people-say-heading"><?php _e('Customer Sharing thoughts on Wpworx FAQ','wpworx-faq') ?></h2>
			<div class="people-say-bx">
				<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/star-img.png'; ?>">
				<h2 class="people-say-bx-heading">"<?php _e('Great FAQ Plugin with Almost Everything I needed.','wpworx-faq') ?>"</h2>
				<p class="people-sub-heading">- Darren</p>
		
			</div>
		</div>
	</div>
	<div class="premium-version-outer">
		<div class="container">
			<h2 class="premium-version"><?php _e('A comprehensive FAQ Plugin with Out-of-Imagination Features','wpworx-faq'); ?></h2>
			<div class="row clearfix">
				<div class="col-md-3">
					<div class="premium-version-inner">
						<ul class="check-ul">
							<li><?php _e('Add unlimited Categories & FAQs','wpworx-faq') ?></li>
							<li><?php _e('Create fully-responsive and beautiful FAQs','wpworx-faq') ?></li>
							<li><?php _e('Change font and BG color to match your brand','wpworx-faq') ?></li>
							<li><?php _e('Works well with Custom Posts','wpworx-faq') ?></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3">
					<div class="premium-version-inner">
						<ul class="check-ul">
							<li><?php _e('SEO Friendly with HTML styling','wpworx-faq') ?></li>
							<li><?php _e('Easy-to-use shortcodes','wpworx-faq') ?></li>
							<li><?php _e('WPML & Multisite supported','wpworx-faq') ?></li>
							<li><?php _e('Easy CSS Styling and provision to add Custom CSS','wpworx-faq') ?></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3">
					<div class="premium-version-inner">
						<ul class="check-ul">					
							<li><?php _e('View readers’ count for each question','wpworx-faq') ?></li>
							<li><?php _e('Sort FAQs in Ascending/Desc order','wpworx-faq') ?></li>
							<li><?php _e('Accordion and Toggle Views','wpworx-faq') ?></li>
							<li><?php _e('Add Questions to multiple categories for re-use','wpworx-faq') ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<ul class="inline-ul ftr-ul clearfix">
				<li class="star-li">
					<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/faq-icon.png'; ?>">
					<p><?php _e("Wpworx FAQ Plugin is designed to let the WordPress website owners set up the best-in-appearance FAQs on their websites. Using a totally different approach, our plugin allows you to create Questions and map these questions to multiple or single categories. Using the category's short-code, Wpworx FAQ can be integrated anywhere on your website. From color to background and rendering style, users have full control on their FAQs, built using this robust, highly-customizable, mobile-responsive and feature-rich plugin.",'wpworx-faq') ?></p>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
jQuery(document).ready(function(){
	jQuery("#menu-posts-worxfaq ul.wp-submenu li.wp-first-item").addClass('current');
});
</script>
