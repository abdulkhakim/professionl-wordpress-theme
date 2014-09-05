<?php
/**
 * The template for displaying search forms in Professionl
 *
 * @package Professionl
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'professionl' ); ?></span>
        <input type="text" class="search form-control" name="s" onblur="if(this.value=='')this.value='<?php _e('Search','professionl'); ?>';" onfocus="if(this.value=='<?php _e('Search','professionl'); ?>')this.value='';" value="<?php _e('Search','professionl'); ?>" />
	</div>
</form>
