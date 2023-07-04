<?php 
    class MD_produit extends CI_Model{
        public function selectproduit(){
            $data = array();
            $sql = "select * from prixetproduit";
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $data [] = $row;
            }
            return $data;
        }
        public function selectproduitCreateSession(){
            $data = array();
            $sql = "select * from prixetproduit";
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $data[$row['idproduit']-1]['idProduit'] = $row['idproduit'];
                $data[$row['idproduit']-1]['nomProduit'] = $row['nomproduit'];
                $data[$row['idproduit']-1]['decriProduit']= $row['descriptionproduit'];
                $data[$row['idproduit']-1]['prix']= $row['prix'];
                $data[$row['idproduit']-1]['nombre'] = 0;
            }
            $_SESSION['cart'] = $data;
        }

        public function selectProduitbyId($id){
            $data = array();
            $sql = "select * from produit by idproduit in ".$id;
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $data [] = $row;
            }
            return $data;
        }
        public function split($string){
            $delimiter = " - ";
            $result = explode($delimiter, $string);
            return $result;
        }
 
}
?>