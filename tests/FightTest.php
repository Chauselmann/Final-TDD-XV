<?php declare(strict_types=1);

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
use PHPUnit\Framework\TestCase;

final class FightTest extends TestCase
{

    public function testCheckUserInput()
    {
        $player1 = new Paladin('team1-1');
        $player2 = new Warrior('team1-2');
        $player3 = new Mage('team1-3');

        $player4 = new Paladin('team2-1');
        $player5 = new Warrior('team2-2');
        $player6 = new Archer('team2-3');

        $team1 = new Team('team 1');
        $team1->addCharacter($player1, $player2);
        $team2 = new Team('team 2');
        $team2->addCharacter($player4, $player5);
        $fight = new Fight($team1, $team2);

        $this->assertEquals($fight->checkUserInput([0,1,2], 2), true, 'Not match');
    }

//    public function testStart()
//    {
//        $player1 = new Paladin('team1-1');
//        $player2 = new Warrior('team1-2');
//        $player3 = new Mage('team1-3');
//
//        $player4 = new Paladin('team2-1');
//        $player5 = new Warrior('team2-2');
//        $player6 = new Archer('team2-3');
//
//        $team1 = new Team('team 1');
//        $team1->addCharacter($player1, $player2);
//        $team2 = new Team('team 2');
//        $team2->addCharacter($player4, $player5);
//        $fight = new Fight($team1, $team2);
//
//        $this->assertContains($fight->start(), ['team 1', 'team 2'], 'Should return the name of the winning team');
//    }
}