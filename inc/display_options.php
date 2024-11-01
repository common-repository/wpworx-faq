<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
ob_start();

global $wpdb, $wp_version,$success_msg;
  $table_name = $wpdb->prefix . "worx_faq";
  $success_msg = '';
  $error_msg = '';
  $action = '';
 if(isset($_POST['Options_Submit']) ){
	if (  empty( $_POST ) || !check_admin_referer( 'wpw-nonce','wpwnonce'  ) || !current_user_can('edit_others_pages')) {
			wp_die( 'You are not permitted to change the plugin settings.' );
		}else{
		 	$action = sanitize_text_field($_POST['tab_action']);
		 	$faq_title = sanitize_text_field($_POST['faq_title']);
		 	$faq_heading = sanitize_text_field($_POST['faq_heading']);
		 	$category_title = sanitize_text_field($_POST['category_title']);
		 	$category_heading = sanitize_text_field($_POST['category_heading']);
		 	$back_to_top = sanitize_text_field($_POST['back_to_top']);
		 	$style = sanitize_text_field($_POST['style']);
		 	$ex_all = sanitize_text_field($_POST['expand_collapse_all']);
		 	$dp_ans = sanitize_text_field($_POST['display_all_answers']);
		 	$custom_css = sanitize_text_field($_POST['custom_css']);
		 	$ico_clr = sanitize_text_field($_POST['icon_color']);
		 	$ico_bg_clr = sanitize_text_field($_POST['icon_bg_color']);
		 	$que_clr = sanitize_text_field($_POST['question_color']);
		 	$que_bg_clr = sanitize_text_field($_POST['question_bg_color']);
		 	$que_hv_clr = sanitize_text_field($_POST['question_hover_color']);
		 	$que_act_clr = sanitize_text_field($_POST['question_active_color']);
		 	$que_act_bg_clr = sanitize_text_field($_POST['question_active_bg_color']);

 		    $wpdb->update( 
				$wpdb->prefix . 'worx_faq', 
				array( 
					'faq_title' => $faq_title,    					
					'faq_heading' => $faq_heading,    					
					'category_title' => $category_title,    					
					'category_heading' => $category_heading,    					
					'back_to_top' => $back_to_top,    					
					'accordian' => $style,    					
					'expand_collapse_all' => $ex_all,  
					'display_all_answers' => $dp_ans,
                    'custom_css' => $custom_css,
                    'icon_color' => $ico_clr,
                    'icon_bg_color' => $ico_bg_clr,
					'question_color' => $que_clr,
					'question_bg_color' => $que_bg_clr,
					'question_hover_color' => $que_hv_clr,
					'question_active_color' => $que_act_clr,
					'question_active_bg_color' => $que_act_bg_clr,
                    'add_date' => date("Y-m-d H:i:s"),
				), 
				array('id'=> 1),
				array( 
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s', 
					'%s', 
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				) 
			);
			$success_msg = '<div class="success_msg">'.__('Settings successfully saved !','wpworx-faq').'</div>';
		}	
 }

 $options = $wpdb->get_row( "SELECT * FROM $table_name" );
 if(count($options)>0){
 	 $id = $options->id;
	 $faq_title = esc_html($options->faq_title); 
	 $faq_heading = esc_html($options->faq_heading); 
	 $category_title = esc_html($options->category_title); 
	 $category_heading = esc_html($options->category_heading); 
	 $expand_collapse_all = esc_html($options->expand_collapse_all); 
	 $back_to_top = esc_html($options->back_to_top); 
	 $accordian = esc_html($options->accordian); 
	 $display_all_answers = esc_html($options->display_all_answers);
	 $custom_css = esc_html($options->custom_css);
	 $icon_color = esc_html($options->icon_color);
	 $icon_bg_color = esc_html($options->icon_bg_color);
	 $question_color = esc_html($options->question_color);
	 $question_bg_color = esc_html($options->question_bg_color);
	 $question_active_color = esc_html($options->question_active_color);
	 $question_hover_color = esc_html($options->question_hover_color);
	 $question_active_bg_color = esc_html($options->question_active_bg_color);
}
$default_class = 'class="activelink"';
$current_class= 'current';
if($action != ''){
	$default_class = '';
	$current_class= '';
}

