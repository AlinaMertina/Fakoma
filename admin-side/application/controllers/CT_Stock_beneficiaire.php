<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_Stock_beneficiaire extends CI_Controller 
{
    private function viewer($page,$data)
    {
        $v = array(
            'page'=>$page,
            'data'=>$data
        );
        $this->load->view('template/BasePage',$v);
    }
//NIVEAU DE STOCK
    public function levelStock()	
    {
        $this->load->model('MD_Stock_Beneficiaire');
        //LAST REST STOCK
        $list =  $this->MD_Stock_Beneficiaire->getNote();
        //STOCK MINIMAL & STOCK MAXIMAL
        $max  = array(100,70,150);
        $min  = array(5,7,8);
        $maxDepasse = null;
        $minAtteinte = null;
        $alert = array();

        for ($i=0;$i<count($list) ; $i++){
            if($max[$i] < $list[$i]->quantitereste){
                $data['max'] = 'Quantite maximum dépassé';
                $maxDepasse = $data['max'];
                $alert[] = $list[$i];
            }
            if($min[$i] > $list[$i]->quantitereste){
                $data['min'] = 'Quantite minimum atteinte';
                $minAtteinte =$data['min'];
                $alert[] = $list[$i];
            }
        }
        $data['max'] = $maxDepasse;
        $data['min'] = $minAtteinte;
        $data['maxi'] = $max;
        $data['mini'] = $min;
        $data['alert'] = $alert;
        $this->viewer("stock/alerteNot",$data);
    }
}

?>