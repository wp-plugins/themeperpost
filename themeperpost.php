<?php
/*
    Plugin Name: ThemePerPost
    Version: 1.0.0
    Plugin URI: http://www.steveify.com/themeperpost
    Description: Allows you to apply a different theme for any Post or Page.
    Author: Steve Claridge
    Author URI: http://www.steveify.com

    Copyright 2009/2010 Steve Claridge  (email : stephen.claridge@tiscali.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

function themeperpost_template_url()
{
  global $post;
  echo get_theme_root_uri() . '/' . get_post_meta( $post->ID, 'themeperpost', true );
}

function themeperpost_switch_template()
{
  $switch = '';
  if ( is_single() or is_page() )
  {
    global $post;
    $switch = get_post_meta( $post->ID, 'themeperpost', true );
  
    if ( $switch != '' )
    {
      $page = is_page() ? '/page.php' : '/single.php';
      include( get_theme_root() . '/' . $switch . $page );
    	exit;
    }
  }
}

add_action( 'template_redirect', 'themeperpost_switch_template' );

