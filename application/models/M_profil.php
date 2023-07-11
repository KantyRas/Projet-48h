<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

    public function getRegimeSportForUser($idutilisateur){
        $idprofil = $this->getIdProfil($idutilisateur);
        $idregime = $this->getDetailRegime($idprofil);
        $idgenre = $this->getIdGenreByidUser($idutilisateur);
        //$dataPlat = $this->getPlat($idregime);
        $dataSport = $this->getSport($idregime,$idgenre);
        //$array['tab'] = array($dataPlat,$dataSport);
        return $dataSport;
    }
    public function getRegimePlatForUser($idutilisateur){
        $idprofil = $this->getIdProfil($idutilisateur);
        $idregime = $this->getDetailRegime($idprofil);
        $idgenre = $this->getIdGenreByidUser($idutilisateur);
        $dataPlat = $this->getPlat($idregime);
        //$dataSport = $this->getSport($idregime,$idgenre);
        //$array['tab'] = array($dataPlat,$dataSport);
        return $dataPlat;
    }
    public function insertNewUser($nom,$prenom, $files,$email, $password ){
        foreach($files as $f){
            $str = $f['name'];
            $sql = "insert into utilisateur (nom,prenom,photo,email,motdepasse) values ('$nom','$prenom','$str[0]','$email','$password')";
            //echo $sql;
            //var_dump($str[0]);
            $this->db->query($sql);     
        }
    }

    public function getDetailRegime($idprofil){
        $this->load->database();
        $sql="select idregime from detailregime where idprofil='$idprofil' limit 1";
        //echo $sql;
        $query=$this->db->query($sql);
        $row = $query->row();
            if ($row) {
                //var_dump($row);
                return $row->idregime;
            } else {
                return null;
            }
    }
    public function getIdGenre($genre){
        $this->load->database();
        $query=$this->db->query("select idgenre from genre where typegenre='$genre'");
        $row=$query->row_array();
        return $row;
    }

    public function getObjectifId($objectif){
        $this->load->database();
        $query=$this->db->query("select idobjectif from objectif where typeobjectif='$objectif'");
        $row = $query->row();
            if ($row) {
                return $row->idprofil;
            } else {
                return null;
            }
        }

 
        public function getIdGenreByidUser($iduser)
        {
            $this->load->database();
            $sql = "SELECT idgenre FROM profil WHERE idutilisateur = '$iduser'";
            $query = $this->db->query($sql);
            $row = $query->row();
            if ($row) {
                return $row->idgenre;
            } else {
                return null;
            }
        
        }
        public function getIdProfil($iduser)
            {
                $this->load->database();
                $sql = "SELECT idprofil FROM profil WHERE idutilisateur = '$iduser'";
                $query = $this->db->query($sql);
                $row = $query->row();
                if ($row) {
                    return $row->idprofil;
                } else {
                    return null;
                }
            }

      
       public function getidRegime($idobjectif, $idgenre)
            {
                $this->load->database();
                $query = $this->db->query("SELECT idregime FROM regime WHERE idobjectif='$idobjectif'");
                $data = array();
                $result = $query->result_array();
                if ($query) {
                    foreach ($result as $row) {
                        array_push($data, $row['idregime']); // Ajouter uniquement l'ID du régime à la liste
                    }
                } else {
                    echo "erreur";
                }
                return $data;
            }

        public function insertDetailRegime($objectif, $idgenre, $iduser)
            {
                $this->load->database();
                $idprofil = $this->getIdProfil($iduser);
                $ids = $this->getidRegime($objectif, $idgenre);
                
                foreach ($ids as $idregime) {
                    $sql = "INSERT INTO detailregime (idregime, idprofil) VALUES ('$idregime', '$idprofil')";
                    //echo $sql;
                    //var_dump($idprofil);
                     $this->db->query($sql);
                }
            }

    public function calculImc($taille,$poids){
        $size=$taille/100;
        $imc=$poids/($size*$size);
        return $imc;
    }

    public function insertProfil($objectif,$genre,$iduser,$taille,$poids){
        $this->load->database();
        $imc=$this->calculImc($taille,$poids);
        $query=$this->db->query("insert into profil (idutilisateur,idobjectif,idgenre,taille,poids,imc) values ('$iduser','$objectif','$genre','$taille','$poids','$imc')");
    }

    public function getProfil($idutilsateur){
        $this->load->database();
        $sql="select * from profil where idutilisateur='$idutilsateur'";
        $query=$this->db->query($sql);
        $data=array();
        $result=$query->result_array();
            if($query){
                foreach($result as $results){
                        array_push($data,$results);
                }
            }else{
                echo "erreur";
            } 
        return $data; 
    }
    
    public function getMasse($iduser)
    {
        $this->load->database();
        $sql="select * from profil where idutilisateur='$iduser'";
         $query=$this->db->query($sql);
        $data=array();
        $result=$query->result_array();
            if($query){
                foreach($result as $results){
                        array_push($data,$results);
                }
            }else{
                echo "erreur";
            } 
        return $data; 
    }

    public function calculMasseIdeale($iduser)
        {
            $data = $this->getMasse($iduser); 
            
            foreach ($data as $row) {
                $poids = $row['poids'];
                $taille = $row['taille'];
                $imc = $row['imc'];

                $size=$taille/100;
                $poidsIdeal = ($size*$size)*25; 
                return $poidsIdeal;
            }
        }
    public function calculMasseReele($iduser)
        {
            $data = $this->getMasse($iduser); 
                
                foreach ($data as $row) {
                    $poids = $row['poids'];
                    $taille = $row['taille'];
                    $imc = $row['imc'];

                    $size=$taille/100;
                    $poidsIdeal = ($size*$size)*imc; 
                    return $poidsIdeal;
                }
        }
    public function compareMasse($iduser)
        {
            $ideale=$this->calculMasseIdeale($iduser);
            $reelee=$this->calculMasseReele($iduser);
            if($ideale<$reelee)
            {
                $masse=$reelee-$ideale;
                return $masse;
            }
            else{
                $masse=$ideale-$reelee;
                return $masse;
            }
        }

    
    public function getPlat($idregime){
        $this->load->database();
        $sql="select p.idplat,p.idtypeplat,p.nomplat,p.photoplat,tp.nomtypeplat,r.idregime,r.prixregime,r.typeregime,o.idobjectif,o.typeobjectif
        from plat p
            join typeplat tp
                on tp.idtypeplat = p.idtypeplat
            join regime r
                on r.idregime = p.idregime
            join objectif o
                on o.idobjectif = p.idobjectif where p.idregime= '$idregime'";
        //echo $sql;
        $query=$this->db->query($sql);
        $data=array();
            $result=$query->result_array();
            if($query){
                foreach($result as $results){
                        array_push($data,$results);
                }
            }else{
                echo "erreur";
            } 
            return $data;
    }

    public function getSport($idregime,$idgenre){
        $this->load->database();
        $sql="select * from sport where idregime='$idregime' and idgenre='$idgenre'";
        $query=$this->db->query($sql);
        $data=array();
        $result=$query->result_array();
        if($query){
            foreach($result as $results){
                array_push($data,$results);
            }
        }else{
            echo "erreur";
        }
        return $data;
    }   
}

   