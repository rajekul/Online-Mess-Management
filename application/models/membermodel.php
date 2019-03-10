<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membermodel extends CI_Model {

	public function insert($id,$name,$phone,$email,$gender,$profession,$nid,$address,$photo)
	{
		$sql = "INSERT INTO memberInfo VALUES ('$id', '$name','$phone','$email','$gender','$profession','$nid','$address','$photo')";
		$this->db->query($sql);
	}
	public function getAll()
	{
		$sql = "SELECT * FROM memberInfo where Not id='Admin' order by id ASC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function update($id,$name,$phone,$email,$gender,$profession,$nid,$address)
	{
		$sql = "UPDATE memberInfo SET name='$name', phone='$phone',email='$email',gender='$gender', profession='$profession', nid='$nid', address='$address'  WHERE id='$id'";
		$this->db->query($sql);
	}public function updatecontact($id,$phone,$email)
	{
		$sql = "UPDATE memberInfo SET phone='$phone',email='$email' WHERE id='$id'";
		$this->db->query($sql);
	}
	public function get($id)
	{
		$sql = "SELECT * FROM memberInfo WHERE id=$id";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	
	public function del($id)
	{
		
		$sql = "DELETE FROM memberInfo WHERE id=$id";
		$this->db->query($sql);
	}
}