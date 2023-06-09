<?php 
/*My theme function*/
// Theme title
add_theme_support( 'title-tag' );

// Theme section and JQuery file calling
function mh_css_js_file_calling() {
    wp_enqueue_style( 'mh_style', get_stylesheet_uri(  ) );
    wp_register_style( 'bootstrap', get_template_directory_uri(  ).'/css/bootstrap.css', array(), '5.3.0', 'all' );
    wp_enqueue_style('bootstrap');
    wp_register_style( 'custom', get_template_directory_uri(  ).'/css/custom.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('custom');

    //JQuery
    //wp_enqueue_script( $handle:string, $src:string, $deps:array, $ver:string|boolean|null, $in_footer:boolean )
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.3.0', true );
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts','mh_css_js_file_calling' );


//Theme function
function mh_customizar_register ($wp_customize) {
    $wp_customize->add_section('mh_header_area', array(
        'title'=>__('Header Area', 'mohammadmohiuddin'),
        'description'=>'If you want to update your header area, you may change it from here'
    ));
    $wp_customize->add_setting('mh_logo', array(
        'default'=>get_bloginfo( 'template_directory' ). '/img/logo.png',
    ));
    $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'mh_logo', array(
        'label'=>'Logo Upload',
        'description'=> 'If you want to upload logo, please go ahead',
        'setting'=>'mh_logo',
        'section'=>'mh_header_area',
    )));
}

add_action( 'customize_register','mh_customizar_register' );