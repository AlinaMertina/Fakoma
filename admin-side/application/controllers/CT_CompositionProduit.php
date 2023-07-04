<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CT_CompositionProduit extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_Produit');
        $this->load->model('MD_CompositionProduit');
        $this->load->model('MD_MatierePremiere');
    }

    private function viewer($page,$data)
    {
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

        $this->viewer("produit/composition",$data);
    }

    public function UpdateComposition()
    {
        $matierepremieres = $this->MD_MatierePremiere->get_all_matiere_premiere();

        foreach($matierepremieres as $matierepremiere)
        {
            $data = array(
                'idproduit' => $this->input->post('idproduit'),
                'idmatierepremiere' => $matierepremiere->idmatierepremiere,
                'date_' => $this->input->post('date_')
            );
            
            $data['quantite'] = $this->input->post("C".$data['idproduit']."_".$data['idmatierepremiere']);
            
            $this->MD_CompositionProduit->NewCompositionProduit($data);
        }
        redirect('CT_CompositionProduit');
    }
}