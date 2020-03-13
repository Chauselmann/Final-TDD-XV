<?php

namespace App;

require_once(__DIR__ . '\..\src\Entity\Fight.php');
require_once(__DIR__ . '\..\src\Entity\Team.php');
require_once(__DIR__ . '\..\src\Entity\Warrior.php');
require_once(__DIR__ . '\..\src\Entity\Mage.php');
require_once(__DIR__ . '\..\src\Entity\Archer.php');
require_once(__DIR__ . '\..\src\Entity\Paladin.php');

use App\Entity\Archer;
use App\Entity\Fight;
use App\Entity\Mage;
use App\Entity\Paladin;
use App\Entity\Team;
use App\Entity\Warrior;

echo "" . PHP_EOL;
echo "Choose a name for the first team : ";
$handleTeam1 = fopen("php://stdin", "r");
$nameTeam1 = fgets($handleTeam1);
$team1Players = [];

$entities = ['Archer', 'Mage', 'Paladin', 'Warrior'];

$add1 = true;
$valid1 = false;
do {
    do {
        echo "" . PHP_EOL;
        echo "Choose a class for the player of the team " . $nameTeam1 . " (Leave blank to stop adding a player) : ". PHP_EOL;
        $handleClass1 = fopen("php://stdin", "r");
        $className1 = trim(fgets($handleClass1));
        if (in_array($className1, $entities)) {
            $valid1 = true;
            echo "" . PHP_EOL;
            echo "Choose a name for the first player of team " . $nameTeam1 . " : ";
            $handlePlayer1 = fopen("php://stdin", "r");
            $namePlayer1 = fgets($handlePlayer1);
            switch ($className1) {
                case 'Warrior':
                    $player1 = new Warrior($namePlayer1);
                    $team1Players[] = $player1;
                    break;
                case 'Mage':
                    $player1 = new Mage($namePlayer1);
                    $team1Players[] = $player1;
                    break;
                case 'Paladin':
                    $player1 = new Paladin($namePlayer1);
                    $team1Players[] = $player1;
                    break;
                case 'Archer':
                    $player1 = new Archer($namePlayer1);
                    $team1Players[] = $player1;
                    break;
            }
        }
        elseif ($className1 === ''){
            $add1 = false;
        }
    } while (!$valid1);
} while ($add1);

echo "" . PHP_EOL;
echo "Choose a name for the second team : ";
$handleTeam2 = fopen("php://stdin", "r");
$nameTeam2 = fgets($handleTeam2);
$team2Players = [];

$entities = ['Archer', 'Mage', 'Paladin', 'Warrior'];

$add2 = true;
$valid2 = false;
do {
    do {
        echo "" . PHP_EOL;
        echo "Choose a class for the player of the team " . $nameTeam2 . " (Leave blank to stop adding a player) :". PHP_EOL;
        $handleClass2 = fopen("php://stdin", "r");
        $className2 = trim(fgets($handleClass2));
        if (in_array($className2, $entities)) {
            $valid2 = true;
            echo "" . PHP_EOL;
            echo "Choose a name for the first player of team " . $nameTeam2 . " : ";
            $handlePlayer2 = fopen("php://stdin", "r");
            $namePlayer2 = fgets($handlePlayer2);
            switch ($className2) {
                case 'Warrior':
                    $player1 = new Warrior($namePlayer2);
                    $team2Players[] = $player1;
                    break;
                case 'Mage':
                    $player1 = new Mage($namePlayer2);
                    $team2Players[] = $player1;
                    break;
                case 'Paladin':
                    $player1 = new Paladin($namePlayer2);
                    $team2Players[] = $player1;
                    break;
                case 'Archer':
                    $player1 = new Archer($namePlayer2);
                    $team2Players[] = $player1;
                    break;
            }
        }
        elseif ($className1 === ''){
            $add2 = false;
        }
    } while (!$valid2);
} while ($add2);

$team1 = new Team($nameTeam1);
foreach ($team1Players as $team1Player){
    $team1->addCharacter($team1Player);
}

$team2 = new Team($nameTeam2);
foreach ($team2Players as $team2Player){
    $team2->addCharacter($team2Player);
}

$fight = new Fight($team1, $team2);

echo 'Team ' . $fight->start() . ' has won the game';