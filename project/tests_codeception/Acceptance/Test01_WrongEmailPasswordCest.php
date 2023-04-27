<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test01_WrongEmailPasswordCest
{
    public function WrongEmailPasswordTest(AcceptanceTester $I): void
    {
        $I->amOnPage("/login");
        $I->seeCurrentUrlEquals("/login");

        $I->amGoingTo('Log in with e-mail which is not in database');
        $I->fillField("email", "incorrect@szkola.wp.pl");
        $I->fillField("password", "incorrect");
        $I->click("Zaloguj się");
        $I->expect('See message about wrong e-mail');
        $I->see("These credentials do not match our records.");

        $I->amGoingTo('Log in with incorrect email');
        $I->fillField("email", "admin@.szkola.com");
        $I->fillField("password", "admin");
        $I->click("Zaloguj się");
        $I->expect('Not log in');
        $I->seeCurrentUrlEquals("/login");

        $I->amGoingTo('Log in with incorrect password');
        $I->fillField("email", "admin@szkola.com");
        $I->fillField("password", "incorrect");
        $I->click("Zaloguj się");
        $I->expect('See message about wrong e-mail');
        $I->see("These credentials do not match our records.");
    }
}
