<?php
/**
 * Plugin Name: Proximo Sidenote
 * Plugin URI: https://github.com/mkaz/proximo-sidenote
 * Description: Tuftesque sidenotes, may only work with proximo theme
 * Version: 0.1.0
 * Author: Marcus Kazmierczak
 * Author URI: https://mkaz.blog/
 * License: WTFPL
 * License URI: http://www.wtfpl.net/
 */

function proximo_sidenote_register_block() {
    wp_register_script(
        'proximo-sidenote-js',
        plugins_url( 'proximo-sidenote.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor'),
        filemtime( plugin_dir_path( __FILE__ ) . 'proximo-sidenote.js' )
    );

	wp_register_style(
        'proximo-sidenote-style',
        plugins_url( 'proximo-sidenote.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'proximo-sidenote.css' )
    );

	wp_register_style(
        'proximo-sidenote-editor-style',
        plugins_url( 'proximo-sidenote-editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'proximo-sidenote-editor.css' )
    );

	register_block_type( 'proximo/sidenote', array(
		'style'         => 'proximo-sidenote-style',
		'editor_style'  => 'proximo-sidenote-editor-style',
		'editor_script' => 'proximo-sidenote-js',
	) );
}
add_action( 'init', 'proximo_sidenote_register_block' );

