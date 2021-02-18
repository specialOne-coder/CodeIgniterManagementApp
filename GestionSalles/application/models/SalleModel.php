<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class SalleModel extends CI_Model {

    // Insertion d'une salle
    public function insertSalle($arrayDonne){
        $this->db->insert('Salle',$arrayDonne);
    }

    // Récupération de toutes les salles
    public function allSalle(){
        return $salle = $this->db->get('Salle')->result_array();
    }


    // Récupération d'une salle à modifier
    public function getSalle($id){
        $this->db->where('id_salle',$id);
        return $salle = $this->db->get('Salle')->row_array();
    }

    // Modification d'une salle
    public function updateSalle($id,$forms){
        $this->db->where('id_salle',$id);
        $this->db->update('Salle',$forms);
    }


    // Suppression d'une salle
    public function deleteSalle($id){
        $this->db->where('id_salle',$id);
        $this->db->delete('Salle');
    }

}