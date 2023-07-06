<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CT_CRUD_Employer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('MD_CRUD_Employer_model', 'employer');
    }
    //fonction uplaod
    public function upload_file($nomfileform, $nouvnom)
    {
        $config['upload_path'] = './assets/imageemp/';
        //$config['upload_path'] =  "/srv/http/FakoMa/admin-side/imageemp"; // Chemin de destination des fichiers téléchargés
        $config['allowed_types'] = 'gif|jpg|png'; // Types de fichiers autorisés
        $config['max_size'] = 2048; // Taille maximale du fichier en kilo-octets (2 Mo dans cet exemple)
        $config['file_name'] = $nouvnom . '.jpg';
        $config['overwrite'] = TRUE;  //ecrase le fichier si il existe
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($nomfileform)) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            $data = $this->upload->data();
            // echo "Le fichier a été téléchargé avec succès !";
        }
    }

    public function load_without_data($name_page)
    {
        $this->load->view('template/Header');
        $this->load->view('template/Navbar');
        $this->load->view('employee/' . $name_page);
        //$this->load->view('template/Footer_stat');
        $this->load->view('template/Footer');
    }
    public function load_page($name_page, $data)
    {
        $this->load->view('template/Header');
        $this->load->view('template/Navbar');
        $this->load->view('employee/' . $name_page, $data);
        // $this->load->view('template/Footer_stat');
        $this->load->view('template/Footer');
    }
    public function getAll_emp()
    {
        $data = array();
        if (isset($_POST['mot'])) {
            $data['emp'] = $this->employer->getResultaRecherche($_POST['mot']);
        } else {
            $data['emp'] = $this->employer->select_all_emp();
        }
        $this->load_page("Employee", $data);
    }
    public function insert_employer()
    {
        if (isset($_POST['nom_employer'])) {
            $idemployer = $this->employer->insert_employer($_POST['nom_employer'], $_POST['prenom_employer'], $_POST['idposte'], $_POST['dateE'], $_POST['contact'], $_POST['salaire'], $_POST['dtn']);
            $this->upload_file("photo", $idemployer);
            $this->emplois_du_temps_employer($_POST['idposte'], $idemployer);
        }
        //view
    }
    public function detaille_empoyer()
    {
        if (isset($_POST['idemployer'])) {
            $data['detaile_employer'] = $this->employer->show_details_employee($_POST['idemployer']);
            //view
        }
    }
    public function updateemployer($idemployer)
    { #identifiant
        $data = array();
        $data['info'] = $this->employer->show_details_employee($idemployer);
        $data['poste'] = $this->employer->liste_post();
        $this->load_page('Updateemp', $data);
    }
    public function setUpload()
    {
        if ($_POST['nom_employer']) {
            if (!($_FILES['photo']['error'] === UPLOAD_ERR_NO_FILE)) {
                $this->upload_file("photo", $_POST['identifiant']);
            }
            $this->employer->modif_base_detail($_POST['nom_employer'], $_POST['prenom_employer'], $_POST['idposte'], $_POST['dateE'], $_POST['contact'], $_POST['identifiant'], $_POST['dtn'], $_POST['salaire']);
            $this->modif_emplois_du_temp_emp($_POST['identifiant']);
        }
    }

    public function remove_employer($idemployer)
    {
        if ($idemployer != null) {
            $this->employer->delete_employee($idemployer);
            $this->detaille($idemployer);
            return;
        }
    }
    //insert poste
    public function page_insert()
    {
        $this->load->view('header/Header');
        //$this->load->view('header/Navbar');
        $this->load->view('employee/Poste');
        //$this->load->view('header/Footer_stat');
        //$this->load->view('header/Footer');
    }
    //fin 
    public function insert_post()
    {
        if (isset($_POST['nom_poste'])) {
            $this->employer->insert_post($_POST['nom_poste']);
            $num_post = $this->employer->id_poste_last();
            $num = 1;
            for ($i = 0; $i < count($_POST['T_debut']); $i++) {
                $this->employer->insert_emplois_du_temps_poste($num, $num_post, $_POST['T_debut'][$i], $_POST['T_fin'][$i], $_POST['P_debut'][$i], $_POST['P_fin'][$i]);
                $num = $num + 1;
            }
        }
        redirect('CT_CRUD_Employer/load_without_data/Poste');
    }
    public function liste_post()
    {
        $data['poste'] = $this->employer->liste_post();
        $this->load_page('Liste_poste', $data);
    }

    public function modif_emplois_du_temps_post()
    {
        if (isset($_GET['idpost'])) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_post($_GET['idpost']);
            $this->load_page('Emplois_du_temps_post', $data);
        }
    }
    public function new_emplois_du_temps_Post()
    {
        if (isset($_POST['idpost'])) {
            $num = 1;
            for ($i = 0; $i < count($_POST['T_debut']); $i++) {
                $this->employer->insert_emplois_du_temps_poste($num, $_POST['idpost'], $_POST['T_debut'][$i], $_POST['T_fin'][$i], $_POST['P_debut'][$i], $_POST['P_fin'][$i]);
                $num = $num + 1;
            }
        }
    }
    public function emplois_du_temps_employer($idposte, $idemployer)
    {
        if ($idposte != null) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['idemployer'] = $idemployer;
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_post($idposte);
            $this->load_page('Insert_emplois_du_temps_employer', $data);
        } else if (isset($_GET['idemployer'])) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['idemployer'] = $_GET['idemployer'];
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_post($_GET['idpost']);
            $this->load_page('Insert_emplois_du_temps_employer', $data);
        }
    }
    public function insert_emplois_du_temps_emp()
    {

        if (isset($_POST['idemployer'])) {

            $num = 1;
            for ($i = 0; $i < count($_POST['T_debut']); $i++) {
                $this->employer->insert_emplois_du_temps_employer($num, $_POST['idemployer'], $_POST['T_debut'][$i], $_POST['T_fin'][$i], $_POST['P_debut'][$i], $_POST['P_fin'][$i]);
                $num = $num + 1;
            }
        }
        redirect("CT_CRUD_Employer/getAll_emp");
    }
    public function modif_emplois_du_temp_emp($idemploye)
    {
        if ($idemploye != null) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_employer($idemploye);
            $data['idemployer'] = $idemploye;
            $this->load_page('Modif_emplois_du_temp_emp', $data);
            return;
        }
        if (isset($_GET['idemployer'])) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_employer($_GET['idemployer']);
            $data['idemployer'] = $_GET['idemployer'];
            $this->load_page('Modif_emplois_du_temp_emp', $data);
        }
    }
    public function readEmploisdutemps($idemploye)
    {
        if ($idemploye != null) {
            $data['semaine'] = ['lundi', 'Mardie', 'Mercredie', 'Jeudie', 'Vendredie', 'Samedie', 'Dimanche'];
            $data['emplois_du_temps'] = $this->employer->get_emplois_du_temps_employer($idemploye);
            $data['idemployer'] = $idemploye;
            $this->load_page('ReadEmploisdutemps', $data);
            return;
        }
    }

    public function insert_modification_emplois_emp()
    {
        if (isset($_POST['idemployer'])) {
            $num = 1;
            for ($i = 0; $i < count($_POST['T_debut']); $i++) {
                $this->employer->modif_emplois_du_temps_employer($num, $_POST['idemployer'], $_POST['T_debut'][$i], $_POST['T_fin'][$i], $_POST['P_debut'][$i], $_POST['P_fin'][$i]);
                $num = $num + 1;
            }
        }
        redirect("CT_CRUD_Employer/getAll_emp");
    }
    public function recher_employer()
    {
        if (isset($_GET['date'])) {
            $data['emplois_du_temps'] = $this->employer->recherche_employer_present($_GET['date']);
            $this->load_page('Presence', $data);
        }
    }
    public function moyenne_salaire_poste()
    {
        $moyennes = $this->employer->moyenne_salaire_poste();
        $data['label'] = '[0';
        $data['salaire'] = '[0';
        foreach ($moyennes as $moyenne) {
            $data['label'] = $data['label'] . ",'" . $moyenne['nom_poste'] . "'";
            $data['salaire'] = $data['salaire'] . ',' . $moyenne['avg'];
        }
        $data['label'] = $data['label'] . "]";
        $data['salaire'] = $data['salaire'] . "]";
        $this->load_page('Salaire_Moyenne', $data);
    }
    public function nombre_presence()
    {
        if (isset($_GET['date'])) {
            $nombre = $this->employer->productiviter_employer($_GET['date']);
            $data['date'] = "'" . $_GET['date'] . "'";
            $data['label'] = '[0';
            $data['nombre'] = '[0';
            foreach ($nombre as $nbr) {
                $data['label'] = $data['label'] . ",'" . $nbr['nom_semain'] . "'";
                $data['nombre'] = $data['nombre'] . ',' . $nbr['count'];
            }
            $data['label'] = $data['label'] . "]";
            $data['nombre'] = $data['nombre'] . "]";
            $this->load_page('Nombre_presence', $data);
        }
    }
    public function liste_employe_present()
    {
        if (isset($_GET['date'])) {
            $data['liste'] = $this->employer->liste_employe_present($_GET['date'], $_GET['nomsemaine']);
            $this->load_page('Liste_emp_present', $data);
        }
    }
    public function liste_employer_ajax()
    {
        if (isset($_GET['date'])) {
            $data['liste'] = $this->employer->liste_employe_present($_GET['date'], $_GET['nomsemaine']);
            echo json_encode($data['liste']);
        }
    }
    public function liste_emp_ajax()
    {
        echo json_encode($this->employer->select_all_emp());
    }
    public function insert_modif_salaire_employer()
    {
        if (isset($_POST['date'])) {
            echo $_POST['date'];
            $this->employer->modif_salaire($_POST['date'], $_POST['salaire'], $_POST['identemp']);
        }
        $this->load_without_data('Modif_salaire_emp');
    }
    public function evolution_salaire_emp($idemployer)
    {
        if ($idemployer != null) {
            $nombre = $this->employer->get_evolution_salaire($idemployer);
            $data['idemployer'] = $idemployer;
            $data['label'] = '[0';
            $data['salaire'] = '[0';
            foreach ($nombre as $nbr) {
                $data['label'] = $data['label'] . ",'" . $nbr['datedebut'] . "'";
                $data['salaire'] = $data['salaire'] . ',' . $nbr['montant'];
            }
            $data['label'] = $data['label'] . "]";
            $data['salaire'] = $data['salaire'] . "]";
            $this->load_page('Evolution_salaire', $data);
        }
    }
    public function setabsenceemp($idemployer)
    {
        if ($idemployer != null) {
            $data = array();
            $data['idemployer'] = $idemployer;
            $this->load_page('Absence_emp', $data);
        }
    }
    public function insert_absence_emp()
    {
        if (isset($_POST['date'])) {
            $this->employer->insert_absence_employer($_POST['identemp'], $_POST['date']);
            $this->chart_nbr_absence_emp($_POST['identemp']);
        }
    }
    public function chart_nbr_absence_emp($idemployer)
    {
        if ($idemployer) {
            $nombre = $this->employer->get_nbr_absence_emp($idemployer);
            $data['idemployer'] = $idemployer;
            $data['label'] = '[0';
            $data['salaire'] = '[0';
            foreach ($nombre as $nbr) {
                $data['label'] = $data['label'] . ",'" . $nbr['mois'] . "'";
                $data['salaire'] = $data['salaire'] . ',' . $nbr['total'];
            }
            $data['label'] = $data['label'] . "]";
            $data['salaire'] = $data['salaire'] . "]";
            $this->load_page('Chart_absence', $data);
        }
    }
    public function setAvertissement()
    {
        if (isset($_POST['date'])) {
            $this->employer->setAvertisement($_POST['identifiant'], $_POST['description'], $_POST['date']);
            $this->load_without_data('Avertisementemployer');
        }
    }
    public function getfauteemployer()
    {
        if (isset($_GET['faute'])) {
            $data = array();
            $data['faute'] = $this->employer->getfautemployer($_GET['faute']);
            $this->load_page('RechercheFaute', $data);
        } else {
            $this->load_without_data('RechercheFaute');
        }
    }
    public function ajoutEmployer()
    {
        $data['poste'] = $this->employer->liste_post();
        $this->load_page("Ajoutemployee", $data);
    }
    public function detaille($idemployer)
    {
        if ($idemployer != null) {
            $data = array();
            $data['detaille'] = $this->employer->detailleemp($idemployer);

            $nombre = $this->employer->get_evolution_salaire($idemployer);
            $data['idemployer'] = $idemployer;
            $data['label'] = '[0';
            $data['salaire'] = '[0';
            foreach ($nombre as $nbr) {
                $data['label'] = $data['label'] . ",'" . $nbr['datedebut'] . "'";
                $data['salaire'] = $data['salaire'] . ',' . $nbr['montant'];
            }
            $data['label'] = $data['label'] . "]";
            $data['salaire'] = $data['salaire'] . "]";

            $this->load_page('Detailleemp', $data);
        }
    }
    public function listfaute($idemployer)
    {
        if ($idemployer != null) {
            $data = array();
            $data['idemployer'] = $idemployer;
            $data['faute'] = $this->employer->listefaute($idemployer);
            $this->load_page('ListeFaute', $data);
        }
    }
    public function insertfaute($idemployer)
    {
        if ($idemployer != null) {
            $data = array();
            $data['idemployer'] = $idemployer;
            $this->load_page('Avertisementemployer', $data);
        }
    }
    public function ajoutTache($idemployer)
    {

        if ($idemployer != null) {
            $data = array();
            $data['idemployer'] = $idemployer;
            $this->load_page('AjoutTache', $data);
        }
    }
    public function setTache()
    {
        if (isset($_POST['description'])) {
            $this->employer->insertTache($_POST['identifiant'], $_POST['description'], $_POST['date'] . " " . $_POST['time']);
            $this->ajoutTache($_POST['identifiant']);
        }
    }
    public function selectTache($idemployer)
    {
        if ($idemployer != null) {
            $data = array();
            $data['idemployer'] = $idemployer;
            $data['tache'] = $this->employer->selecttache($idemployer);
            $this->load_page('ListeTache_emp', $data);
        }
    }
    public function rechercheTache()
    {
        if (isset($_POST['identifiant'])) {
            $data = array();
            $data['idemployer'] = $_POST['identifiant'];
            $data['tache'] = $this->employer->selectTacheWhere($_POST['identifiant'], $_POST['date'] . " " . $_POST['time']);
            $this->load_page('ListeTache_emp', $data);
        }
    }
    public function voirpresence()
    {
        if (isset($_POST['identifiant'])) {
            $data = array();
            $data['date'] = $_POST['date'];
            $data['idemployer'] = $_POST['identifiant'];
            $data['presence'] = $this->employer->presence_emp($_POST['identifiant'], $_POST['date']);
            $this->load_page('Presence_emp', $data);
        }
    }
    public function test($mot)
    {
    }
}
