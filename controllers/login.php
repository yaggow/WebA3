<?php
class Login extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form','html'));
		$this->load->view('loginview');
	}
}
?>