
<form role="search"  method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="searchform" class="search-field" placeholder="Введите название или артикул" value="<?php echo get_search_query(); ?>" name="s" />
</form>
