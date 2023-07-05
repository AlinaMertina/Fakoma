<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CT_Produit extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_Produit');
        $this->load->model('MD_MatierePremiere');
        $this->load->model('MD_CompositionProduit');
        $this->load->model('MD_Gestion');
    }

    private function viewer($page,$data){
        $v = array(
            'page'=>$page,
            'data'=>$data
        );
        $this->load->view('template/BasePage',$v);
    }

    public function index()
    {
		$data = array(
			'produits' => $this->MD_Produit->get_all_produits(),
            'matierepremieres' => $this->MD_MatierePremiere->get_all_matiere_premiere()
		);
        $data['productComposers'] = 
            $this->MD_CompositionProduit->get_mapping_by_product_and_matierepremiere_with_composition($data['produits'], $data['matierepremieres']);

        $this->viewer("produit/index",$data);
    }

    public function store()
    {
        /////////////////////////////////////////////////////////////
        $numero = $this->input->post('numero');     // Numero de compte gestion
        $intitule = $this->input->post('nom');      // intitule
        $idcompte = $this->MD_Gestion->insert_compte($numero,$intitule);
        /////////////////////////////////////////////////////////////

        $new_product = array(
            'nomproduit' => $this->input->post('nom'),
            'idcompte' => $idcompte,
            'date_' => $this->input->post('date_'),
            'unite' => $this->input->post('unite'),
            'volume_unitaire' => $this->input->post('volumeunitaire')
        );
        $idproduit = $this->MD_Produit->insert_produit($new_product);

        $new_prix_produit = array(
            'idproduit' => $idproduit,
            'date_' => $this->input->post('date_'),
            'prix' => $this->input->post('prix'),
        );
        $this->MD_Produit->insert_prix_produit($new_prix_produit);

        redirect('CT_CompositionProduit');
    }

    public function edit($idproduit) 
    {
        $data['produit'] = $this->MD_Produit->get_produit_by_id($idproduit);
        $this->load->view('produit/edit', $data);
    }

    public function update()
    {
        $data = array(
            'idproduit' => $this->input->post('idproduit'),
            'date_' => $this->input->post('date_'),
            'unite' => $this->input->post('unite'),
            'volume_unitaire' => $this->input->post('volume_unitaire')
        );
        $this->MD_Produit->update_produit($data);

        $new_prix_produit = array(
            'idproduit' => $this->input->post('idproduit'),
            'date_' => $this->input->post('date_'),
            'prix' => $this->input->post('prix'),
        );
        $this->MD_Produit->insert_prix_produit($new_prix_produit);
        redirect('CT_Produit');
    }

    public function fullDelete($idcompte)
    {
        $this->MD_Produit->fullDelete($idcompte);
        redirect('CT_Produit/index');
    }
}