<?php

class Order_itens_model extends CI_Model
{
	function getAll()
	{
		$query = $this->db->get('order_items');
		return $query->result('Order_item');
	}

	function get($id)
	{
		$query = $this->db->get_where('order_items',array('id' => $id));
		
		return $query->row(0,'Order_item');
	}

	function get($order_id)
	{
		$query = $this->db->get_where('order_items',array('order_id' => $id));
		
		return $query->result('Order_item');
	}

	function delete($id) 
	{
		return $this->db->delete("order_items",array('id' => $id ));
	}

	function delete($order_id)
	{
		return $this->db->delete("order_items",array('order_id' => $order_id ));
	}

	function insert($order_item) 
	{
		return $this->db->insert("order_items", array('order_id' => $order_item->order_id,
				                                  'product_id' => $order_item->product_id,
											      'quantity' => $order_item->quantity));
	}
}

?>