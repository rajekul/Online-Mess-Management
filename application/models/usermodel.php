<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {
	
	
	public function getAll()
	{
		$this->db->order_by("username", "desc");
		$result = $this->db->get('user');
		
		return $result->result_array();
	}
	public function insert($username,$password)
	{
		$sql = "create or replace trigger in_user after insert on memberInfo for each row begin INSERT INTO user VALUES ('$username','$password','user');end;";
		$this->db->query($sql);
	}
	public function get($username)
	{
		$sql = "SELECT username,password,type,name FROM user JOIN memberinfo on user.username=memberinfo.id where user.username='$username'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function getmanager()
	{
		$sql = "SELECT name FROM user JOIN memberinfo on user.username=memberinfo.id where user.type='manager'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function update($id,$password)
	{
		$sql = "UPDATE user SET password='$password' WHERE username='$id'";
		
		$this->db->query($sql);
	}
	public function updatetype($id)
	{
		$sql = "UPDATE user SET type='user' WHERE type='manager'";
		$this->db->query($sql);
		$sql = "UPDATE user SET type='manager' where username='$id'";
		$this->db->query($sql);
	}
	public function del($username)
	{
		
		$sql = "DELETE FROM user WHERE username='$username'";
		$this->db->query($sql);
	}
	
	
}