<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuariosModel');
		$this->load->model ('EntidadeModel');
		$this->load->model('objetivosModel');
		//Load user model
		$this->load->model('user');
	}

	public function loginPainelAdministrativo()
	{
		$this->template->load('template','loginPainelAdmView');
	}

	public function user_register_form()
	{

		$this->template->load('template','user-register-form');
	}

	public function select_register_type_form()
	{
		$this->template->load('template','select-register-type-form');
	}

	public function callAdminPage()
	{
		$data['appsEntidades'] = $this->EntidadeModel->get_all();
		$this->template->load ('template', 'displayAppsEntidades', $data);	
	}

	public function verifLoginAdmin()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('login', 'login', 'required');
		$this->form_validation->set_rules('password', 'senha', 'required');

		$data = $this->UsuariosModel->login_admin($this->input->post('login'), $this->input->post('password'));
		if ($this->form_validation->run()==false) 
		{ 
			$this->template->load('template', 'mainPageView');
		}
		else { 
			if ($data!=null)
			{
				$datas['appsEntidades'] = $this->EntidadeModel->get_all();	
				$this->template->load ('template', 'displayAppsEntidades', $datas);	
			}
			else
			{
				$this->session->set_flashdata('loginErrorAdmin', 'Senha ou login incorretos.');
				redirect('login-admin','refresh');
			}
		}


	}

	public function user_project_list_form($id_user)
	{
		$data['users'] = $this->UsuariosModel->get_projs_part_by_user($id_user);
		$this->template->load('template','user-project-list', $data);
	}

	public function user_register_event()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userFirstName', 'Nome', 'trim|required|min_length[2]|max_length[30]');
		$this->form_validation->set_rules('userLastName', 'Sobrenome', 'trim|required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('userBirthDate', 'Data de Nascimento', 'trim|required');
		$this->form_validation->set_rules('entPass', 'Password', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('entPassConf', 'Password Confirmation', 'trim|required|matches[entPass]|max_length[45]');
		$this->form_validation->set_rules('userCellphone', 'Celular', 'trim|required|min_length[15]|max_length[15]');
		$this->form_validation->set_rules('userEmail', 'E-mail', 'trim|required|valid_email|max_length[45]');
		if ($this->form_validation->run()==false) {
			$this->template->load('template','user-register-form');
		}else{
			if ($this->input->post()==null) {
				$this->$this->session->set_flashdata('errorCard', 'Algum valor está sendo enviado vazio');
				$this->template->load('template','user-register-form');
			}else{
				try {
					
					$img = 'image';
					$str = "AaBbCcDdEeFf1234567890ghijlm";
					$url = str_shuffle($str);
					if (!is_dir('assets/files/uploads/users/'.$url)) 
					{
						mkdir('assets/files/uploads/users/'.$url, 0777, TRUE);
					}
                        //Pasta onde será feito o upload
					$config['upload_path'] ='assets/files/uploads/users/'.$url;
                        //Tipos suportados
					$config['allowed_types'] = 'gif|jpg|png';
                        //Configurando atributos do arquivo imagem que iremos receber
					$config['max_size']    = 412800000;
					$config['max_width']   = 1200;
					$config['max_height']  = 1200;
					$config['file_name'] = $url.'.'.'jpg';

                        //Carregando a lib com as configurações feitas
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
						 //Fazendo o upload do arquivo e direcionando para a view de erro ou de sucesso
					if(!$this->upload->do_upload($img)){   
						rmdir('assets/files/uploads/users/'.$url);
						$this->session->set_flashdata('errorCad', '<div class="alert alert-danger">Imagem excedeu a resolução máxima (1200x1200) ou tamanho máximo (4MB).</div>');
						$this->template->load('template', 'user-register-form');  

					}else{
						$url = 'assets/files/uploads/users/'.$url.'/'.$url.'.'.'jpg';
						$userInfo = [
						'oauth_provider' => "manual",
						'first_name' => $this->input->post('userFirstName'),
						'last_name' => $this->input->post('userLastName'),
						'email' => $this->input->post('userEmail'),
						'password' => $this->input->post('entPassConf'),
						'picture_url' => $url,
						'created' => date("Y-m-d H:i:s"),
						'modified' => date("Y-m-d H:i:s"),
						'birth_date' => $this->input->post('userBirthDate'),
						'cellphone' => $this->input->post('userCellphone'),
						'status' => 1
						];
						$this->UsuariosModel->create_user($userInfo);
						$this->load->library('my_phpmailer');
						$mail = new PHPMailer();
 						$mail->IsSMTP(); //Definimos que usaremos o protocolo SMTP para envio.
					    $mail->SMTPAuth = true; //Habilitamos a autenticação do SMTP. (true ou false)
					    $mail->SMTPSecure = "ssl"; //Estabelecemos qual protocolo de segurança será usado.
					    $mail->Host = "smtp.gmail.com"; //Podemos usar o servidor do gMail para enviar.
					    $mail->Port = 465; //Estabelecemos a porta utilizada pelo servidor do gMail.
					    $mail->Username = "maosolidariaweb@gmail.com"; //Usuário do gMail
					    $mail->Password = "PeGPKq-t^8#5GXhg"; //Senha do gMail
					    $mail->SetFrom('maosolidariaweb@gmail.com', 'Mao Solidaria'); //Quem está enviando o e-mail.
					    $mail->AddReplyTo("maosolidariaweb@gmail.com","Mao Solidaria"); //Para que a resposta será enviada.
					    $mail->Subject = "Cadastro Criado!"; //Assunto do e-mail.
					    $mail->Body = '<p style="text-align: center; color: #666; font-size: 15px; font-family: avenir; font-weight: 200;"><em><img src="http://i.imgur.com/RhXFs07.png" alt="" width="283" height="49" /><br /></em></p>
							<h2 style="text-align: center; color: #666; font-size: 15px; font-family: avenir; font-weight: 200;"><strong><em>Sua conta foi criada com&nbsp;sucesso!</em></strong></h2>
							<p style="text-align: center; color: #666; font-size: 15px; font-family: avenir; font-weight: 200;"><strong></strong>Para participar dos projetos, basta escolher o seu projeto e clicar em quero participar.</p>';
					    $mail->AltBody = "Corpo em texto puro.";
					    $destino = $this->input->post('userEmail');
					    $mail->AddAddress($destino, $this->input->post('userFirstName').' '.$this->input->post('userLastName'));
					    
					    /*Também é possível adicionar anexos.*/
					    $mail->AddAttachment("images/phpmailer.gif");
					    $mail->AddAttachment("images/phpmailer_mini.gif");

					    if(!$mail->Send()) {
					    	$this->session->set_flashdata('flashMessage','ocorreu um erro durante o envio: ' . $mail->ErrorInfo);
					    	$this->template->load('template','message_form');
					    } else {
					    	$this->session->set_flashdata('flashMessage', '<div class="alert alert-success">Cadastro concluído! Agora basta se logar e participar dos projetos! ;)</div>');
					    	$this->template->load('template','message_form');
					    }
					}

				} catch (Exception $e) {
					var_dump($e->getMessage);
				}
			}
		}

	}

	public function confirm_register_event($id_obj, $id_user)
	{
		try {
			$this->UsuariosModel->participation_accept_obj($id_obj, $id_user);
			redirect('project-list/'.$this->session->userdata('id'),'refresh');
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
	}

		public function user_request_event($id_user, $id_proj, $id_obj)
	{

		if ($this->session->userdata('logged_in')) {
			$data = [
			'users_id' => $id_user,
			'objetivos_idObjetivo' => $id_obj,
			'objetivos_projetos_idProjeto' => $id_proj,
			'status_part' => 0 ];
			$this->objetivosModel->insert_user_participation($data);
			$this->session->set_flashdata('flashMessage', '<div class="alert alert-success">Solicitação de participação enviada com sucesso! Agora basta aguardar a entidade entrar em contato para mais informações! ;)</div>');
			$this->template->load('template','message_form');
		}
	}

	public function user_delete_part($id_user, $id_obj)
	{
		$this->UsuariosModel->delete_user_participation($id_user, $id_obj);
		redirect('project-list/'.$this->session->userdata('id'),'refresh');

	}

}

/* End of file usuariosController */
/* Location: ./application/controllers/usuariosController */