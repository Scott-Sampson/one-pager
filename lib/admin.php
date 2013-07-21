<?php

function custom_set_posts_columns($columns) {
return array(
'cb' => '<input type=”checkbox” />',
'title' => __('Title'),
'id' => __('ID'),
'author' => __('Author'),
'date' => __('Date'),
);
}
function custom_set_posts_columns_value( $column, $post_id ) {
if ($column == 'id'){
  echo $post_id;
}
}
add_filter('manage_posts_columns' , 'custom_set_posts_columns');
add_action( 'manage_posts_custom_column' , 'custom_set_posts_columns_value', 10, 2 );
add_filter('manage_pages_columns' , 'custom_set_posts_columns');
add_action( 'manage_pages_custom_column' , 'custom_set_posts_columns_value', 10, 2 );

//Custom Backend Footer
function bones_custom_admin_footer() {
	echo 'Developed by <a href="http://www.greyedpixel.co.uk" target="_blank">Greyed Pixel</a>';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

?>
