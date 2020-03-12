<?php

namespace App\Entity;

class Team
{
    /** @var string */
    private $name;

    /** @var array */
    private $characters = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param $character
     * @param mixed ...$characters
     * @return array
     */
    public function addCharacter($character, ...$characters)
    {
        $this->characters[] = $character;

        foreach ($characters as $character) {
            $this->characters[] = $character;
        }

        return $this->characters;
    }

    /**
     * @param Archer|Mage|Paladin|Warrior $character
     * @return array
     */
    public function removeCharacter($character)
    {
        $tmpArr           = $this->characters;
        $this->characters = [];
        foreach ($tmpArr as $item) {
            if ($item !== $character) {
                $this->characters[] = $item;
            }
        }
        return $this->characters;
    }
}