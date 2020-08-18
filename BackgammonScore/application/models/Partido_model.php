<?php
class Partido_model extends CI_Model{
    public function c($idUser, $idOponente,$idGanador, $tipo){
        
        $jugador1 = R::load('user', $idUser);
        $jugador2 = R::load('user', $idOponente);
        $ganador = R::load('user', $idGanador);
        
        $partido = R::dispense("partido");
        $partido->jugador1 = $jugador1;
        $partido->jugador2 = $jugador2;
        $partido->ganador = $ganador;
        $partido->tipo = $tipo;
        //$partido->date = date("Y-m-d");
        $partido->date = R::isoDateTime();
        R::store($partido);
    }
    
    public function getPartidos(){
        return R::findAll('partido');
    }
    
    public function getUserPartidos($idUser){
        $rows = R::getAll( 'SELECT * FROM partido WHERE jugador1_id = :jugador1_id OR jugador2_id = :jugador2_id',
            [':jugador1_id' => $idUser,':jugador2_id' => $idUser]
            );
        return R::convertToBeans( 'partido', $rows );
    }
    
    public function getUserPartidosOld($idUser){
        
        //return R::findAll('partido', 'jugador1_id=? OR jugador2_id', [$idUser,$idUser]);
        $partidos=[];
        $partidos=R::findAll('partido', 'jugador1_id=?', [$idUser]);
        $partidos+=R::findAll('partido', 'jugador2_id=?', [$idUser]);
        return $partidos;
    }
    
    public function getUserPartidosLimit10($idUser){
        $rows = R::getAll( 'SELECT * FROM partido WHERE jugador1_id = :jugador1_id OR jugador2_id = :jugador2_id order by date(date) DESC LIMIT 10',
            [':jugador1_id' => $idUser,':jugador2_id' => $idUser]
            );
        return R::convertToBeans( 'partido', $rows );
    }
    
    public function getUserPartidosOrderDate($idUser){
        $rows = R::getAll( 'SELECT * FROM partido WHERE jugador1_id = :jugador1_id OR jugador2_id = :jugador2_id order by date(date) DESC',
            [':jugador1_id' => $idUser,':jugador2_id' => $idUser]
            );
        return R::convertToBeans( 'partido', $rows );
    }
}
?>