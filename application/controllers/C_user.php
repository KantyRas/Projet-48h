<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {
    public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('user')){
			redirect("Welcome/index");
		}
	}
	public function loadListeRegime(){
		$sess = $_SESSION['user'];
		$this->load->model('M_profil');
		$data = $this->M_profil->getRegimePlatForUser($sess['idutilisateur']);
		$data1 = $this->M_profil->getRegimeSportForUser($sess['idutilisateur']);
		$array['tab'] = array($data,$data1);
		//var_dump($sess);
		$this->load->view('accueil',$sess);
		$this->load->view('listRegime',$array);
		$this->load->view('footer');
	}
	public function loadHome(){
		$data = $_SESSION['user'];
		$this->load->view('accueil',$data);
		$this->load->view('content');
		$this->load->view('footer');
	}
	public function getValidationAchatCode(){
		$idclient = $this->input->post('idclient');
		$num =  $this->input->post('code');
		$this->load->model('M_user');
		$idcode =  $this->M_user->getCodeByNum($num);
		$idcompte =  $this->input->post('idcompte');
		$idadmin = 1;
		$this->M_user->addValidation($idclient,$idadmin,$idcode['idcode'],$idcompte);
		redirect("C_user/loadListeCode");
	}
	public function loadListeCode(){
		$data1 = $_SESSION['user'];
		$this->load->model('M_user');
		$data = $this->M_user->getCode();
		$data2 = $this->M_user->getCompteById($_SESSION['user']['idutilisateur']);
		$array['tab'] = array($data,$data2,$data1);
		$this->load->view('accueil',$data1);
		$this->load->view('listeCode',$array);
		$this->load->view('footer');
	}

	
}