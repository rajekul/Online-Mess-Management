<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actionmodel extends CI_Model {

	public function insert($meal,$day,$month)
	{
		$sql = "INSERT into action values(null,$meal,$day,'$month')";
		$this->db->query($sql);
	}
	public function update($meal,$day,$month)
	{
		$sql = "UPDATE action SET action=$meal,day=$day  WHERE month='$month'";
		$this->db->query($sql);
	}
	public function get($month)
	{
		$sql = "SELECT * FROM action WHERE month='$month'";
		$result = $this->db->query($sql);
		if($result){
			return $result->row_array();
		}
	}
}