<?php 

    $this->load->view('template/Header');

    $this->load->view('template/Navbar');

    $this->load->view($page,$data);

    $this->load->view('template/Footer');
?>