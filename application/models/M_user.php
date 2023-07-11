<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function getCompteById($id){
        $query = $this->db->query("select * from compte where idutilisateur='$id'");
		$data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function getUserByType(){
        $this->load->database();
    
        $query=$this->db->query("select*from utilisateur where estadmin !='0'");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function addValidation($idclient,$idadmin,$idcode,$idcompte){
        $sql="insert into validation (idclient,idadmin,idcode,idcompte) values ('$idclient','$idadmin','$idcode','$idcompte')";
        $this->db->query($sql);  
    }
    public function getCodeByNum($num){
        $this->load->database();
        $query=$this->db->query("select idcode from code where numerocode='$num'");
        $row = $query->row_array();
        
		return $row; 
    }
    public function getCode(){
        $this->load->database();
    
        $query=$this->db->query("select*from code");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function getObjectifById($id){
        $this->load->database();
    
        $query=$this->db->query("select*from objectif where idobjectif='$id'");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function getAllObjectif(){
        $this->load->database();
    
        $query=$this->db->query("select*from objectif");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
    public function getAllGenre(){
        $this->load->database();
    
        $query=$this->db->query("select*from genre");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }

    public function getGenreById($id){
        $this->load->database();
    
        $query=$this->db->query("select*from genre where idgenre='$id'");
        $data=array();
        $result=$query->result_array();

        if ($query) {
        foreach ($result as $results){
            array_push($data,$results);
            }
        } else {
            echo "Erreur lors de l'exécution de la requête : " . $this->db->error();
        } 
        return $data;
    }
}