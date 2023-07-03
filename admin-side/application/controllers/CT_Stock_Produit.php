<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_Stock_Produit extends CI_Controller 
{

    private function viewer($page,$data)
    {
        $v = array(
            'page'=>$page,
            'data'=>$data
        );
        $this->load->view('template/BasePage',$v);
    }

//INVENTAIRE
    public function inventory()	{
        //get xt
        $this->load->model('MD_Stock_Produit');
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;
        //Invent
        $list =  $this->MD_Stock_Produit->listInventory();
        $data['inventory'] = $list;

        $this->viewer("stock/stock",$data);
    }
    //SELECT1
    public function inventory1(){
       
        //get xt
        $this->load->model('MD_Stock_Produit');
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;
        //Invent
        $id = $_GET['xt'] ;
        $list =  $this->MD_Stock_Produit->selectInventory($id);
        $data['inventory'] = $list;

        $this->viewer("stock/stock",$data);
    }
//MOUVEMENT DE STOCK ** ENTREE
    public function StockEntry(){
        //get xt
        $this->load->model('MD_Stock_Produit');
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;
        $this->load->model('MD_Stock_Produit');
        //Invent
        $list =  $this->MD_Stock_Produit->getStockEntry();
        $data['entry'] = $list;

        $this->viewer("stock/insertStock",$data);
    }

    //ENTREE1
    public function StockEntry1(){
        $produit =$_POST['xt'];
        $date = $_POST['dateXT'];
        $nombre =$_POST['nbr'];
        $prix = $_POST['prix'];
        //get xt
        $this->load->model('MD_Stock_Produit');
        $this->MD_Stock_Produit->insertStock($produit,$date,$nombre,$prix);
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;
        //entry
        $id = $_GET['xt'] ; $date = $_GET['dateXT'] ;
        if($date==null){
            $list =  $this->MD_Stock_Produit->getStockEntry1($id);
            $data['entry'] = $list;
        }else{
            $list =  $this->MD_Stock_Produit->getStockEntry2($id,$date);
            $data['entry'] = $list;
        }

        $this->viewer("stock/insertStock",$data);
    }
//MOUVEMENT DE STOCK **SORTIE
    public function StockEXIT(){
        //get xt
        $this->load->model('MD_Stock_Produit');
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;

        //exit
        $list =  $this->MD_Stock_Produit->getStockExit();
        $data['exit'] = $list;


        $this->viewer("stock/exitStock",$data);
    }
    //SORTIE1
    public function StockEXIT1(){
        //get xt
        $this->load->model('MD_Stock_Produit');
        $xt =  $this->MD_Stock_Produit->listxt();
        $data['xt'] = $xt;

        //exit
        $id = $_GET['xt'] ; $date = $_GET['dateXT'] ;
        if($date == null){
            $list =  $this->MD_Stock_Produit->getStockExit1($id);
            $data['exit'] = $list;
        }else{
            $list =  $this->MD_Stock_Produit->getStockExit2($id,$date);
            $data['exit'] = $list;
        }
        
        $this->viewer("stock/exitStock",$data);
    }
}

?>
