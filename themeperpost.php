<?php
/*
    Plugin Name: ThemePerPost
    Version: 1.1.1
    Plugin URI: http://www.steveify.com/themeperpost
    Description: Allows you to apply a different theme for any Post or Page.
    Author: Steve Claridge
    Author URI: http://www.steveify.com

    Copyright 2009/2010 Steve Claridge  (email : steve@steveify.com)

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

/* 
  Determines whether a post or page is being displayed and whether it has a themepepost custom field set 
  Returns the name of the theme to switch to or '' if no switch is needed
*/
function themeperpost_need_switch()
{
  if ( is_single() or is_page() )
  {
    global $post;
    return get_post_meta( $post->ID, 'themeperpost', true );
  }
  return "";
}

/* Filter hook for bloginfo. It modifies URLs for stylesheet_url and template_ul */
function themeperpost_bloginfo( $result, $show )
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    if ( $show == 'template_url' || $show == 'stylesheet_directory' || $show == 'stylesheet_url' )
    {
      $result = get_theme_root_uri() . '/' . $switch;
    }

    if ( $show == 'stylesheet_url' )
    {
      $result .= '/style.css';
    }   
  }

  return $result;
}

/* Used in place of get_header() */
function themeperpost_get_header()
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    require_once( get_theme_root() . '/' . $switch . '/header.php' );
  }
}

/* Used in place of get_footer() */
function themeperpost_get_footer()
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    require_once( get_theme_root() . '/' . $switch . '/footer.php' );
  }
}

/* Used in place of get_sidebar() */
function themeperpost_get_sidebar()
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    require_once( get_theme_root() . '/' . $switch . '/sidebar.php' );
  }
}

/* Filter hook for comments template. the get_comments function has a handy filter
   which allows me to modify it to use themeperpost theme instead of the default. Whereas
   get_footer, get_header and get_sidebar have an action instead of a filter so this plugin
   cannot alter them */
function themeperpost_comments_template( $path )
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    return get_theme_root() . '/' . $switch . '/comments.php';  
  }  
  
  return $path;
}

function themeperpost_switch_template()
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    $page = is_page() ? '/page.php' : '/single.php';
    require_once( get_theme_root() . '/' . $switch . $page );
    exit;
  }
}

/**
* Filter hook for get_template_directory_uri function. $dir is the
* directory as set by the site's current main theme, $name is the site's
* current theme's name. If themeperpost custom field is set on the post
* or page being viewed then we return our new theme URI, otherwise return
* already set one.
*/
function themeperpost_template_directory_uri( $dir, $name )
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    return get_theme_root_uri() . '/' . $switch;
  }

  return $dir;
}

/**
* Filter hook for get_template_directory function. $dir is the
* directory as set by the site's current main theme, $name is the site's
* current theme's name. If themeperpost custom field is set on the post
* or page being viewed then we return our new theme's dir, otherwise return
* already set one.
*/
function themeperpost_template_directory( $dir, $name )
{
  $switch = themeperpost_need_switch();
  if ( $switch != '' )
  {
    return get_theme_root() . '/' . $switch;
  }

  return $dir;
}

add_filter( 'bloginfo_url', 'themeperpost_bloginfo', 1, 2 );
add_action( 'template_redirect', 'themeperpost_switch_template' );
add_filter( 'comments_template', 'themeperpost_comments_template', 1, 1 );
add_filter( 'template_directory_uri', 'themeperpost_template_directory_uri', 1, 2 );
add_filter( 'template_directory', 'themeperpost_template_directory', 1, 2 );



