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

    }
}