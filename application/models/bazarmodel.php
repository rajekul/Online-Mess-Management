<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bazarmodel extends CI_Model {

	public function insert($userid,$productid,$weight,$price)
	{
		$sql = "INSERT INTO bazar VALUES (null,'','$userid','$productid','$weight','$price')";
		$this->db->query($sql);
	}
	public function get($year,$month)
	{
		$sql = "SELECT date,name,p_name,unit,weight,price FROM bazar JOIN memberinfo on bazar.userid=memberinfo.id JOIN product on bazar.p_id=product.p_id where date>='$year-$month-01' and date<='$year-$month-31' order by date ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	public function monthlyBazar($year,$month)
	{
		$sql = "SELECT SUM(price) as cost from bazar where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function pendingtotal()
	{
		$sql = "SELECT SUM(price) as cost from bazar where date='0000-00-00'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	public function update($date)
	{
		$sql = "UPDATE bazar SET date='$date' WHERE date='0000-00-00'";
		$this->db->query($sql);
	}
	
	public function del($id)
	{
		
		$sql = "DELETE FROM bazar WHERE date='0000-00-00'";
		$this->db->query($sql);
	}
	public function getpending()
	{
		
		$sql = "SELECT name,p_name,unit,weight,price FROM bazar JOIN memberinfo on bazar.userid=memberinfo.id JOIN product on bazar.p_id=product.p_id WHERE date='0000-00-00'";
		$result=$this->db->query($sql);
		return $result->result_array();
	}
}