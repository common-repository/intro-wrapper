<?php
/*
Plugin Name: Intro Wrapper
Plugin URI: http://wordpress.org/extend/plugins/intro-wrapper/
Description: Wraps your intro text in a DIV element with the class "intro"
Version: 1.1.1
Author: Bjørn Johansen
Author URI: https://twitter.com/bjornjohansen
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2013 Bjørn Johansen (email : post@bjornjohansen.no)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

class BJ_Intro_Wrapper {

	function __construct() {
		add_action ( 'plugins_loaded', array( $this, 'init' ) );
	}

	function init() {
		add_filter ( 'the_content', array( $this, 'wrapit' ) );
	}

	function wrapit( $content ) {

		if ( strpos( $content, '<!--more-->' ) ) {
			$content = '<div class="intro">' . str_replace( '<!--more-->', '</div><!--more-->', $content );
		} elseif ( strpos( $content, '<p><span id="more-' ) ) {
			$content = '<div class="intro">' . str_replace( '<p><span id="more-', '</div><p><span id="more-', $content );
		} elseif ( strpos( $content, '<span id="more-' ) ) {
			$content = '<div class="intro">' . str_replace( '<span id="more-', '</div><span id="more-', $content );
		}
		
	    return $content;
		
	}

}

new BJ_Intro_Wrapper();

