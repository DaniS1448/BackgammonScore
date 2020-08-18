<?php
function session_start_seguro() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
}

function verificarLogin(){
    session_start_seguro();
    if(!isset($_SESSION['user'])){
        redirect(base_url().'user/login');
    }
}

function esAjax(){
    $esAjax = isset(
        $_SERVER['HTTP_X_REQUESTED_WITH'])?
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' :
        false;
        if (!$esAjax) {
            echo "SOLO EJECUCIONES AJAX";
        }
        return $esAjax;
}
?>