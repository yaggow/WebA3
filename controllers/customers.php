<?php

class Customers extends CI_Controller {
     
     
    function __construct() 
    {
	    	parent::__construct();
    }

    function add()
	{
		$this->load->view('customer/addCustomer.php');
	}

    function index() 
    {
    	$this->load->model('customer_model');
    	$customers = $this->customer_model->getAll();
    	$data['customers'] = $customers;
    	$this->load->view('customer/listCustomer.php',$data);
    }
        
	function create()
	 {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first','First','trim|required|xss_clean');
		$this->form_validation->set_rules('last','Last','trim|required|xss_clean');
		$this->form_validation->set_rules('login','Login','trim|required|is_unique[customers.login]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|callback_validate_email');

		if($this->form_validation->run() == true)
		{
			$this->load->model('customer_model');
			$this->load->model('customer');
			$this->customer = new Customer();
			$this->customer->first = $this->input->get_post('first');
			$this->customer->last = $this->input->get_post('last');
			$this->customer->login = $this->input->get_post('login');
			$this->customer->password = $this->input->get_post('password');
			$this->customer->email = $this->input->get_post('email');

			$this->customer_model->insert($this->customer);

			redirect('store/index', 'refresh');
		}
		else
		{
			$this->load->view('customer/addCustomer.php');
	
		}	
	}
	
	function validate_email($email)
	{
		$this->load->helper('email');

		if(valid_email($email))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('validate_email', 'Email is not valid');
			return FALSE;
		}

	}


	function read($id) {
		$this->load->model('product_model');
		$product = $this->product_model->get($id);
		$data['product']=$product;
		$this->load->view('product/read.php',$data);
	}
	
	function edit($id) 
	{
		$this->load->model('customer_model');
		$customer = $this->customer_model->get($id);
		$data['customer']=$customer;
		$this->load->view('customer/editCustomer.php',$data);
	}
	
	function update($id)
	 {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first','First','trim|required|xss_clean');
		$this->form_validation->set_rules('last','Last','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|callback_validate_email');;
		
		if ($this->form_validation->run() == true)
		 {
			$this->load->model('customer');
			$this->customer = new Customer();
			$this->customer->id = $id;
			$this->customer->first = $this->input->get_post('first');
			$this->customer->last = $this->input->get_post('last');
			$this->customer->password = $this->input->get_post('password');
			$this->customer->email = $this->input->get_post('email');
			
			$this->load->model('customer_model');
			$this->customer_model->update($this->customer);
			//Then we redirect to the index page again
			redirect('Customers/index', 'refresh');
		}
		else 
		{
			$this->load->model('customer');
			$this->customer = new Customer();
			$this->customer->id = $id;
			$this->customer->first = set_value('first');
			$this->customer->last = set_value('last');
			$this->customer->login = set_value('login');
			$this->customer->password = set_value('password');
			$this->customer->email = set_value('email');
			$data['customer'] = $this->customer;
			$this->load->view('customer/editCustomer.php',$data);
		}
	}
    	
	function delete($id) {
		$this->load->model('customer_model');
		
		if (isset($id)) 
			$this->customer_model->delete($id);
		
		//Then we redirect to the index page again
		redirect('customers/index', 'refresh');
	}
      
   
    
    
    
}

