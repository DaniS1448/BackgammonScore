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
    
    public function d($id) {
        $partido = R::load('partido',$id);
        R::trash($partido);
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
    
    public function top($tipo, $limite){
        $resultado = R::getAll("select user.username AS ganador, COUNT(partido.ganador_id) as puntos from partido inner join user on partido.ganador_id = user.id where tipo = $tipo group by ganador_id ORDER by puntos DESC LIMIT $limite");
        //return R::convertToBeans( 'toplinie', $resultado );
        return $resultado;
    }
    
    public function topDuel($tipo, $idj1, $idj2){
        $resultado = R::getAll("select user.username AS ganador, COUNT(partido.ganador_id) as puntos from partido inner join user on partido.ganador_id = user.id where tipo = $tipo AND ((jugador1_id = $idj1 AND jugador2_id = $idj2) OR (jugador1_id = $idj2 AND jugador2_id = $idj1) )group by ganador_id ORDER by puntos DESC");
        //return R::convertToBeans( 'toplinie', $resultado );
        return $resultado;
    }
    
    public function getLastDay(){
        //$resultado = R::getRow("SELECT date FROM partido WHERE partido.date = (SELECT MAX(date) FROM partido)");
        $resultado = R::getRow("SELECT MAX(date) as date FROM partido");
        
        return $resultado;
    }
    
    public function getLastDayPartidos($lastday){
        //$rows = R::getAll( 'SELECT * FROM `partido` WHERE date like "2020-10-22%"');
        $rows = R::getAll( 'SELECT * FROM `partido` WHERE date like "'.$lastday.'%"');
        
        return R::convertToBeans( 'partido', $rows );
    }
}
?>