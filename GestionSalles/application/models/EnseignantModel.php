<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class EnseignantModel extends CI_Model {

    // Insertion d'un enseignant
    public function insertEns($arrayDonne){
        $this->db->insert('Enseignant',$arrayDonne);
    }

    // Récuperation de tous les enseignants
    public function allEns(){
        $this->db->select('Enseignant_ID,FiliereId,Nom_Filiere,Nom,Prenom,Telephone,Email');
        $this->db->from('Enseignant');
        $this->db->join('Filiere', 'Filiere.Filiere_id = Enseignant.FiliereId');
        return $cours = $this->db->get()->result_array();
    }

    // Récuperation d'un enseignant à modifier
    public function getEns($ensID){
        $this->db->select('Enseignant_ID,Filiere_id,Nom_Filiere,Nom,Prenom,Telephone,Email');
        $this->db->where('Enseignant_ID',$ensID);
        $this->db->from('Enseignant');
        $this->db->join('Filiere', 'Filiere.Filiere_id = Enseignant.FiliereId');
        return $cour = $this->db->get()->row_array();
    }

    // Modidfication d'un enseignant
    public function updateEns($id,$forms){
        $this->db->where('Enseignant_ID',$id);
        $this->db->update('Enseignant',$forms);
    }

    // Suppression d'un enseignant
    public function deleteEns($id){
        $this->db->where('Enseignant_ID',$id);
        $this->db->delete('Enseignant');
    }

}