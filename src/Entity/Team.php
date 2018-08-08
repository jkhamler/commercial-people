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
     * @ORM\ManyToMany(targetEntity="App\Entity\Player", mappedBy="teams")
     * @ORM\JoinColumn(nullable=true)
     */
    private $players;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="teams")
     * @ORM\JoinColumn(nullable=true)
     */
    private $country;


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
     * @return Country
     */
    public function getCountry() : Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return Team
     */
    public function setCountry(Country $country) : Team
    {
        $this->country = $country;
        return $this;
    }




}
