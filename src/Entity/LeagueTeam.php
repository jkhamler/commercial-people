<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueTeamRepository")
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goalsScored;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goalsConceded;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leaguePosition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yellowCards;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $redCards;

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
     * @return int
     */
    public function getGoalsScored(): int
    {
        return $this->goalsScored;
    }

    /**
     * @param int $goalsScored
     * @return LeagueTeam
     */
    public function setGoalsScored(int $goalsScored): self
    {
        $this->goalsScored = $goalsScored;

        return $this;
    }

    /**
     * @return int
     */
    public function getGoalsConceded(): int
    {
        return $this->goalsConceded;
    }

    /**
     * @param int $goalsConceded
     * @return LeagueTeam
     */
    public function setGoalsConceded(int $goalsConceded): self
    {
        $this->goalsConceded = $goalsConceded;

        return $this;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     * @return LeagueTeam
     */
    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return int
     */
    public function getLeaguePosition(): int
    {
        return $this->leaguePosition;
    }

    /**
     * @param int $leaguePosition
     * @return LeagueTeam
     */
    public function setLeaguePosition(int $leaguePosition): self
    {
        $this->leaguePosition = $leaguePosition;

        return $this;
    }

    /**
     * @return int
     */
    public function getYellowCards(): int
    {
        return $this->yellowCards;
    }

    /**
     * @param int $yellowCards
     * @return LeagueTeam
     */
    public function setYellowCards(int $yellowCards): self
    {
        $this->yellowCards = $yellowCards;

        return $this;
    }

    /**
     * @return int
     */
    public function getRedCards(): int
    {
        return $this->redCards;
    }

    /**
     * @param int $redCards
     * @return LeagueTeam
     */
    public function setRedCards(int $redCards): self
    {
        $this->redCards = $redCards;

        return $this;
    }
}
