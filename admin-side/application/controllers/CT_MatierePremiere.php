<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CT_MatierePremiere extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_MatierePremiere');
        $this->load->model('MD_Gestion');
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
			'matierepremieres' => $this->MD_MatierePremiere->get_all_matiere_premiere(),
		);
        $this->viewer("matierepremiere/matierepremiere.php",$data);
    }

    public function store()
    {

        /////////////////////////////////////////////////////////////
        $numero = $this->input->post('numero');     // Numero de compte gestion
        $intitule = $this->input->post('nom');      // intitule
        $idcompte = $this->MD_Gestion->insert_compte($numero,$intitule);
        /////////////////////////////////////////////////////////////

        $nouveau_matierePremiere = array(
            'nommatierepremiere' => $this->input->post('nom'),
            'idcompte' => $idcompte,
            'date_' => $this->input->post('date_'),
            'unite' => $this->input->post('unite')
        );

        $idproduit = $this->MD_MatierePremiere->insert_matierePremiere($nouveau_matierePremiere);
        redirect('CT_MatierePremiere');
    }

    public function edit($idproduit) 
    {
        $data['produit'] = $this->MD_MatierePremiere->get_produit_by_id($idproduit);
        $this->load->view('produit/edit', $data);
    }

    public function update()
    {
        $data = array(
            'idmatierepremiere' => $this->input->post('idmatierepremiere'),
            'date_' => $this->input->post('date_'),
            'unite' => $this->input->post('unite')
        );
        $this->MD_MatierePremiere->update_matierePremiere($data);
        redirect('CT_MatierePremiere');
    }

    public function fullDelete($idcompte)
    {
        $this->MD_MatierePremiere->fullDelete($idcompte);
        redirect('CT_MatierePremiere');
    }


    public function entrerMTP()
    {
        $data = array(
            'idmatierepremiere' => $this->input->post('idmatierepremiere'),
            'dateentreematierepremiere' => $this->input->post('date_'),
            'quantitematierepremiere' => $this->input->post('quantite'),
            'pumatierepremiere' => $this->input->post('pu')
        );
        $this->MD_MatierePremiere->insert_EntrermatierePremiere($data);
        redirect('CT_MatierePremiere');
    }

    public function sortieMTP()
    {
        $data = array(
            'idmatierepremiere' => $this->input->post('idmatierepremiere'),
            'datesortiematierepremiere' => $this->input->post('date_'),
            'quantitematierepremiere' => $this->input->post('quantite'),
            'pumatierepremiere' => $this->input->post('pu')
        );
        $this->MD_MatierePremiere->insert_SortiematierePremiere($data);
        redirect('CT_MatierePremiere');
    }
}