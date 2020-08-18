<?php
class User_model extends CI_Model{
    
    public function c($username, $pwd){
        
        $user = R::findOne('user', 'username=?', [$username]);
        if($user == null){
            $user = R::dispense("user");
            $user->username = $username;
            $user->pwd = password_hash($pwd, PASSWORD_DEFAULT);
            R::store($user);
        } else {
            throw new Exception('EL USUARIO YA EXISTE');
        }
        
    }
    
    public function checkUser($username, $pwd){
        
        $credencialesOK = false;
        
        $usuario = R::findOne('user', 'username=?', [$username]);
        
        if($usuario != null){
            if (password_verify($pwd, $usuario->pwd)) {
                $credencialesOK = true;
            }
        }
        
        return $credencialesOK;
    }
    
    public function getUserByUsername($username){
        return  R::findOne('user', 'username=?', [$username]);
    }
    
    public function getUsers(){
        return R::findAll('user');
    }
    
    public function getUserById($idUser){
        return R::load('user', $idUser);
    }
}
?>