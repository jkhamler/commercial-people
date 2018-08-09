<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
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
     * @ORM\Column(type="string", length=255)
     */
    private $strip;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Player", inversedBy="teams")
     * @ORM\JoinColumn(nullable=true)
     */
    private $players;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clubAddress;


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
     * @return Team
     */
    public function setName(string $name): Team
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStrip(): string
    {
        return $this->strip;
    }

    /**
     * @param string $strip
     * @return Team
     */
    public function setStrip(string $strip): Team
    {
        $this->strip = $strip;

        return $this;
    }

    /**
     * @return ArrayCollection|Player[]
     */
    public function getPlayers() : ArrayCollection
    {
        return $this->players;
    }

    /**
     * @param Player $player
     * @return Team
     */
    public function addPlayer(Player $player) : Team
    {
        $this->players[] = $player;
        return $this;
    }


    /**
     * @return string
     */
    public function getClubAddress() : string
    {
        return $this->clubAddress;
    }

    /**
     * @param string $clubAddress
     * @return Team
     */
    public function setClubAddress(string $clubAddress) : Team
    {
        $this->clubAddress = $clubAddress;
        return $this;
    }





}
