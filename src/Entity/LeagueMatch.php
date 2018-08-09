<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueMatchRepository")
 */
class LeagueMatch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\League", inversedBy="matches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $league;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="leagueMatches")
     * @ORM\JoinColumn(nullable=true)
     */
    private $homeTeam;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team", inversedBy="leagueMatches")
     * @ORM\JoinColumn(nullable=true)
     */
    private $awayTeam;

    /**
     * @ORM\Column(type="integer")
     */
    private $homeTeamGoalsScored;

    /**
     * @ORM\Column(type="integer")
     */
    private $awayTeamGoalsScored;


    /**
     * @return int
     */
    public function getId() :int
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
     * @return LeagueMatch
     */
    public function setLeague(League $league): self
    {
        $this->league = $league;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return LeagueMatch
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return LeagueMatch
     */
    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHomeTeam() : LeagueTeam
    {
        return $this->homeTeam;
    }

    /**
     * @param mixed $homeTeam
     * @return LeagueMatch
     */
    public function setHomeTeam(LeagueTeam $homeTeam) : LeagueMatch
    {
        $this->homeTeam = $homeTeam;
        return $this;
    }

    /**
     * @return LeagueTeam
     */
    public function getAwayTeam() : LeagueTeam
    {
        return $this->awayTeam;
    }

    /**
     * @param mixed $awayTeam
     * @return LeagueMatch
     */
    public function setAwayTeam(LeagueTeam $awayTeam) : LeagueMatch
    {
        $this->awayTeam = $awayTeam;
        return $this;
    }

    /**
     * @return int
     */
    public function getHomeTeamGoalsScored() : int
    {
        return $this->homeTeamGoalsScored;
    }

    /**
     * @param int $homeTeamGoalsScored
     * @return LeagueMatch
     */
    public function setHomeTeamGoalsScored(int $homeTeamGoalsScored) : LeagueMatch
    {
        $this->homeTeamGoalsScored = $homeTeamGoalsScored;
        return $this;
    }

    /**
     * @return int
     */
    public function getAwayTeamGoalsScored() : int
    {
        return $this->awayTeamGoalsScored;
    }

    /**
     * @param int $awayTeamGoalsScored
     * @return LeagueMatch
     */
    public function setAwayTeamGoalsScored(int $awayTeamGoalsScored) : LeagueMatch
    {
        $this->awayTeamGoalsScored = $awayTeamGoalsScored;
        return $this;
    }


}
