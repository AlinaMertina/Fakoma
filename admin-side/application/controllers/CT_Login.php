<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_Login extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Login');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('Login');
        } 
        else 
        {
            // login succeeded, set session data and redirect to dashboard
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->load->database();
            $query = $this->db->get_where('admin', array('nom' => $username, 'motdepasse' => $password));

            if ($query->num_rows() == 1) 
            {
                $user = $query->row();
                $this->session->set_userdata('user_id', $user->idadmin);
                redirect('CT_Produit');
            }
            else 
            {
                // login failed, show error message
                $data['error'] = 'Invalid username or password';
                $this->load->view('Login', $data);
            }
        }
    }
    public function TesteConnection()
    {
        $query = $this->db->get('admin'); // replace table_name with your table name
        $result = $query->result();
        var_dump($result); // prints the result of the query
    }
}