<?php

namespace App\Entity;

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

    public function chooseTarget($targetTeam)
    {
        echo ' -------------' . PHP_EOL;
        echo 'choose a target :' . PHP_EOL;
        $number = 0;
        $inputs = [];
        foreach ($targetTeam as $t){
            $inputs[] = $number;
            echo $number . ' ' . $t->getName();
            $number++;
        }
        echo PHP_EOL;
        echo 'Your choice :';
        $userInput = fopen ("php://stdin","r");
        $target = intval(fgets($userInput));

        return ['userInput' => $target, 'inputs' => $inputs];
    }

    public function chooseAction()
    {
        echo ' -------------' . PHP_EOL;
        echo 'choose a action : 1- Heal($heal) 2-Attack(deal damages) 3-Special Attack(Double basic attack damages but 50% fail chance)' . PHP_EOL;
        echo 'Your choice :';
        $userInput = fopen ("php://stdin","r");
        $action = intval(fgets($userInput));
        echo $action;
        if ($action == 1 || $action == 2 || $action == 3){
            return $action;
        } else {
            return false;
        }

    }

    /**
     * @param array $inputs
     * @param int $userInput
     * @return bool
     */
    public function checkUserInput($inputs, $userInput)
    {
        foreach ($inputs as $input){
            if ($input == $userInput){
                return true;
            }
        }
        return false;
    }

    public function start()
    {
        while (count($this->teams) !== 1) {
            //var_dump($this->teams);
            for ($t = 0; $t < count($this->teams); $t++) {
                echo $this->teams[$t]->getName() . 'attack' . PHP_EOL;
                for ($p = 0; $p < count($this->teams[$t]->getCharacters()); $p++) {
                    $teamWhoAttack = $this->teams[$t]->getCharacters();
                    $teamToAttack = $this->teams[$t == 0 ? 1 : 0]->getCharacters();
                    echo 'Is the turn of ' . $teamWhoAttack[$p]->getName() . PHP_EOL;
                    //check action
                    $valideAction = false;
                    do {
                        $choosedAction = $this->chooseAction();
                        var_dump($choosedAction);
                        if (!$choosedAction){
                            echo 'Please select a valid action ! :' . PHP_EOL;
                        } else {
                            $valideAction = true;
                        }
                    } while(!$valideAction);

                    //soit attaque soit heal
                    if ($choosedAction !== 1){
                        $valide = false;
                        do {
                            $choosed = $this->chooseTarget($teamToAttack);
                            $valide = $this->checkUserInput($choosed['inputs'], $choosed['userInput']);
                            if (!$valide){
                                echo 'Please select a valid player number ! :' . PHP_EOL;
                            }
                        } while (!$valide);

                        $target = $choosed['userInput'];
                        $valide = false;

                        if ($choosedAction == 2){
                            echo ' -------------' . PHP_EOL;
                            echo $teamWhoAttack[$p]->getName() . ' attack ' . $teamToAttack[$target]->getName() . PHP_EOL;
                            $teamWhoAttack[$p]->attack($teamToAttack[$target]);
                            echo $teamToAttack[$target]->getName() . ' has ' . $teamToAttack[$target]->getLife() . ' life left' . PHP_EOL;
                        } else {
                            switch (rand(0,1)){
                                case 0:
                                    echo ' -------------' . PHP_EOL;
                                    echo $teamWhoAttack[$p]->getName() . ' attack ' . $teamToAttack[$target]->getName() . PHP_EOL;
                                    $teamWhoAttack[$p]->specialAttack($teamToAttack[$target]);
                                    echo $teamToAttack[$target]->getName() . ' has ' . $teamToAttack[$target]->getLife() . ' life left' . PHP_EOL;
                                    break;
                                case 1:
                                    echo ' -------------' . PHP_EOL;
                                    echo 'Critical failure ! No damage deal !';
                                    break;
                            }
                        }


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
                    } else {
                        echo ' -------------' . PHP_EOL;
                        echo $teamWhoAttack[$p]->getName() . ' heal himself' . PHP_EOL;
                        $currentLife = $teamWhoAttack[$p]->getLife();
                        $teamWhoAttack[$p]->heal();
                        echo $teamWhoAttack[$p]->getName() . ' had ' . $currentLife . ' now has' . $teamWhoAttack[$p]->getLife() . PHP_EOL;
                    }

                }
            }
        }
        return $this->teams;
    }
}