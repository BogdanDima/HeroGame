<?php

namespace Hero;

use PHPUnit\Framework\TestCase;
require 'src/Action.php';

class ActionTest extends TestCase{

    public function testChooseFirstAttackerChar1First(){
        $action = new Action();
        $char1["speed"] = 30;
        $char2["speed"] = 20;
        
        $arrReturn = $action->chooseFirstAttacker($char1, $char2, null, null);
        $arrTest = ["attacker" => [null, $char1], "defender" => [null, $char2]];

        $this->assertEquals($arrReturn, $arrTest);
    }

    public function testChooseFirstAttackerChar2First(){
        $action = new Action();
        $char1["speed"] = 20;
        $char2["speed"] = 30;
        
        $arrReturn = $action->chooseFirstAttacker($char1, $char2, null, null);
        $arrTest = ["attacker" => [null, $char2], "defender" => [null, $char1]];

        $this->assertEquals($arrReturn, $arrTest);
    }

    public function testChooseFirstAttackerEqSpeedChar1First(){
        $action = new Action();
        $char1["speed"] = 30;
        $char2["speed"] = 30;
        $char1["luck"] = 30;
        $char2["luck"] = 20;
        
        $arrReturn = $action->chooseFirstAttacker($char1, $char2, null, null);
        $arrTest = ["attacker" => [null, $char1], "defender" => [null, $char2]];

        $this->assertEquals($arrReturn, $arrTest);
    }

    public function testChooseFirstAttackerEqSpeedChar2First(){
        $action = new Action();
        $char1["speed"] = 30;
        $char2["speed"] = 30;
        $char1["luck"] = 20;
        $char2["luck"] = 30;
        
        $arrReturn = $action->chooseFirstAttacker($char1, $char2, null, null);
        $arrTest = ["attacker" => [null, $char2], "defender" => [null, $char1]];

        $this->assertEquals($arrReturn, $arrTest);
    }
    
}