<?php
//Set Up Theme////////////////////
//Add Theme Support
function simpleisbest_theme_setup(){
  //HTML5 Mark Up
  add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
  //Feed Link
  add_theme_support('automatic-feed-links');
  //Eyecatch Activate
  add_theme_support('post-thumbnails');
  //Title Tag Insert
  add_theme_support( 'title-tag' );
  //Custom Logo Activate
  add_theme_support('custom-logo');
  //Using Custom Header Background
  $simpleisbest_custom_header_setting = array(
    'width'=>1200,
    'height'=>540,
  );
  add_theme_support('custom-header',$simpleisbest_custom_header_setting);
  //Using Custom Background
  add_theme_support('custom-background');
  //Using Custom Editor Style/////////////
  add_editor_style('css/editor-style.css');
  add_theme_support('editor-styles');
//////////////////////////////////////////////////////////

//Custom Menu
register_nav_menus(
	array(
    'header-nav' => 'Header-Menu',
    'mobile-nav' => 'Mobile-Menu',
		'footer-nav' => 'Footer-Menu'
	)
);
//Add Widget 
function simpleisbest_widgets_init(){
register_sidebar(array(
    'name'=>'Sidebar',
    'id' => 'side-widget',
    'before_widget'=>'<div id="%1$s" class="%2$s simpleisbest_sidebar-wrapper">',
    'after_widget'=>'</div>',
    'before_title' => '<h4 class="simpleisbest_sidebar-title">',
    'after_title' => '</h4>'
    ));
}
add_action('widgets_init','simpleisbest_widgets_init' );
///////////////////////////////////////////////////////////////////////////////
//Using Breadcrumbs
function simpleisbest_breadcrumbs() {
  global $post;
  if ( is_page() && $post->post_parent ) {
    return $post->post_parent;
  } else {
    return false;
  }
}
//Theme Option Start///////////////////////////////////////////////////////////////////////////////
//Sanitize For TEL and FAX
function simpleisbest_prefix_sanitize_number( $simpleisbest_number ) {
	return preg_replace( '/[^\d+]/', '', $simpleisbest_number );
}
/////////////////////////////////////////
//Theme Option in wp customize menu
function simpleisbest_option_customize_register($simpleisbest_customize){
//Build in Customizer/////////////////////
$simpleisbest_customize->add_section('simpleisbest_option_section',array(
  'title'=>__('Theme-Options','simpleisbest'),
  'priority'=>200,
));
/////////////////////////////////////////
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_tel',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize_callback'=>'simpleisbest_prefix_sanitize_number',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_tel',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_tel',
  'label'=>__('phone number','simpleisbest'),//option title
  'type'=>'text',//form type
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_fax',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize_callback'=>'simpleisbest_prefix_sanitize_number',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_fax',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_fax',
  'label'=>__('fax number','simpleisbest'),//option title
  'type'=>'text',//form type
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_mail',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize_callback'=>'sanitize_email',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_mail',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_mail',
  'label'=>__('Email Address','simpleisbest'),//option title
  'type'=>'text',//form type
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_adrs',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize_callback'=>'sanitize_text_field',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_adrs',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_adrs',
  'label'=>__('Address','simpleisbest'),//option title
  'type'=>'text',//form type
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_color',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize_callback'=>'sanitize_hex_color',
));
$simpleisbest_customize->add_control(new WP_Customize_Color_Control($simpleisbest_customize,'simpleisbest_option_control_color',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_color',
  'label'=>__('Common Color','simpleisbest'),//option title
  //'type'=>'text',//form type
)));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_column',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize'=>'sanitize_text_field',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_column',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_column',
  'label'=>__('Select Column','simpleisbest'),//option title
  'type'=>'radio',//form type
  'choices'=>array(
    'simpleisbest_one-col'=>__('1 column','simpleisbest'),
    'simpleisbest_two-col'=>__('2 column','simpleisbest'),
  ),
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_header',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize'=>'sanitize_text_field',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_header',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_header',
  'label'=>__('Select Header Layout','simpleisbest'),//option title
  'type'=>'radio',//form type
  'choices'=>array(
    'simpleisbest_header1'=>__('header1','simpleisbest'),
    'simpleisbest_header2'=>__('header2','simpleisbest'),
    'simpleisbest_header3'=>__('header3','simpleisbest'),
  ),
));
//end one option
//start one option
$simpleisbest_customize->add_setting('simpleisbest_option_footer',array(
  'default'=>'',
  'transport'=>'refresh',//refresh or postMessage
  'sanitize'=>'sanitize_text_field',
));
$simpleisbest_customize->add_control('simpleisbest_option_control_footer',array(
  'section'=>'simpleisbest_option_section',//common
  'settings'=>'simpleisbest_option_footer',
  'label'=>__('Select Footer Layout','simpleisbest'),//option title
  'type'=>'radio',//form type
  'choices'=>array(
    'simpleisbest_footer1'=>__('footer1','simpleisbest'),
    'simpleisbest_footer2'=>__('footer2','simpleisbest'),
  ),
));
//end one option
/////////////////////
}//end of function simpleisbest_option_customize_register
add_action('customize_register','simpleisbest_option_customize_register');
//end of simpleisbest theme option setting///////////////////////////////////////////////
//Using style.css & jQuery & theme.js//////////////////////////////////////////////////////////////
function simpleisbest_add_files_style_css() {
	//Using style.css
	wp_enqueue_style('simpleisbest_style', get_template_directory_uri() . '/css/style.css', "");
}
add_action( 'wp_enqueue_scripts', 'simpleisbest_add_files_style_css' );

function simpleisbest_add_files_jquery(){
  //Using Default jQuery
  wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'simpleisbest_add_files_jquery');

function simpleisbest_add_files_javascript() {
	//Using theme.js
	wp_enqueue_script('simpleisbest_script', get_template_directory_uri() . '/js/theme.js', "");
}
add_action( 'wp_enqueue_scripts', 'simpleisbest_add_files_javascript' );

//Use Style PHP
function simpleisbest_add_files_php() {
	//Using Style PHP
	get_template_part('style');
}
add_action('wp_head','simpleisbest_add_files_php');

//////////////////////////////////////////////////////////////
//Setting Contents Width
if (!isset($content_width)) $content_width = 1200;
//Using Comment Reply///////////////////////
function simpleisbest_comment_reply() {
  if ( is_singular() && comments_open() && get_option('thread_comments')){
      wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts','simpleisbest_comment_reply');

//Using Text Domain////////////////////
load_theme_textdomain( 'simpleisbest', get_template_directory() . '/languages' );
/////////////////////////////////////////////////////////////////
}//end function simpleisbest_theme_setup
add_action('after_setup_theme','simpleisbest_theme_setup');