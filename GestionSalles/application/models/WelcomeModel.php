<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class WelcomeModel extends CI_Model {

   // Récupération des infos de connexion
   public function allAdmins(){
    return $admins = $this->db->get('admin')->result_array();
    
   }


}