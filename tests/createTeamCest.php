<?php


class createTeamCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');

        $I->sendPOST('/team', json_encode([
            'name' => 'Team from Codeception',
            'strip' => 'Strip from Codeception',
            'clubAddress' => 'Address from Codeception'
        ]));

        $I->canSeeResponseIsJson();

        echo '<pre>';
        echo print_r($I->grabResponse(), true);
        echo '</pre>';
        exit();


//        $json = [
//            'team' => [
//                'name' => 'Team from Codeception',
//                'strip' => 'Strip from Codeception',
//                'clubAddress' => 'Address from Codeception',
//            ]
//        ];

        $I->canSeeResponseContainsJson(
            $json
        );
    }
}
