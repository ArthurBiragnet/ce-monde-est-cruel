<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TrandoshaPlayers
 * @package Hackathon\PlayerIA
 * @author YOUR NAME HERE
 */
class TrandoshaPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        
        $last_opp = $this->result->getLastChoiceFor($this->opponentSide);
        if ($last_opp == 0) {
            $result = parent::scissorsChoice();
        }
        else {
            $result = parent::paperChoice();
        }

        $all_opp = $this->result->getChoicesFor($this->opponentSide);

        $rockNumber = array_search('rock', $all_opp);
        $scissorsNumber = array_search('scissors', $all_opp);
        $paperNumber = array_search('paper', $all_opp);

        if ($rockNumber > $scissorsNumber && $rockNumber > $paperNumber) {
            $result = parent::paperChoice();
        }
        elseif ($scissorsNumber > $rockNumber && $scissorsNumber > $paperNumber) {
            $result = parent::rockChoice();
        }
        else {
            $result = parent::scissorsChoice();
        }

        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------


        return $result;

    }
};
