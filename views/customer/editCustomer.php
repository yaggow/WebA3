<h2>Edit Customer</h2>

<style>
	input { display: block;}
	
</style>

<?php 
	
	echo form_open("customers/update/$customer->id");
	
	echo form_label('First'); 
	echo form_error('first');
	echo form_input('first',$customer->first,"required");

	echo form_label('Last');
	echo form_error('last');
	echo form_input('last',$customer->last,"required");
	
	echo form_label('Password');
	echo form_error('password');
	echo form_password('password',$customer->password,"required");

	echo form_label('Email');
	echo form_error('email');
	echo form_input('email',$customer->email,"required");
	
	echo form_submit('submit', 'Save');
	echo form_close();
?>	