<form role="search" method="get" class="search-form" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
	    <input type="search" id="s" class="form-control search-field" placeholder="<?php echo esc_attr_x( '', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	    <div class="input-group-append">
	    	<span class="input-group-text">
	    		<button type="submit" class="search-button">
	    			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" />
	    		</button>
	    	</span>
	    </div>
    </div>
</form>