<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    
    /** Fonction index
     *  si le formulaire n'est pas validé : n'affichez que la page 
     */ 
	public function index(){

        // Verification des contraintes d'enregistrement du formulaire
        $this->load->model('ReservationModel');
        $this->form_validation->set_rules('salle','id_sal','required');
        $this->form_validation->set_rules('cour','id_cours','required');
        $this->form_validation->set_rules('filiere','id_filiere','required');
        $this->form_validation->set_rules('enseignant','id_enseignant','required');
        $this->form_validation->set_rules('dateres','Date_Resa','required');
        $this->form_validation->set_rules('heuredebut','Heure_Debut','required');
        $this->form_validation->set_rules('heurefin','Heure_Fin','required');
        if($this->form_validation->run() == false){
                // recuperation des modèles 
                $this->load->model('ReservationModel');
                $this->load->model('FiliereModel');
                $this->load->model('CoursModel');
                $this->load->model('EnseignantModel');
                $this->load->model('SalleModel');
                $this->load->view('parties/header');
                $filieres = $this->FiliereModel->allFiliere();
                $cours = $this->CoursModel->allCours();
                $ens = $this->EnseignantModel->allEns();
                $salles = $this->SalleModel->allSalle();
                $res = $this->ReservationModel->allRes();
                //Suppression automatique de la réservation
                $this->ReservationModel->autoDelete();
                //Envoi des infos au formulaire
                $data = array();
                $data['filieres'] = $filieres;
                $data['cours'] = $cours;
                $data['ens'] = $ens;
                $data['salles'] = $salles;
                $data['res'] = $res;
                //chargement de la vue
                $this->load->view('reservation/index',$data);
                $this->load->view('parties/footer');
            
        }else{
            $this->load->model('SalleModel');
            // Condition de verification
            $date_Areserve = $this->input->post('dateres');
            $heured_Areserve = $this->input->post('heuredebut');
            $salle_Areserve = $this->input->post('salle');
            $heuref_Areserve = $this->input->post('heurefin');
            $condition = $this->ReservationModel->already($salle_Areserve,$date_Areserve,
            $heured_Areserve,$heuref_Areserve);
              if(!$condition){
                $donne = array();
                $donne['id_sal'] = $this->input->post('salle');
                $donne['id_cours'] = $this->input->post('cour');
                $donne['id_filiere'] = $this->input->post('filiere');
                $donne['id_enseignant'] = $this->input->post('enseignant');
                $donne['Date_Resa'] = $this->input->post('dateres');
                $donne['Heure_Debut'] = $this->input->post('heuredebut');
                $donne['Heure_Fin'] = $this->input->post('heurefin');
                $this->ReservationModel->insertRes($donne);
                // Mise à jour de la salle après enrégistrement
                $dataS = array();
                $salleReser = $this->input->post('salle');  
                $dataS['réservé'] = 1;
                $this->SalleModel->updateSalle($salleReser,$dataS);
                $this->session->set_flashdata('success','Enregistrement réussi');
                redirect(base_url().'index.php/reservation');
            }else{
                $this->session->set_flashdata('failure','Cette classe est déja réservé: Date et Heure y compris ');
                redirect(base_url().'index.php/reservation');
            }
        }
    }

    // Fonction de modification du formulaire
    public function modify($idres){
        //Recuperation de la réservation a modifié
        $this->load->model('ReservationModel');
        $this->load->model('FiliereModel');
        $this->load->model('CoursModel');
        $this->load->model('EnseignantModel');
        $this->load->model('SalleModel');
        $this->load->view('parties/header');
        $filieres = $this->FiliereModel->allFiliere();
        $cours = $this->CoursModel->allCours();
        $ens = $this->EnseignantModel->allEns();
        $salles = $this->SalleModel->allSalle();
        $res = $this->ReservationModel->getRes($idres);
        $data = array();
        $data['filieres'] = $filieres;
        $data['cours'] = $cours;
        $data['ens'] = $ens;
        $data['salles'] = $salles;
        $data['res'] = $res;
        $this->form_validation->set_rules('salleUp','id_sal','required');
        $this->form_validation->set_rules('courUp','id_cours','required');
        $this->form_validation->set_rules('filiereUp','id_filiere','required');
        $this->form_validation->set_rules('enseignantUp','id_enseignant','required');
        $this->form_validation->set_rules('dateresUp','Date_Resa','required');
        $this->form_validation->set_rules('heuredebutUp','Heure_Debut','required');
        $this->form_validation->set_rules('heurefinUp','Heure_Fin','required');
        if($this->form_validation->run() == false){
            $this->load->view('reservation/modifier',$data);
            $this->load->view('parties/footer');
        }else{
            //Modification de la réservation
            $this->load->model('SalleModel');
                $donne = array();
                $donne['id_sal'] = $this->input->post('salleUp');
                $donne['id_cours'] = $this->input->post('courUp');
                $donne['id_filiere'] = $this->input->post('filiereUp');
                $donne['id_enseignant'] = $this->input->post('enseignantUp');
                $donne['Date_Resa'] = $this->input->post('dateresUp');
                $donne['Heure_Debut'] = $this->input->post('heuredebutUp');
                $donne['Heure_Fin'] = $this->input->post('heurefinUp');
                $this->ReservationModel->updateRes($idres,$donne);
                //Mise à jour de la salle 
                $dataS = array();
                $salleReser = $this->input->post('salleUp');
                if($salleReser == $res['id_sal']){
                    $dataS['réservé'] = 1;
                    $this->SalleModel->updateSalle($salleReser,$dataS);
                }else{
                    $dataS['réservé'] = 1;
                    $this->SalleModel->updateSalle($salleReser,$dataS);
                    $sup = $res['id_sal'];
                    $dataS['réservé'] = 0;
                    $this->SalleModel->updateSalle($sup,$dataS);
                }
                $this->session->set_flashdata('success','Mise à jour réussie');
                redirect(base_url().'index.php/reservation/index');
        }
      
    }

    //Fonction de suppression de la reservation
    public function supprimer($idres){
        $this->load->model('SalleModel');
        $this->load->model('ReservationModel');
        $resd = $this->ReservationModel->getRes($idres);
        if(empty($resd)){
            $this->session->set_flashdata('failure','Aucune donnée de ce type');
            redirect(base_url().'index.php/cours/index');
        }
        $this->ReservationModel->deleteRes($idres);
        //Mise à jour de la salle
        $dataS = array();
        $salleReser = $resd['id_salle'];
        $dataS['réservé'] = 0;
        $this->SalleModel->updateSalle($salleReser,$dataS);
        $this->session->set_flashdata('success','Suppression réussie');
        redirect(base_url().'index.php/reservation/index');
    }
     

    
}
