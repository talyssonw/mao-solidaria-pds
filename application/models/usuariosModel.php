<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

	public function get_all()
	{
    	$this->db->select ('*');
		return $this->db->get ('usuarios')->result();	
	}

	public function login_admin($login, $password)
	{
       $this->db->select('*');
       $this->db->where('cpf', $login);
       $this->db->where('password', $password);
       $this->db->where('tipoDeUsuario', 1);    
       return $this->db->get('usuarios')->result();
	}

	public function create_user($userInfo)
	{
		$this->db->insert('users', $userInfo);
	}

	public function login_verif($email, $password)
	{
		$this->db->select('*');
       $this->db->where('email', $email);
       $this->db->where('password', $password);
       $this->db->where('status', 1);    
       return $this->db->get('users')->result();
}
	public function get_users_request_objs($id_ent)
	{
		$this->db->distinct();
		$this->db->join('objetivos_participantes o','o.users_id = users.id','inner');
		$this->db->join('projetos p', 'p.idProjeto = o.objetivos_projetos_idProjeto','inner');
		$this->db->join('objetivos ob','ob.idObjetivo = o.objetivos_idObjetivo');
		$this->db->where('p.entidadesaplicacoes_idEntidade', $id_ent);
		$this->db->where('o.status_part', 0);
		$this->db->order_by('p.idProjeto');
		return $this->db->get('users')->result();
	}

	public function get_users_by_objs($id_ent, $id_proj)
	{
		$this->db->distinct();
		$this->db->join('objetivos_participantes o','o.users_id = users.id','inner');
		$this->db->join('projetos p', 'p.idProjeto = o.objetivos_projetos_idProjeto','inner');
		$this->db->join('objetivos ob','ob.idObjetivo = o.objetivos_idObjetivo');
		$this->db->where('o.objetivos_projetos_idProjeto', $id_proj);
		$this->db->where('o.status_part', 1);
		$this->db->order_by('p.idProjeto', $id_proj);
		return $this->db->get('users')->result();
	}

	public function get_users_by_ent($id_ent)
	{
		$this->db->distinct();
		$this->db->join('objetivos_participantes o','o.users_id = users.id','inner');
		$this->db->join('projetos p', 'p.idProjeto = o.objetivos_projetos_idProjeto','inner');
		$this->db->join('objetivos ob','ob.idObjetivo = o.objetivos_idObjetivo');
		$this->db->where('p.entidadesaplicacoes_idEntidade', $id_ent);
		$this->db->order_by('o.status_part');
		return $this->db->get('users')->result();
	}

	public function get_projs_part_by_user($id_user)
	{
		$this->db->distinct();
		$this->db->join('objetivos_participantes o','o.users_id = users.id','inner');
		$this->db->join('projetos p', 'p.idProjeto = o.objetivos_projetos_idProjeto','inner');
		$this->db->join('objetivos ob','ob.idObjetivo = o.objetivos_idObjetivo');
		$this->db->where('o.users_id', $id_user);
		return $this->db->get('users')->result();
	}

	public function return_user_id_facebook($oauth)
	{
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('oauth_uid', $oauth);
		return $this->db->get()->result();
	}

	public function participation_accept_obj($id_obj, $id_user)
	{				

		$sql = "UPDATE objetivos_participantes
				SET status_part = 1
				WHERE objetivos_idObjetivo=".$id_obj." and users_id=".$id_user."" ;
		return $this->db->query($sql);
	}

	public function delete_user_participation($id_user, $id_obj)
	{
		$this->db->where('users_id', $id_user);
		$this->db->where('objetivos_idObjetivo', $id_obj);
		$this->db->delete('objetivos_participantes');
	}
}

/* End of file usuariosModel.php */
/* Location: ./application/models/usuariosModel.php */