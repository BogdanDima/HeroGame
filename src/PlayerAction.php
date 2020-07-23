<?php

namespace Hero;

use Hero\Action;

class PlayerAction{

    public function RapidStrike($damage){

        echo "<b>Rapid Strike</b> was used! (Orderus deals twice the DAMAGE)<br>";
        
        return $damage*2;
    }

    public function MagicShield($damage){
        
        echo "<b>Magic Shield</b> was used! (Orderus takes twice less DAMAGE)<br>";

        return $damage/2;
    }
}