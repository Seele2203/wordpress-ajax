<?php
/*
Template Name: Test Template
*/
// Force a short-init since we just need core WP, not the entire framework stack
define( 'SHORTINIT', true );


// Build the wp-load.php path from a plugin/theme
$wp_root_path = dirname( dirname( dirname( dirname( __FILE__ ) ) ) );
// Require the wp-load.php file (which loads wp-config.php and bootstraps WordPress)
require( $wp_root_path . '\wp-load.php' );

// Include the now instantiated global $wpdb Class for use
global $wpdb;
 
// Do your PHP code for rapid AJAX calls with WP!
 
// Example: Retrieve and display the number of users.
$s=$_POST['id'];
if ($s==0) {
	$mytest = $wpdb->get_results("SELECT test_name, test_value FROM test", ARRAY_A);
echo "<li class='clearfix'><div class='cell cell_left'>test_name</div><div class='cell cell_right'>test_value</div></li>";
$lenth = count($mytest);
for($i=0; $i<$lenth; $i++) {
	echo "<li class='clearfix'><div class='cell cell_left'>" . $mytest[$i]['test_name'] . "</div><div class='cell cell_right'>" . $mytest[$i]['test_value'] . "</div></li>";
}
} else {
	echo "<li class='clearfix'><div class='cell cell_left'>test_name</div><div class='cell cell_right'>test_value</div></li>";
	$mytest = $wpdb->get_var("SELECT test_name FROM test WHERE test_id=" . $s);
	$mytest2 = $wpdb->get_var("SELECT test_value FROM test WHERE test_id=" . $s);
	echo "<li class='clearfix'><div class='cell cell_left'>" . $mytest . "</div><div class='cell cell_right'>" . $mytest2 . "</div></li>";
}
	
?> 