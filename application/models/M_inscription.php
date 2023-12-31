<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inscription extends CI_Model {

    public function checkPassword($password){
        if(count($password) < 1){
            throw new Exception("Password too short");
        }
        return true;
    }
    public function upload_action($_FILES) {
        $file_count = count($_FILES['files']['name']);
        $img_string = "";
        for ($i = 0; $i < $file_count; $i++) {
            $filename = $_FILES['files']['name'][$i];
            //echo $filename;
            if (in_array(strchr($filename, "."), array('.png', '.jpg', '.jpeg', '.PNG', '.JPG', '.JPEG'))) {
              //  echo $_FILES['files']['tmp_name'][$i];
                move_uploaded_file($_FILES['files']['tmp_name'][$i], ('assets/img/'.$filename));
                $img_string .= $filename;
                if ($i < $file_count - 1) {
                    $img_string .= ",";
                }
            }
        }
    }
    public function insertCompteUser(){
        $sql = "insert into compte (idutilisateur) values ((select max(idutilisateur) from utilisateur))";
        $this->db->query($sql); 
    }
    public function insertNewUser($nom,$prenom, $files,$email, $password,$contact,$adresse){
        $this->upload_action($files);
        foreach($files as $f){
            $str = $f['name'];
            $sql = "insert into utilisateur (nom,prenom,photo,email,motdepasse,contact,adresse) values ('$nom','$prenom','$str[0]','$email','$password','$contact','$adresse')";
            $this->db->query($sql);     
            $this->insertCompteUser();
        }
    }
}