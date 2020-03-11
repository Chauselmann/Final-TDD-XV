<?php


namespace App\Entity;
require_once(__DIR__ .'\Character.php');

/**
 * Class Paladin
 * @package Paladin
 */
class Paladin extends Character
{
    /**
     * Paladin constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setClass('Paladin');
        $this->setLife(120);
        $this->setArmor(15);
        $this->setMagicalResistance(30);
        $this->setDamage(20);
    }
}