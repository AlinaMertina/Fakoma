<?php

class MD_MatierePremiere extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_matiere_premiere()
    {
        $query = $this->db->get('matiere_premiere');
        return $query->result();
    }

    public function getMatierePremiereById($idmatierepremiere)
    {
        $query = $this->db->get_where('matiere_premiere', array('idmatierepremiere' => $idproduit));
        return $query->row();
    }

    public function insert_matierePremiere($data)
    {
        $this->db->insert('matiere_premiere', $data);
        return $this->db->insert_id();
    }

    public function update_matierePremiere($data)
    {
        $this->db->where('idmatierepremiere', $data['idmatierepremiere']);
        $this->db->update('matiere_premiere', $data);
    }

    public function delete_matierePremiere($idmatierepremiere)
    {
        $this->db->where('idmatierepremiere', $idmatierepremiere);
        $this->db->delete('matiere_premiere');
    }
    public function fullDelete($idcompte)
    {
        $this->db->where('id', $idcompte);
        $this->db->delete('compte');
    }

    // --------------------------- ENTRER ET SORTIE ----------------------------
    public function insert_EntrermatierePremiere($data)
    {
        $this->db->insert('entree_matiere_premiere', $data);
        return $this->db->insert_id();
    }

    public function insert_SortiematierePremiere($data)
    {
        $this->db->insert('sortie_matiere_premiere', $data);
        return $this->db->insert_id();
    }

    // --------------------------------- RESTE ---------------------------------

    public function get_Remainingmatiere_premiere()
    {
        $this->db->select('matiere_premiere.*, COALESCE(SUM(entree_matiere_premiere.quantitematierepremiere), 0) - COALESCE(SUM(sortie_matiere_premiere.quantitematierepremiere), 0) as reste');
        $this->db->from('matiere_premiere');
        $this->db->join('entree_matiere_premiere', 'entree_matiere_premiere.idmatierepremiere = matiere_premiere.idmatierepremiere', 'left');
        $this->db->join('sortie_matiere_premiere', 'sortie_matiere_premiere.idmatierepremiere = matiere_premiere.idmatierepremiere', 'left');
        $this->db->group_by('matiere_premiere.idmatierepremiere');
        $query = $this->db->get();
        return $query->result();
    }
}