<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeagueRepository")
 * @ExclusionPolicy("all")
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
     * @Expose
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @Expose
     * @ORM\OneToMany(targetEntity="App\Entity\LeagueTeam", mappedBy="league", cascade={"persist", "remove"})
     * @var LeagueTeam[]
     */
    private $leagueTeams;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LeagueMatch", mappedBy="league", cascade={"persist", "remove"})
     */
    private $leagueMatches;

    public function __construct()
    {
        $this->leagueTeams = new ArrayCollection();
        $this->leagueMatches = new ArrayCollection();
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

    /**
     * @return Collection|LeagueMatch[]
     */
    public function getLeagueMatches(): Collection
    {
        return $this->leagueMatches;
    }

    /**
     * Returns league matches where a given team played (either home or away)
     *
     * @param Team $team
     * @return ArrayCollection|LeagueMatch[]
     */
    public function getLeagueMatchesForTeam(Team $team): ArrayCollection
    {
        $teamLeagueMatches = new ArrayCollection();

        foreach ($this->getLeagueMatches() as $leagueMatch) {

            if($leagueMatch->getHomeTeam()->getId() == $team->getId() ||
            $leagueMatch->getAwayTeam()->getId() == $team->getId()){
                $teamLeagueMatches->add($leagueMatch);
            }
        }
        return $teamLeagueMatches;
    }

    public function addMatch(LeagueMatch $match): self
    {
        if (!$this->leagueMatches->contains($match)) {
            $this->leagueMatches[] = $match;
            $match->setLeague($this);
        }

        return $this;
    }

    public function removeMatch(LeagueMatch $match): self
    {
        if ($this->leagueMatches->contains($match)) {
            $this->leagueMatches->removeElement($match);
            // set the owning side to null (unless already changed)
            if ($match->getLeague() === $this) {
                $match->setLeague(null);
            }
        }

        return $this;
    }
}
