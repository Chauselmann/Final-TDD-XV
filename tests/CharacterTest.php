<?php declare(strict_types=1);

require_once(__DIR__ .'\..\src\Entity\Archer.php');
require_once(__DIR__ .'\..\src\Entity\Paladin.php');

use App\Entity\Archer;
use App\Entity\Paladin;
use PHPUnit\Framework\TestCase;

final class CharacterTest extends TestCase
{
    public function testAttack()
    {
        $archer = new Archer('archer1');
        $paladin = new Paladin('paladin1');

        $this->assertEquals(50, $paladin->attack($archer), 'Life should have decreased by 20');
    }

    public function testHeal()
    {
        $archer = new Archer('archer1');
        $this->assertEquals($archer->getLife() + 50, $archer->heal(), 'Life should have increased by 50');
    }

    public function testSpecialAttack()
    {
        $archer = new Archer('archer1');
        $paladin = new Paladin('paladin1');

        $this->assertEquals(30, $paladin->specialAttack($archer), 'Life should have decreased by 40');
    }
}