?>
<div class="setting-outer">
	<?php   echo $success_msg;  ?>

	<form method="post" action="<?php echo admin_url('edit.php?post_type=worxfaq&page=worxFaq') ?>" name="opt_setting" id="opt_setting">
		<input type="hidden" name="tab_action" value="tab-1"  id="tab_value"/>
		 <?php wp_nonce_field( 'wpw-nonce','wpwnonce' ); ?>
		<div class="tab-ul">
			<ul>
				<li><a  <?php echo $default_class; ?> <?php if($action == "tab-1") {  echo 'class="activelink"'; }  ?> data-tab="tab-1" href="javascript:void();"><span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/tab-ul-icon-1.png'; ?>"> Basic</span></a></li>
				<li><a data-tab="tab-2" <?php if($action == "tab-2") {  echo 'class="activelink"'; }  ?>  href="javascript:void();"><span><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'images/tab-ul-icon-2.png'; ?>"> Styling</span></a></li>
			</ul>
		</div>
		<div class="tab-content clearfix faq-table">
			<div class="setting-table-outer <?php echo $current_class;  if($action == "tab-1") {  echo 'current'; }  ?>" id="tab-1" >
				<div class="row clearfix">
					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('FAQ Title','wpworx-faq'); ?></h2>
							<p><?php _e('Enter the text, which you want to show as the main heading, which all the FAQs are listed.','wpworx-faq'); ?></p>

							<div class="form-bx">
								<input type="text" name="faq_title" class="form-control" value="<?php  echo $faq_title; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('FAQ Heading','wpworx-faq'); ?></h2>
							<p><?php _e('This HTML tag will be used to style the FAQ Title. Edit as per your SEO requirements.','wpworx-faq'); ?></p>
							<div class="form-bx">
								<select name="faq_heading" class="form-control">
			                     	<option value=""><?php _e('Select Heading','wpworx-faq'); ?></option>
		                     		<option value="h1" <?php if($faq_heading == 'h1') { echo 'selected="selected"';} ?>>H1</option>
			                     	<option value="h2" <?php if($faq_heading == 'h2') { echo 'selected="selected"';} ?>>H2</option>
			                     	<option value="h3" <?php if($faq_heading == 'h3') { echo 'selected="selected"';} ?>>H3</option>
			                  	</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('Category Title','wpworx-faq'); ?></h2>
							<p><?php _e('Show or hide Categories’ Titles on the top of the FAQs, belonging to that category.','wpworx-faq'); ?></p>
							<div class="form-bx">
								<ul class="inline-ul-custom clearfix">
									<li>
										<div class="radio-bx">
											<input type="radio" name="category_title" id="show" value="show" <?php echo (isset($category_title) && $category_title =='show')? 'checked' :''; ?> >
											<label for="show">
												<span></span> Show
											</label>
										</div>
									</li>
									<li>											
										<div class="radio-bx">
											<input type="radio" name="category_title" id="hide" value="hide" <?php echo (isset($category_title) && $category_title =='hide')? 'checked' :''; ?>>
											<label for="hide">
												<span></span> Hide
											</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('Category Heading','wpworx-faq'); ?></h2>
							<p><?php _e('Decide the HTML Heading style for your category heading as per your SEO or design needs.','wpworx-faq'); ?></p>
							<div class="form-bx">
								<select name="category_heading" class="form-control">
			                     	<option value=""><?php _e('Select Heading','wpworx-faq'); ?></option>
			                     	<option value="h1" <?php if($category_heading == 'h1') { echo 'selected="selected"';} ?>>H1</option>
			                     	<option value="h2" <?php if($category_heading == 'h2') { echo 'selected="selected"';} ?>>H2</option>
			                     	<option value="h3" <?php if($category_heading == 'h3') { echo 'selected="selected"';} ?>>H3</option>
			                  	</select>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('Back to Top','wpworx-faq'); ?></h2>
							<p><?php _e('Do you want to add a ‘Back to Top’ scroll button to let your readers reach the top from anywhere in the FAQ list?','wpworx-faq'); ?></p>
							<div class="form-bx">
								<ul class="inline-ul-custom clearfix">
									<li>
										<div class="radio-bx">
											<input type="radio" name="back_to_top" id="Yes" value="Yes" <?php echo (isset($back_to_top) && $back_to_top =='Yes')? 'checked' :''; ?> >
											<label for="Yes">
												<span></span> Yes
											</label>
										</div>
									</li>
									<li>											
										<div class="radio-bx">
											<input type="radio" name="back_to_top" id="No" value="No" <?php echo (isset($back_to_top) && $back_to_top =='No')? 'checked' :''; ?>>
											<label for="No">
												<span></span> No
											</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('Style','wpworx-faq'); ?></h2>
						 	<p> <?php _e("Choose the view, in which, you want the FAQs to be rendered ‘Accordion’.",'wpworx-faq'); ?></p>

							<div class="form-bx">
								<ul class="inline-ul-custom clearfix">
									<li>
										<div class="radio-bx">
											<input type="radio" name="style" id="accordian" value="accordian" <?php echo (isset($accordian) && $accordian =='accordian')? 'checked' :''; ?> >
											<label for="accordian">
												<span></span> Accordian
											</label>
										</div>
									</li>

									<li>	
										<div class="radio-bx">
											<input type="radio" name="style" id="toggle" value="toggle" <?php echo (isset($accordian) && $accordian =='toggle')? 'checked' :''; ?>>
											<label for="toggle">
												<span></span> toggle
											</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('FAQ Expand/Collapse All','wpworx-faq'); ?></h2>
						 	<p><?php _e('Do you want to let your users control the opening and closing of all FAQs simultaneously with one click?','wpworx-faq'); ?></p>

							<div class="form-bx">
								<ul class="inline-ul-custom clearfix">
									<li>
										<div class="radio-bx">
											<input type="radio" name="expand_collapse_all" id="expand-yes" value="Yes" <?php echo (isset($expand_collapse_all) && $expand_collapse_all =='Yes')? 'checked' :''; ?> >
											<label for="expand-yes">
												<span></span> Yes
											</label>
										</div>
									</li>

									<li>											
										<div class="radio-bx">
											<input type="radio" name="expand_collapse_all" id="expand-no" value="No" <?php echo (isset($expand_collapse_all) && $expand_collapse_all =='No')? 'checked' :''; ?>>
											<label for="expand-no">
												<span></span> No
											</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="faq-table-inner-bx">
							<h2><?php _e('Display All Answers','wpworx-faq'); ?></h2>
						 	<p><?php _e('Should all answers be displayed when the page loads? (Be careful if FAQ Accordion is on, It works better with Toggle.','wpworx-faq'); ?></p>

							<div class="form-bx">
								<ul class="inline-ul-custom clearfix">
									<li>
										<div class="radio-bx">
											<input type="radio" name="display_all_answers" id="answers-yes" value="Yes" <?php echo (isset($display_all_answers) && $display_all_answers =='Yes')? 'checked' :''; ?>>
											<label for="answers-yes">
												<span></span> Yes
											</label>
										</div>
									</li>

									<li>											
										<div class="radio-bx">
											<input type="radio" name="display_all_answers" id="answers-No" value="No" <?php echo (isset($display_all_answers) && $display_all_answers =='No')? 'checked' :''; ?>>
											<label for="answers-No">
												<span></span> No
											</label>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="setting-table-outer <?php  if($action == "tab-2") {  echo 'current'; }  ?>" id="tab-2">
				<div class="style-tab-outer">
					<div class="row">
						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Add Custom CSS','wpworx-faq'); ?></h2>
								<p><?php _e('Add Custom CSS','Write your custom CSS classes and rules, related to the FAQ section here.'); ?></p>

								<div class="form-bx">									
									<textarea name="custom_css" class="form-control textarea"><?php echo $custom_css; ?></textarea>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Icon Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose the color for the icon, using which, users could collapse or expand a question.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="icon_color" id="ico_color" class="color-field" value="<?php echo (isset($icon_color) && $icon_color!='')? $icon_color :'';?>">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Icon Background Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose the background color for the icon, using which, users could collapse or expand a question.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="icon_bg_color"  class="color-field" value="<?php echo (isset($icon_bg_color) && $icon_bg_color!='')? $icon_bg_color :'';?>">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Question Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose a color for the text of a question when the page is loaded.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="question_color" class="color-field" value="<?php echo (isset($question_color) && $question_color!='')? $question_color :'';?>">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Question Background Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose a color for the background of a question when the page is loaded.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="question_bg_color" class="color-field" value="<?php echo (isset($question_bg_color) && $question_bg_color!='')? $question_bg_color :'';?>">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Question Hover Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose a color for the text of a question, whose answer is opened, for the time when the mouse moves over it.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="question_hover_color" class="color-field" value="<?php echo (isset($question_hover_color) && $question_hover_color!='')? $question_hover_color :'';?>">
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Question Active Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose a color for the text of a question, whose answer is opened i.e. active.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="question_active_color" class="color-field" value="<?php echo (isset($question_active_color) && $question_active_color!='')? $question_active_color :'';?>"><br>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="faq-table-inner-bx">
								<h2><?php _e('Question Active BG Color','wpworx-faq'); ?></h2>
								<p><?php _e('Choose a color for the background of a question, whose answer is opened i.e. active.','wpworx-faq'); ?></p>

								<div class="form-bx">									
									<input type="text" name="question_active_bg_color" class="color-field" value="<?php echo (isset($question_active_bg_color) && $question_active_bg_color!='')? $question_active_bg_color :'';?>">
								</div>
							</div>
						</div>
					</div>
			   	</div>
		   	</div>

		   	<div class="save-btn clearfix">
				<input type="submit" name="Options_Submit" id="submit" value="Save Changes">
			</div>
		</div>
		<div class="clearfix"></div>
	</form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery('.tab-ul a').click(function(){
			var tab_id = jQuery(this).attr('data-tab');
			jQuery('.tab-ul a').removeClass('activelink');
			jQuery('.setting-table-outer').removeClass('current');
			jQuery(this).addClass('activelink');
			jQuery("#"+tab_id).addClass('current');
			var tab_val = jQuery(".activelink").attr("data-tab");
    		jQuery("#tab_value").val(tab_val);
		});

	});
</script>


