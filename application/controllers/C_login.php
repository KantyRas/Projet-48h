<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    public function loadLogin(){
        $this->load->view('login');
    }

    /*public function validLogin()
	{
		$email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->load->model('utils_model');
        $bool = $this->utils_model->checkUser($email, $password);
        if($bool){
            $data = $_SESSION['user'];
            if($data['estadmin'] != 10) $this->loadAccueil($data);
            if($data['estadmin'] == 10) $this->loadAdminSpace($data);
        }
        else if(!$bool){
            redirect('Welcome/index');                          
        }
	}		*/
}