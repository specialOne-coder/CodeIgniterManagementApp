<?php
defined ('BASEPATH') OR exit ('No direct script access allowed') ;

class ReservationModel extends CI_Model {


    // Insertion d'une reservation
    public function insertRes($arrayDonne){
        $this->db->insert('Reservation',$arrayDonne);
    }

    // Récuperation de toutes les réservations
    public function allRes(){
        $this->db->select('Reservation_ID,Etage,Nom_Salle,Intitule,Nom_Filiere,Nom,Date_Resa,Heure_Debut,Heure_Fin');
        $this->db->from('Reservation');
        $this->db->join('Salle', 'Salle.id_salle = Reservation.id_sal');
        $this->db->join('Cours', 'Cours.Cours_ID = Reservation.id_cours');
        $this->db->join('Filiere', 'Filiere.Filiere_ID = Reservation.id_filiere');
        $this->db->join('Enseignant', 'Enseignant.Enseignant_ID = Reservation.id_enseignant');
        return $res = $this->db->get()->result_array();
    }


    // Récupération d'une réservation à modifier
    public function getRes($resID){
        $this->db->select('Reservation_ID,id_sal,id_salle,id_cours,id_filiere,id_enseignant,Etage,Nom_Salle,Intitule,Nom_Filiere,Nom,Date_Resa,Heure_Debut,Heure_Fin');
        $this->db->where('Reservation_ID',$resID);
        $this->db->from('Reservation');
        $this->db->join('Salle','Salle.id_salle = Reservation.id_sal');
        $this->db->join('Cours','Cours.Cours_ID = Reservation.id_cours');
        $this->db->join('Filiere','Filiere.Filiere_ID = Reservation.id_filiere');
        $this->db->join('Enseignant','Enseignant.Enseignant_ID = Reservation.id_enseignant');
        return $res = $this->db->get()->row_array();
    }

    // Modification d'une réservation
    public function updateRes($id,$forms){
        $this->db->where('Reservation_ID',$id);
        $this->db->update('Reservation',$forms);
    }


    // AutoSuppression de la réservation une fois la date passée
    public function autoDelete(){
         //Suppression automatique de la réservation
         $current_date = date("Y-m-d");
         $this->db->select('Date_Resa');
         $this->db->from('Reservation');
         $res = $this->db->get()->result_array();
         foreach($res as $d){
             //echo implode($d)."<br>";
            if($current_date > implode($d)){
                 $this->db->select('Reservation_ID');
                 $this->db->where('Date_Resa',implode($d));
                 $this->db->from('Reservation');
                 $ids = $this->db->get()->row_array();
                 $this->deleteRes(implode($ids));
            }
         }
    }


    // Vérification d'enrégistrement d'une réservation
    // Si la date et la salle existe déja    ET
    // Si la l'heure de début est > à l'heure de debut Existante-heureMinimum d'un cours ET l'heure de début est < à l'heure de fin existante   ET
    // Si l'heure de fin est > à l'heure de début existante OU l'heure de fin est < à l'heure de fin existante
    // Alors ça passe pas
    public function already($salle,$date,$heured,$heuref){
        $heureMin = 2;
        $this->db->select('id_sal,Date_Resa,Heure_Debut,Heure_Fin');
        $this->db->from('Reservation');
        $res = $this->db->get()->result_array();
        foreach($res as $r){
           if(($salle == $r['id_sal'] && $date == $r['Date_Resa'])&&
             ($heured > $r['Heure_Debut'] - $heureMin && $heured < $r['Heure_Fin']) &&
             ($heuref > $r['Heure_Debut'] || $heuref < $r['Heure_Fin'])
             ){
                return 'dej';
            }
        }
    }

    public function alreadyMod($salle,$date,$heured,$heuref){

    }
    
    // Suppression d'une réservation
    public function deleteRes($id){
        $this->db->where('Reservation_ID',$id);
        $this->db->delete('Reservation');
    }

}
