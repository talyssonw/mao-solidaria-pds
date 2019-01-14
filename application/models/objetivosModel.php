<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class objetivosModel extends CI_Model {

	

	public function insert_data_return_id($data)
	{

    $this->db->insert('objetivos',$data);
    $last_id = $this->db->insert_id();
    return $last_id;

	}

	public function get_all()
	{
		$this->db->select('*');
		return $this->db->get('objetivos')->result();
	}

	public function get_objs_by_proj_id($id_proj)
	{
		$this->db->where('projetos_idProjeto', $id_proj);
		return $this->db->get('objetivos')->result();
	}


	public function finish_obj($id_obj)
	{
		$this->db->set('status', 1, FALSE);
		$this->db->where ('idObjetivo', $id_obj);
		$this->db->update('objetivos');
		return true;
	}

	public function unfinish_obj($id_obj)
	{
		$this->db->set('status', 0, FALSE);
		$this->db->where ('idObjetivo', $id_obj);
		$this->db->update('objetivos');
		return true;
	}

	public function edit_obj($data, $id_obj)
	{
		$this->db->where('idObjetivo', $id_obj);
        $this->db->update('objetivos', $data);
       	return true; 
	}

	public function insert_user_participation($data)
	{
		$this->db->insert('objetivos_participantes', $data);
	}


}

/* End of file objetivosModel.php *et/
/* Location: ./application/models/objetivosModel.php */