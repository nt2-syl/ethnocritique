<?php
use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\file\Entity\File;
use Drupal\Core\Url;

function minimal_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface &$form_state) {
  //Header
  $form['settings']['header'] = array(
      '#type' => 'details',
      '#title' => t('Header settings'),
      '#open' => FALSE,
  );
  
  //Header Style
  $form['settings']['header']['header_style'] = array(
    '#type' => 'select',
    '#title' => t('Header Style'),
    '#options' => array(
        'style1' => t('Header Menu Classic'),
        'style2' => t('Header Menu Classic Transparent'),
        'style3' => t('Header Menu Big Logo'),
        'style4' => t('Header Menu Middle Logo'),
        'style5' => t('Header Menu Middle Logo Top'),
        'style6' => t('Header Menu Middle Box'),
        'style7' => t('Header Menu Side'),
        'style8' => t('Header Menu Side Lateral'),
        'style9' => t('Header Menu Side Simple'),
        'style10' => t('Header Menu White'),
      ),
    '#default_value' => theme_get_setting('header_style', 'minimal'),
  );
  //Header Menu Big Logo
  $form['settings']['header']['header_style_3'] = array(
      '#type' => 'details',
      '#title' => t('Header Menu Big Logo settings'),
      '#open' => FALSE,
  );
	//Header Menu Big Logo logo image
	 $form['settings']['header']['header_style_3']['logo_image_header_3'] = array(
	    '#type' => 'textfield',
	    '#title' => t('URL of the logo image'),
	    '#default_value' => theme_get_setting('logo_image_header_3'),
	    '#description' => t('Enter a URL logo image.'),
	    '#size' => 40,
	    '#maxlength' => 512,
	    '#attributes' => array('disabled' => 'disabled'),
	);
	//Header Menu Big Logo image upload
	$form['settings']['header']['header_style_3']['logo_image_header_3_upload'] = array(
	    '#type' => 'file',
	    '#title' => t('Upload logo image'),
	    '#size' => 40,
	    '#attributes' => array('enctype' => 'multipart/form-data'),
	    '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
	    '#element_validate' => array('logo_image_header_3_validate')

	);
  //Header Menu Middle Logo
  $form['settings']['header']['header_style_5'] = array(
    '#type' => 'details',
    '#title' => t('Header Menu Middle Logo settings'),
    '#open' => FALSE,
  );
  //Header Menu Middle Logo logo image
   $form['settings']['header']['header_style_5']['logo_image_header_5'] = array(
      '#type' => 'textfield',
      '#title' => t('URL of the logo image'),
      '#default_value' => theme_get_setting('logo_image_header_5'),
      '#description' => t('Enter a URL logo image.'),
      '#size' => 40,
      '#maxlength' => 512,
      '#attributes' => array('disabled' => 'disabled'),
  );
  //Header Menu Middle Logo image upload
  $form['settings']['header']['header_style_5']['logo_image_header_5_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload logo image'),
      '#size' => 40,
      '#attributes' => array('enctype' => 'multipart/form-data'),
      '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
      '#element_validate' => array('logo_image_header_5_validate')

  );
  //Header Menu Middle Logo Top
  $form['settings']['header']['header_style_6'] = array(
    '#type' => 'details',
    '#title' => t('Header Menu Middle Logo Top settings'),
    '#open' => FALSE,
  );
  //Header Menu Middle Logo Top logo image
   $form['settings']['header']['header_style_6']['logo_image_header_6'] = array(
      '#type' => 'textfield',
      '#title' => t('URL of the logo image'),
      '#default_value' => theme_get_setting('logo_image_header_6'),
      '#description' => t('Enter a URL logo image.'),
      '#size' => 40,
      '#maxlength' => 512,
      '#attributes' => array('disabled' => 'disabled'),
  );
  //Header Menu Middle Logo Top image upload
  $form['settings']['header']['header_style_6']['logo_image_header_6_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload logo image'),
      '#size' => 40,
      '#attributes' => array('enctype' => 'multipart/form-data'),
      '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
      '#element_validate' => array('logo_image_header_6_validate')

  );
  //Header Menu Side
  $form['settings']['header']['header_style_side'] = array(
    '#type' => 'details',
    '#title' => t('Header Menu Side, Header Menu Side Lateral, Header Menu Side Simple  Settings'),
    '#open' => FALSE,
  );
  //Header Menu Side logo image
   $form['settings']['header']['header_style_side']['logo_image_header_side'] = array(
      '#type' => 'textfield',
      '#title' => t('URL of the logo image'),
      '#default_value' => theme_get_setting('logo_image_header_side'),
      '#description' => t('Enter a URL logo image.'),
      '#size' => 40,
      '#maxlength' => 512,
      '#attributes' => array('disabled' => 'disabled'),
  );
  //Header Menu Side image upload
  $form['settings']['header']['header_style_side']['logo_image_header_side_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload logo image'),
      '#size' => 40,
      '#attributes' => array('enctype' => 'multipart/form-data'),
      '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
      '#element_validate' => array('logo_image_header_side_validate')

  );
  //Header Menu Side Social Network
  $form['settings']['header']['header_style_side']['social_network_header'] = array(
    '#type' => 'textarea',
    '#title' => t('Social Network'),
    '#default_value' => theme_get_setting('social_network_header', 'minimal'),
  );
  //Header Menu Side Copyright text
  $form['settings']['header']['header_style_side']['copyright_text_header'] = array(
    '#type' => 'textarea',
    '#title' => t('Copyright text'),
    '#default_value' => theme_get_setting('copyright_text_header', 'minimal'),
  );
  //Page title
  $form['settings']['page_title'] = array(
      '#type' => 'details',
      '#title' => t('Page Title settings'),
      '#open' => FALSE,
  );
  //Page title Style
  $form['settings']['page_title']['page_title_style'] = array(
    '#type' => 'select',
    '#title' => t('Page title Style'),
    '#options' => array(
        'style1' => t('Template title image'),
        'style2' => t('Template title image fullscreen'),
        'style3' => t('Template title image fullscreen parallax'),
        'style4' => t('Template title image parallax'),
        'style5' => t('Template title image parallax ken burn'),
        'style6' => t('Template title video mp4'),
        'style7' => t('Template title video youtube'),
        'style8' => t('Template title video fullscreen'),
        'style9' => t('Template title video fullscreen parallax'),
        'style10' => t('Template title video parallax'),
        'style11' => t('Template title animation'),
        'style12' => t('Template title animation parallax'),
        'style13' => t('Template title base 1'),
        'style14' => t('Template title base 2'),
        'style15' => t('Template title bootstrap'),
        'none' => t('None'),
      ),
    '#default_value' => theme_get_setting('page_title_style', 'minimal'),
  );
  //Page title Background Image
  $form['settings']['page_title']['page_title_image'] = array(
    '#type' => 'details',
    '#title' => t('Header background Image'),
    '#open' => FALSE,
  );
  $form['settings']['page_title']['page_title_image']['page_title_image_bg'] = array(
    '#type' => 'textfield',
    '#title' => t('URL of the header background image'),
    '#default_value' => theme_get_setting('page_title_image_bg'),
    '#description' => t('Enter a URL background image.'),
    '#size' => 40,
    '#maxlength' => 512,
    '#attributes' => array('disabled' => 'disabled'),
  );
  $form['settings']['page_title']['page_title_image']['page_title_image_bg_upload']= array(
      '#type' => 'file',
      '#title' => t('Upload header background image'),
      '#size' => 40,
      '#attributes' => array('enctype' => 'multipart/form-data'),
      '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
      '#element_validate' => array('page_title_image_bg_validate')

  );
  //Page title Background Video
  $form['settings']['page_title']['page_title_video'] = array(
    '#type' => 'details',
    '#title' => t('Header background Video'),
    '#description' => t('Formatting for all pages when selecting styles "Template title video mp4, Template title video fullscreen, Template title video fullscreen parallax, Template title video parallax"'),
    '#open' => FALSE,
  );
  $form['settings']['page_title']['page_title_video']['page_title_video_bg'] = array(
    '#type' => 'textfield',
    '#title' => t('URL of the header background video'),
    '#default_value' => theme_get_setting('page_title_video_bg'),
    '#description' => t('Enter a URL background Video.'),
    '#size' => 40,
    '#maxlength' => 512,
    '#attributes' => array('disabled' => 'disabled'),
  );
  $form['settings']['page_title']['page_title_video']['page_title_video_bg_upload']= array(
      '#type' => 'file',
      '#title' => t('Upload header background Video'),
      '#size' => 40,
      '#attributes' => array('enctype' => 'multipart/form-data'),
      '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .mp4 extensions'),
      '#element_validate' => array('page_title_video_bg_validate')

  );
  $form['settings']['page_title']['page_title_video_url'] = array(
    '#type' => 'details',
    '#title' => t('Header background Video Id Youtube'),
    '#open' => FALSE,
  );
  $form['settings']['page_title']['page_title_video_url']['page_title_id_video'] = array(
    '#type' => 'textfield',
    '#description' => t('Example:"https://www.youtube.com/watch?v=<em><u><b>fwUqWgHMlyo</b></u></em>"'),
    '#title' => t('Import Id Video Youtube'),
    '#default_value' => theme_get_setting('page_title_id_video', 'minimal'),
  );
	// Blog settings
	$form['settings']['blog'] = array(
    '#type' => 'details',
    '#title' => t('Blog settings'),
    '#open' => FALSE,
	);
	$form['settings']['blog']['blog_listing'] = array(
    '#type' => 'details',
    '#title' => t('Blog listing'),
    '#open' => FALSE,
	);
	$form['settings']['blog']['blog_listing']['blog_sidebar'] = array(
  	'#type' => 'select',
  	'#title' => t('Blog sidebar'),
  	'#options' => array(
        'none' => t('None'),
    		'right' => t('Right'),
        'left' => t('Left'),
    	),
  	'#default_value' => theme_get_setting('blog_sidebar', 'minimal'),
	);
  $form['settings']['blog']['blog_listing']['blog_layout'] = array(
    '#type' => 'select',
    '#title' => t('Blog layout'),
    '#options' => array(
        'standard' => t('Standard'),
        'standard_2' => t('Standard 2'),
        'grid' => t('Grid'),
      ),
    '#default_value' => theme_get_setting('blog_layout', 'minimal'),
  );
  //other page
  $form['settings']['other_page'] = array(
    '#type' => 'details',
    '#title' => t('Other pages'),
    '#open' => FALSE,
  );
  $form['settings']['other_page']['other_page_header_bg'] = array(
    '#type' => 'textfield',
    '#title' => t('URL of the header background image'),
    '#default_value' => theme_get_setting('other_page_header_bg'),
    '#description' => t('Enter a URL background image.'),
    '#size' => 40,
    '#maxlength' => 512,
    '#attributes' => array('disabled' => 'disabled'),
  );
  $form['settings']['other_page']['other_page_header_bg_upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload header background image'),
    '#size' => 40,
    '#attributes' => array('enctype' => 'multipart/form-data'),
    '#description' => t('If you don\'t jave direct access to the server, use this field to upload your background image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),
    '#element_validate' => array('other_page_header_bg_validate'),
  );
	// custom css
	$form['settings']['custom_css'] = array(
		'#type' => 'details',
		'#title' => t('Custom CSS'),
		'#open' => FALSE,
	);


	$form['settings']['custom_css']['custom_css'] = array(
		'#type' => 'textarea',
		'#title' => t('Custom CSS'),
		'#default_value' => theme_get_setting('custom_css', 'minimal'),
		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')
	);
	//general setting
	$form['settings']['general_setting'] = array(
      	'#type' => 'details',
      	'#title' => t('General Settings'),
      	'#open' => FALSE,
  	);

  	$form['settings']['general_setting']['general_setting_tracking_code'] = array(
      	'#type' => 'textarea',
      	'#title' => t('Tracking Code'),
      	'#default_value' => theme_get_setting('general_setting_tracking_code', 'minimal'),
  	);
  	//footer settings
    $form['settings']['footer'] = array(
      '#type' => 'details',
      '#title' => t('Footer settings'),
      '#open' => FALSE,
    );
    //Footer Style
    $form['settings']['footer']['footer_style'] = array(
      '#type' => 'select',
      '#title' => t('Footer Style'),
      '#description' => t('Formatting for pages not content type(Example: Page search, Page user...)'),
      '#options' => array(
          'footer1' => t('Footer parallax'),
          'footer2' => t('Footer minimal'),
          'footer3' => t('Footer base'),
          'footer4' => t('Footer minimal 2'),
          'none' => t('None'),
        ),
      '#default_value' => theme_get_setting('footer_style', 'minimal'),
    );
    $form['settings']['footer']['copyright_text'] = array(
      '#type' => 'textarea',
      '#title' => t('Copyright text'),
      '#default_value' => theme_get_setting('copyright_text', 'minimal'),
    );
    $form['settings']['google_api_key'] = array(
      '#type' => 'textfield',
      '#description' => t('How to <a href="https://developers.google.com/maps/documentation/embed/get-api-key">get API key</a><br>Please clear cache when changed'),
      '#title' => t('Googlemaps API Key'),
      '#default_value' => theme_get_setting('google_api_key') ? theme_get_setting('google_api_key') : 'AIzaSyBgxenYq2JCn4-xIGt5RAg3okFC4A0Aqms',
    );
}
//logo image_header_3
function logo_image_header_3_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('logo_image_header_3_upload', $validators, "public://logo_header_3", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('logo_image_header_3', $file_url);
    }
 }
}
//logo image_header_5
function logo_image_header_5_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('logo_image_header_5_upload', $validators, "public://logo_header_5", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('logo_image_header_5', $file_url);
    }
 }
}
//logo image_header_6
function logo_image_header_6_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('logo_image_header_6_upload', $validators, "public://logo_header_6", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('logo_image_header_6', $file_url);
    }
 }
}
//logo image_header_side
function logo_image_header_side_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('logo_image_header_side_upload', $validators, "public://logo_header_side", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('logo_image_header_side', $file_url);
    }
 }
}
function page_title_image_bg_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('page_title_image_bg_upload', $validators, "public://page_title_image_bg", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('page_title_image_bg', $file_url);
    }
 }
}
function page_title_video_bg_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('mp4'));
  $file = file_save_upload('page_title_video_bg_upload', $validators, "public://page_title_video_bg", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('page_title_video_bg', $file_url);
    }
 }
}
function other_page_header_bg_validate($element, FormStateInterface $form_state){
  global $base_url;

  $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));
  $file = file_save_upload('other_page_header_bg_upload', $validators, "public://other_page", NULL, FILE_EXISTS_REPLACE);

  if (!empty($file)) {
    // change file's status from temporary to permanent and update file database
    if ((is_object($file[0]) == 1)) {
      $file[0]->status = FILE_STATUS_PERMANENT;
      $file[0]->save();
      $uri = $file[0]->getFileUri();
      $file_url = file_create_url($uri);
      $file_url = str_ireplace($base_url, '', $file_url);
      $form_state->setValue('other_page_header_bg', $file_url);
    }
 }
}