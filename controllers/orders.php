<?php

class Orders extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('order/listOrder.php');
	}

	function order()
	{
		$this->load->view('order/order.php');
	}

	function sucessOrder()
	{
		$this->load->view('order/successOrder.php');
	}

	function paymentInformation()
	{
		$this->load->view('order/paymentInformation.php');
	}


	function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('creditcard_number','Creditcard_number','trim|required|min_length[16]|max_length[16]|xss_clean');
		$this->form_validation->set_rules('creditcard_month','Creditcard_month','trim|required');
		$this->form_validation->set_rules('creditcard_year','Creditcard_year','trim|required|callback_validate_date');

		if($this->form_validation->run() == true)
		{
			$this->load->model('order_model');
			$this->load->model('order');
			$userdata = $this->session->userdata('logged_in');
			$total = $this->session->userdata('total');

			$this->order->customer_id = $userdata['id'];
			$this->order->order_date = date('Y-m-d');
			$this->order->order_time = time();
			$this->order->total->total = total;
			$this->order->creditcard_number = $this->input->get_post('creditcard_number');
			$this->order->creditcard_month = $this->input->get_post('creditcard_month');
			$this->order->creditcard_year = $this->input->get_post('creditcard_year');

			$this->order_model->insert($this->order);

			redirect('order/success',refresh);
		}
		else
		{
			$this->load->view('order/paymentInformation.php');
		}
	}

	function validate_date($year)
	{
		$month = $this->input->get_post('creditcard_month');
		$currentMonth = date('m',strtotime('month'));
		$currentYear = date('y');

		if ($year == $currentYear) 
		{
			if($month < $currentMonth)
			{
				 $this->form_validation->set_message('validate_date', 'Invalid Credit Card Expiration Date');
			}
		}

		if( $year < $currentYear)
		{
			$this->form_validation->set_message('validate_date', 'Invalid Credit Card Expiration Date');
		}
	}

	function delete($id)
	{
		$this->load->model('order_model');

		if (isset($id)) 
			$this->order_model->delete($id);
		
		redirect('orders/index', 'refresh');
	}
}
?>
