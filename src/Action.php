<?php

namespace Hero;
use Hero\PlayerAction;

class Action {

	public function chooseFirstAttacker($char1, $char2, $char1Name, $char2Name){
		
		if($char1["speed"] > $char2["speed"]){
			$attackerName = $char1Name;
			$defenderName = $char2Name;
			$attackerStats = $char1;
			$defenderStats = $char2;
		}else if($char2["speed"] > $char1["speed"]){
			$attackerName = $char2Name;
			$defenderName = $char1Name;
			$attackerStats = $char2;
			$defenderStats = $char1;
		}else if($char1["luck"] > $char2["luck"]){
			$attackerName = $char1Name;
			$defenderName = $char2Name;
			$attackerStats = $char1;
			$defenderStats = $char2;
		}else if($char2["luck"] >= $char1["luck"]){
			$attackerName = $char2Name;
			$defenderName = $char1Name;
			$attackerStats = $char2;
			$defenderStats = $char1;
		}

		return [ "attacker" => [$attackerName, $attackerStats], "defender" => [$defenderName, $defenderStats]];
	}

	public function switchAttacker($players){
		$temp = $players["attacker"];
		$players["attacker"] = $players["defender"];
		$players["defender"] = $temp;

		return $players;
	}

	public function attack($attacker, $defender){

		$damage = $attacker["strength"] - $defender["defence"];
		if($damage < 0) $damage = 0;

		echo "DAMAGE: ".$damage."<br>";


		return $damage;
	}

	public function playerAttackPhase($players, $stance){
		$playerAction = new PlayerAction();
		
        $orderus_skill_chance = rand(0,100);
		$defender_luck_chance = rand(0,100);

        if($defender_luck_chance <= $players["defender"][1]["luck"]){
            echo "Defender was lucky! ATTACK MISSED!<br>";
            return $players["defender"][1]["health"];
        }
        
        if ( $orderus_skill_chance <= 10 && $stance == "attack" ) {
			
			echo "Attacker chance = ".$orderus_skill_chance."<br>";
			$basicDamage = $this->attack($players["attacker"][1], $players["defender"][1]);
			$skillDamage = $playerAction->RapidStrike($basicDamage);
			$players["defender"][1]["health"]-=$skillDamage;

        } else if ( $orderus_skill_chance <= 20 && $stance == "defend" ) {

			$basicDamage = $this->attack($players["attacker"][1], $players["defender"][1]);
			$skillDamage = $playerAction->MagicShield($basicDamage);
			$players["defender"][1]["health"]-=$skillDamage;

        } else {
            return $players["defender"][1]["health"] -= $this->attack($players["attacker"][1], $players["defender"][1]);
        }
        
    }

}

?>