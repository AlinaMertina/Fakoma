<?php

class MD_CompositionProduit extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function NewCompositionProduit($data)
    {
        $this->db->insert('composition', $data);
        return $this->db->insert_id();
    }

    public function get_all_composition($idproduit, $idmatierepremier)
    {  
        $query = $this->db->get_where('composition', array('idproduit' => $idproduit, 'idmatierepremiere' => $idmatierepremier));
        $composition = $query->row();
        if (!$composition) {
            $composition = new stdClass();
            $composition->idproduit = $idproduit;
            $composition->idmatierepremiere = $idmatierepremier;
            $composition->quantite = 0;
        }
        return $composition;
    }
    public function get_latest_composition($idproduit, $idmatierepremier)
    {
        $this->db->select('*');
        $this->db->from('composition');
        $this->db->where('idproduit', $idproduit);
        $this->db->where('idmatierepremiere', $idmatierepremier);
        $this->db->order_by('date_', 'desc');
        $this->db->limit(1);
    
        $query = $this->db->get();
        $composition = $query->row();
    
        if (!$composition) {
            $composition = new stdClass();
            $composition->idproduit = $idproduit;
            $composition->idmatierepremiere = $idmatierepremier;
            $composition->quantite = 0;
        }
    
        return $composition;
    }
    
    public function get_mapping_by_product_and_matierepremiere_with_composition($produits, $matierepremieres)
    {
        $mapping = array();
        foreach ($produits as $produit) 
        {
            $mapping[$produit->idproduit] = array();
            foreach ($matierepremieres as $matierepremiere)
            {
                $mapping[$produit->idproduit][$matierepremiere->idmatierepremiere] = $this->get_latest_composition($produit->idproduit, $matierepremiere->idmatierepremiere);
            }
        }
        return $mapping;
    }
}