<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    public function disconnect(){
        $this->session->sess_destroy();
        redirect("Welcome/index");
    }
    public function loadLogin(){
        $this->load->view('login');
    }

    public function loadUserPage($data){
        $this->load->view('accueil',$data);
		$this->load->view('content');
		$this->load->view('footer');
    }
    public function loadAdminPage($data){
        $this->load->view('accueilAdmin',$data);
		$this->load->view('contentAdmin',$data);
		$this->load->view('footerAdmin');
    }
    public function validLogin()
	{
		$email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->load->model('M_login');
        $bool = $this->M_login->checkUser($email, $password);
        if($bool){
            $data = $_SESSION['user'];
            if($data['estadmin'] != 1) $this->loadUserPage($data);
            if($data['estadmin'] == 1) $this->loadAdminPage($data);
        }
        else if(!$bool){
            redirect('Welcome/index');                          
        }
	}
}