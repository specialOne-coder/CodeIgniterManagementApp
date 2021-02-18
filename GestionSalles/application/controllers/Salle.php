<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salle extends CI_Controller {

    // Index
    public function index(){

        $this->load->model('SalleModel');
        $this->form_validation->set_rules('etage','Etage','required');
        $this->form_validation->set_rules('nom','Nom_Salle','required');
        $this->form_validation->set_rules('capacite','Capacite','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $salles = $this->SalleModel->allSalle();
            $data = array();
            $data['salles'] = $salles;
            $this->load->view('salle/index',$data);
            $this->load->view('parties/footer');
        }else{
            $donne = array();
            $donne['Etage'] = $this->input->post('etage');
            $donne['Nom_Salle'] = $this->input->post('nom');
            $donne['Capacite'] = $this->input->post('capacite');
            $this->SalleModel->insertSalle($donne);
            $this->session->set_flashdata('success','Enregistrement réussi');
            redirect(base_url().'index.php/salle');
        }
    }

    // Modification
    public function modify($idsalle){    
        $this->load->model('SalleModel');
        $salle = $this->SalleModel->getSalle($idsalle);
        $data = array();
        $data['sa'] = $salle;

        $this->form_validation->set_rules('etageUp','Etage','required');
        $this->form_validation->set_rules('nomUp','Nom_Salle','required');
        $this->form_validation->set_rules('capaciteUp','Capacite','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $this->load->view('salle/modifier',$data);
            $this->load->view('parties/footer');
        }else{
            $donne = array();
            $donne['Etage'] = $this->input->post('etageUp');
            $donne['Nom_Salle'] = $this->input->post('nomUp');
            $donne['Capacite'] = $this->input->post('capaciteUp');
            $this->SalleModel->updateSalle($idsalle,$donne);
            $this->session->set_flashdata('success','Mise à jour réussie');
            redirect(base_url().'index.php/salle/index');
        }
      
    }


    // Suppression
    public function supprimer($id){
        $this->load->model('SalleModel');
        $salled = $this->SalleModel->getSalle($id);
        if(empty($salled)){
            $this->session->set_flashdata('failure','Aucune donnée de ce type');
            redirect(base_url().'index.php/filiere/index');
        }
        $this->SalleModel->deleteSalle($id);
        $this->session->set_flashdata('success','Suppression réussie');
        redirect(base_url().'index.php/salle/index');
    }


    
}