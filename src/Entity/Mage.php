<?php


namespace App\Entity;

/**
 * Class Mage
 * @package Mage
 */
class Mage extends Character
{
    /**
     * Mage constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setClass('Mage');
        $this->setLife(80);
        $this->setArmor(5);
        $this->setMagicalResistance(30);
        $this->setDamage(60);
    }
}