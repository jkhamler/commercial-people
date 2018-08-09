<?php


class deleteLeagueCest
{
    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->sendDELETE("/league/76");

        $I->seeResponseIsJson();

        $I->seeResponseContainsJson(["League with ID 76 has been deleted"]);

    }
}
