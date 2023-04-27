<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_ForgetPasswordCest
{
    public function ForgetPasswordTest(AcceptanceTester $I): void
    {
        $I->amOnPage("/login");
        $I->seeCurrentUrlEquals("/login");
        $I->click("Zapomniałeś hasła?");


        $I->seeCurrentUrlEquals("/forgot-password");
        $I->seeInTitle("Szkoła");
        $I->seeElement(['css' => 'button[type=submit]']);

        $I->amGoingTo('write incorrect email');
        $I->fillField("email", "incorrect@.wp.pl");
        $I->click("Wyślij link do resetowania hasła");
        $I->dontSee("We have emailed your password reset link!");
        $I->dontSee("We can't find a user with that email address.");

        $I->amGoingTo('write correct email');
        $I->fillField("email", "minerva@szkola.com");
        $I->click("Wyślij link do resetowania hasła");
        $I->see("We have emailed your password reset link!");

        $I->amGoingTo('write unused email');
        $I->fillField("email", "wrongEmail@gmail.com");
        $I->click("Wyślij link do resetowania hasła");
        $I->see("We can't find a user with that email address.");
    }
}
