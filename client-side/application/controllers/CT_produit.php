<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_produit extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('MD_produit');
        if(!isset($_SESSION['cart'])){
            $this->MD_produit->selectproduitCreateSession();
        }
	}
    public function home(){
        $this->load->view("produits/index");
    }
    public function about(){
        $this->load->view("produits/about-us");
    }
    public function blog(){
        $this->load->view("produits/blog-left-sidebar");
    }
    public function contact(){
        $this->load->view("produits/contact");
    }
    public function cart(){
        $this->load->view("produits/cart-page");
    }
    public function deletePanier(){
        $indice = $_GET['indice'];
        if($_SESSION['cart'][$indice-1]['nombre']>0){
            $_SESSION['cart'][$indice-1]['nombre']=$_SESSION['cart'][$indice-1]['nombre']-1;
        }
        $this->load->view("produits/cart-page");
    }
    public function deleteAllPanier(){
        session_unset(); 
        $this->load->view("produits/cart-page");
    }
    public function index(){
        $table = $this->MD_produit->selectproduit(); 
        $data = array('table'=>$table);
        $this->load->view("produits/shop-list",$data);
    }


    public function addCart(){
        $indiceProduit = $_GET['id'];
        $_SESSION['cart'][$indiceProduit-1]['nombre']++;
        // var_dump($_SESSION['cart']);
        redirect("CT_produit/index"); 
    }
}
?>