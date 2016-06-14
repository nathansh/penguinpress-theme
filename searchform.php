<?php

	/**
	 * Create the placeholder value
	 *
	 */
	$placeholder = isset( $_GET['s'] ) && $_GET['s'] ? $_GET['s'] : 'Search';

?>

<form action="<?php echo home_url(); ?>" id="searchform" method="get" class="search">
	<label for="s" class="u-screen-reader"><?php _e('Search for:', get_bloginfo('name') ); ?></label>
	 <input class="search__input" type="text" id="s" name="s" value="" placeholder="<?php echo $placeholder; ?>" />
	 <input class="search__submit" type="submit" value="Search" id="searchsubmit" />
</form>
