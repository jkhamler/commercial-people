<?php


class listTeamsInSingleLeagueCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->sendGET('/league/72/teams');

        $I->seeResponseContainsJson(array(
            'teams' =>
                array(
                    0 =>
                        array(
                            'name' => 'Ipswich Town',
                            'strip' => 'Chocolate and Teal',
                            'club_address' => '234 Connie Mews Apt. 364
North Magdalenburgh, MI 74712',
                        ),
                    1 =>
                        array(
                            'name' => 'QPR',
                            'strip' => 'PapayaWhip and ForestGreen',
                            'club_address' => '6630 Rodrick Ville Suite 593
Harberberg, AZ 08785-5159',
                        ),
                    2 =>
                        array(
                            'name' => 'Manchester City',
                            'strip' => 'MediumPurple and Magenta',
                            'club_address' => '65207 Feest Row Apt. 128
Williamsonmouth, MT 63238-6671',
                        ),
                    3 =>
                        array(
                            'name' => 'Wigan',
                            'strip' => 'DarkSlateBlue and BlueViolet',
                            'club_address' => '5513 Bahringer Rue Suite 708
Rathville, OK 15915-3311',
                        ),
                    4 =>
                        array(
                            'name' => 'Portsmouth',
                            'strip' => 'Olive and BlanchedAlmond',
                            'club_address' => '9139 Treva Skyway Apt. 081
Lake Henriette, VT 08619',
                        ),
                ),
        ));

    }
}
