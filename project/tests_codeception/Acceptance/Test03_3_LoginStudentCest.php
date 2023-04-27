<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_3_LoginStudentCest
{
    public function LoginStudentTest(AcceptanceTester $I): void
    {
        $I->amGoingTo('Log in as student');
        $I->amOnPage("/login");
        $I->fillField("email", "tom@szkola.com");
        $I->fillField("password", "tom");
        $I->click("Zaloguj się");

        $I->click("Wyloguj");
        $I->seeCurrentUrlEquals("/logout");
    }
}
