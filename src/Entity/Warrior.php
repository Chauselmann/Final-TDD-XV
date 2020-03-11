<?php


namespace App\Entity;
require_once(__DIR__ .'\Character.php');

/**
 * Class Warrior
 * @package Warrior
 */
class Warrior extends Character
{
    /**
     * Warrior constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setClass('Warrior');
        $this->setLife(100);
        $this->setArmor(20);
        $this->setMagicalResistance(20);
        $this->setDamage(30);
    }
}