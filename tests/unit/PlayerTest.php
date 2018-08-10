<?php

class PlayerTest extends \Codeception\Test\Unit
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
        $player = new \App\Entity\Player();
        $player->setName('Maradonna');
        $player->setAge(65);
        $player->setHeightCm(165);

        $this->assertEquals('Maradonna', $player->getName());
        $this->assertEquals(65, $player->getAge());
        $this->assertEquals(165, $player->getHeightCm());

    }
}