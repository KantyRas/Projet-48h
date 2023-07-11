<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('user')){
			redirect("Welcome/index");
		}
	}
	public function loadDetailSport(){
		$sess = $_SESSION['user'];
		$this->load->model('M_admin');
		$data['data'] = $this->M_admin->getAllSport();
		$this->load->view('accueilAdmin',$sess);
		$this->load->view('detailSport',$data);
		$this->load->view('footerAdmin');
	}
	public function prixRegimeVariantDuree(){
		$sess = $_SESSION['user'];
		$jour = $this->input->post('jour');
		$this->load->model('M_admin');
		$data ['data'] = $this->M_admin->getRegimeByJour($jour);
		$this->load->view('accueilAdmin',$sess);
		$this->load->view('detailRegime',$data);
		$this->load->view('footerAdmin');
	}
	public function loadDetailRegime(){
		$sess = $_SESSION['user'];
		$this->load->model('M_admin');
		$data['data'] = $this->M_admin->getAllRegime();
		$this->load->view('accueilAdmin',$sess);
		$this->load->view('detailRegime',$data);
		$this->load->view('footerAdmin');
	}
	public function jeValide($numcode,$idcompte,$vola,$idutilisateur,$idvalid){
		$this->load->model('M_admin');
		$this->M_admin->valider($numcode,$idcompte,$vola,$idutilisateur,$idvalid);
		/*$this->load->view('accueilAdmin',$data);
		$this->load->view('contentAdmin',$data);
		$this->load->view('footerAdmin');*/
		$this->loadValidationCodeAttente();
	}
	public function jeRefuse($idvalid){
		$this->load->model('M_admin');
		$this->M_admin->refuser($idvalid);
		$this->loadValidationCodeAttente();
	}
	public function loadValidationCodeAttente(){
		$sess = $_SESSION['user'];
		$this->load->model('M_admin');
		$data['data'] = $this->M_admin->getAllAttenteForValidation();
		$this->load->view('accueilAdmin',$sess);
		$this->load->view('validationCodeAttente',$data);
		$this->load->view('footerAdmin');
	}
}