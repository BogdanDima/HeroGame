<?php

namespace Hero;

use PHPUnit\Framework\TestCase;
require 'src/PlayerAction.php';

class PlayerActionTest extends TestCase{

    
    public function testRapidStrike(){
        $paction = new PlayerAction();
        $damage = 10;

        $damageReal = $paction->RapidStrike($damage);
        
        $this->assertEquals($damageReal, $damage * 2);
    }

    public function testMagicShield(){

        $paction = new PlayerAction();

        $damage = 10;

        $damageReal = $paction->MagicShield($damage);
        
        $this->assertEquals($damageReal, $damage / 2);
    }
}