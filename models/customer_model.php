<?php

class Customer_model extends CI_Model
{
	function getAll()
	{
		$query = $this->db->get('customers');
		return $query->result('customers');
	}

	function get($id)
	{
		$query = $this->db->get_where('customers',array('id' => $id));
		
		return $query->row(0,'customers');
	}

	function delete($id) 
	{
		return $this->db->delete("customers",array('id' => $id ));
	}

	function insert($customer) 
	{
		return $this->db->insert("customers", array('first' => $customer->first,
				                                  'last' => $customer->last,
											      'login' => $customer->login,
												  'password' => $customer->password,
												  'email' => $customer->email));
	}

	function update($customer)
	 {
		$this->db->where('id', $customer->id);
		return $this->db->update("customers", array('first' => $customer->first,
				                                  'last' => $customer->last,
											      'password' => $customer->password,
											      'email' => $customer->email));
	}

	function login($login,$password)
	{
		$this->db->select('id, login, password');
		$this->db->from('customers');
		$this->db->where('login',$login);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;	
		}
	}
}
?>