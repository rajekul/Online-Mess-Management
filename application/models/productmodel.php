<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productmodel extends CI_Model {

	public function insert($name,$unit)
	{
		$sql = "INSERT INTO product VALUES (null, '$name','$unit')";
		$this->db->query($sql);
	}
	public function getAll()
	{
		$sql = "SELECT * FROM product";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getdetail($id,$year,$month)
	{
		$sql = "SELECT SUM(price) as price,SUM(weight) as weight from bazar where date>='$year-$month-01' and date<='$year-$month-31' and p_id=$id";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function update($id,$name,$unit)
	{
		$sql = "UPDATE product SET p_name='$name',unit='$unit'  WHERE p_id=$id";
		$this->db->query($sql);
	}
	public function get($id)
	{
		$sql = "SELECT * FROM product WHERE p_id=$id";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function del($id)
	{
		
		$sql = "DELETE FROM product WHERE p_id=$id";
		$this->db->query($sql);
	}
}