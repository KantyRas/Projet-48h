<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function getAllSport(){
        $this->load->database();
        $sql ="select s.idsport,s.idgenre,s.activite,s.idtypesport,s.idregime,ts.nomtypesport,r.typeregime
        from sport s
            join typesport ts
                on ts.idtypesport = s.idtypesport
            join regime r
                on r.idregime = s.idregime";
        $query=$this->db->query($sql);
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
    public function getRegimeByJour($jour){
        $sql = "select r.idregime,r.typeregime,r.prixregime,o.idobjectif,o.typeobjectif 
        from regime r
            join objectif o
                on o.idobjectif = r.idobjectif";
        $query = $this->db->query($sql);
        $data = array();
        $i = 0;
        foreach($query->result_array() as $row){
            $data[$i]['idregime'] = $row['idregime'];
            $data[$i]['typeregime'] = $row['typeregime'];
            $data[$i]['prixregime'] = $jour*$row['prixregime'];
            $data[$i]['idobjectif'] = $row['idobjectif'];
            $data[$i]['typeobjectif'] = $row['typeobjectif'];
            $i++;
        }
        return $data;
    }
    public function getAllRegime(){
        $this->load->database();
        $sql ="select r.idregime,r.typeregime,r.prixregime,o.idobjectif,o.typeobjectif 
        from regime r
            join objectif o
                on o.idobjectif = r.idobjectif";
        $query=$this->db->query($sql);
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
    public function deleteRegime($id){
        $this->load->database();
        $sql = "delete from regime where idregime ='$id'";
        $this->db->query($sql);
    }
    public function insertRegime($typeregime,$prix,$idobjectif){
        $this->load->database();
        $sql = "insert into regime (typeregime,prixregime,idobjectif) values ('$typeregime','$prix','$idobjectif')";
        $this->db->query($sql);
    }
    public function refuser($idvalid){
        $this->load->database();
        $sql="delete from validation where idvalidation='$idvalid'";
        $this->db->query($sql);
    }
    public function getVolaCompteById($id){
        $this->load->database();
        $sql ="select volautilisateur from compte where idutilisateur='$id'";
        $query=$this->db->query($sql);
        $row = $query->row();
        if($row){
            return $row->volautilisateur;
        }else{
            return null;
        }
    }
    public function valider($numcode,$idcompte,$vola,$idutilisateur,$idvalid){
        $this->load->database();
        $sql ="UPDATE code set etatcode=1 WHERE idcode = '$numcode'";
        echo $sql;
        $this->db->query($sql);
        $volataloha = $this->getVolaCompteById($idutilisateur);
        $vola+=$volataloha;
        $sql2 ="UPDATE compte set volautilisateur='$vola' WHERE idcompte='$idcompte'and idutilisateur='$idutilisateur'";
        $this->db->query($sql2);

        $sql3="delete from validation where idvalidation='$idvalid'";
        $this->db->query($sql3);
    }
    public function getAllAttenteForValidation(){
        $this->load->database();
        $sql ="select v.idvalidation,v.idadmin,v.idclient as idutilisateur,u.nom,u.prenom,u.email,v.idcode,c.numerocode,c.volacode,c.etatcode,v.idcompte,cp.volautilisateur
        from validation v
            join utilisateur u 
                on u.idutilisateur = v.idclient
            join code c
                on c.idcode = v.idcode
            join compte cp
                on cp.idcompte = v.idcompte";
        $query=$this->db->query($sql);
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