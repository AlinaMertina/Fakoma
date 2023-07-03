<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CT_Gestion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("MD_Gestion");
        $this->load->library('Facturepdf');
    }

    private function viewer($page,$data){
        $v = array(
            'page'=>$page,
            'data'=>$data
        );
        $this->load->view('template/BasePage',$v);
    }

    public function input_journal(){
        $codejournal = $this->MD_Gestion->list_codejournal();
        $compte = $this->MD_Gestion->list_compte();
        $unite = $this->MD_Gestion->list_unite();
        $piece_prefix = $this->MD_Gestion->piece_prefix();
        $data = array(
            'codejournal'=>$codejournal,
            'compte'=>$compte,
            'piece_prefix'=>$piece_prefix,
            'unite'=>$unite
        );
        $this->viewer("gestion/input_journal.php",$data);
    }

    public function insert_journal(){
        $codejournal = $this->input->post('codejournal');
        $date = $this->input->post('date');
        $piecea = $this->input->post('piecea');
        $pieceb = $this->input->post('pieceb');
        $compte = $this->input->post('compte');
        $libelle = $this->input->post('libelle');
        $debit = $this->input->post('debit');
        $credit = $this->input->post('credit');
        $quantite = $this->input->post('quantite');
        $unite = $this->input->post('unite');
        $prixunitaire = $this->input->post('prixunitaire');
        $this->MD_Gestion->insert_journal_all($codejournal,$date,$piecea,$pieceb,$compte,$libelle,$quantite,$unite,$prixunitaire,$debit,$credit);
        redirect("CT_Gestion/input_journal");
    }

    public function list_journal(){
        $year = date('Y');
        if ($this->input->get('year')!==null) {
            $year = $this->input->get('year');
        }
        $month = date('m');
        if ($this->input->get('month')!==null) {
            $month = $this->input->get('month');
        }
        $codejournal = 0;
        if ($this->input->get('codejournal')!==null) {
            $codejournal = $this->input->get('codejournal');
        }
        $data = array(
            'journal'=>$this->MD_Gestion->list_journal($year,$month,$codejournal),
            'codejournal'=>$this->MD_Gestion->list_codejournal()
        );
        $this->viewer("gestion/list_journal.php",$data);
    }

    public function input_compte(){
        $data = array(
            'compte'=>$this->MD_Gestion->list_compte()
        );
        $this->viewer("gestion/input_compte.php",$data);
    }

    public function insert_compte(){
        $numero = $this->input->post('numero');
        $intitule = $this->input->post('intitule');
        $this->MD_Gestion->insert_compte($numero,$intitule);
        redirect("CT_Gestion/input_compte");
    }

    public function grand_livre(){
        $idcompte = 0;
        if ($this->input->get('idcompte')!==null) {
            $idcompte = $this->input->get('idcompte');
        }
        $data = array(
            'grandlivre'=>$this->MD_Gestion->grand_livre($idcompte),
            'compte'=>$this->MD_Gestion->list_compte()
        );
        $this->viewer("gestion/grand_livre.php",$data);
    }

    public function balance(){
        $data = array(
            'balance'=>$this->MD_Gestion->balance()
        );
        $this->viewer("gestion/balance.php",$data);
    }

    public function resultat(){
        $data = array(
            'resultat'=>$this->MD_Gestion->resultat()
        );
        $this->viewer("gestion/resultat.php",$data);
    }

    public function input_facture(){
        $client = $this->MD_Gestion->liste_client();
        $unite = $this->MD_Gestion->list_unite();
        $numero = $this->MD_Gestion->next_numero();
        $date = $this->MD_Gestion->current_date();
        $data = array(
            'client'=>$client,
            'unite'=>$unite,
            'numero'=> $this->MD_Gestion->numero_format($numero,$date),
            'date'=>$date,
            'list'=>$this->MD_Gestion->list_facture()
        );
        $this->viewer("gestion/input_facture.php",$data);
    }

    public function insert_facture(){
        $date = $this->input->post('date');
        $idclient = $this->input->post('idclient');
        $nomresp = $this->input->post('nomresp');
        $numero = $this->input->post('numero');
        $objet = $this->input->post('objet');
        $ref = $this->input->post('ref');
        $designation = $this->input->post('designation');
        $unite = $this->input->post('unite');
        $prixunitaire = $this->input->post('pu');
        $quantite = $this->input->post('nombre');
        $avance = $this->input->post('avance');
        $numero = $this->MD_Gestion->insert_facture($date,$idclient,$nomresp,$numero,$objet,$ref,$designation,$unite,$prixunitaire,$quantite,$avance);
        redirect("CT_Gestion/see_facture?id=".$numero);
    }

    public function see_facture(){
        $id = $this->input->get('id');
        $data = array(
            'facture'=>$this->MD_Gestion->see_facture($id)
        );
        $this->viewer("gestion/see_facture.php",$data);
    }

    public function export_facture() {
        $id = $this->input->get('id');
        $pdf = new Facturepdf();
        $this->MD_Gestion->export_facture($pdf,$this->MD_Gestion->see_facture($id));
        $pdf->Output();
    }

    public function input_client(){
        $data = array(
            'client'=>$this->MD_Gestion->liste_client()
        );
        $this->viewer("gestion/input_client.php",$data);
    }

    public function insert_client(){
        $nom = $this->input->post('nom');
        $adresse = $this->input->post('adresse');
        $mail = $this->input->post('mail');
        $tel = $this->input->post('tel');
        $this->MD_Gestion->insert_client($nom,$adresse,$mail,$tel);
        redirect("CT_Gestion/input_client");
    }

}
