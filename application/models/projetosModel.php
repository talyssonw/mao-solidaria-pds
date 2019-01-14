<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class projetosModel extends CI_Model {


	public function insert_data_return_id($data)
		{
    		$this->db->insert('projetos',$data);
    		$last_id = $this->db->insert_id();
    		return $last_id;
		}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->order_by('idProjeto', 'desc');
		return $this->db->get('projetos')->result();
	}
	public function get_projs_main_page()
		{
			$this->db->select('p.idProjeto, p.titulo, p.descricao, p.status, p.entidadesaplicacoes_idEntidade, p.urlImg,
				e.idEntidade, e.name, e.urlImg as imgproj');
			$this->db->from('projetos p');
			$this->db->join('entidades e','e.idEntidade = p.entidadesaplicacoes_idEntidade','inner');
			$this->db->order_by ('p.idProjeto', 'desc');
			$this->db->limit(3);
			return $this->db->get()->result();	
		}
	public function finish_proj($id_proj)
	{
		$this->db->set('status', 0, FALSE);
		$this->db->where ('idProjeto', $id_proj);
		$this->db->update('projetos');
	}

	public function get_proj_by_name($name)
	{	
		$this->db->select('*');	
		$this->db->like('titulo', $name);
		return $this->db->get('projetos')->result();
	}

	public function get_proj_by_entidade($id_ent)
	{

		$this->db->where('entidadesaplicacoes_idEntidade', $id_ent);
		return $this->db->get('projetos')->result();
	}

	public function get_proj_by_id($id_proj)
	{
		$this->db->where('idProjeto', $id_proj);
		return $this->db->get('projetos')->result();
	}

	public function edit_proj($data, $id_proj)
	{
		$this->db->where('idProjeto', $id_proj);
       	$this->db->update('projetos', $data);
        return true; 
	}
}

/* End of file projetosModel.php */
/* Location: ./application/models/projetosModel.php */