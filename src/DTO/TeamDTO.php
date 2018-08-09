<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 09/08/2018
 * Time: 15:55
 */

namespace App\DTO;

use App\Entity\Team;


/**
 *
 * Intermediary Data Transfer Obect class used to
 * create/update Offer entities from HTTP requests
 *
 * Class TeamDTO
 * @package App\DTO
 */
class TeamDTO
{
    private $name;

    private $strip;

    private $club_address;

    /**
     * This creates a team entity frmo the DTO.
     *
     * @return Team
     */
    public function createTeamEntity(): Team
    {
        $team = new Team();

        $team->setName($this->getName());
        $team->setStrip($this->getStrip());
        $team->setClubAddress($this->getClubAddress());

        return $team;
    }

    /**
     * This update an existing team entity from the DTO.
     *
     * @param Team $team
     * @return Team
     */
    public function updateTeam(Team &$team)
    {

        $team->setName($this->getName());
        $team->setStrip($this->getStrip());
        $team->setClubAddress($this->getClubAddress());

        return $team;

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return TeamDTO
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * @param mixed $strip
     * @return TeamDTO
     */
    public function setStrip($strip)
    {
        $this->strip = $strip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClubAddress()
    {
        return $this->club_address;
    }

    /**
     * @param mixed $club_address
     * @return TeamDTO
     */
    public function setClubAddress($club_address)
    {
        $this->club_address = $club_address;
        return $this;
    }

}