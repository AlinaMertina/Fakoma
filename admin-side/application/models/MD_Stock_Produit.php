<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MD_Stock_Produit extends CI_Model{
    // Insertion stock
    // idstockproduitfini | idproduit | dateentreestock | quantite | puenstock 
    public function insertStock($produit,$date,$quantite,$puen){
        $sql="Insert into stock_produits_finis (idproduit,dateentreestock,quantite,puenstock) values (%s,'%s',%s,%s)";
        $sql = sprintf($sql,$produit,$date,$quantite,$puen);
        $req=$this->db->query($sql);
    }

//PRODUIT
    public function listxt(){
        $sql="select * from produit";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
// INVENTAIRE
    public function listInventory(){
        $sql="select * from inventory order by  datereste desc";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
    public function selectInventory($id){
        $sql="select * from inventory where idproduit = %s order by datereste   desc";
        $sql = sprintf($sql,$this->db->escape($id));
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }

//MVT ENTREE DE STOCK
    public function getStockEntry(){
        $sql="select * from entry order by dateentreestock  desc";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
    public function getStockEntry1($id){
        $sql="select * from entry  where idproduit = %s order by dateentreestock  desc";
        $sql = sprintf($sql, $this->db->escape($id));
        $req=$this->db->query($sql);
        echo  $sql;
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
    public function getStockEntry2($id,$date){
        $sql="select * from entry  where idproduit = %s order by dateentreestock  <= %s";
        $sql = sprintf($sql, $this->db->escape($id) , $this->db->escape($date));
        $req=$this->db->query($sql);
        echo  $sql;
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
//MVT SORTIE DE STOCK
    public function getStockExit(){
        $sql="select * from exit order by datesortieproduit  desc";
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
    public function getStockExit1($id){
        $sql="select * from exit  where idproduit = %s order by datesortieproduit  desc";
        $sql = sprintf($sql, $this->db->escape($id));
        $req=$this->db->query($sql);
        $table=array();
        $i=0;
        foreach ($req->result() as $r){
            $table[$i]=$r;
            $i++;
        }
        return $table;
    }
    public function getStockExit2($id,$date){
        $sql="select * from exit  where idproduit = %s order by datesortieproduit  <= %s";
        $sql = sprintf($sql, $this->db->escape($id) , $this->db->escape($date));
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
?>