<?php

namespace App\Entity;

/**
 * Class Character
 * @package Character
 */
class Character
{
    /** @var string */
    private $name;

    /** @var string */
    private $class;

    /** @var int */
    private $life = 100;

    /** @var int */
    private $armor;

    /** @var int */
    private $magicalResistance;

    /** @var int */
    private $damage;

    /** @var int */
    private $dodge = 0;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     * @return int
     */
    public function setLife(int $life): int
    {
        $this->life = $life;

        return $life;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     */
    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }

    /**
     * @return int
     */
    public function getMagicalResistance(): int
    {
        return $this->magicalResistance;
    }

    /**
     * @param int $magicalResistance
     */
    public function setMagicalResistance(int $magicalResistance): void
    {
        $this->magicalResistance = $magicalResistance;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * @param int $damage
     */
    public function setDamage(int $damage): void
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getDodge(): int
    {
        return $this->dodge;
    }

    /**
     * @param int $dodge
     */
    public function setDodge(int $dodge): void
    {
        $this->dodge = $dodge;
    }

    /**
     * @param int $damage
     */
    public function attack(int $damage)
    {

    }
}
