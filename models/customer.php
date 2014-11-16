<?php
class Customer extends CI_Model
{
	public	$id;
	public $first;
	public $last;
	public $login;
	public $password;
	public $email;

	/*function login($login,$password)
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
	}*/

}
?>