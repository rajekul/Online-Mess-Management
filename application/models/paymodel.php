<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paymodel extends CI_Model {

	public function insert($date,$userid,$amount,$ramount,$method,$month)
	{
		$sql = "INSERT INTO payment VALUES (null, '$date','$userid','$amount','$ramount','$month','$method')";
		$this->db->query($sql);
		echo $month;
	}
	public function getAll($year,$month)
	{
		$sql = "SELECT * FROM payment JOIN memberinfo on payment.userid=memberinfo.id  where month='$year-$month'";
		$result = $this->db->query($sql);
		if($result){
			return $result->result_array();
		}
	}
	public function update($id,$name,$unit)
	{
		$sql = "UPDATE payment SET name='$name',unit='$unit'  WHERE p_id=$id";
		$this->db->query($sql);
	}
	public function get($id,$year,$month)
	{
		$sql = "SELECT * FROM payment WHERE userid=$id and month='$year-$month' order by date ASC";
		$result = $this->db->query($sql);
		if($result){
			return $result->result_array();
		}
		
	}
	public function getsum($year,$month)
	{
		$sql = "SELECT userid,SUM(amountReceive-amountReturn) as pay FROM payment WHERE   month='$year-$month' GROUP by userid";
		$result = $this->db->query($sql);
		if($result){
			return $result->result_array();
		}
		
	}
	public function getsumbyid($id,$year,$month)
	{
		$sql = "SELECT SUM(amountReceive-amountReturn) as pays FROM payment WHERE  userid='$id' and month='$year-$month'";
		$result = $this->db->query($sql);
		if($result){
			return $result->row_array();
		}
	}
	public function monthlyPayment($year,$month)
	{
		$sql = "SELECT SUM(amountReceive-amountReturn) as pay from payment where month='$year-$month'";
		$result = $this->db->query($sql);
		if($result){
			return $result->row_array();
		}
	}
	public function del($id)
	{
		
		$sql = "DELETE FROM payment WHERE userid='$id'";
		$this->db->query($sql);
	}
}