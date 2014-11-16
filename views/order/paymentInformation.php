<h2>Concluding Order</h2>

<style>
	input { display: block;}
	
</style>

<?php 
	
	echo form_open_multipart('orders/create');
		
	echo form_label('Credit Card Number'); 
	echo form_error('creditcard_number');
	echo form_input('creditcard_number',set_value('creditcard_number'),"required");

	echo "<br />";

	$monthArray = array_combine(range(1,12), range(1,12));

	echo form_label('Credit Card Expiration Month');
	echo "<br />";
	echo form_error('creditcard_month');
	echo form_dropdown('creditcard_month',$monthArray,set_value('creditcard_month'));

	echo "<br />";
	
	$yearArray = array_combine(range(date('y'), 99), range(date('y'), 99));

	echo form_label('Credit Card Expiration Year');
	echo "<br />";
	echo form_error('creditcard_year');
	echo form_dropdown('creditcard_year',$yearArray,set_value('creditcard_year'));

	echo "<br />";
	echo "<br />";

	echo form_submit('submit', 'Order');
	echo form_close();
?>	