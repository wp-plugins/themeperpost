=== ThemePerPost ===
Contributors: Steve Claridge
Donate link: 
Tags: theme switcher, dynamic themes
Requires at least: 2.0
Tested up to: 2.9
stable tag: 

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
fits with the standard Wordpress file names for themes.

== Changelog ==

= 1.0 =
* First public release.

== Installation ==

Installation is easy:

* Download the plugin.
* Copy the `themeperpost` directory to the plugins directory of your blog.
* Enable the plugin in your admin panel.

