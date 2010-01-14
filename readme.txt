=== ThemePerPost ===
Contributors: Steve Claridge
Donate link: 
Tags: theme switcher, dynamic themes
Requires at least: 2.0
Tested up to: 2.9
stable tag: 1.1.1

This plugin lets use a different theme for any Post or Page.

== Description ==

This plugin lets use a different theme for any Post or Page. You can create a Custom Field that contains a theme name on one 
or more Posts or Pages and this plugin will switch Wordpress to use that theme for only those Posts or Pages.

Example of setting theme for one Post:

1. Upload the theme you want to use for your post - let's say it's called 'coolstuff'.
2. Write your post.
3. Add a Custom Field to the post called 'themeperpost' and give it a value of 'coolstuff' (not including the quotes).
4. Save your post.

If you are creating a small custom theme purely to style a Post or Page then you do not need to create many files within the theme.
For styling a Post you only need a file in your theme directory called 'single.php', for styling a Page you only need 'page.php - this
fits with the standard Wordpress file names for themes. There's an example theme at http://www.steveify.com/themeperpost/.

If you want to use an existing theme with this plugin then you will unfortunately have to make a few small changes to the theme before
it will work. The changes are:

1. Replace get_header() call with themeperpost_get_header().
2. Replace get_sidebar() call with themeperpost_get_sidebar().
3. Replace get_footer() call with themeperpost_get_footer().

This is annoying but unavoidable.

== Changelog ==

= 1.1.1 =

* Updated so that get_template_directory_uri() and get_template_directory() calls use the right theme dir.

= 1.1.0 =

* Add calls to replace get_header, get_footer and get_sidebar so that existing themes can be used with this plugin.

= 1.0.1 =

* Changed so that bloginfo('template_url') calls work.

= 1.0.0 =

* First public release.

== Installation ==

Installation is easy:

* Download the plugin.
* Copy the `themeperpost` directory to the plugins directory of your blog.
* Enable the plugin in your admin panel.

