<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_inscription extends CI_Controller {
    public function loadRegister(){
        $this->load->view('inscription');
    }
}