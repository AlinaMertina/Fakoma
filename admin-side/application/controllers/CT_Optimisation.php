<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CT_Optimisation extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_Produit');
        $this->load->model('MD_MatierePremiere');
        $this->load->model('MD_Optimisation');
        $this->load->model('MD_Matrix');
        $this->load->model('MD_CompositionProduit');
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
        $produits = $this->MD_Produit->get_all_produits();

		$data = array(
			'Remainingmatierepremieres' => $this->MD_MatierePremiere->get_Remainingmatiere_premiere()
		);

        $data['produits'] = $this->MD_Matrix->GetOptimizedProduction($data['Remainingmatierepremieres'], $produits);

        $productComposers = $this->MD_CompositionProduit->get_mapping_by_product_and_matierepremiere_with_composition($data['produits'], $data['Remainingmatierepremieres']);
        
        $data['restes'] = $this->MD_Matrix->GetTemporaryRemainingmatierepremieres($data['Remainingmatierepremieres'], $data['produits'], $productComposers);

        $this->viewer("optimisation/optimisation.php",$data);
    }

    public function VariedData()
    {
        $produits = $this->MD_Produit->get_all_produits();

		$data = array(
			'Remainingmatierepremieres' => $this->MD_MatierePremiere->get_Remainingmatiere_premiere()
		);

        // Modifier les données : RESTE DES MATIERES PREMIERES
        $this->UpdateRemainingmatierepremieres($data['Remainingmatierepremieres']);
        // Modifier les données : RESTE DES MATIERES PREMIERES

        $data['produits'] = $this->MD_Matrix->GetOptimizedProduction($data['Remainingmatierepremieres'], $produits);

        $productComposers = $this->MD_CompositionProduit->get_mapping_by_product_and_matierepremiere_with_composition($data['produits'], $data['Remainingmatierepremieres']);
        
        $data['restes'] = $this->MD_Matrix->GetTemporaryRemainingmatierepremieres($data['Remainingmatierepremieres'], $data['produits'], $productComposers);

        $this->viewer("optimisation/optimisation.php",$data);
    }

    public function UpdateRemainingmatierepremieres($Remainingmatierepremieres)
    {
        foreach($Remainingmatierepremieres as $Remainingmatierepremiere)
        {
            $Remainingmatierepremiere->reste += floatval($this->input->post($Remainingmatierepremiere->idmatierepremiere)); 
        }
    }

    // ------------------  LE RESTE DE MATIERE PREMIERE APRES LA PRODUCTION ------------------
}