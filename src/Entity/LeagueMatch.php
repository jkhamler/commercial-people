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
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $homeTeamGoalsScored;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $awayTeamGoalsScored;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $homeTeamYellowCards;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $homeTeamRedCards;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $awayTeamYellowCards;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $awayTeamRedCards;


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
    public function setHomeTeam(Team $homeTeam) : LeagueMatch
    {
        $this->homeTeam = $homeTeam;
        return $this;
    }

    /**
     * @return Team
     */
    public function getAwayTeam() : Team
    {
        return $this->awayTeam;
    }

    /**
     * @param Team $awayTeam
     * @return LeagueMatch
     */
    public function setAwayTeam(Team $awayTeam) : LeagueMatch
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

    /**
     * @return int
     */
    public function getHomeTeamYellowCards() : int
    {
        return $this->homeTeamYellowCards;
    }

    /**
     * @param int $homeTeamYellowCards
     * @return LeagueMatch
     */
    public function setHomeTeamYellowCards(int $homeTeamYellowCards) : LeagueMatch
    {
        $this->homeTeamYellowCards = $homeTeamYellowCards;
        return $this;
    }

    /**
     * @return int
     */
    public function getHomeTeamRedCards() : int
    {
        return $this->homeTeamRedCards;
    }

    /**
     * @param int $homeTeamRedCards
     * @return LeagueMatch
     */
    public function setHomeTeamRedCards(int $homeTeamRedCards) : LeagueMatch
    {
        $this->homeTeamRedCards = $homeTeamRedCards;
        return $this;
    }


    /**
     * @return int
     */
    public function getAwayTeamYellowCards() : int
    {
        return $this->awayTeamYellowCards;
    }

    /**
     * @param int $awayTeamYellowCards
     * @return LeagueMatch
     */
    public function setAwayTeamYellowCards(int $awayTeamYellowCards) : LeagueMatch
    {
        $this->awayTeamYellowCards = $awayTeamYellowCards;
        return $this;
    }

    /**
     * @return int
     */
    public function getAwayTeamRedCards() : int
    {
        return $this->awayTeamRedCards;
    }

    /**
     * @param int $awayTeamRedCards
     * @return LeagueMatch
     */
    public function setAwayTeamRedCards(int $awayTeamRedCards) : LeagueMatch
    {
        $this->awayTeamRedCards = $awayTeamRedCards;
        return $this;
    }




}
