<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enseignant extends CI_Controller {

    // Fonction d'index
	public function index(){

        $this->load->model('EnseignantModel');
        $this->form_validation->set_rules('filiere','FiliereId','required');
        $this->form_validation->set_rules('profName','Nom','required');
        $this->form_validation->set_rules('profPrename','Prenom','required');
        $this->form_validation->set_rules('profNumber','Telephone','required');
        $this->form_validation->set_rules('profEmail','Email','required');

        if($this->form_validation->run() == false){
            $this->load->model('FiliereModel');
            $this->load->view('parties/header');
            $filieres = $this->FiliereModel->allFiliere();
            $ens = $this->EnseignantModel->allEns();
            $data = array();
            $data['filieres'] = $filieres;
            $data['ens'] = $ens;
            $this->load->view('enseignant/index',$data);
            $this->load->view('parties/footer');
        }else{
            $donne = array();
            $donne['FiliereId'] = $this->input->post('filiere');
            $donne['Nom'] = $this->input->post('profName');
            $donne['Prenom'] = $this->input->post('profPrename');
            $donne['Telephone'] = $this->input->post('profNumber');
            $donne['Email'] = $this->input->post('profEmail');
            $this->EnseignantModel->insertEns($donne);
            $this->session->set_flashdata('success','Enregistrement réussi');
            redirect(base_url().'index.php/enseignant');
        }
    }

    // Fonction de modification
    public function modify($idens){
        $this->load->model('FiliereModel');
        $this->load->model('EnseignantModel');
        $en = $this->EnseignantModel->getEns($idens);
        $filieres = $this->FiliereModel->allFiliere();
        $data = array();
        $data['en'] = $en;
        $data['filieres'] = $filieres;
        $this->form_validation->set_rules('filiereUp','FiliereId','required');
        $this->form_validation->set_rules('profNameUp','Nom','required');
        $this->form_validation->set_rules('profPrenameUp','Prenom','required');
        $this->form_validation->set_rules('profNumberUp','Telephone','required');
        $this->form_validation->set_rules('profEmailUp','Email','required');
        if($this->form_validation->run() == false){
            $this->load->view('parties/header');
            $this->load->view('enseignant/modifier',$data);
            $this->load->view('parties/footer');
        }else{
            $forms = array();
            $forms = array();
            $forms['FiliereId'] = $this->input->post('filiereUp');
            $forms['Nom'] = $this->input->post('profNameUp');
            $forms['Prenom'] = $this->input->post('profPrenameUp');
            $forms['Telephone'] = $this->input->post('profNumberUp');
            $forms['Email'] = $this->input->post('profEmailUp');
            $this->EnseignantModel->updateEns($idens,$forms);
            $this->session->set_flashdata('success','Mise à jour réussie');
            redirect(base_url().'index.php/enseignant/index');
        }
      
    }

    // Fonction de suppression
    public function supprimer($idens){
        $this->load->model('EnseignantModel');
        $ensd = $this->EnseignantModel->getEns($idens);
        if(empty($ensd)){
            $this->session->set_flashdata('failure','Aucune donnée de ce type');
            redirect(base_url().'index.php/enseignant/index');
        }
        $this->EnseignantModel->deleteEns($idens);
        $this->session->set_flashdata('success','Suppression réussie');
        redirect(base_url().'index.php/enseignant/index');
    }
    
}