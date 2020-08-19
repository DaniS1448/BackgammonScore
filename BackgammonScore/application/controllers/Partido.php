<?php
class Partido extends CI_Controller{
    public function cPost(){
        $idOponente=isset($_POST['idOponente'])?$_POST['idOponente']:null;
        $idGanador=isset($_POST['idGanador'])?$_POST['idGanador']:null;
        $tipo=isset($_POST['tipo'])?$_POST['tipo']:null;
        $this->load->model('partido_model');        
        
        session_start_seguro();
        if($idOponente != null && $idGanador != null && $tipo != null){
            try {
                $this->partido_model->c($_SESSION['user']->id, $idOponente,$idGanador,$tipo);
                $_SESSION['_msg']['texto']='Partido creado correctamente';
                $_SESSION['_msg']['uri']='user';
            }
            catch (Exception $e) {
                $_SESSION['_msg']['texto']=$e->getMessage();
                $_SESSION['_msg']['uri']='';
            }
        } else {
            $_SESSION['_msg']['texto']="Los campos no pueden estar vacios";
            $_SESSION['_msg']['uri']='';
        }
        redirect(base_url() . 'msg');
    }
    
    public function ajaxCPost(){
        if(esAjax()){
            $idOponente=isset($_POST['idOponente'])?$_POST['idOponente']:null;
            $idGanador=isset($_POST['idGanador'])?$_POST['idGanador']:null;
            $tipo=isset($_POST['tipo'])?$_POST['tipo']:null;
            
            $respuesta=[];
            $respuesta['estado']=false;
            $respuesta['mensaje']="";
            
            if($idOponente != null && $idGanador != null && $tipo != null){
                try {
                    session_start_seguro();
                    $this->load->model('partido_model');
                    $this->partido_model->c($_SESSION['user']->id, $idOponente,$idGanador,$tipo);
                    $respuesta['mensaje']='Partido creado correctamente';
                    $respuesta['estado']=true;
                }
                catch (Exception $e) {
                    $respuesta['mensaje']=$e->getMessage();
                }
            } else {
                $respuesta['mensaje']="Los campos no pueden estar vacios";
            }
            
            echo json_encode($respuesta);
        }
    }
    
    public function delete(){
        session_start_seguro();
        verificarLogin();
        $idPartido=isset($_GET['idPartido'])?$_GET['idPartido']:null;
        if($idPartido != null){
            $this->load->model('partido_model');
            $this->partido_model->d($idPartido);
        }
        
        redirect(base_url() . 'user');
    }
    
}
?>