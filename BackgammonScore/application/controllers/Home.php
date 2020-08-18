<?php
class Home extends CI_Controller{
    public function index(){
        session_start_seguro();
        $this->load->model('partido_model');
        $data=[];
        $data['partidos']=$this->partido_model->getPartidos();
        frame($this, 'home/index', $data);
    }
    
    public function mensaje(){
        session_start_seguro();
        $_SESSION['_msg']['texto']='Mensaje genérico';
        $_SESSION['_msg']['uri']='';
        redirect(base_url().'msg');
    }
}
?>