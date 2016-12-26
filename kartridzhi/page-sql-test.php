<?php
/*
Template Name: Sql Test Template
*/
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div id="test_button" class="test-btn btn btn-primary btn-lg">RUN</div>
		</div>
		<div class="col-md-6">
			<input class="in" type="number" value="1"><br />
			<p>
				<?php
					$mytest = $wpdb->get_row("SELECT * FROM wp_users WHERE id=1", ARRAY_A);
						$data = $mytest['user_nicename'];
						echo $data;
				?>
			</p>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h4 class="text-left">test_name</h4>
			<h4 class="text-right">test_value</h4>
			<ul id="sortable1" class="connectedSortable">
				  <li class="ui-state-default">Item 1</li>
				  <li class="ui-state-default">Item 2</li>
				  <li class="ui-state-default">Item 3</li>
				  <li>Item 4</li>
				  <li class="ui-state-default">Item 5</li>
			</ul>
		</div>
		<div class="col-md-6">
			<ul id="sortable2" class="connectedSortable"></ul>
		</div>
	</div>
</div>



 






<script>
	
$( function() {
	$( "#sortable1, #sortable2" ).sortable({connectWith: ".connectedSortable"}).disableSelection();
});
	
        $(document).ready(function() {
            $('#test_button').click(function() {
				id = $('.in').val();
                $.post('<?php echo get_template_directory_uri() ?>/test.php', { id: id }, function(data) {
                    $('#sortable1').html(data);
                });
            });
        });
</script>
<?php get_footer(); ?>