<?php

namespace App;

require_once(__DIR__ .'\..\src\Entity\Fight.php');
require_once(__DIR__ .'\..\src\Entity\Team.php');
require_once(__DIR__ .'\..\src\Entity\Warrior.php');
require_once(__DIR__ .'\..\src\Entity\Mage.php');
require_once(__DIR__ .'\..\src\Entity\Archer.php');
require_once(__DIR__ .'\..\src\Entity\Paladin.php');

use App\Entity\Archer;
use App\Entity\Fight;
use App\Entity\Mage;
use App\Entity\Paladin;
use App\Entity\Team;
use App\Entity\Warrior;

echo "Choose a name for the first team : ";
$handleTeam1 = fopen ("php://stdin","r");
$nameTeam1 = fgets($handleTeam1);

$entities = ['Archer', 'Mage', 'Paladin', 'Warrior'];

$valide = false;
do{
    echo "Choose a class for the first player of the team".$nameTeam1." : ";
    $handleClass1 = fopen ("php://stdin","r");
    $className1 = trim(fgets($handleClass1));
    if (in_array($className1, $entities)){
        $valide = true;
        echo "Choose a name for the first player of team ".$nameTeam1." : ";
        $handlePlayer1 = fopen ("php://stdin","r");
        $namePlayer1 = fgets($handlePlayer1);
        switch ($className1){
            case 'Warrior':
                $player1 = new Warrior($namePlayer1);
                break;
            case 'Mage':
                $player1 = new Mage($namePlayer1);
                break;
            case 'Paladin':
                $player1 = new Paladin($namePlayer1);
                break;
            case 'Archer':
                $player1 = new Archer($namePlayer1);
                break;
        }
    }
} while(!$valide);

var_dump($player1);

echo "Choose a name for the second player of team ".$nameTeam1." : ";
$handlePlayer2 = fopen ("php://stdin","r");
$namePlayer2 = fgets($handlePlayer2);

echo "Choose a name for the third player of team ".$nameTeam1." : ";
$handlePlayer3 = fopen ("php://stdin","r");
$namePlayer3 = fgets($handlePlayer3);


$player2 = new Warrior($namePlayer2);
$player3 = new Mage($namePlayer3);

echo "Choose a name for the second team : ";
$handleTeam2 = fopen ("php://stdin","r");
$nameTeam2 = fgets($handleTeam2);

echo "Choose a name for the first player of team ".$nameTeam2." : ";
$handlePlayer4 = fopen ("php://stdin","r");
$namePlayer4 = fgets($handlePlayer4);

echo "Choose a name for the second player of team ".$nameTeam2." : ";
$handlePlayer5 = fopen ("php://stdin","r");
$namePlayer5 = fgets($handlePlayer5);

echo "Choose a name for the third player of team ".$nameTeam2." : ";
$handlePlayer6 = fopen ("php://stdin","r");
$namePlayer6 = fgets($handlePlayer6);

$player4 = new Paladin($namePlayer4);
$player5 = new Warrior($namePlayer5);
$player6 = new Archer($namePlayer6);

$team1 = new Team($nameTeam1);
$team1->addCharacter($player1, $player2, $player3);
$team2 = new Team($nameTeam2);
$team2->addCharacter($player4, $player5, $player6);

$fight = new Fight($team1, $team2);

echo 'Team ' .$fight->start() .' has won the game';