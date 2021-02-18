<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class CoursModel extends CI_Model {

    // Insertion d'un cours
    public function insertCours($arrayDonne){
        $this->db->insert('Cours',$arrayDonne);
    }

    // Récupération de tous les cours
    public function allCours(){
        $this->db->select('Cours_ID, Nom_Filiere, Intitule, Description');
        $this->db->from('Cours');
        $this->db->join('Filiere', 'Filiere.Filiere_id = Cours.FiliereId');
        return $cours = $this->db->get()->result_array();
    }

    // Recuperation d'un cours choisi
    public function getCours($courID){
        $this->db->select('Cours_ID, Filiere_id, Nom_Filiere, Intitule, Description');
        $this->db->where('Cours_ID',$courID);
        $this->db->from('Cours');
        $this->db->join('Filiere', 'Filiere.Filiere_id = Cours.FiliereId');
        return $cour = $this->db->get()->row_array();
    }

    // Mise à jour du cours
    public function updateCours($id,$forms){
        $this->db->where('Cours_ID',$id);
        $this->db->update('Cours',$forms);
    }

    // Suppression d'un cours
    public function deleteCours($id){
        $this->db->where('Cours_ID',$id);
        $this->db->delete('Cours');
    }

}