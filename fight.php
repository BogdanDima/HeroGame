<?php

use Hero\Stats, Hero\Action, Hero\PlayerAction;

$stats = new Stats();
$action = new Action();
$orderusAction = new PlayerAction();

$orderus = $stats->setStats($stats->orderus);
$beast = $stats->setStats($stats->beast);

$players = $action->chooseFirstAttacker($orderus, $beast, "Orderus", "Beast");

$stats->checkStats($players);

while( $players["attacker"][1]["health"] > 0 && $players["defender"][1]["health"] > 0){

    if($players["attacker"][0] == "Orderus") $action->playerAttackPhase($players, "attack");
    else $players["defender"][1]["health"] = $action->playerAttackPhase($players, "defend");
    
    $stats->checkStats($players);

    $players = $action->switchAttacker($players);
}
echo "<br><br>";

if($players["attacker"][1]["health"] <= 0 && $players["defender"][1]["health"] > 0 ) echo "<b>".$players["defender"][0]." WINS!<b>";
else if($players["defender"][1]["health"] <= 0 && $players["attacker"][1]["health"] > 0 ) echo "<b>".$players["defender"][0]." WINS!<b>";

?>