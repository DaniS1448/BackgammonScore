<?php
class Home extends CI_Controller{
    public function index(){
        session_start_seguro();
        $this->load->model('partido_model');
        $this->load->model('user_model');
        $data=[];
        $data['users']=$this->user_model->getUsers();
        $data['partidos']=$this->partido_model->getPartidos();
        $data['toplinie']=$this->partido_model->top(0,5);
        $data['toplinietehnica']=$this->partido_model->top(1,5);
        $data['topmarti']=$this->partido_model->top(2,5);
        $data['topmartitehnic']=$this->partido_model->top(3,5);
        
        $users=$this->user_model->getUsers();
        $usuarios=[];
        $n = 0;
        foreach ($users as $user){
            $partidosAsJugador1 = count($user->alias('jugador1')->ownPartidoList);
            $partidosAsJugador2 = count($user->alias('jugador2')->ownPartidoList);
            $partidosAsGanador = count($user->alias('ganador')->ownPartidoList);
            $usuarios[$n]['nombre']=$user->username;
            $usuarios[$n]['partidos']=$partidosAsJugador1+$partidosAsJugador2;
            $usuarios[$n]['ganados']=$partidosAsGanador;
            $usuarios[$n]['puntos']=0;
            $usuarios[$n]['l']=0;
            $usuarios[$n]['lt']=0;
            $usuarios[$n]['m']=0;
            $usuarios[$n]['mt']=0;
            
            foreach ($user->alias('ganador')->ownPartidoList as $partido){
                if($partido->tipo == '0'){
                    $usuarios[$n]['puntos']+=1;
                    $usuarios[$n]['l']++;
                } elseif ($partido->tipo == '1'){
                    $usuarios[$n]['puntos']+=1;
                    $usuarios[$n]['lt']++;
                } elseif ($partido->tipo == '2'){
                    $usuarios[$n]['puntos']+=2;
                    $usuarios[$n]['m']++;
                } elseif ($partido->tipo == '3'){
                    $usuarios[$n]['puntos']+=2;
                    $usuarios[$n]['mt']++;
                }
            }
            
            $usuarios[$n]['gp'] = ($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['ganados'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['l'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['l'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['lt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['lt'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['m'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['m'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['mt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['mt'] * 100) / $usuarios[$n]['partidos']);
            $n++;
        }
        
        usort($usuarios, function($a, $b) {
            return $b['puntos'] - $a['puntos'];
        });
        $data['usuarios']=$usuarios;
        $data['ntop']=1;
        frame($this, 'home/index', $data);
    }
    
    public function stats(){
        session_start_seguro();
        $this->load->model('partido_model');
        $this->load->model('user_model');
        $data=[];
        $data['partidos']=$this->partido_model->getPartidos();
        $data['toplinie']=$this->partido_model->top(0,5);
        $data['toplinietehnica']=$this->partido_model->top(1,5);
        $data['topmarti']=$this->partido_model->top(2,5);
        $data['topmartitehnic']=$this->partido_model->top(3,5);
        $users=$this->user_model->getUsers();
        $usuarios=[];
        $n = 0;
        foreach ($users as $user){
            $partidosAsJugador1 = count($user->alias('jugador1')->ownPartidoList);
            $partidosAsJugador2 = count($user->alias('jugador2')->ownPartidoList);
            $partidosAsGanador = count($user->alias('ganador')->ownPartidoList);
            $usuarios[$n]['nombre']=$user->username;
            $usuarios[$n]['partidos']=$partidosAsJugador1+$partidosAsJugador2;
            $usuarios[$n]['ganados']=$partidosAsGanador;
            $usuarios[$n]['puntos']=0;
            $usuarios[$n]['sl']=0;
            $usuarios[$n]['slt']=0;
            $usuarios[$n]['sm']=0;
            $usuarios[$n]['smt']=0;
            
            foreach ($user->alias('ganador')->ownPartidoList as $partido){
                if($partido->tipo == '0'){
                    $usuarios[$n]['puntos']+=1;
                    $usuarios[$n]['sl']++;
                } elseif ($partido->tipo == '1'){
                    $usuarios[$n]['puntos']+=1;
                    $usuarios[$n]['slt']++;
                } elseif ($partido->tipo == '2'){
                    $usuarios[$n]['puntos']+=2;
                    $usuarios[$n]['sm']++;
                } elseif ($partido->tipo == '3'){
                    $usuarios[$n]['puntos']+=2;
                    $usuarios[$n]['smt']++;
                }
            }
            
            $usuarios[$n]['gp'] = ($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['ganados'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['l'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['sl'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['lt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['slt'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['m'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['sm'] * 100) / $usuarios[$n]['partidos']);
            $usuarios[$n]['mt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['smt'] * 100) / $usuarios[$n]['partidos']);
            
            $usuarios[$n]['gl'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['sl'] * 100) / $usuarios[$n]['ganados']);
            $usuarios[$n]['glt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['slt'] * 100) / $usuarios[$n]['ganados']);
            $usuarios[$n]['gm'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['sm'] * 100) / $usuarios[$n]['ganados']);
            $usuarios[$n]['gmt'] =($usuarios[$n]['partidos']==0)?'0':round(($usuarios[$n]['smt'] * 100) / $usuarios[$n]['ganados']);
            $n++;
        }
        
        $topusuarios = $usuarios;
        $lsuarios = $usuarios;
        $ltsuarios = $usuarios;
        $msuarios = $usuarios;
        $mtsuarios = $usuarios;
        
        usort($topusuarios, function($a, $b) {
            return $b['puntos'] - $a['puntos'];
        });
        
        usort($lsuarios, function($a, $b) {
            return $b['l'] - $a['l'];
        });
        
            usort($ltsuarios, function($a, $b) {
            return $b['lt'] - $a['lt'];
        });
            
                usort($msuarios, function($a, $b) {
            return $b['m'] - $a['m'];
        });
                
                    usort($mtsuarios, function($a, $b) {
            return $b['mt'] - $a['mt'];
        });
            
        $data['topusuarios']=$topusuarios;
        $data['lsuarios']=$lsuarios;
        $data['ltsuarios']=$ltsuarios;
        $data['msuarios']=$msuarios;
        $data['mtsuarios']=$mtsuarios;
        $data['ntop']=1;
        frame($this, 'home/stats', $data);
    }
    
    public function mensaje(){
        session_start_seguro();
        $_SESSION['_msg']['texto']='Mensaje genérico';
        $_SESSION['_msg']['uri']='';
        redirect(base_url().'msg');
    }
    
    public function duel(){
        session_start_seguro();
        $jugador1_id=isset($_GET['jugador1'])?$_GET['jugador1']:null;
        $jugador2_id=isset($_GET['jugador2'])?$_GET['jugador2']:null;
        
        if($jugador1_id != null && $jugador2_id != null){
            $this->load->model('partido_model');
            
            $data=[];
            $data['toplinie']=$this->partido_model->topDuel(0,$jugador1_id,$jugador2_id);
            $data['toplinietehnica']=$this->partido_model->topDuel(1,$jugador1_id,$jugador2_id);
            $data['topmarti']=$this->partido_model->topDuel(2,$jugador1_id,$jugador2_id);
            $data['topmartitehnic']=$this->partido_model->topDuel(3,$jugador1_id,$jugador2_id);
            
            $this->load->model('user_model');
            $jugador1 = $this->user_model->getUserById($jugador1_id);
            $jugador1partidosAsJugador1 = $jugador1->alias('jugador1')->ownPartidoList;
            $jugador1partidosAsJugador2 = $jugador1->alias('jugador2')->ownPartidoList;
            
            $jugador2 = $this->user_model->getUserById($jugador2_id);
            //$jugador2partidosAsJugador1 = $jugador2->alias('jugador1')->ownPartidoList;
            //$jugador2partidosAsJugador2 = $jugador2->alias('jugador2')->ownPartidoList;
            //$partidos = array_intersect($jugador1partidosAsJugador1,$jugador1partidosAsJugador2,$jugador2partidosAsJugador1,$jugador2partidosAsJugador2);
            
            $partidos=[];
            foreach ($jugador1partidosAsJugador1 as $partido){
                if($partido->jugador2 == $jugador2){
                    $partidos[]=$partido;
                }
            }
            
            foreach ($jugador1partidosAsJugador2 as $partido){
                if($partido->jugador1 == $jugador2){
                    $partidos[]=$partido;
                }
            }
            
            $topusuarios=[];
            $topusuarios[0]['nombre']=$jugador1->username;
            $topusuarios[1]['nombre']=$jugador2->username;
            $topusuarios[0]['partidos']=$topusuarios[1]['partidos']=count($partidos);
            
            $topusuarios[0]['ganados']=0;
            $topusuarios[1]['ganados']=0;
            
            $topusuarios[0]['puntos']=0;
            $topusuarios[1]['puntos']=0;
            
            $topusuarios[0]['sl']=0;
            $topusuarios[0]['slt']=0;
            $topusuarios[0]['sm']=0;
            $topusuarios[0]['smt']=0;
            
            $topusuarios[1]['sl']=0;
            $topusuarios[1]['slt']=0;
            $topusuarios[1]['sm']=0;
            $topusuarios[1]['smt']=0;
            
            foreach ($partidos as $partido){
                if($partido->ganador->id == $jugador1->id){
                    $topusuarios[0]['ganados']++;
                    if($partido->tipo == '0'){
                        $topusuarios[0]['puntos']+=1;
                        $topusuarios[0]['sl']++;
                    } elseif ($partido->tipo == '1'){
                        $topusuarios[0]['puntos']+=1;
                        $topusuarios[0]['slt']++;
                    } elseif ($partido->tipo == '2'){
                        $topusuarios[0]['puntos']+=2;
                        $topusuarios[0]['sm']++;
                    } elseif ($partido->tipo == '3'){
                        $topusuarios[0]['puntos']+=2;
                        $topusuarios[0]['smt']++;
                    }
                } elseif($partido->ganador == $jugador2) {
                    $topusuarios[1]['ganados']++;
                    if($partido->tipo == '0'){
                        $topusuarios[1]['puntos']+=1;
                        $topusuarios[1]['sl']++;
                    } elseif ($partido->tipo == '1'){
                        $topusuarios[1]['puntos']+=1;
                        $topusuarios[1]['slt']++;
                    } elseif ($partido->tipo == '2'){
                        $topusuarios[1]['puntos']+=2;
                        $topusuarios[1]['sm']++;
                    } elseif ($partido->tipo == '3'){
                        $topusuarios[1]['puntos']+=2;
                        $topusuarios[1]['smt']++;
                    }
                }
            }
            
            for ($n = 0; $n < 2; $n++) {
                $topusuarios[$n]['gp'] = ($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['ganados'] * 100) / $topusuarios[$n]['partidos']);
                $topusuarios[$n]['l'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['sl'] * 100) / $topusuarios[$n]['partidos']);
                $topusuarios[$n]['lt'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['slt'] * 100) / $topusuarios[$n]['partidos']);
                $topusuarios[$n]['m'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['sm'] * 100) / $topusuarios[$n]['partidos']);
                $topusuarios[$n]['mt'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['smt'] * 100) / $topusuarios[$n]['partidos']);
                
                $topusuarios[$n]['gl'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['sl'] * 100) / $topusuarios[$n]['ganados']);
                $topusuarios[$n]['glt'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['slt'] * 100) / $topusuarios[$n]['ganados']);
                $topusuarios[$n]['gm'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['sm'] * 100) / $topusuarios[$n]['ganados']);
                $topusuarios[$n]['gmt'] =($topusuarios[$n]['partidos']==0)?'0':round(($topusuarios[$n]['smt'] * 100) / $topusuarios[$n]['ganados']);
                
            }
            
            
            
            $data['topusuarios']=$topusuarios;
            frame($this, 'home/duel', $data);
        }else {
            redirect(base_url());
        }
    }
    
    public function test(){
        session_start_seguro();
        $this->load->model('partido_model');
        $lastDay = $this->partido_model->getLastDay()['date'];
        $lastDayPartes = explode(" ", $lastDay);
        
        echo "<pre>";
        echo $lastDayPartes[0];
        echo "</pre>";
        
    }
}
?>