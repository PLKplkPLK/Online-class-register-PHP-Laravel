<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_1_LoginAdminCest
{
    public function LoginAdminTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as Admin');
        $I->amOnPage("/login");
        $I->fillField("email", "admin@szkola.com");
        $I->fillField("password", "admin");
        $I->click("Zaloguj się");

        $I->click("Wyloguj");
        $I->seeCurrentUrlEquals("/logout");
    }
}
