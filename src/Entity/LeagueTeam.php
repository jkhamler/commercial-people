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

}
