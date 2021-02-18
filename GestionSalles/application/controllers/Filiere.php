<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filiere extends CI_Controller {


    // Index
	public function index(){

        $this->load->model('FiliereModel');
        $this->form_validation->set_rules('filierename','Nom_Filiere','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $filieres = $this->FiliereModel->allFiliere();
            $data = array();
            $data['filieres'] = $filieres;
            $this->load->view('filiere/index',$data);
            $this->load->view('parties/footer');
        }else{
            $donne = array();
            $donne['Nom_Filiere'] = $this->input->post('filierename');
            $this->FiliereModel->insertFiliere($donne);
            $this->session->set_flashdata('success','Enregistrement réussi');
            redirect(base_url().'index.php/filiere');
        }
    }

    // Modification
    public function modify($idfil){    
        $this->load->model('FiliereModel');
        $fili = $this->FiliereModel->getFiliere($idfil);
        $data = array();
        $data['fili'] = $fili;

        $this->form_validation->set_rules('updateFil','Nom_Filiere','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $this->load->view('filiere/modifier',$data);
            $this->load->view('parties/footer');
        }else{
            $forms = array();
            $forms['Nom_Filiere'] = $this->input->post('updateFil');
            $this->FiliereModel->updateFiliere($idfil,$forms);
            $this->session->set_flashdata('success','Mise à jour réussie');
            redirect(base_url().'index.php/filiere/index');
        }
      
    }

    // Suppression
    public function supprimer($idfil){
        $this->load->model('FiliereModel');
        $filiered = $this->FiliereModel->getFiliere($idfil);
        if(empty($filiered)){
            $this->session->set_flashdata('failure','Aucune donnée de ce type');
            redirect(base_url().'index.php/filiere/index');
        }
        $this->FiliereModel->deleteFiliere($idfil);
        $this->session->set_flashdata('success','Suppression réussie');
        redirect(base_url().'index.php/filiere/index');
    }
    
}