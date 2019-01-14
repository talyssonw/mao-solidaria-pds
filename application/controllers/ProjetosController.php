<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjetosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('objetivosModel');
		$this->load->model('projetosModel');
		$this->load->model('EntidadeModel');
		$this->load->model('usuariosModel');
	}

	public function callCadProj()
	{
		$this->template->load('template', 'addProject');

	}

	public function teste()
	{
		$this->load->view('successView');
	}

	public function call_project_page_form($id_ent, $id_proj)
	{
		$data['ents'] = $this->EntidadeModel->get_ent_by_id($id_ent);
		$data['objs'] = $this->objetivosModel->get_objs_by_proj_id($id_proj);
		$data['projs'] = $this->projetosModel->get_proj_by_id($id_proj);
		$data['users'] = $this->usuariosModel->get_users_by_objs($id_ent, $id_proj); 
		$this->template->load('template','project-page-form', $data);
	}

	public function insertProject ()
	{	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


		if ($this->input->post()==null){
			$this->template->load('template', 'addProject');
		}else
		{
			$img = 'image';
			$str = "AaBbCcDdEeFf1234567890ghijlm";
			$url = str_shuffle($str);
			if (!is_dir('assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url)) 
			{
				mkdir('assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url, 0777, TRUE);
			}
                        //Pasta onde será feito o upload
			$config['upload_path'] ='assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url;
                        //Tipos suportados
			$config['allowed_types'] = 'gif|jpg|png';
                        //Configurando atributos do arquivo imagem que iremos receber
			$config['max_size']    = 512000000;
			$config['max_width']   = 2400;
			$config['max_height']  = 1000;
			$config['file_name'] = $url;

			echo($config['upload_path']);

                        //Carregando a lib com as configurações feitas
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
						 //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
			if( !$this->upload->do_upload($img)){                               
					rmdir('assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url);
      				$this->session->set_flashdata('errorCad', '<div class="alert alert-danger">Imagem excedeu a resolução máxima (2400x1000) ou tamanho máximo (5MB).</div>');
      				$this->template->load('template', 'addProject');  
			}
			else
			{
				$url = 'assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url.'/'.$url;

				$objs = $this->input->post ('objetivo[]');
				$desc = $this->input->post('desc[]');
				$project = [
				'titulo' => $this->input->post('projTitle'),
				'descricao' => $this->input->post ('projDesc'),
				'status' => '1',
				'entidadesaplicacoes_idEntidade' => $this->session->userdata('id'),
				'urlImg' => $url
				];


				$id_proj = $this->projetosModel->insert_data_return_id($project);
				$id_objs;
				$x=0;

				while (isset($objs[$x])){
					if ($objs[$x]!=null) {
						$obj_insert = [
						'title' => $objs[$x],
						'objetivo' => $desc[$x],
						'projetos_idProjeto' => $id_proj,
						'status' => 0
						];
						$id_objs[$x] = $this->objetivosModel->insert_data_return_id($obj_insert);
					}
					$x++;
				}
				$pjc = $this->session->userdata('proj_count');
				$pjc++;
				$this->session->set_userdata('proj_count',$pjc);
				redirect('project-list/'.$this->session->userdata('id'));

			}


		}

	}


	public function edit_project($id_ent)
	{
		$project = [
		'titulo' => $this->input->post('projTitle'),
		'descricao' => $this->input->post ('projDesc'),
		];
		$this->projetosModel->edit_proj($project, $id_ent);


		$objetivo = $this->input->post('objetivo[]');
		$title = $this->input->post('title[]');
		$idObjetivo = $this->input->post('idObjetivo[]');
		for ($x=0;$x<count($objetivo);$x++){
			$obj_insert = array (
				'objetivo' => $objetivo[$x],
				'title' => $title[$x]
				);
			$this->objetivosModel->edit_obj($obj_insert, $idObjetivo[$x]);
		}	
		redirect('project-list/'.$this->session->userdata('id'));
	}

	public function finish_proj($id_proj)
	{

		$this->projetosModel->finish_proj($id_proj);
		redirect('project-list/'.$this->session->userdata('id'));
	}

	public function call_edit_project_form($id_proj)
	{
		$data['proj'] = $this->projetosModel->get_proj_by_id($id_proj);
		$data['obj'] = $this->objetivosModel->get_objs_by_proj_id($id_proj);
		$this->template->load('template', 'editProjectView', $data);
	}

	public function callProjList($id_ent)
	{
		$data['projs'] = $this->projetosModel->get_proj_by_entidade($id_ent);
		$data['objs'] = $this->objetivosModel->get_all();
		$data['users'] = $this->usuariosModel->get_users_by_ent($id_ent);
		$this->template->load('template', 'projetosView', $data);
	}



}

/* End of file projetosController.php */
/* Location: ./application/controllers/projetosController.php */