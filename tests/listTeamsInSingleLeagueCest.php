<?php


class listTeamsInSingleLeagueCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->amBearerAuthenticated('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1MzM4OTY3MDAsImV4cCI6MTUzMzkwMDMwMCwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiam9obmRvZSJ9.DO7GVOKqZRWh60Yn6hE6p8qgcLqkB3Id2pO5rBhLCR29P_8Xp3kJcY-U7-H9M3N3XP7kqa4MLR8ggVO4q-GxGSgXN1MJwEHK6wdNm58YPrhicpgok3uEbvGqaKdrepwkwsXaQrlLAuBUqeY_BBLUWDxkZqm0-IIhRkZxV2PvntkzIAP5y6PJkNbOyakNhWihyTxjAPx6cEi6Y1vKrddxh0cXS783G7jZAnDTOAVbOYicUswon3Kv_PlhIVtLVU79nnEe5Bue3FdyhNEWNStZrvEkX1Ce-YUl38r_PINM6rpF7AYpH05NNLQ5KMmZqP17kehkYjb5btbehRFJWRkUQ77mrZcPJ-uDrdFNOUM_n6SPTlwAAttXv1DU05ZFjnx_ffQjf23aJmKgWQcj709WuI8Oc7GDBHyFKUVM0gQ_AcPlBxVFMz6o1zxnxw9Z9mnY0HLV-kYgaB3vKhFw5l7mipNYrP2dNilayAeShSI8MVYC3e7GAFFNmXnAg1aPVMc_i_yfEhlBk0C7NFs3_-124N68M6Q1qayASv_WOHXloxS42I5CTMq1kSKQDqc2oCXGe2tQZYQYQ8EBefOTEE4O59RwdZe4tC0ts7RNlBvbfvw3KCikiPCJKZzwamzQPH5Xoh3zZ45eX3xUGhMo5-tJPsixEb02rkS38ck0ZdVq6to');

        $I->sendGET('/api/league/3/teams');


        $I->seeResponseContainsJson(array (
            'teams' =>
                array (
                    0 =>
                        array (
                            'name' => 'Ipswich Town',
                            'strip' => 'MediumVioletRed and Brown',
                            'club_address' => '13111 Myah Green Suite 070
North Tierraborough, IL 73911',
                        ),
                    1 =>
                        array (
                            'name' => 'QPR',
                            'strip' => 'LightSkyBlue and Green',
                            'club_address' => '5313 Reichert Springs Suite 198
Faheyview, NH 24475',
                        ),
                    2 =>
                        array (
                            'name' => 'Manchester City',
                            'strip' => 'Wheat and SkyBlue',
                            'club_address' => '302 Ivory Cape Apt. 276
Port Hobartstad, ME 50342-3254',
                        ),
                    3 =>
                        array (
                            'name' => 'Wigan',
                            'strip' => 'Silver and DarkOrchid',
                            'club_address' => '7725 Streich Trail
Ernestineview, GA 45367',
                        ),
                    4 =>
                        array (
                            'name' => 'Portsmouth',
                            'strip' => 'MistyRose and SeaGreen',
                            'club_address' => '1858 Aletha Road Apt. 967
Christiansenberg, WI 79540',
                        ),
                ),
        ));

    }
}
