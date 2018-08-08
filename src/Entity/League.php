<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueRepository")
 */
class League
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LeagueTeam", mappedBy="League", cascade={"persist"})
     * @var LeagueTeam[]
     */
    private $leagueTeams;

    public function __construct()
    {
        $this->leagueTeams = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return League
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ArrayCollection|Team[]
     */
    public function getTeams() : ArrayCollection
    {
        $teams = new ArrayCollection();

        foreach ($this->getLeagueTeams() as $leagueTeam) {
            $team = $leagueTeam->getTeam();

            if(!$teams->contains($team)){
                $teams->add($team);
            }
        }

        return $teams;
    }

    /**
     * @return Collection|LeagueTeam[]
     */
    public function getLeagueTeams(): Collection
    {
        return $this->leagueTeams;
    }


    /**
     * @param Team $team
     * @return League
     */
    public function addTeam(Team $team): self
    {
        if (!$this->getTeams()->contains($team)) {

            $leagueTeam = new LeagueTeam();
            $leagueTeam->setTeam($team);
            $leagueTeam->setLeague($this);
            $this->leagueTeams[] = $leagueTeam;

        }

        return $this;
    }

    /**
     * @param Team $team
     * @return League
     */
    public function removeTeam(Team $team): self
    {
        foreach ($this->leagueTeams as $leagueTeam) {
            if($leagueTeam->getTeam()->getId() == $team->getId()){
                $this->leagueTeams->remove($leagueTeam);
            }
        }

        return $this;
    }
}
