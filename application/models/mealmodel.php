<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mealmodel extends CI_Model {

	public function insert($userid,$breakfast,$lunch,$dinner)
	{
		$sql = "INSERT INTO meal VALUES (null, '','$userid','$breakfast','$lunch','$dinner','pending')";
		$this->db->query($sql);
	}
	/*public function getAll()
	{
		$sql = "SELECT * FROM meal";
		$result = $this->db->query($sql);
		return $result->result_array();
	}*/
	public function confirmmeal($date)
	{
		$sql = "UPDATE meal SET date='$date',status='confirm'  WHERE status='pending' ";
		$this->db->query($sql);
	}
	public function updatemeal($userid,$breakfast,$lunch,$dinner)
	{
		$sql = "UPDATE meal SET breakfast=$breakfast,lunch=$lunch,dinner=$dinner WHERE userid=$userid and status='pending'";
		$this->db->query($sql);
	}
	public function get($id,$year,$month)
	{
		$sql = "SELECT * FROM meal WHERE userid=$id and date>='$year-$month-01' and date<='$year-$month-31' order by date ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getsum($year,$month)
	{
		$sql = "SELECT userid,SUM(breakfast+lunch+dinner) as meal FROM meal WHERE   date>='$year-$month-01' and date<='$year-$month-31' GROUP by userid";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getsumbyid($id,$year,$month)
	{
		$sql = "SELECT SUM(breakfast+lunch+dinner) as meals FROM meal WHERE userid='$id' and date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function getpendingmeal()
	{
		$sql = "SELECT breakfast,lunch,dinner,name FROM meal JOIN memberinfo on meal.userid=memberinfo.id  where status='pending'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getAll($year,$month)
	{
		$sql = "SELECT date,name,breakfast,lunch,dinner FROM meal JOIN memberinfo on meal.userid=memberinfo.id  where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getcheck($id)
	{
		$sql = "SELECT * FROM meal WHERE userid=$id and status='pending'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function getmealcheck()
	{
		$sql = "SELECT * FROM mealcheck WHERE id=1";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function setmealcheck($str,$user)
	{
		$sql = "UPDATE mealcheck set $str='$user' WHERE id=1";
		$this->db->query($sql);
		
	}
	public function mealcancel($str,$user)
	{
		$sql = "UPDATE meal set $str='0' WHERE date='0000-00-00'";
		$this->db->query($sql);
		
	}
	public function updatemealcheck()
	{
		$sql = "UPDATE mealcheck set breakfast='uncheck',lunch='uncheck',dinner='uncheck' WHERE id=1";
		$this->db->query($sql);
		
	}
	public function monthlyMeal($year,$month)
	{
		$sql = "SELECT SUM(breakfast+lunch+dinner) as meal from meal where date>='$year-$month-01' and date<='$year-$month-31'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function del($id)
	{
		
		$sql = "DELETE FROM meal WHERE userid='$id'";
		$this->db->query($sql);
	}
}