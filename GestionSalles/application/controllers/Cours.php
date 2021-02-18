<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cours extends CI_Controller {

    // Fonction d'index 
	public function index(){

        $this->load->model('CoursModel');
        $this->form_validation->set_rules('filiereId','Filiere_ID','required');
        $this->form_validation->set_rules('intit','Intitule','required');
        $this->form_validation->set_rules('desc','Description','required');

        if($this->form_validation->run() == false){
            $this->load->model('FiliereModel');
            $this->load->view('parties/header');
            $filieres = $this->FiliereModel->allFiliere();
            $cours = $this->CoursModel->allCours();
            $data = array();
            $data['filieres'] = $filieres;
            $data['cours'] = $cours;
            $this->load->view('cours/index',$data);
            $this->load->view('parties/footer');
        }else{
            $donne = array();
            $donne['FiliereId'] = $this->input->post('filiereId');
            $donne['Intitule'] = $this->input->post('intit');
            $donne['Description'] = $this->input->post('desc');
            $this->CoursModel->insertCours($donne);
            $this->session->set_flashdata('success','Enregistrement réussi');
            redirect(base_url().'index.php/cours');
        }
    }


    // Fonction de modification
    public function modify($idcours){
        $this->load->model('FiliereModel');
        $this->load->model('CoursModel');
        $crs = $this->CoursModel->getCours($idcours);
        $filieres = $this->FiliereModel->allFiliere();
        $data = array();
        $data['crs'] = $crs;
        $data['filieres'] = $filieres;
        $this->form_validation->set_rules('filiereUp','Filiere_ID','required');
        $this->form_validation->set_rules('intitUp','Intitule','required');
        $this->form_validation->set_rules('descUp','Description','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $this->load->view('cours/modifier',$data);
            $this->load->view('parties/footer');
        }else{
            $forms = array();
            $forms['FiliereId'] = $this->input->post('filiereUp');
            $forms['Intitule'] = $this->input->post('intitUp');
            $forms['Description'] = $this->input->post('descUp');
            $this->CoursModel->updateCours($idcours,$forms);
            $this->session->set_flashdata('success','Mise à jour réussie');
            redirect(base_url().'index.php/cours/index');
        }
      
    }

    // Fonction de suppression
    public function supprimer($idcours){
        $this->load->model('CoursModel');
        $coursd = $this->CoursModel->getCours($idcours);
        if(empty($coursd)){
            $this->session->set_flashdata('failure','Aucune donnée de ce type');
            redirect(base_url().'index.php/cours/index');
        }
        $this->CoursModel->deleteCours($idcours);
        $this->session->set_flashdata('success','Suppression réussie');
        redirect(base_url().'index.php/cours/index');
    }


    
}