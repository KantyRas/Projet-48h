<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    /*public function checkUser($email, $password)
	{
		$query = $this->db->query("select * from utilisateur where email='$email' and motdepasse='$password'");
		$row = $query->row_array();
		if($row){
			$this->load->library('session');
			$this->session;
			$this->session->set_userdata('user', $row);
			return true;
		}
		return false;
	}	*/	
}