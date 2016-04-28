# WordPress boilerplate theme

A boilerplate theme for WordPress with an emphasis on simplicity and reuse. By default, all pages except the homepage are rendered with archive.php. Use front-page.php for your homepage, then you can use index.php for everything else. If it gets weird, refer to [The Flowchart Of Template Witchcraft and Wizardry](http://codex.wordpress.org/File:wp-template-hierarchy.jpg) to determine which template file to add; probably archive-{post_type}.php or single-{post_type}.php

For a guide to how the index.php structure works, refer to this template guide: https://dl.dropboxusercontent.com/u/12609261/WordPress%20Template%20Guide.pdf

Less is more. Only create as many custom templates as you need. Think modularly.

This is most definitely a work in progress and opportunities for improvement exist. Feel free to make pull requests.

A few notes/philosophy about this:

1. This theme has no images, no styles, and just bare js files (it does enque jQuery properly from the CDN and a local fallback should that fail though). There's barely any markup too. The idea is, this should be just enough to function as a WordPress theme and nothing more. It's designed to let you just jump in with your own markup and do your thing.
2. Except for the homepage, every single page is rendered with index.php. Using front-page.php for your homepage lets you do this. Archives, search results, pages, posts... they're all rendered with index.php, with the loop partial displaying the actual content. This is done to suggest a build style where you use as few templates as possible, and reuse as much as possible. Use the template flow chart to figure out what to add if you need to, but I feel really strongly about reuse being something with huge productivity gains, as well as end result consistency gains. You'll likely add several new template files, but I wanted to create a theme that worked with as few templates as possible to encourage reuse.
3. This theme defines no custom post types or custom taxonomies. It shouldn't contain any non-presentational logic at all. This should all be custom plugins. A site plugin should be set up for post types and taxonomies.

## Function reference
Please refer to this project's function reference documentation: http://nathansh.github.io/penguinpress-theme

## CSS and JavaScript
No CSS or JavaScript is included in this boilerplate. For the sake of maintenance and separation of concerns, CSS and JavaScript boilerplates are maintained in their own repos:

* [SCSS boilerplate](github.com/nathansh/sassyplate)
* [Grunt/JavaScript boilerplate](https://github.com/nathansh/gruntyplate)

## Companion site plugin repo

Since post types and core site functionality shouldn't be defined in the theme but rather a plugin, there is a plugin boilerplate repo as a companion to this one: https://github.com/nathansh/penguinpress-plugin.

## Tweaks & features

### Open Graph and Twitter card tags

Basic open graph and Twitter card tags are printed in `partials/share_meta.php`. You may want to tweak these as needed. For example, you may want to provide a check for a custom field image to be used as an `og:image`. You may also want to specify a Twitter card type per post type, and provide a @username.

For more info:
* [Open Graph](http://ogp.me/)
* [Twitter Cards](https://dev.twitter.com/cards/overview)

### `wp_get_archives`

We've added the ability to pass a post type slug, or array of post type slugs, into `wp_get_archives()`. The archive page
linked to will also be filtered by that post type.

Example:

	echo wp_get_archives(array(
		'post_type' => 'car'
	));

or

	echo wp_get_archives(array(
		'post_type' => array('car', 'board')
	));


### `wp_nav_menu` / `sub_menu`
A function is added to `wp_nav_menu_objects` providing a `sub_menu` argument to `wp_nav_menu`. Setting this to `true` creates a contextual sub navigation. For example:

	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container' => 'nav',
		'container_class' => 'menu subnav',
		'depth' => 2,
		'sub_menu' => true
		)
	);


### Login screen

`includes/login_page.php` has been added to customize the login. For following locations will be checked for a logo to use on the login screen, in this order:

	$possible_logos = array(
		'/images/logo-login.png',
		'/images/sprites/common-1x/logo.png',
		'/images/sprites/common-compatibility/logo.png',
		'/images/logo.png',
		'/logo.png'
	);
