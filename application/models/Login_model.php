<?php
 class Login_model extends CI_Model{
 public function login($email, $password){
	 return $this->db->query("select * from user
	 Where email='".$email."' AND password='".$password."'")->row();
 }

 }
?>
