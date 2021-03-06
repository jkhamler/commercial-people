<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueTeamRepository")
 * @ExclusionPolicy("all")
 */
class LeagueTeam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\League", inversedBy="leagueTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $league;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="leagueTeams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;


    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return League
     */
    public function getLeague(): League
    {
        return $this->league;
    }

    /**
     * @param League $league
     * @return LeagueTeam
     */
    public function setLeague(League $league)
    {
        $this->league = $league;
        return $this;
    }


    /**
     * @return Team
     */
    public function getTeam() : Team
    {
        return $this->team;
    }
    /**
     * @param Team $team
     * @return LeagueTeam
     */
    public function setTeam($team) : LeagueTeam
    {
        $this->team = $team;
        return $this;
    }

    /**
     * @return ArrayCollection|LeagueMatch[]
     */
    public function getLeagueMatches() : ArrayCollection{
        return $this->getLeague()->getLeagueMatchesForTeam($this->getTeam());
    }

    /**
     * @return int
     */
    public function getGoalsScored() : int{
        $goalsScored = 0;

        foreach ($this->getLeagueMatches() as $leagueMatch) {
            $goalsScored+= $leagueMatch->getHomeTeamGoalsScored();
        }

        return $goalsScored;
    }

    /**
     * @return int
     */
    public function getGoalsConceded() : int{
        $goalsScored = 0;

        foreach ($this->getLeagueMatches() as $leagueMatch) {
            $goalsScored+= $leagueMatch->getAwayTeamGoalsScored();
        }

        return $goalsScored;
    }

    /**
     * @return int
     */
    public function getYellowCardsReceived() : int{
        $yellowCardsReceived = 0;

        foreach ($this->getLeagueMatches() as $leagueMatch) {
            $yellowCardsReceived+= $leagueMatch->getHomeTeamYellowCards();
        }

        return $yellowCardsReceived;

    }

    /**
     * @return int
     */
    public function getRedCardsReceived() : int{
        $redCardsReceived = 0;

        foreach ($this->getLeagueMatches() as $leagueMatch) {
            $redCardsReceived+= $leagueMatch->getHomeTeamRedCards();
        }

        return $redCardsReceived;

    }

    /**
     * @return int
     */
    public function getLeaguePoints() : int{

        $leaguePoints = 0;

        $leaguePoints += ($this->getGoalsScored() * 5); // 3 points per goal scored
        $leaguePoints -= ($this->getGoalsConceded()); // -1 point per goal conceded

        $leaguePoints -= ($this->getYellowCardsReceived() * 2); // -2 points per yellow card received
        $leaguePoints -= ($this->getRedCardsReceived() * 5); // -5 points per red card received

        return $leaguePoints;
    }

}
