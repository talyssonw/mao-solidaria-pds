<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EntidadeModel extends CI_Model {
        
        public $tp = "entidades";

	public function insert_app_entidade($data)
	{      
        //$this->load->database();
        $this->db->insert ('entidades', $data);         		
    }

    public function login_verif($email, $password)
    {
       $this->db->select('*');
       $this->db->where('email', $email);
       $this->db->where('password', $password);
       $this->db->where('status', 2);    
       return $this->db->get('entidades')->result();
    }

    public function count_proj_by_id($idEntidade)
    {   
     // Produces an integer, like 25
    $this->db->where('entidadesaplicacoes_idEntidade', $idEntidade);
    $this->db->from('projetos');
    return $this->db->count_all_results(); 
    }

    public function pass_verif($password)
    {
        $this->db->select('idEntidade');
        $this->db->where('password', $password);
        return $this->db->get('entidades')->result();
       
    }

    public function update_image($idEnt, $img_path)
    {
        $this->db->where('idEntidade', $idEnt);
        $this->db->update('entidades', $img_path);
        return true;
    }

    public function pass_update($idEnt, $password)
    {
        $this->db->where('idEntidade', $idEnt);
        $this->db->update('entidades', $password);
        return true;
    }

    public function verif_entidade_by_cnpj($cnpj)
    {
        $this->db->select('*');
        $this->db->where('cnpj', $cnpj);
        $this->db->where('status', 2);
        return $this->db->get('entidades')->result();
    }

    public function update_profile($data, $id_ent)
    {
       $this->db->where('idEntidade', $id_ent);
       $this->db->update('entidades', $data);
       return true; 
    }

    public function get_ent_by_id($id_ent)
    {
        $this->db->select('*');
        $this->db->where('idEntidade', $id_ent);
        return $this->db->get('entidades')->result();    
    }

    public function entApprove($id_ent)
    {
    	$this->db->set('status', 2, FALSE);
		$this->db->where ('idEntidade', $id_ent);
		$this->db->update('entidades');
    }

    public function entReject($id_ent)
    {
    	$this->db->set('status', 0, FALSE);
		$this->db->where ('idEntidade', $id_ent);
		$this->db->update('entidades');
    }

    public function get_all()
    {
    	$this->db->select ('*');
		return $this->db->get ('entidades')->result();	
    }
    public function get_ent_name_by_id($id_ent)
    {
        $this->db->select('name');
        $this->db->where('idEntidade', $id_ent);
        return $this->db->get('entidades')->result();
    }
 	
}