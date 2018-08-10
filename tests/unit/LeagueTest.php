<?php

class LeagueTest extends \Codeception\Test\Unit
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
        $league = new \App\Entity\League();
        $league->setName('European Cup');

        $this->assertEquals('European Cup', $league->getName());
    }
}