<?php

class getadmindashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelAdmin', 'ma', TRUE);
    }

    public function index()
    {
        $viewData['list'] = $this->ma->select();
        $this->load->view('admin_dashboard', $viewData);
    }





public function map(){

       $this->load->view('mapT');


}
    public function map2(){

        $this->load->view('mapT2');

    }




}