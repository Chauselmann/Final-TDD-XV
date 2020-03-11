<?php

namespace App\Entity;
require_once(__DIR__ .'\Character.php');

/**
 * Class Archer
 * @package Archer
 */
class Archer extends Character
{
    /**
     * Archer constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setClass('Archer');
        $this->setLife(60);
        $this->setArmor(10);
        $this->setMagicalResistance(20);
        $this->setDamage(40);
    }
}