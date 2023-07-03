<?php

class MD_Produit extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_produits()
    {
        $query = $this->db->get('produit');
        $produits = $query->result();
        foreach($produits as $produit)
        {
            $produit->prix = $this->get_latest_prix_produit($produit->idproduit)->prix;
        }
        return $query->result();
    }

    public function get_produit_by_id($idproduit)
    {
        $query = $this->db->get_where('produit', array('idproduit' => $idproduit));
        return $query->row();
    }

    public function insert_produit($data)
    {
        $this->db->insert('produit', $data);
        return $this->db->insert_id();
    }

    public function insert_prix_produit($new_prix_produit)
    {
        $this->db->insert('prix_produit', $new_prix_produit);
    }

    public function update_produit($data)
    {
        $this->db->where('idproduit', $data['idproduit']);
        $this->db->update('produit', $data);
        var_dump($data);
    }

    public function delete_produit($idproduit)
    {
        $this->db->where('idproduit', $idproduit);
        $this->db->delete('produit');
    }

    public function get_latest_prix_produit($idproduit)
    {
        $this->db->select('*');
        $this->db->from('prix_produit');
        $this->db->where('idproduit', $idproduit);
        $this->db->order_by('date_', 'desc');
        $this->db->limit(1);
    
        $query = $this->db->get();
        $prix_produit = $query->row();
    
        if (!$prix_produit) {
            $prix_produit = new stdClass();
            $prix_produit->idproduit = $idproduit;
            $prix_produit->prix = 0;
        }
    
        return $prix_produit;
    }

}