<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_emploie_du_temp extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('MD_emploie_du_temps');
	}
    public function load_page($name_page, $data)
    {
        $this->load->view('template/Header');
        $this->load->view('template/Navbar');
        $this->load->view('emploie_du_temps/' . $name_page, $data);
        //$this->load->view('template/Footer_stat');
        $this->load->view('template/Footer');
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
        $table = $this->MD_emploie_du_temps->selectemploie_du_temps(); 
        $data = array('table'=>$table);
        // $jsonString = json_encode($data);
        // var_dump($table);
        $this->load->view("emploie_du_temps/emploie_du_temps",$data);
        // $this->load_page("emploiedutemps",$data);
    }
	public function select()
    {
        $table = $this->MD_emploie_du_temps->selectemploie_du_temps(); 
        $data = array('table'=>$table);
        $jsonString = json_encode($data);
        $this->load->view("emploie_du_temps/emploie_du_temps",$data);
    }
    public function update()
    {
        echo "update";
		$daterdv = $this->input->post('daterdv');
		$idEvenement = $this->input->post('idEvenement');
        $daterdv = str_replace(" (heure normale d’Afrique de l’Est)", "", $daterdv);
        $this->MD_emploie_du_temps->modifemploie_du_temps($idEvenement,$daterdv);
        redirect("CT_emploie_du_temp/select");
	}
	public function insert()
    {
        echo "niditra1";
		$daterdv = $this->input->post('daterdv');
        $evenement = $this->input->post('evenement');
        $faisabilite =  $this->input->post('faisabilite');;
        $daterdv = str_replace(" (heure normale d’Afrique de l’Est)", "", $daterdv);
        $this->MD_emploie_du_temps->insertemploie_du_temps($daterdv,$evenement,$faisabilite);
	}
}
?>