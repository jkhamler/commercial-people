<?php


class updateTeamCest
{
    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

        $I->sendPUT('/team/533', json_encode([
            'name' => 'Team from Codeception',
            'strip' => 'Strip from Codeception',
            'clubAddress' => 'Address from Codeception'
        ]));

        $I->canSeeResponseIsJson();

        $json = [
            'team' => [
                'name' => 'Team from Codeception',
                'strip' => 'Strip from Codeception',
                'club_address' => 'Address from Codeception',
            ]
        ];

        $I->canSeeResponseContainsJson(
            $json
        );
    }
}
