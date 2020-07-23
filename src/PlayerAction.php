<?php

namespace Hero;

use Hero\Action;

class PlayerAction{

    public function RapidStrike($damage){

        echo "Rapid Strike was used! (Orderus deals twice the DAMAGE)<br>";
        
        return $damage*2;
    }

    public function MagicShield($damage){
        
        echo "Magic Shield was used! (Orderus takes twice less DAMAGE)<br>";

        return $damage/2;
    }
}