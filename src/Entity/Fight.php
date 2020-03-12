<?php

namespace App\Entity;

use function MongoDB\BSON\fromJSON;

/**
 * Class Fight
 * @package Fight
 */

class Fight
{
    /** @var string */
    private $id;

    /** @var array */
    private $teams;

    /** @var int */
    private $turn = 0;

    /**
     * Fight constructor.
     * @param Team $team1
     * @param Team $team2
     */
    public function __construct($team1, $team2)
    {
        $this->id = uniqid();
        $this->teams[] = $team1;
        $this->teams[] = $team2;
    }

    public function start()
    {
        while (count($this->teams) !== 1) {
            for ($t = 0; $t < count($this->teams); $t++) {
                for ($p = 0; $p < count($this->teams[$t]->getCharacters()); $p++) {
                    $target = array_rand($this->teams[($t == 0 ? 1 : 0)]->getCharacters(), 1);
                    $team1  = $this->teams[0]->getCharacters();
                    $team2  = $this->teams[1]->getCharacters();

                    if ($t == 0 && isset($this->teams[0])) {
                        echo $this->teams[$t]->getCharacters()[$p]->getName() . ' attack ' . $team2[$target]->getName() . PHP_EOL;
                        $this->teams[$t]->getCharacters()[$p]->attack($team2[$target]);
                        echo $team2[$target]->getName() . ' has ' . $team2[$target]->getLife() . ' life left' . PHP_EOL;
                        if ($team2[$target]->getLife() <= 0) {
                            $this->teams[1]->removeCharacter($team2[$target]);
                            echo $team2[$target]->getName() . ' is dead' . PHP_EOL;

                            if (empty($this->teams[1]->getCharacters())) {
                                unset($this->teams[1]);
                                return $this->teams[0]->getName();
                            }
                        }
                    } elseif ($t == 1 && isset($this->teams[1])) {
                        echo $this->teams[$t]->getCharacters()[$p]->getName() . ' attack ' . $team1[$target]->getName() . PHP_EOL;
                        $this->teams[$t]->getCharacters()[$p]->attack($team1[$target]);
                        echo $team1[$target]->getName() . ' has ' . $team1[$target]->getLife() . ' life left' . PHP_EOL;
                        if ($team1[$target]->getLife() <= 0) {
                            $this->teams[0]->removeCharacter($team1[$target]);
                            echo $team1[$target]->getName() . ' is dead' . PHP_EOL;
                            if (empty($this->teams[0]->getCharacters())) {
                                unset($this->teams[0]);
                                return $this->teams[1]->getName();
                            }
                        }
                    } else {
                        break 2;
                    }
                }

            }
        }
    }
}