<?php
class User extends CI_Controller{
    public function index(){
        session_start_seguro();
        verificarLogin();
        $this->load->model('user_model');
        $this->load->model('partido_model');
        $data=[]; $data['users']=$this->user_model->getUsers();
        //$data['partidos']=$this->partido_model->getPartidos();
        $data['partidos']=$this->partido_model->getUserPartidos($_SESSION['user']->id);
        frame($this, 'user/index', $data);
    }

    public function login(){
        frame($this, 'user/login');
    }
    
    public function loginPost(){
        $username = isset($_POST['username'])?$_POST['username']:null;
        $pwd = isset($_POST['pwd'])?$_POST['pwd']:null;
        $this->load->model('user_model');
        
        session_start_seguro();
        if($username != null && $pwd != null){
            if($this->user_model->checkUser($username, $pwd)){
                session_start_seguro();
                $_SESSION['user']=$this->user_model->getUserByUsername($username);
                redirect(base_url() . 'user');
            } else {
                //mal
                session_start_seguro();
                $_SESSION['_msg']['texto']='Credenciales no válidos';
                $_SESSION['_msg']['uri']='user/login';
                redirect(base_url() . 'msg');
            }
            
        } else {
            $_SESSION['_msg']['texto']="Los campos no pueden estar vacios";
            $_SESSION['_msg']['uri']='user/login';
        }
        redirect(base_url() . 'msg');
    }
    
    public function register(){
        if(isset($_SESSION['user'])){
            redirect(base_url().'home');
        }
        frame($this, 'user/register');
    }
    
    public function registerPost(){
        $username = isset($_POST['username'])?$_POST['username']:null;
        $pwd = isset($_POST['pwd'])?$_POST['pwd']:null;
        $this->load->model('user_model');
        
        session_start_seguro();
        if($username != null && $pwd != null){
            try {
                $this->user_model->c($username, $pwd);
                $_SESSION['_msg']['texto']='Usuario creado correctamente';
                $_SESSION['_msg']['uri']='';
            }
            catch (Exception $e) {
                $_SESSION['_msg']['texto']=$e->getMessage();
                $_SESSION['_msg']['uri']='user/register';
            }
        } else {
            $_SESSION['_msg']['texto']="Los campos no pueden estar vacios";
            $_SESSION['_msg']['uri']='user/register';
        }
        redirect(base_url() . 'msg');
    }
    
    public function logout(){
        session_start_seguro();
        session_destroy();
        redirect(base_url() . '');
    }
}
?>