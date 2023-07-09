<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_inscription extends CI_Controller {
    public function loadRegister(){
        $this->load->view('inscription');
    }

    public function newUser(){
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $files['files'] = $_FILES['files'];
        $this->load->model('M_inscription');
		try{
            $this->M_inscription->checkPassword($password);
			$this->M_inscription->insertNewUser($nom,$prenom, $files,$email, $password );
            redirect("Welcome/index");
        }
        catch(Exception $e){
            //echo "tsia";
			redirect("C_inscription/loadRegister");
        }
    }
}