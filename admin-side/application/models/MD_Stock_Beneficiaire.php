<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MD_Stock_Beneficiaire extends CI_Model{
//ALERTE
    public function getNote(){
        $sql="SELECT * FROM restestock as rsk join produit xt on rsk.idproduit = xt.idproduit
                                WHERE (datereste, rsk.idproduit) IN (SELECT MAX(datereste),
                                idproduit FROM restestock  GROUP BY idproduit)";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
}