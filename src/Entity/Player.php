<?php

namespace App\Entity;

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


    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getHeightCm(): ?int
    {
        return $this->heightCm;
    }

    public function setHeightCm(int $heightCm): self
    {
        $this->heightCm = $heightCm;

        return $this;
    }

    /**
     * @return Team
     */
    public function getTeams() : Team
    {
        return $this->teams;
    }

    /**
     * @param Team $team
     * @return Player
     */
    public function addTeam($team) : Player
    {
        $this->teams[] = $team;
        return $this;
    }


}
