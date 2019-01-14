	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AppEntidadeController extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('EntidadeModel');
			$this->load->model('projetosModel');
			$this->load->model('objetivosModel');
			$this->load->model('usuariosModel');
		}
		public function index()
		{
			$this->callMainPage();
		}

		public function message_form()
		{
			$this->template->load('template','message_form');	
		}

		public function loginEntidade() 
		{
			$this->template->load('template', 'loginEntidadeView');
		}

		public function change_password_form()
		{
			if ($this->session->userdata('user_type')==0) {
				$this->template->load('templateEntidade', 'changePasswordView');
			}else{
				$this->template->load('templateEntidade', 'access_denied_form');
			}

		}

		public function entidade_obj_display_form($id_ent)
		{
			$data['data'] = $this->usuariosModel->get_users_request_objs($id_ent);
			$this->template->load('template','entidade-obj-display-form', $data);
		}

		public function change_password_event()
		{
			if ($this->session->userdata('user_type')==0) {
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('actualPassword', 'Senha Atual', 'trim|required');
				$this->form_validation->set_rules('entPass', 'Senha Nova', 'trim|required');
				$this->form_validation->set_rules('entPassConf', 'Confirmação de Senha', 'trim|required|matches[entPass]');

				if ($this->form_validation->run()== false) {
					$this->template->load('templateEntidade','changePasswordView');
				}else{
					if ($this->EntidadeModel->pass_verif($this->input->post('actualPassword'))) {
						if ($this->input->post('entPass')!=$this->input->post('entPassConf')) {
							$this->session->set_flashdata('exceptionError', '<div class="alert alert-danger"> Nova senha e senha de confirmação não conferem.</div>');
							$this->template->load('templateEntidade','changePasswordView');
						}else{
							$data = $this->EntidadeModel->pass_verif($this->input->post('actualPassword'));
							$idEntidade;
							foreach ($data as $i) {
								$idEntidade = $i->idEntidade;
							}

							try{
								$password = [
								'password' => $this->input->post('entPass')];
								$this->EntidadeModel->pass_update($idEntidade, $password);
								$this->session->set_flashdata('flashMessage', '<div class="alert alert-success"> Senha atualizada com sucesso.</div>');
								$this->template->load('templateEntidade','message_form');
							}catch (Exception $e){
								$this->session->set_flashdata('exceptionError', $e->getMessage());
								$this->template->load('templateEntidade','changePasswordView');
							}
						}
					}else{
						$this->session->set_flashdata('exceptionError', '<div class="alert alert-danger"> Senha informada não é a mesma que a senha atual.</div>');
						$this->template->load('templateEntidade','changePasswordView');
					}
				}
			}else{
				$this->template->load('templateEntidade', 'access_denied_form');
			}
		}

		public function cadEntidade (){ //nesta função a view de aplicação para cadastro para entidades é chamada
			$this->template->load('template', 'cadEntidadeView');
		}

		public function call_profile_entidade($id_ent)
		{
			$data['entidade'] = $this->EntidadeModel->get_ent_by_id($id_ent);
			$this->template->load ('templateEntidade', 'editEntidadeProfile', $data);
		}

		public function get_ent_name_by_id($id)
		{
			$data = $this->EntidadeModel->get_ent_name_by_id($id);
			return $data;
		}

		public function update_profile($id_ent)
		{
			
			if ($this->session->userdata('user_type')==0) {
				
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('entName', 'Nome', 'required|max_length[100]');

			$this->form_validation->set_rules('entEmail', 'Email', 'required|valid_email|max_length[45]');
			$this->form_validation->set_rules('entCity', 'Cidade', 'required|max_length[45]');
			$this->form_validation->set_rules('entNeighb', 'Bairro', 'required|max_length[100]');
			$this->form_validation->set_rules('entAddress', 'Endereco', 'required');
			$this->form_validation->set_rules('entPhone', 'Telefone', 'required|min_length[14]|max_length[15]');

			if ($this->form_validation->run()==false) {
				$data['entidade'] = $this->EntidadeModel->get_ent_by_id($id_ent);
				$this->template->load('templateEntidade', 'editEntidadeProfile', $data);}
				else
				{
					$entApp = [
					'cnpj' => preg_replace("/[^0-9]/","", $this->input->post('entCnpj')),
					'name' => $this->input->post('entName'),
					'email'=> $this->input->post ('entEmail'),
					'city' => $this->input->post('entCity'),
					'neighborhood' => $this->input->post('entNeighb'),
					'adress' => $this->input->post('entAddress'),
					'phone' => $this->input->post('entPhone')];
					$this->EntidadeModel->update_profile($entApp, $id_ent);
					redirect('entidade-edit-profile/'.$this->session->userdata('id'));
				}
			}else{
				$this->template->load('templateEntidade', 'access_denied_form');
			}

		}


		public function cadAppEntidade() //nesta função a aplicação é verificada e salva na tabela entidades
		{		
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//regras das validações dos campos enviados pelo usuários
			$this->form_validation->set_rules('entName', 'Nome', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('entCnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]');
			$this->form_validation->set_rules('entEmail', 'Email', 'trim|required|valid_email|max_length[45]');
			$this->form_validation->set_rules('entPass', 'Password', 'trim|required|max_length[20]');
			$this->form_validation->set_rules('entPassConf', 'Password Confirmation', 'trim|required|matches[entPass]');
			$this->form_validation->set_rules('entCity', 'Cidade', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('entNeighb', 'Bairro', 'trim|required|max_length[100]');
			$this->form_validation->set_rules('entAdress', 'Endereco', 'trim|required');
			$this->form_validation->set_rules('entPhone', 'Telefone', 'trim|required|min_length[13]|max_length[15]');


			if ($this->form_validation->run()==false) {  //validação dos campos preenchidos
				$this->template->load('template', 'cadEntidadeView');
			}
			else {
				if($this->input->post()!= null)
				{

					$img = 'image';
					$str = "AaBbCcDdEeFf1234567890ghijlm";
					$url = preg_replace("/[^0-9]/","", $this->input->post('entCnpj')).str_shuffle($str);
					if (!is_dir('assets/files/uploads/'.$this->input->post('entCnpj'))) 
					{
						mkdir('assets/files/uploads/'.preg_replace("/[^0-9]/","", $this->input->post('entCnpj')), 0777, TRUE);
					}
	                        //Pasta onde será feito o upload
					$config['upload_path'] ='assets/files/uploads/'.preg_replace("/[^0-9]/","", $this->input->post('entCnpj'));
	                        //Tipos suportados
					$config['allowed_types'] = 'gif|jpg|png';
	                        //Configurando atributos do arquivo imagem
					$config['max_size']    = 412800000;
					$config['max_width']   = 1000;
					$config['max_height']  = 1000;
					$config['file_name'] = $url.'.'.'jpg';

	                        //Carregando a lib com as configurações feitas
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
							 //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
					if(!$this->upload->do_upload($img)){   
						rmdir('assets/files/uploads/'.preg_replace("/[^0-9]/","", $this->input->post('entCnpj')));
						$this->session->set_flashdata('errorCad', '<div class="alert alert-danger">Imagem excedeu a resolução máxima (1000x1000) ou tamanho máximo (4MB).</div>');
						$this->template->load('template', 'cadEntidadeView');  

					}
					else
					{
						//caminho das pasta pra salvar no BD
						$url = 'assets/files/uploads/'.preg_replace("/[^0-9]/","", $this->input->post('entCnpj')).'/'.$url.'.'.'jpg';
						$entApp = [ //objeto que será enviado para inserção
						'cnpj' => preg_replace("/[^0-9]/","", $this->input->post('entCnpj')),
						'name' => $this->input->post('entName'),
						'email'=> $this->input->post ('entEmail'),
						'password' => $this->input->post('entPass'),
						'city' => $this->input->post('entCity'),
						'neighborhood' => $this->input->post('entNeighb'),
						'adress' => $this->input->post('entAdress'),
						'phone' => $this->input->post('entPhone'), 
						'status' => '1',
						'urlImg' => $url];
						$this->EntidadeModel->insert_app_entidade ($entApp);
						$this->callMainPage();

					}

				}
			}		
		}

		public function change_profile_picture_form()
		{

			if ($this->session->userdata('user_type')==0) {
				$this->template->load('templateEntidade','changePictureView');
			}else{
				$this->template->load('templateEntidade', 'access_denied_form');
			}

		}

		public function change_profile_picture_event()
		{

			if ($this->session->userdata('user_type')==0) {


			$img = 'image';
			$str = "AaBbCcDdEeFf1234567890ghijlm";
			$url = $this->session->userdata('cnpj').str_shuffle($str);
	        //Pasta onde será feito o upload
			$config['upload_path'] ='assets/files/uploads/'.$this->session->userdata('cnpj');
	                        //Tipos suportados
			$config['allowed_types'] = 'gif|jpg|png';
	                        //Configurando atributos do arquivo imagem que iremos receber
			$config['max_size']    = 412800000;
			$config['max_width']   = 1000;
			$config['max_height']  = 1000;
			$config['file_name'] = $url.'.'.'jpg';

	                        //Carregando a lib com as configurações feitas
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
							 //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
			if(!$this->upload->do_upload($img)){   
				$this->session->set_flashdata('errorCad', '<div class="alert alert-danger">Imagem excedeu a resolução máxima (1000x1000) ou tamanho máximo (4MB).</div>');
				$this->template->load('template', 'changePictureView');  

			}
			else
			{


				$url = 'assets/files/uploads/'.$this->session->userdata('cnpj').'/'.$url.'.'.'jpg';
				$image_update = [
				'urlImg' => $url];
				$this->EntidadeModel->update_image($this->session->userdata('id'), $image_update);
				$this->session->set_userdata('url', $url);
				$this->session->set_flashdata('errorCad', '<div class="col-md-6 alert alert-success">Imagem alterada com sucesso.</div>');
				$this->template->load('templateEntidade', 'changePictureView'); 
			}


			}else{
				$this->template->load('templateEntidade', 'access_denied_form');
			}

		}

		public function recover_password_form()
		{
			$this->template->load('template', 'recoverPasswordView');
		}

		public function send_email_forgot_password()
		{

			if(!$this->input->post('entCnpj')){
				$this->session->set_flashdata('recoverPasswordError', 'Campo de e-mail não pode ser vazio');
				$this->template->load('template','recoverPasswordView');
			}else{
				$cnpj = preg_replace("/[^0-9]/","", $this->input->post('entCnpj'));
				if (!$this->EntidadeModel->verif_entidade_by_cnpj($cnpj)){
					$this->session->set_flashdata('errorCNPJ', 'Este CNPJ não está cadastrado.');
					$this->template->load('template','recoverPasswordView');
				}else{

					$dado = $this->EntidadeModel->verif_entidade_by_cnpj($cnpj);

					foreach ($dado as $d) {
						$dados = array (
							'name' => $d->name,
							'email' => $d->email);
					}
				 // Carrega a library email
					$this->load->library('email');
	        //Recupera os dados do formulário

	        //Inicia o processo de configuração para o envio do email
	        $config['protocol'] = 'mail'; // define o protocolo utilizado
	        $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
	        $config['validate'] = TRUE;
	        $config['mailtype'] = 'text'; // define se haverá validação dos endereços de email



	        // Inicializa a library Email, passando os parâmetros de configuração
	        $this->email->initialize($config);
	        
	        // Define remetente e destinatário
	        $this->email->from('talysson.m6@gmail.com', 'Mão Solidária'); // Remetente
	        $this->email->to($dados['email'],$dados['name']); // Destinatário

	        // Define o assunto do email
	        $this->email->subject('Recuperação de Senha');

	        $this->email->message('test');
	        /*
	         * Se o envio foi feito com sucesso, define a mensagem de sucesso
	         * caso contrário define a mensagem de erro, e carrega a view home
	         */
	        if($this->email->send())
	        {
	        	$this->session->set_flashdata('success','Email de recuperação enviado com sucesso!');
	        	$this->template->load('template', 'loginEntidadeView');
	        }
	        else
	        {
	        	$this->session->set_flashdata('error',$this->email->print_debugger());
	        	$this->template->load('template', 'loginEntidadeView');
	        }
	    }
	}

	}


	public function appEntidadeApprove()
	{
		$this->EntidadeModel->entApprove($this->input->get ('id_entidade'));
		$this->loadEntAdmin();
	}

	public function appEntidadeReject()
	{
		$this->EntidadeModel->entReject($this->input->get ('id_entidade'));
		$this->loadEntAdmin();
	}

	public function verifLoginEnt()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('entEmail', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'senha', 'required');


		if ($this->form_validation->run()==false) 
		{ 
			$this->session->set_flashdata('loginError', 'Login ou Senha estão incorretos');
			$this->template->load('template', 'loginEntidadeView');
		}else{

			$login = $this->input->post('entEmail');
			$password = $this->input->post('password');

			if (!$this->usuariosModel->login_verif($login, $password)) {
				if ($this->EntidadeModel->login_verif($login, $password)!=null)
				{
					$data = $this->EntidadeModel->login_verif($login, $password);
					foreach ($data as $row) 
					{					
						$projCount = $this->EntidadeModel->count_proj_by_id($row->idEntidade);							
						$sessionDataEnt = array (
							'id' => $row->idEntidade,
							'name' => $row->name,
							'cnpj' => $row->cnpj,
							'url' => $row->urlImg,
							'email' => $row->email,
							'logged_in' => TRUE,
							'proj_count' => $projCount);
						$this->session->set_userdata($sessionDataEnt);
						redirect('main-page');
						break;
					} 
				}
				else{
					$this->session->set_flashdata('loginError', 'Login ou Senha estão incorretos.');
					$this->template->load('template', 'loginEntidadeView');
				}
			}else{
				$data = $this->usuariosModel->login_verif($login, $password);
				foreach ($data as $row) {
					$sessionDataEnt = array (
						'id' => $row->id,
						'name' => $row->first_name.' '.$row->last_name,
						'url' => $row->picture_url,
						'email' => $row->email,
						'logged_in' => TRUE,
						'user_type' => 1);
					$this->session->set_userdata($sessionDataEnt);
					redirect('main-page');
				}
			}
		}
	}


	public function callEntMainPage (){
		$dados['formerror']= NULL;
		$this->template->load ('templateEntidade', 'successView', $dados);
	}


	public function callMainPage(){
		$data ['objs'] = $this->objetivosModel->get_all();
		$data ['projetos'] = $this->projetosModel->get_projs_main_page();
		
		$this->template->load('template', 'mainPageView', $data);
	}

	public function call_search_proj_mainpage()
	{
		$data['projs'] = $this->projetosModel->get_all();
		$data['objs'] = $this->objetivosModel->get_all();
		$data['ents'] = $this->EntidadeModel->get_all();
		$this->template->load('template', 'projetosMainPageView', $data);	
	}

	public function call_projlist_by_searchtitle()
	{
		if ($this->input->post('searchTitle')==null){
			$this->template->load('template', 'failLoginView');
		}else{
			$data['projs'] = $this->projetosModel->get_proj_by_name($this->input->post('searchTitle'));
			$data['objs'] = $this->objetivosModel->get_all();
			$data['ents'] = $this->EntidadeModel->get_all();
			$this->template->load('template', 'projetosMainPageView', $data);
		}
	}

	public function call_search_entidades_mainpage()
	{
		$data['ents'] = $this->EntidadeModel->get_all();
		$this->template->load('template', 'entidadesMainPageView', $data);
	}

	public function log_off()
	{
		$this->session->sess_destroy();
		$this->callMainPage();
	}

	public function loadEntAdmin(){
		$data['appsEntidades'] = $this->EntidadeModel->get_all();
		$this->template->load ('template', 'displayAppsEntidades', $data);	
	}

	}
