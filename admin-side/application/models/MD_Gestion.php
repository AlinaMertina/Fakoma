<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MD_Gestion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_MatierePremiere');
    }

    public function delete_compte($idcompte)
    {
        $this->db->where('id', $idcompte);
        $this->db->delete('compte');
    }

    public function list_comptes(){
        $results = $this->db->query("select * from compte");
        return $results->result_array();
    }

    public function current_date(){
        return date('Y-m-d');
    }

    public function piece_prefix(){
        return ['FF','PC','CH',''];
    }

    public function list_codejournal(){
        $results = $this->db->query("select * from codejournal");
        return $results->result_array();
    }

    public function insert_journal($codejournal,$date,$piecea,$pieceb,$compte,$libelle,$quantite,$unite,$prixunitaire,$debit,$credit){
        $query = "insert into journal(idcodejournal,dat,piece,idcompte,libelle,quantite,idunite,prixunitaire,debit,credit) values(".$codejournal.",'".$date."','".$piecea.$pieceb."',".$compte.",'".$libelle."',".$quantite.",".$unite.",".$prixunitaire.",".$debit.",".$credit.")";
        $this->db->query($query);
        
        $matierepremiere = $this->MD_MatierePremiere->get_Matierepremiere_by_idcompte($compte);
        if($matierepremiere != null)
        {
            if($debit == 0)
            {
                $data = array(
                    'idmatierepremiere' => $matierepremiere->idmatierepremiere,
                    'dateentreematierepremiere' => $date,
                    'quantitematierepremiere' => $quantite,
                    'pumatierepremiere' => $prixunitaire
                );
                $this->MD_MatierePremiere->insert_EntrermatierePremiere($data);
            }
            else
            {
                $data = array(
                    'idmatierepremiere' => $matierepremiere->idmatierepremiere,
                    'datesortiematierepremiere' =>  $date,
                    'quantitematierepremiere' => $quantite,
                    'pumatierepremiere' => $prixunitaire
                );
                $this->MD_MatierePremiere->insert_SortiematierePremiere($data);
                redirect('CT_MatierePremiere');
            }
        }
    }

    public function insert_journal_all($codejournal,$date,$piecea,$pieceb,$compte,$libelle,$quantite,$unite,$prixunitaire,$debit,$credit){
        for ($i=0; $i < count($date); $i++) { 
            $this->insert_journal($codejournal[$i],$date[$i],$piecea[$i],$pieceb[$i],$compte[$i],$libelle[$i],$quantite[$i],$unite[$i],$prixunitaire[$i],$debit[$i],$credit[$i]);
        }
    }

    public function list_journal($year,$month,$codejournal){
        $query = "select * from v_journal where extract(month from dat)=".$month." and extract(year from dat)=".$year." and idcodejournal=".$codejournal;
        $results = $this->db->query($query);
        return $results->result_array();
    }

    public function insert_compte($numero,$intitule){
        $this->db->query("insert into compte(numero,intitule) values('".$numero."','".$intitule."')");
        return $this->db->insert_id();
    }

    public function list_compte(){
        $results = $this->db->query("select * from compte");
        return $results->result_array();
    }

    public function grand_livre($idcompte){
        $results = $this->db->query("select * from v_grand_livre_compte where idcompte=".$idcompte);
        $results =  $results->result_array();
        $result2 = $this->db->query("select * from v_grand_livre_compte_solde where idcompte=".$idcompte);
        $result2 =  $result2->row_array();
        if($result2 == null)
        {
            $result2['debit'] = 0;
            $result2['credit'] = 0;
        }
        return array(
            'liste'=>$results,
            'total'=>$result2
        );
    }

    public function balance(){
        $results = $this->db->query("select * from v_balance");
        $results =  $results->result_array();
        $result2 = $this->db->query("select * from v_total_balance");
        $result2 =  $result2->row_array();
        return array(
            'liste'=>$results,
            'total'=>$result2
        );
    }

    public function resultat(){
        $charges = $this->db->query("select * from v_charge");
        $charges =  $charges->result_array();
        $produits = $this->db->query("select * from v_produit");
        $produits =  $produits->result_array();
        $t_charges = $this->db->query("select coalesce(debit,0) as debit from v_charge_total;");
        $t_charges =  $t_charges->row_array();
        $t_produits = $this->db->query("select coalesce(credit,0) as credit from v_produit_total;");
        $t_produits =  $t_produits->row_array();
        $c = count($charges);
        $p = count($produits) ;
        if($c<$p){
            for ($i=0; $i < $p-$c; $i++) { 
                array_push($charges,array(
                    'numero'=>'',
                    'debit'=>''
                ));
            }
        } 
        else if($p<$c){
            for ($i=0; $i < $c-$p; $i++) { 
                array_push($produits,array(
                    'numero'=>'',
                    'credit'=>''
                ));
            }
        } 
        return array(
            'charges'=>$charges,
            'produits'=>$produits,
            'total'=>[$t_charges['debit'],$t_produits['credit'],$t_produits['credit']-$t_charges['debit']]
        );
    }

    public function list_unite(){
        $results = $this->db->query("select * from unite");
        return $results->result_array();
    }

    public function liste_client(){
        $results = $this->db->query("select * from client");
        return $results->result_array();
    }

    public function next_numero(){
        $results = $this->db->query("select count(id) as id from facture");
        $results = $results->row_array();
        return $results['id']+1;
    }

    public function insert_facture_journal_once($date,$numero,$designation,$unite,$prixunitaire,$quantite,$montant){
        $query = "insert into journal(idcodejournal,dat,piece,idcompte,libelle,quantite,idunite,prixunitaire,debit,credit) values(3,'".$date."','".$numero."',79,'".$designation."',".$quantite.",".$unite.",".$prixunitaire.",0,".$montant.")";
        $this->db->query($query);
    }

    public function insert_facture_journal($date,$numero,$designation,$unite,$prixunitaire,$quantite){
        $sum = 0;
        for ($i=0; $i < count($quantite); $i++) { 
            $montant = $prixunitaire[$i]*$quantite[$i];
            $this->insert_facture_journal_once($date,$numero,$designation[$i],$unite[$i],$prixunitaire[$i],$quantite[$i],$montant);
            $sum += $montant;
        }
        return $sum;
    }

    public function insert_facture_facture($date,$idclient,$nomresp,$numero,$objet,$ref,$ht,$avance){
        $ttc = ($ht*0.2)+$ht;
        $net = $ttc-$avance;
        $query = "insert into facture(idclient,nomresp,dat,numero,objet,ref,ht,ttc,avance,net) values(".$idclient.",'".$nomresp."','".$date."','".$numero."','".$objet."','".$ref."',".$ht.",".$ttc.",".$avance.",".$net.")";
        $this->db->query($query);
    }

    public function insert_facture($date,$idclient,$nomresp,$numero,$objet,$ref,$designation,$unite,$prixunitaire,$quantite,$avance){
        $sum = $this->insert_facture_journal($date,$numero,$designation,$unite,$prixunitaire,$quantite);
        $this->insert_facture_facture($date,$idclient,$nomresp,$numero,$objet,$ref,$sum,$avance);
        return $this->next_numero()-1;
    }

    public function see_facture_details($numero){
        $query = "select * from v_journal where piece='".$numero."' and idcompte=79";
        $results = $this->db->query($query);
        return $results->result_array();
    }

    public function see_facture($id){
        $query = "select * from v_facture where id=".$id;
        $result = $this->db->query($query);
        $facture = $result->row_array();
        $details = $this->see_facture_details($facture['numero']);
        return array(
            'facture'=>$facture,
            'details'=>$details
        );
    }

    public function insert_client($nom,$adresse,$mail,$tel){
        $query = "insert into client(nomclient,adresse,mail,tel) values('".$nom."','".$adresse."','".$mail."','".$tel."')";
        $this->db->query($query);
    }

    public function list_facture(){
        $result = $this->db->query("select * from facture");
        return $result->result_array();
    }

    public function export_facture($pdf,$facture){
        $pdf->AddPage();

        $pdf->Heade($facture['facture']['dat'],$facture['facture']['numero']);

        $client = array(
            'nom' => $facture['facture']['nomclient'],
            'adresse' => $facture['facture']['adresse'],
            'email' => $facture['facture']['mail'],
            'telephone' => $facture['facture']['tel']
        );
        $pdf->ClientInfo($client);

        $objet = $facture['facture']['objet'];
        $reference = $facture['facture']['ref'];
        $pdf->InformationsFacture($objet, $reference);

        $header = array('Designation', 'Unite', 'Nombre', 'Prix unitaire', 'Montant');

        $pdf->TableauProduits($header, $facture['details']);

        $pdf->TableauTotaux($facture['facture']);
 
        $montantEnLettre = (new NumberFormatter("fr",NumberFormatter::SPELLOUT))->format($facture['facture']['ttc']);
        $pdf->SommeEnLettre($montantEnLettre);

    }

    public function numero_format($numero,$date){
        $r = "".$numero;
        $i = strlen($r);
        while($i<4){
            $r = "0".$r;
            $i++;
        }
        $d = str_replace("-","/",substr($date,0,8));
        return "FAKOMA/".$d.$r;
    }

}
