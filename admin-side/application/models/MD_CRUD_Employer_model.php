<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MD_CRUD_Employer_model extends CI_Model
{
    public function select_post()
    {
        $requete = "select idposte,nom_poste from poste";
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function get_idemployee_last_insert()
    {
        $requete = "select idemployer from employer order by date_entrer";
        $query = $this->db->query($requete);
        return $query->result_array()[0]['idemployer'];
    }
    public function insert_employer($nom, $prenom, $idposte, $dateE, $contact, $salaire, $dtn)
    {
        $identifiantemp = $this->numero_employer();
        $requete = "insert into employer (nom_employer,prenom_employer,idposte,date_entrer,contact,dtn,identifiant) values ('%s','%s',%d,'%s','%s','%s','%s')";
        $requete = sprintf($requete, $nom, $prenom, $idposte, $dateE, $contact, $dtn, $identifiantemp);
        $query = $this->db->query($requete);

        $this->insert_salaire($identifiantemp, $salaire, $dateE);
        return $identifiantemp;
    }
    public function insert_salaire($idemploye, $montant, $dateE)
    {
        $requete = "insert into salaire_employer(identifiant,montant,datedebut) values ('%s',%.2f,'%s')";
        $requete = sprintf($requete, $idemploye, $montant, $dateE);
        $query = $this->db->query($requete);
    }
    public function show_details_employee($idemploye)
    {
        $requete = "select * from v_detailes_base_employee where  identifiant ='%s' ";
        $requete = sprintf($requete, $idemploye);
        $query = $this->db->query($requete);
        return $query->result_array()[0];
    }
    public function select_all_emp()
    {
        $requete = "select * from employer";
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function idemployer($identifiant)
    {
        $requete = "select idemployer from employer where identifiant='%s'";
        $requete = sprintf($requete, $identifiant);
        $query = $this->db->query($requete);
        return $query->result_array()[0]['idemployer'];
    }
    public function modif_base_detail($nom, $prenom, $idposte, $dateE, $contact, $idemploye, $dtn, $salaire)
    {
        $requete = "update employer set nom_employer='%s',prenom_employer='%s',idposte=%d,date_entrer='%s',contact='%s',dtn='%s'  where identifiant='%s' ";
        $requete = sprintf($requete, $nom, $prenom, $idposte, $dateE, $contact, $dtn, $idemploye);
        $query = $this->db->query($requete);
        $this->modif_salaire('', $salaire, $idemploye);
    }
    public function modif_salaire($date_modif, $montant, $identifiant)
    {
        if (strcmp($date_modif, '') == 0) {
            $date_modif = new DateTime();
            $date_modif = $date_modif->format('Y-m-d');
        }
        $requete = "update salaire_employer set datefin='%s' where identifiant='%s' and datefin is null";
        $requete = sprintf($requete, $date_modif, $identifiant);
        $query = $this->db->query($requete);
        $this->insert_salaire($identifiant, $montant, $date_modif);
    }
    public function delete_employee($idemployee)
    {
        $requete = "update salaire_employer set datefin=now() where identifiant='%s' and datefin is null";
        $requete = sprintf($requete, $idemployee);
        $query = $this->db->query($requete);
    }
    public function set_emplois_du_temps($idemploye, $departement, $lundie, $mardie, $mercredie, $jeudie, $vendre, $samedie, $dimanche, $datedebut)
    {
        $requete = "insert into employe_du_temps(idemployer,iddepartement,lundie,mardie,mercredie,jeudie,vendredi,samedi,dimance,datedebut)values (%d,%d,%d,%d,%d,%d,%d,%d,%d)";
        $requete = sprintf($requete, $idemploye, $departement, $lundie, $mardie, $mercredie, $jeudie, $vendre, $samedie, $dimanche, $datedebut);
        $query = $this->db->query($requete);
    }
    public function modif_emplois_du_temps($idemploye, $departement, $lundie, $mardie, $mercredie, $jeudie, $vendre, $samedie, $dimanche, $datedebut)
    {
        $requete = "update employe_du_temps set datefin='%s' where idemployer=%d";
        $requete = sprintf($requete, $datedebut, $idemploye);
        $query = $this->db->query($requete);
        $this->set_emplois_du_temps($idemploye, $departement, $lundie, $mardie, $mercredie, $jeudie, $vendre, $samedie, $dimanche, $datedebut);
    }
    public function select_emplois_du_temps($idemploye)
    {
        $requete = "select lundie,mardie,mercredie,jeudie,vendredi,samedi,dimance,datedebut from employe_du_temps where idemployer=%d ";
        $requete = sprintf($requete, $idemploye);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function insert_post($poste)
    {
        $requete = "insert into poste(nom_poste) values ('%s')";
        $requete = sprintf($requete, $poste);
        $query = $this->db->query($requete);
    }
    public function id_poste_last()
    {
        $requete = "select idposte from poste order by idposte desc";
        $query = $this->db->query($requete);
        return $query->result_array()[0]['idposte'];
    }
    public function insert_emplois_du_temps_poste($idsemaine, $idposte, $T_debut, $T_fin, $P_debut, $P_fin)
    {
        $requete = "insert into post_emplois_dutemps(idsemaine,idposte,T_debut,T_fin,P_debut,P_fin,date_insertion) values (%d,%d,'%s','%s','%s','%s',now())";
        $requete = sprintf($requete, $idsemaine, $idposte, $T_debut, $T_fin, $P_debut, $P_fin);
        $query = $this->db->query($requete);
    }
    public function liste_post()
    {
        $requete = "select idposte,nomposte from poste";
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function laste_insertion_emplois_du_temps_poste($idpost)
    {
        $requete = "select date_insertion from post_emplois_dutemps where idposte=%d order by date_insertion desc";
        $requete = sprintf($requete, $idpost);
        $query = $this->db->query($requete);
        return $query->result_array()[0]['date_insertion'];
    }
    public function get_emplois_du_temps_post($idpost)
    {
        $date = $this->laste_insertion_emplois_du_temps_poste($idpost);
        $requete = "select * from v_emplois_du_temps_poste where idposte=%d and date_insertion='%s'";
        $requete = sprintf($requete, $idpost, $date);
        $query = $this->db->query($requete);
        return $query->result_array();
    }

    public function insert_emplois_du_temps_employer($idsemaine, $idemployer, $T_debut, $T_fin, $P_debut, $P_fin)
    {
        $requete = "insert into employer_emplois_dutemps(idsemaine,identifiant,T_debut,T_fin,P_debut,P_fin,date_insertion,date_modif) values (%d,'%s','%s','%s','%s','%s',now(),null)";
        $requete = sprintf($requete, $idsemaine, $idemployer, $T_debut, $T_fin, $P_debut, $P_fin);
        $query = $this->db->query($requete);
    }

    public function new_emplois_du_temps_employer($idemploye, $idsemaine)
    {
        $requete = "update employer_emplois_dutemps set date_modif=now() where (identifiant='%s' and idsemaine=%d) and (date_modif is null )";
        $requete = sprintf($requete, $idemploye, $idsemaine);
        $query = $this->db->query($requete);
    }

    public function modif_emplois_du_temps_employer($idsemaine, $idemploye, $T_debut, $T_fin, $P_debut, $P_fin)
    {
        $this->new_emplois_du_temps_employer($idemploye, $idsemaine);
        $this->insert_emplois_du_temps_employer($idsemaine, $idemploye, $T_debut, $T_fin, $P_debut, $P_fin);
    }

    public function laste_insertion_emplois_du_temps_employer($idemployer)
    {
        $requete = "select date_insertion from employer_emplois_dutemps where identifiant='%s' order by date_insertion desc";
        $requete = sprintf($requete, $idemployer);
        $query = $this->db->query($requete);
        $tabe = $query->result_array();
        if (count($tabe) > 0) {
            return $query->result_array()[0]['date_insertion'];
        } else {
            return '2023-06-01';
        }
    }
    public function get_emplois_du_temps_employer($idemployer)
    {
        $date = $this->laste_insertion_emplois_du_temps_employer($idemployer);
        $requete = "select * from v_emplois_du_temps_employer where identifiant='%s' and date_insertion='%s' and date_modif is null";
        $requete = sprintf($requete, $idemployer, $date);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function select_idemployer()
    {
        $requete = "select idemployer from employer";
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function recherche_employer_present($date)
    {
        $resulta = array();
        $employer = $this->select_idemployer();
        $a = 0;
        for ($i = 0; $i < count($employer); $i++) {
            $dernier_date = $this->laste_insertion_emplois_du_temps_employer($employer[$i]['idemployer']);
            $requete = "select * from v_emplois_du_temps_employer where date_insertion ='%s' and idsemaine=(SELECT EXTRACT(ISODOW FROM '%s'::date) AS jour_semaine_chiffre) and T_debut!='00:00:00'";
            $requete = sprintf($requete, $dernier_date, $date);
            $query = $this->db->query($requete);
            $tabe = $query->result_array();
            if (count($tabe) > 0) {
                $resulta[$a] = $tabe[0];
                $a++;
            }
        }
        return $resulta;
    }
    public function moyenne_salaire_poste()
    {
        $requete = "select idposte,nom_poste,AVG(montant) from v_detailes_base_employee group by idposte,nom_poste";
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function productiviter_employer($date)
    {
        $requete = "SELECT nom_semain, COUNT(idemployer)FROM v_emplois_du_temps_employer WHERE '%s' BETWEEN date_insertion AND  CASE WHEN date_modif IS NULL THEN '%s' ELSE date_modif END AND T_debut != '00:00:00' GROUP BY nom_semain,idsemaine order by idsemaine";
        $requete = sprintf($requete, $date, $date);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function liste_employe_present($date, $nomsemain)
    {
        $requete = "SELECT distinct(nom_employer),nom_semain,prenom_employer,T_debut,T_fin,P_debut,P_fin FROM v_emplois_du_temps_employer WHERE '%s' BETWEEN date_insertion AND  CASE WHEN date_modif IS NULL THEN '%s' ELSE date_modif END AND T_debut != '00:00:00' and  nom_semain='%s'";
        $requete = sprintf($requete, $date, $date, $nomsemain);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function get_sequence()
    {
        $requete = "SELECT NEXTVAL('emp')";
        $query = $this->db->query($requete);
        $query = $this->db->query($requete);
        return $query->result_array()[0]['nextval'];
    }
    public function numero_employer()
    {
        $string = 'EMP00000';
        $sequence = $this->get_sequence();
        $a = 7;
        for ($i = strlen($sequence) - 1; $i > -1; $i--) {
            $string[$a] = $sequence[$i];
            $a = $a - 1;
        }
        return $string;
    }
    public function get_evolution_salaire($idemploye)
    {
        $requete = "select montant,datedebut from salaire_employer where identifiant='%s' ";
        $requete = sprintf($requete, $idemploye);

        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function insert_absence_employer($identificationemp, $date)
    {
        if (strcmp($date, '') == 0) {
            $date = new DateTime();
            $date = $date->format('Y-m-d');
        }
        $requete = "insert into absence(identifiant,dateabsence) values ('%s','%s')";
        $requete = sprintf($requete, $identificationemp, $date);
        $query = $this->db->query($requete);
    }
    public function get_nbr_absence_emp($idemploye)
    {
        $requete = "SELECT DATE_TRUNC('month', dateabsence) AS mois, COUNT(identifiant) AS total FROM absence where identifiant='%s' GROUP BY mois ORDER BY mois";
        $requete = sprintf($requete, $idemploye);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function setAvertisement($identifiant, $description, $date)
    {
        $requete = "insert into  Avertisement_employer(description,identifiant,dateavertisement) values ('%s','%s','%s')";
        $requete = sprintf($requete, $description, $identifiant, $date);
        $query = $this->db->query($requete);
    }
    public function getfautemployer($identifiant)
    {
        $requete = "select idavertisment,prenom_employer,description,Avertisement_employer.identifiant,dateavertisement,nom_poste from  Avertisement_employer join employer  on Avertisement_employer.identifiant= employer.identifiant join poste on poste.idposte =employer.idposte  where description like '%s%s%s'";
        $requete = sprintf($requete, '%', $identifiant, '%');
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function detailleemp($idemploye)
    {
        $requete = " select * from v_detailleemp where idemployer='%s' order by dateavertisement desc limit 1";
        $requete = sprintf($requete, $idemploye);
        $query = $this->db->query($requete);
        return $query->result_array()[0];
    }
    public function listefaute($idemployer)
    {
        $requete = "select description,dateavertisement from Avertisement_employer where identifiant='%s'";
        $requete = sprintf($requete, $idemployer);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function getResultaRecherche($mot)
    {
        $requete = "select * from employer where LOWER(nom_employer) like LOWER('%s%s%s') or LOWER(prenom_employer) like LOWER('%s%s%s')";
        $requete = sprintf($requete, '%', strtolower($mot), '%', '%', strtolower($mot), '%');
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function insertTache($identifiant, $description, $datetime)
    {
        $requete = "insert into TacheSpecifique_emp(identifiant,description,date) values ('%s','%s','%s')";
        $requete = sprintf($requete, $identifiant, $description, $datetime);
        $query = $this->db->query($requete);
    }

    public function selecttache($idemployer)
    {
        $requete = "select * from TacheSpecifique_emp where identifiant='%s' limit 10";
        $requete = sprintf($requete, $idemployer);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function selectTacheWhere($idemployer, $date)
    {
        $requete = "select * from TacheSpecifique_emp where identifiant='%s' and date='%s'";
        $requete = sprintf($requete, $idemployer, $date);
        $query = $this->db->query($requete);
        return $query->result_array();
    }
    public function presence_emp($idemployer, $date)
    {
        $requete = "select identifiant,T_debut,T_fin,P_debut,P_fin,nom_semain from employer_emplois_dutemps join semaine on employer_emplois_dutemps.idsemaine=semaine.idsemaine  where identifiant='%s' and semaine.idsemaine=(SELECT EXTRACT(DOW FROM '%s'::date ) AS jour_semaine)  and t_debut!='00:00:00' and date_modif is null";
        $requete = sprintf($requete, $idemployer, $date);
        $query = $this->db->query($requete);
        if (count($query->result_array()) > 0) {
            return $query->result_array()[0];
        }
        return array();
    }
}
