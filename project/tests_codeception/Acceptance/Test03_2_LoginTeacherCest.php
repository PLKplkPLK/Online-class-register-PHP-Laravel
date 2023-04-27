<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_2_LoginTeacherCest
{
    public function LoginTeacherTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as teacher');
        $I->amOnPage("/login");
        $I->fillField("email", "albus@szkola.com");
        $I->fillField("password", "albus");
        $I->click("Zaloguj się");

        $I->click("Wyloguj");
        $I->seeCurrentUrlEquals("/logout");
    }
}
