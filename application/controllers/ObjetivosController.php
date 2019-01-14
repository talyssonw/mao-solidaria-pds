<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjetivosController extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('objetivosModel');
		}

	public function get_objs_by_proj($id_proj){
		return $this->objetivosModel->get_proj_by_entidade_id($id_proj);
	}

	public function finish_obj($id_obj)
	{		
		$this->objetivosModel->finish_obj($id_obj);
		redirect('project-list/'.$this->session->userdata('id'),'refresh');
	}

	public function unfinish_obj($id_obj)
	{		
		$this->objetivosModel->unfinish_obj($id_obj);
		redirect('project-list/'.$this->session->userdata('id'),'refresh');
	}

	
}

/* End of file objetivosController.php */
/* Location: ./application/controllers/objetivosController.php */