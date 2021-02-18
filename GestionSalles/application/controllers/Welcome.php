<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// Index
	public function index(){
		$this->load->view('welcome_message');
	}

	// Connexion
	public function connexion(){
		$this->form_validation->set_rules('name','username','required');
		$this->form_validation->set_rules('pass','password','required');
		$this->load->model('WelcomeModel');
		if($this->form_validation->run() == false){
			$this->load->view('welcome_message');
		}else{
			$admin = $this->WelcomeModel->allAdmins();
			$usern = $this->input->post('name');
			$passw = $this->input->post('pass');
			foreach($admin as $ad){
				if($usern == $ad['username'] && $passw == $ad['password']){
					$this->session->set_flashdata('succes','Vous êtes connectés !');
					redirect(base_url().'index.php/reservation/index');
				}else{
					$this->session->set_flashdata('failure','Vous êtes connectés');
					$this->load->view('welcome_message');
				}
			}
		}
	}


}
