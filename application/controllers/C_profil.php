<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profil extends CI_Controller {
    public function __construct()
	{
	 	parent::__construct();
		$this->load->library('session');
		if(!$this->session->has_userdata('user')){
			redirect("Welcome/index");
		}
	}

	public function loadAjoutProfileUtilisateur(){
		$data = $_SESSION['user'];
		$this->load->model('M_user');
		$data1 = $this->M_user->getAllGenre();
		$data2 = $this->M_user->getAllObjectif();
		$array['tab'] = array($data1,$data2);

		$this->load->view('accueil',$data);
		$this->load->view('addProfile',$array);
		$this->load->view('footer');
	}
	public function insert(){
		$iduser=$_SESSION['user']['idutilisateur'];
		$idobjectif=$this->input->post('idobjectif');
		$idgenre=$this->input->post('idgenre');
		$taille=$this->input->post('taille');
		$poids=$this->input->post('poids');		
		$this->load->model('M_profil');
		try{
			 $this->M_profil->insertProfil($idobjectif,$idgenre,$iduser,$taille,$poids);
             $this->M_profil->insertDetailRegime($idobjectif,$idgenre,$iduser);
             $this->loadAjoutProfileUtilisateur();
		}
		catch(Exception $e){
			echo "tsy mety";
		}
	} 

	public function MasseIdeale(){
		$iduser=$_SESSION['user']['idutilisateur'];
		$this->load->model('M_profil');
		try{
			 $masse=$this->M_profil->calculMasseIdeale($iduser);
			 echo $masse;
             //$this->insertionProfil();
		}
		catch(Exception $e){
			echo "tsy mety";
		}
	}
}
