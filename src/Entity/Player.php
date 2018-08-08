<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
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
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $heightCm;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", inversedBy="players")
     * @ORM\JoinColumn(nullable=true)
     */
    private $teams;

    /**
     * @return int
     */
    public function getId(): int
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
     * @return Player
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return Player
     */
    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeightCm(): int
    {
        return $this->heightCm;
    }

    /**
     * @param int $heightCm
     * @return Player
     */
    public function setHeightCm(int $heightCm): self
    {
        $this->heightCm = $heightCm;

        return $this;
    }

    /**
     * @return Team[]|ArrayCollection
     */
    public function getTeams() : ArrayCollection
    {
        return $this->teams;
    }

    /**
     * @param Team $team
     * @return Player
     */
    public function addTeam(Team $team) : Player
    {
        $this->teams[] = $team;
        return $this;
    }


}
