<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class FiliereModel extends CI_Model {

    // Insertion d'une filière
    public function insertFiliere($arrayDonne){
        $this->db->insert('Filiere',$arrayDonne);
    }

    // Récuperation des filières
    public function allFiliere(){
        return $filieres = $this->db->get('Filiere')->result_array();
    }

    // Récupération d'une filière à modifier
    public function getFiliere($filID){
       $this->db->where('Filiere_id',$filID);
       return $fil = $this->db->get('Filiere')->row_array();
    }

    // Modification d'une filière
    public function updateFiliere($id,$forms){
        $this->db->where('Filiere_id',$id);
        $this->db->update('Filiere',$forms);
    }

    // Suppression d'une filière
    public function deleteFiliere($id){
        $this->db->where('Filiere_id',$id);
        $this->db->delete('Filiere');
    }
}