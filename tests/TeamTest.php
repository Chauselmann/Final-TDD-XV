<?php declare(strict_types=1);

require_once(__DIR__ .'\..\src\Entity\Archer.php');
require_once(__DIR__ .'\..\src\Entity\Paladin.php');
require_once(__DIR__ .'\..\src\Entity\Mage.php');
require_once(__DIR__ .'\..\src\Entity\Warrior.php');
require_once(__DIR__ .'\..\src\Entity\Team.php');

use App\Entity\Archer;
use App\Entity\Paladin;
use App\Entity\Mage;
use App\Entity\Warrior;
use App\Entity\Team;
use PHPUnit\Framework\TestCase;

final class TeamTest extends TestCase
{
    public function testAdd()
    {
        $team = new Team('Team 1');
        $team->addCharacter(
            new Warrior('Guerrier 1'),
            new Mage('Mage 1'),
            new Paladin('Paladin 1'),
            new Archer('Archer 1')
        );
        $this->assertEquals(4, count($team->getCharacters()), '4 players should have been added to the team');
    }
}