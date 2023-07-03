<?php 
    class MD_emploie_du_temps extends CI_Model{
        public function insertemploie_du_temps($daterdv,$evenement,$faisabilite){
            $sql="INSERT INTO emploie_du_temp(daterdv,evenement,faisabilite) VALUES ('%s','%s','%s')";
            $sql = sprintf($sql,$daterdv,$evenement,$faisabilite);
            $this->db->query($sql);
            echo("ADD SUCCESFULLY!!!");
        }
        public function modifemploie_du_temps($idEmploisDuTemps,$daterdv){
            $sql="UPDATE emploie_du_temp set daterdv = '$daterdv' WHERE idemploiedutemp = $idEmploisDuTemps";
            echo $sql;
            $this->db->query($sql);
        }
        
        public function selectemploie_du_temps(){
            $data = array();
            $sql = "select * from emploie_du_temp";
            $query = $this->db->query($sql);
            foreach($query->result_array() as $row){
                $data [] = $row;
            }
            return $data;
        }
}
?>