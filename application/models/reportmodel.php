<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportmodel extends CI_Model {

	public function monthlyMeal($year,$month)
	{
		$sql = "SELECT SUM(breakfast+lunch+dinner) as meal from meal where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		if($result){
			return $result->row_array();
		}
		
	}
	public function monthlyBazar($year,$month)
	{
		$sql = "SELECT SUM(price) as cost from bazar where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function monthlyPayment($year,$month)
	{
		$sql = "SELECT SUM(amountReceive-amountReturn) as pay from payment where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
}