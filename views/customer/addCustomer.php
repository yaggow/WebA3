<h2>New Customer</h2>

<style>
	input { display: block;}
	
</style>

<?php 
	
	echo form_open_multipart('customers/create');
		
	echo form_label('First Name'); 
	echo form_error('first');
	echo form_input('first',set_value('first'),"required");

	echo form_label('Last Name');
	echo form_error('last');
	echo form_input('last',set_value('last'),"required");
	
	echo form_label('Login');
	echo form_error('login');
	echo form_input('login',set_value('login'),"required");

	echo form_label('Password'); 
	echo form_error('password');
	echo form_password('password',set_value('password'),"required");

	echo form_label('Email'); 
	echo form_error('email');
	echo form_input('email',set_value('email'),"required");

	echo form_submit('submit', 'Create');
	echo form_close();
?>	

