<?php

class TeamTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $team = new \App\Entity\Team();
        $team->setName('QPR');
        $team->setStrip('Blue');
        $team->setClubAddress('Queens Park');

        $this->assertEquals('QPR', $team->getName());
        $this->assertEquals('Blue', $team->getStrip());
        $this->assertEquals('Queens Park', $team->getClubAddress());

    }
}