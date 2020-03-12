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
            //var_dump($this->teams);
            for ($t = 0; $t < count($this->teams); $t++) {
                echo $this->teams[$t]->getName() . 'attack' . PHP_EOL;
                for ($p = 0; $p < count($this->teams[$t]->getCharacters()); $p++) {
                    $target = array_rand($this->teams[($t == 0 ? 1 : 0)]->getCharacters(), 1);
                    $teamWhoAttack = $this->teams[$t]->getCharacters();
                    $teamToAttack = $this->teams[$t == 0 ? 1 : 0]->getCharacters();

                    echo ' -------------' . PHP_EOL;
                    echo $teamWhoAttack[$p]->getName() . ' attack ' . $teamToAttack[$target]->getName() . PHP_EOL;
                    $teamWhoAttack[$p]->attack($teamToAttack[$target]);
                    echo $teamToAttack[$target]->getName() . ' has ' . $teamToAttack[$target]->getLife() . ' life left' . PHP_EOL;
                    echo ' -------------' . PHP_EOL;
                    if ($teamToAttack[$target]->getLife() <= 0) {
                        echo $teamToAttack[$target]->getName() . ' is dead' . PHP_EOL;
                        if (count($this->teams[$t == 0 ? 1 : 0]->getCharacters()) === 1) {
                            unset($this->teams[$t == 0 ? 1 : 0]);
                            echo ' -------------' . PHP_EOL;
                            return $this->teams[$t]->getName();
                        } else {
                            $this->teams[$t == 0 ? 1 : 0]->removeCharacter($teamToAttack[$target]);
                        }
                    }
                }
            }
        }
        return $this->teams;
    }
}