<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messmodel extends CI_Model {
	
	public function insert($title,$house,$road,$area,$city)
	{
		$sql = "update messinfo set title='$title',house='$house',road='$road',area='$area',city='$city' where id=1";
		$this->db->query($sql);
	}
	public function get()
	{
		$sql = "SELECT * FROM messinfo WHERE id=1";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	
}